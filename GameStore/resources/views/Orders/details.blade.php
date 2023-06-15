@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Zamówienie - szczegóły</h1>

<div>
    <hr style="border: 1px solid gray"/>
    <dl class="row">
        <dt class = "col-sm-2 my-2">
            Dane klienta
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Clients->Name }} {{ $model->Clients->Surname }}
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
        <dt class = "col-sm-2 my-2">
            Produkty w zamówieniu:
        </dt>
        @php
            $calkowitacena = 0;
        @endphp
        @if(blank($orders))
            <dd class = "col-sm-10 my-2">Brak</dd>
        @endif
        @foreach($orders as $item)
            @php
                $cenaprzedmiotow = $item->Products->Price * $item->ProductQuantity;
                $calkowitacena += $cenaprzedmiotow;
            @endphp
            <dd class = "col-sm-10 my-2">
                {{ $item->Products->Title }} <h5 class="d-inline"><span class="badge badge-secondary" >{{ $item->ProductQuantity }}szt</span></h4>
            </dd>
            @unless($loop->last)
            <dt class = "col-sm-2 my-2"> 
            </dt>
            @endunless
        @endforeach
        <dt class = "col-sm-2 my-2">
            Całkowita cena produktów:
        </dt>
        <dd class = "col-sm-10 my-2">
        <h5><span class="badge badge-secondary" >{{ $calkowitacena }}zł</span></h4>
        </dd>
    </dl>
</div>
<hr style="border: 1px solid gray"/>
<div>
    <a href="/orders/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
    <a href="{{ url('/orders') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a> |
    <a href="/orders-preview/details/{{ $model->Id }}" class="btn btn-dark">Strona dla klienta</a>
</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection

