@extends("main")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Zamówienie - usuń</h1>

<h3 class="text-danger">Czy na pewno chcesz usunąć ten element?</h3>
<div>
    <hr style="border: 1px solid gray" />
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
    <hr style="border: 1px solid gray"/>
        <a href="/orders/delete/{{ $model->Id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a> |
        <a href="{{ url('/orders') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>

</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection