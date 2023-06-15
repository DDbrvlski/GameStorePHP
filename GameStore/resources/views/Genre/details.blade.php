@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Gatunek - szczegóły</h1>

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
    <a href="/genre/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
    <a href="{{ url('/genre') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection

