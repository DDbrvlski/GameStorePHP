<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $models = Genre::where("IsActive", "=", true)->get();
        return view("Genre.index", ["models" => $models]);
    }
    public function details($id){
        $model = Genre::find($id);
        return view("Genre.details", ["model" => $model]);
    }
    public function delete_details($id){
        $model = Genre::find($id);
        return view("Genre.delete", ["model" => $model]);
    }
    public function edit($id){
        $model = Genre::find($id);
        return view("genre.edit",["model" => $model]);
    }
    public function update($id, Request $request){
        $model = Genre::find($id);
        $model->Title = $request->input("title");
        $model->IsActive = $request->input("IsActive") ? true : false;
        $model->EditDateTime = date("Y-m-d H:i:s");

        $model->save();

        return redirect("/genre");
    }
    public function create(){
        $model = new Genre();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d");
        return view("Genre.create", ["model" => $model]);
    }
    public function delete($id){
        $model = Genre::find($id);
        $model->IsActive = false;

        $model->save();

        return redirect("/genre");
    }
    public function addToDB(Request $request){
        $model = new Genre();

        $model->Title = $request->input("Title");
        $model->IsActive = true;

        $model->save();

        return redirect("/genre");
    }
}
