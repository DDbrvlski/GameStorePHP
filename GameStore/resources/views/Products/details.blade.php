@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Produkt - szczegóły</h1>

<div>
    <hr style="border: 1px solid gray"/>
    <dl class="row">
        <dt class = "col-sm-2 my-2">
            Nazwa
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Title }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Opis
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Description }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Ilość sztuk dostępnych
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Quantity }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Cena
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Price }} zł
        </dd>
        <dt class = "col-sm-2 my-2">
            Gatunek
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Genre->Title }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Platforma
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Platform->Title }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Producent
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Developer->Title }}
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
            Notatki
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Notes }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Czy aktywny
        </dt>
        <dd class = "col-sm-10 my-2">
        {{ $model->IsActive == true ? "Tak" : "Nie" }}
        </dd>
        <dt class = "col-sm-2 my-2">
            Zdjęcie
        </dt>
        <dd class = "col-sm-10 my-2">
            <img src="{{ $model->ImageLink }}" style="max-height: 300px;">
        </dd>
        
    </dl>
</div>
<hr style="border: 1px solid gray"/>
<div>
    <a href="/products/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
    <a href="{{ url('/products') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a> |
    <a href="/products-preview/details/{{ $model->Id }}" class="btn btn-dark">Strona dla klienta</a>
</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection

