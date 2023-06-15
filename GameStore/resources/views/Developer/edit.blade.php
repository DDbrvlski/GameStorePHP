@extends('main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Producent - edytuj</h1>
</div>
<hr  style="border: 1px solid gray"/>
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/developer/update/{{ $model->Id }}">
            @csrf
            <div class="form-group">
                <labe class="control-label font-weight-bold">Nazwa: </label>
                <input name="title" class="form-control" value="{{ $model->Title }}"/>
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
                <a href="{{ url('/developer') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
    
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection