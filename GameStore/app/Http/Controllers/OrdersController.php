<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){
        $models = Orders::where("IsActive", "=", true)->get();
        return view("Orders.index", ["models" => $models]);
    }
    public function index_preview($id){
        $models = Orders::where("IsActive", "=", true)->where("ClientsId","=",$id)->get();
        $orderid = $models->pluck('Id')->toArray();
        $orders = OrderDetails::whereIn("OrderId",$orderid)->get();
        $client = Clients::find($id);
        return view("Orders.preview", ["models" => $models, "orders" => $orders, "client" => $client]);
    }
    public function details($id){
        $model = Orders::find($id);
        return view("Orders.details", ["model" => $model, "orders" => OrderDetails::where("IsActive", "=", true)->where("OrderId", "=", $id)->get()]);
    }
    public function details_preview($id){
        $models = OrderDetails::where("OrderId","=",$id)->get();
        return view("Orders.preview_details", ["models" => $models, "order" => $id]);
    }
    public function delete_details($id){
        $model = Orders::find($id);
        return view("Orders.delete", ["model" => $model, "orders" => OrderDetails::where("IsActive", "=", true)->where("OrderId", "=", $id)->get()]);
    }
    public function edit($id){
        $model = Orders::find($id);
        $orders = OrderDetails::select('ProductId', 'ProductQuantity')->where('IsActive', true)->where('OrderId', $id)->get()->toArray();
        return view("Orders.edit",["model" => $model, "orders" => $orders, "products" => Products::where("IsActive", "=", true)->get(), "clients" => Clients::where("IsActive", "=", true)->get()]);
    }
    public function update($id, Request $request){
        $products = Products::all();
        //pobieranie wszystkich produktów w wybranym zamówieniu
        $orders = OrderDetails::where('IsActive', true)->where('OrderId', $id)->get();

        $request->validate([
            'selectedProducts.*' => 'required',
            'quantities.*' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($products, $orders) {
                    $productId = str_replace('quantities.', '', $attribute);
                    $product = $products->find($productId); 
                    //pobieramy sprawdzany produkt z OrderDetails dla danego Orderu
                    $productInOrder = $orders->where('ProductId', $productId)->first();
                    if($productInOrder != null){
                        //nowa wartość do sprawdzania w przypadku istniejącego zamówienia danego produktu
                        //czyli: wprowadzona wartość w inpucie - ilość produktów w zamówieniu
                        $newQuantityValue = $value - $productInOrder->ProductQuantity;
                        //sprawdzanie czy można zmienić ilość produktów w zamówieniu
                        if(($product->Quantity - $newQuantityValue) < 0){
                            $fail('Przekroczono dostępną ilość dla produktu: ' . $product->Title.'. Pozostała ilość na magazynie to: '.$product->Quantity);
                        }
                    }
                    else{
                        if ($value > $product->Quantity) {
                            $fail('Przekroczono dostępną ilość dla produktu: ' . $product->Title.'. Maksymalna możliwa ilość to: '.$product->Quantity);
                        }
                    }
                    
                },
            ],
        ], [
            'selectedProducts.*.required' => 'Wybór produktu jest wymagany.',
            'quantities.*.required' => 'Ilość produktu jest wymagana.',
            'quantities.*.numeric' => 'Ilość produktu musi być liczbą.',
            'quantities.*.min' => 'Ilość produktu nie może być mniejsza od 0.',
        ]);

        $model = Orders::find($id);
        
        $model->ClientsId = $request->input("ClientId");
        $model->EditDateTime = date("Y-m-d H:i:s");

        //zabezpieczenie przed pustą tablicą selectedProducts która spowoduje że foreach się nie wywoła
        if(!empty($request->input('selectedProducts', []))){
            //pętla po zaznaczonych checkboxach przy produktach
            foreach ($request->input('selectedProducts', []) as $key => $productId) {
                $quantity = $request->input('quantities.' . $productId, 0);
                if (isset($request->selectedProducts[$key])) {
                    //sprawdzanie czy zmieniamy ilość sztuk, czy dodajemy nowy produkt do zamówienia
                    $modelDetails = OrderDetails::where('IsActive',true)->where('OrderId', $id)->where('ProductId',$productId)->first();
                    
                    $product = Products::find($productId);
                    if($modelDetails == null){
                        $modelDetails = new OrderDetails();
                        $modelDetails->OrderId = $model->Id;
                        $modelDetails->ProductId = $productId;
                        $modelDetails->IsActive = true;
                        $product->Quantity = $product->Quantity - $quantity;
                    }
                    else{
                        if($quantity > $modelDetails->ProductQuantity){
                            $product->Quantity = $product->Quantity - ($quantity-$modelDetails->ProductQuantity);
                        }
                        else{
                            $product->Quantity = $product->Quantity + ($modelDetails->ProductQuantity-$quantity);
                        }
                    }
                    $modelDetails->ProductQuantity = $quantity;
                    $modelDetails->save();
                    $product->save();
                }
                //pętla po wcześniej pobranych produktach w zamówieniu
                foreach($orders as $order){
                    //porównujemy id produktów w zamówieniu z tymi które zaznaczyliśmy checkboxem (selectedProducts)
                    //w momencie gdy brakuje id produktu w selectedProducts (został odznaczony)
                    //usuwamy go również z zamówienia
                    if (!in_array($order->ProductId, $request->selectedProducts)){
                        $order->IsActive = false;
                        $order->save();
        
                        $productToReturn = Products::find($order->ProductId);
                        $productToReturn->Quantity += $order->ProductQuantity;
                        $productToReturn->save();
                    }
                }
            }
        }
        else{
            foreach($orders as $order){
                $order->IsActive = false;
                $order->save();
        
                $productToReturn = Products::find($order->ProductId);
                $productToReturn->Quantity += $order->ProductQuantity;
                $productToReturn->save();
            }
        }

        $model->save();

        return redirect("/orders");
    }
    public function create(){
        $model = new Orders();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d");
        return view("orders.create", ["model" => $model, "products" => Products::where("IsActive", "=", true)->get(), "clients" => Clients::where("IsActive", "=", true)->get()]);
    }
    public function delete($id){
        $orders = OrderDetails::where('IsActive', true)->where('OrderId', $id)->get();
        
        foreach($orders as $order){
            $order->IsActive = false;
            $order->EditDateTime = date("Y-m-d H:i:s");
            $order->save();

            $product = Products::find($order->ProductId);
            $product->Quantity += $order->ProductQuantity;
            $product->EditDateTime = date("Y-m-d H:i:s");
            $product->save();
        }

        $model = Orders::find($id);
        $model->IsActive = false;
        $model->EditDateTime = date("Y-m-d H:i:s");
        $model->save();

        return redirect("/orders");
    }
    public function addToDB(Request $request){
        $products = Products::all();

        $request->validate([
            'selectedProducts.*' => 'required',
            'quantities.*' => [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($products) {
                    $productId = str_replace('quantities.', '', $attribute);
                    $product = $products->find($productId);
                    
                    if ($value > $product->Quantity) {
                        $fail('Przekroczono dostępną ilość dla produktu: ' . $product->Title.'. Maksymalna możliwa ilość to: '.$product->Quantity);
                    }
                },
            ],
        ], [
            'selectedProducts.*.required' => 'Wybór produktu jest wymagany.',
            'quantities.*.required' => 'Ilość produktu jest wymagana.',
            'quantities.*.numeric' => 'Ilość produktu musi być liczbą.',
            'quantities.*.min' => 'Ilość produktu nie może być mniejsza od 0.',
        ]);

        $model = new Orders();

        $model->ClientsId = $request->input("ClientId");
        $model->IsActive = true;
        $model->save();
        
        foreach ($request->input('selectedProducts', []) as $key => $productId) {
            if (isset($request->selectedProducts[$key])) {
                $quantity = $request->input('quantities.' . $productId, 0);
                
                $modelDetails = new OrderDetails();
                $modelDetails->OrderId = $model->Id;
                $modelDetails->ProductId = $productId;
                $modelDetails->ProductQuantity = $quantity;
                $modelDetails->IsActive = true;
                $product = Products::find($productId);
                $product->Quantity = $product->Quantity - $quantity;
                $modelDetails->save();
                $product->save();
            }
        }
        
        return redirect("/orders");
    }
    public function search(Request $request){
        $search = $request->input("search");
        $model = Orders::whereHas('Clients', function ($query) use ($search) { $query->where("Name","LIKE","%{$search}%")->orWhere("Surname","LIKE","%{$search}%");})->orWhere("Id","LIKE","%{$search}%")->where("IsActive",true)->get();
        $models = $model->where("IsActive",true);

        return view("Orders.index",compact("models"));
    }
}
