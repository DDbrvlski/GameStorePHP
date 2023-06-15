<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $models = Products::where("IsActive", "=", true)->get();
        return view("Products.index", ["models" => $models]);
    }
    public function index_preview(){
        $models = Products::where("IsActive", "=", true)->get();
        return view("Products.preview", ["models" => $models]);
    }
    public function details($id){
        $model = Products::find($id);
        return view("Products.details", ["model" => $model]);
    }
    public function details_preview($id){
        $model = Products::find($id);
        return view("Products.preview_details", ["model" => $model]);
    }
    public function delete_details($id){
        $model = Products::find($id);
        return view("Products.delete", ["model" => $model]);
    }
    public function edit($id){
        $model = Products::find($id);
        return view("Products.edit",["model" => $model, "genres" => Genre::where("IsActive", "=", true)->get(), "platforms" => Platform::where("IsActive", "=", true)->get(), "developers" => Developer::where("IsActive", "=", true)->get()]);
    }
    public function update($id, Request $request){
        $request->validate([
            'Title' => 'required|max:40',
            'Description' => 'required|max:100',
            'Quantity' => 'required|numeric|min:0|max:999',
            'Price' => 'required|numeric|min:0|max:999999',
            'Notes' => 'max:150',
            'GenreId' => 'required',
            'PlatformId' => 'required',
            'DeveloperId' => 'required',
        ], [
            'Title.required' => 'Nazwa jest wymagana.',
            'Title.max' => 'Przekroczono maksymalną ilość znaków.',
            'Description.required' => 'Opis jest wymagany.',
            'Description.max' => 'Przekroczono maksymalną ilość znaków.',
            'Quantity.required' => 'Ilość jest wymagana.',
            'Quantity.numeric' => 'Ilość musi być liczbą.',
            'Quantity.min' => 'Ilość nie może być mniejsza niż 0.',
            'Quantity.max' => 'Ilość nie może przekraczać 999.',
            'Price.required' => 'Cena jest wymagana.',
            'Price.numeric' => 'Cena musi być liczbą.',
            'Price.min' => 'Cena nie może być mniejsza niż 0.',
            'Price.max' => 'Cena nie może przekraczać 999999.',
            'Notes.max' => 'Przekroczono maksymalną ilość znaków dla notatek.',
            'GenreId.required' => 'Gatunek jest wymagany.',
            'PlatformId.required' => 'Platforma jest wymagana.',
            'DeveloperId.required' => 'Producent jest wymagany.',
        ]);

        $model = Products::find($id);
        $model->Title = $request->input("Title");
        $model->Description = $request->input("Description");
        $model->ImageLink = $request->input("ImageLink");
        $model->Quantity = $request->input("Quantity");
        $model->Price = $request->input("Price");
        $model->GenreId = $request->input("GenreId");
        $model->PlatformId = $request->input("PlatformId");
        $model->DeveloperId = $request->input("DeveloperId");
        $model->Notes = $request->input("Notes");
        $model->IsActive = $request->input("IsActive") ? true : false;
        $model->EditDateTime = date("Y-m-d H:i:s");

        $model->save();

        return redirect("/products");
    }
    public function create(){
        $model = new Products();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d");
        return view("Products.create", ["model" => $model, "genres" => Genre::all(), "platforms" => Platform::all(), "developers" => Developer::all()]);
    }
    public function delete($id){
        $model = Products::find($id);
        $model->IsActive = false;

        $model->save();

        return redirect("/products");
    }
    public function addToDB(Request $request){
        $request->validate([
            'Title' => 'required|max:40',
            'Description' => 'required|max:100',
            'Quantity' => 'required|numeric|min:0|max:999',
            'Price' => 'required|numeric|min:0|max:999999',
            'Notes' => 'max:150',
            'GenreId' => 'required',
            'PlatformId' => 'required',
            'DeveloperId' => 'required',
        ], [
            'Title.required' => 'Nazwa jest wymagana.',
            'Title.max' => 'Przekroczono maksymalną ilość znaków.',
            'Description.required' => 'Opis jest wymagany.',
            'Description.max' => 'Przekroczono maksymalną ilość znaków.',
            'Quantity.required' => 'Ilość jest wymagana.',
            'Quantity.numeric' => 'Ilość musi być liczbą.',
            'Quantity.min' => 'Ilość nie może być mniejsza niż 0.',
            'Quantity.max' => 'Ilość nie może przekraczać 999.',
            'Price.required' => 'Cena jest wymagana.',
            'Price.numeric' => 'Cena musi być liczbą.',
            'Price.min' => 'Cena nie może być mniejsza niż 0.',
            'Price.max' => 'Cena nie może przekraczać 999999.',
            'Notes.max' => 'Przekroczono maksymalną ilość znaków dla notatek.',
            'GenreId.required' => 'Gatunek jest wymagany.',
            'PlatformId.required' => 'Platforma jest wymagana.',
            'DeveloperId.required' => 'Producent jest wymagany.',
        ]);

        $model = new Products();

        $model->Title = $request->input("Title");
        $model->Description = $request->input("Description");
        $model->ImageLink = $request->input("ImageLink");
        $model->Quantity = $request->input("Quantity");
        $model->Price = $request->input("Price");
        $model->GenreId = $request->input("GenreId");
        $model->PlatformId = $request->input("PlatformId");
        $model->DeveloperId = $request->input("DeveloperId");
        $model->Notes = $request->input("Notes");
        $model->IsActive = true;

        $model->save();

        return redirect("/products");
    }
    public function search(Request $request){
        
        $search = $request->input("search");
        $models = Products::where("Title","LIKE","%{$search}%")->where("IsActive",true)->get();

        return view("Products.index",compact("models"));
    }
}
