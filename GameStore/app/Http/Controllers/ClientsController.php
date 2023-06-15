<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        $models = Clients::where("IsActive", "=", true)->get();
        return view("Clients.index", ["models" => $models]);
    }
    public function details($id){
        $model = Clients::find($id);
        return view("Clients.details", ["model" => $model]);
    }
    public function delete_details($id){
        $model = Clients::find($id);
        return view("Clients.delete", ["model" => $model]);
    }
    public function edit($id){
        $model = Clients::find($id);
        return view("Clients.edit",["model" => $model]);
    }
    public function update($id, Request $request){
        $request->validate([
            'Name' => 'required|max:40|regex:/^[A-Za-z][^\d]*$/',
            'Surname' => 'required|max:40|regex:/^[A-Za-z][^\d]*$/',
            'BirthDateTime' => 'required|date|after:1900-01-01',
        ],
        [
            'Name.required' => 'Imię jest wymagane.',
            'Name.max' => 'Przekroczono maksymalną ilość znaków.',
            'Name.regex' => 'Imię nie może zawierać cyfr.',
            'Surname.required' => 'Nazwisko jest wymagane.',
            'Surname.max' => 'Przekroczono maksymalną ilość znaków.',
            'Surname.regex' => 'Nazwisko nie może zawierać cyfr.',
            'BirthDateTime.required' => 'Data urodzenia jest wymagana.',
            'BirthDateTime.date' => 'Niepoprawny format daty.',
            'BirthDateTime.after' => 'Rok musi być większy niż 1900.',
        ]);
        $model = Clients::find($id);
        $model->Name = $request->input("Name");
        $model->Surname = $request->input("Surname");
        $model->BirthDateTime = $request->input("BirthDateTime");
        $model->IsActive = $request->input("IsActive") ? true : false;
        $model->EditDateTime = date("Y-m-d H:i:s");

        $model->save();

        return redirect("/clients");
    }
    public function create(){
        $model = new Clients();
        $model->CreationDateTime = date("Y-m-d");
        $model->EditDateTime = date("Y-m-d H:i:s");
        return view("Clients.create", ["model" => $model]);
    }
    public function delete($id){
        $model = Clients::find($id);
        $model->IsActive = false;

        $model->save();

        return redirect("/clients");
    }
    public function addToDB(Request $request){

        $request->validate([
            'Name' => 'required|max:40|regex:/^[A-Za-z][^\d]*$/',
            'Surname' => 'required|max:40|regex:/^[A-Za-z][^\d]*$/',
            'BirthDateTime' => 'required|date|after:1900-01-01',
        ],
        [
            'Name.required' => 'Imię jest wymagane.',
            'Name.max' => 'Przekroczono maksymalną ilość znaków.',
            'Name.regex' => 'Imię nie może zawierać cyfr.',
            'Surname.required' => 'Nazwisko jest wymagane.',
            'Surname.max' => 'Przekroczono maksymalną ilość znaków.',
            'Surname.regex' => 'Nazwisko nie może zawierać cyfr.',
            'BirthDateTime.required' => 'Data urodzenia jest wymagana.',
            'BirthDateTime.date' => 'Niepoprawny format daty.',
            'BirthDateTime.after' => 'Rok musi być większy niż 1900.',
        ]);
        $model = new Clients();

        $model->Name = $request->input("Name");
        $model->Surname = $request->input("Surname");
        $model->BirthDateTime = $request->input("BirthDateTime");
        $model->IsActive = true;

        $model->save();

        return redirect("/clients");
    }
}
