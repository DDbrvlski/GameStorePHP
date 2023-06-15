@extends('main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Klient - edytuj</h1>
</div>
<hr  style="border: 1px solid gray"/>
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/clients/update/{{ $model->Id }}">
            @csrf
            <div class="form-group">
                <labe class="control-label font-weight-bold">Imie: </label>
                <input name="Name" class="form-control" value="{{ $model->Name }}"/>
            </div>
            <hr style="border: 1px solid gray"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Nazwisko: </label>
                <input name="Surname" class="form-control" value="{{ $model->Surname }}"/>
            </div>
            <hr style="border: 1px solid gray"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Data urodzenia: </label>
                <input name="BirthDateTime" class="form-control validate" type="date" value="{{ date('Y-m-d', strtotime($model->BirthDateTime)) }}">
            </div>
            <hr style="border: 1px solid gray"/>
            <div class="form-group form-check" style="padding-left: 0px;">
                <label class="form-check-label font-weight-bold" style="margin-right:35px;">
                    Czy aktywny</label>
                    <input name="IsActive" class="form-check-input" type="checkbox" {{ $model->IsActive == true ? "checked" : "" }}/>
                
            </div>
            <hr style="border: 1px solid gray"/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-save"></i></button> |
                <a href="{{ url('/clients') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
    
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection