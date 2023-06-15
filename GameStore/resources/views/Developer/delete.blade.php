@extends("main")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Producent - usuń</h1>

<h3 class="text-danger">Czy na pewno chcesz usunąć ten element?</h3>
<div>
    <hr style="border: 1px solid gray" />
    <dl class="row">
        <dt class = "col-sm-2 my-2">
            Nazwa
        </dt>
        <dd class = "col-sm-10 my-2">
            {{ $model->Title }}
        </dd>
    </dl>
    <hr style="border: 1px solid gray"/>
        <a href="/developer/delete/{{ $model->Id }}" class="btn btn-danger"><i class="bi bi-trash"></i></a> |
        <a href="{{ url('/developer') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>

</div>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection