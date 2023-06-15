@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Gatunek - dodaj nowy</h1>

<hr />
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/genre/create/{{ $model->Id }}">
        @csrf
            <div class="form-group">
                <labe class="control-label font-weight-bold">Nazwa: </label>
                <input name="Title" class="form-control"/>
            </div>
            <hr/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-plus-lg"></i></button> |
                <a href="{{ url('/genre') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
        </form>
    </div>
</div>

    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection