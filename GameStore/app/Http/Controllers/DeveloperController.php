<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function index(){
        $models = Developer::where("IsActive", "=", true)->get();
        return view("Developer.index", ["models" => $models]);
    }
    public function details($id){
        $model = Developer::find($id);
        return view("Developer.details", ["model" => $model]);
    }
    public function delete_details($id){
        $model = Developer::find($id);
        return view("Developer.delete", ["model" => $model]);
    }
    public function edit($id){
        $model = Developer::find($id);
        return view("Developer.edit",["model" => $model]);
    }
    public function update($id, Request $request){
        $model = Developer::find($id);
        $model->Title = $request->input("title");
        $model->IsActive = $request->input("IsActive") ? true : false;
        $model->EditDateTime = date("Y-m-d H:i:s");

        $model->save();

        return redirect("/developer");
    }
    public function create(){
        $model = new Developer();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d");
        return view("Developer.create", ["model" => $model]);
    }
    public function delete($id){
        $model = Developer::find($id);
        $model->IsActive = false;

        $model->save();

        return redirect("/developer");
    }
    public function addToDB(Request $request){
        $model = new Developer();

        $model->Title = $request->input("Title");
        $model->IsActive = true;

        $model->save();

        return redirect("/developer");
    }
}
