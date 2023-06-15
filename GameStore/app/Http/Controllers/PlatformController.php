<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index(){
        $models = Platform::where("IsActive", "=", true)->get();
        return view("Platform.index", ["models" => $models]);
    }
    public function details($id){
        $model = Platform::find($id);
        return view("Platform.details", ["model" => $model]);
    }
    public function delete_details($id){
        $model = Platform::find($id);
        return view("Platform.delete", ["model" => $model]);
    }
    public function edit($id){
        $model = Platform::find($id);
        return view("Platform.edit",["model" => $model]);
    }
    public function update($id, Request $request){
        $model = Platform::find($id);
        $model->Title = $request->input("title");
        $model->IsActive = $request->input("IsActive") ? true : false;
        $model->EditDateTime = date("Y-m-d H:i:s");

        $model->save();

        return redirect("/platform");
    }
    public function create(){
        $model = new Platform();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d");
        return view("Platform.create", ["model" => $model]);
    }
    public function delete($id){
        $model = Platform::find($id);
        $model->IsActive = false;

        $model->save();

        return redirect("/platform");
    }
    public function addToDB(Request $request){
        $model = new Platform();

        $model->Title = $request->input("Title");
        $model->IsActive = true;

        $model->save();

        return redirect("/platform");
    }
}
