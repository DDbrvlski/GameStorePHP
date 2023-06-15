@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Klient - szczegóły</h1>

<div>
    <hr style="border: 1px solid gray"/>
    <dl class="row">
    <dt class = "col-sm-2 my-2">
            Imie
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Name }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Nazwisko
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Surname }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Data urodzenia
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ date('d-m-Y', strtotime($model->BirthDateTime)) }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Data utworzenia
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->CreationDateTime }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Data edycji
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->EditDateTime }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Czy aktywny
        </dt>
        <dd class = "col-sm-10 my-2">
        {{ $model->IsActive == true ? "Tak" : "Nie" }}
        </dd>
    </dl>
</div>
<hr style="border: 1px solid gray"/>
<div>
    <a href="/clients/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
    <a href="{{ url('/clients') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection

