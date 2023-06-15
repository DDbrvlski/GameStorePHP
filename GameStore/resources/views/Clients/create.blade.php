@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Klient - dodaj nowy</h1>

<hr />
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/clients/create/{{ $model->Id }}">
        @csrf
            <div class="form-group">
                <labe class="control-label font-weight-bold">Imie: </label>
                <input name="Name" class="form-control validate"/>
                @error('Name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Nazwisko: </label>
                <input name="Surname" class="form-control"/>
                @error('Surname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Data urodzenia:</label>
                <input name="BirthDateTime" class="form-control validate" type="date">
                @error('BirthDateTime')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-plus-lg"></i></button> |
                <a href="{{ url('/clients') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
        </form>
    </div>
</div>

    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection