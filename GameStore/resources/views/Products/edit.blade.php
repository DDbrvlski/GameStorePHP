@extends('main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Produkt - edytuj</h1>
</div>
<hr  style="border: 1px solid gray"/>
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/products/update/{{ $model->Id }}">
            @csrf
            <div class="form-group">
                <labe class="control-label font-weight-bold">Nazwa: </label>
                <input name="Title" class="form-control" value="{{ $model->Title }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Opis: </label>
                <input name="Description" class="form-control" value="{{ $model->Description }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Ilość sztuk dostępnych: </label>
                <input name="Quantity" class="form-control" value="{{ $model->Quantity }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Cena: </label>
                <input name="Price" class="form-control" value="{{ $model->Price }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Notatki: </label>
                <input name="Notes" class="form-control" value="{{ $model->Notes }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Gatunki: </label>
                <select class="form-select" name="GenreId">
                    @foreach($genres as $item)
                        <option {{ $item->Id == $model->GenreId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Platformy: </label>
                <select class="form-select" name="PlatformId">
                    @foreach($platforms as $item)
                        <option {{ $item->Id == $model->PlatformId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Producenci: </label>
                <select class="form-select" name="DeveloperId">
                    @foreach($developers as $item)
                        <option {{ $item->Id == $model->DeveloperId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group form-check" style="padding-left: 0px;">
                <label class="form-check-label font-weight-bold" style="margin-right:35px;">
                    Czy aktywny</label>
                <input name="IsActive" class="form-check-input" type="checkbox" {{ $model->IsActive == true ? "checked" : "" }}/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <labe class="control-label font-weight-bold">Link do zdjęcia: </label>
                <input name="ImageLink" class="form-control" value="{{ $model->ImageLink }}"/>
            </div>
            <hr class="hrstyle"/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-save"></i></button> |
                <a href="{{ url('/products') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
    
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection