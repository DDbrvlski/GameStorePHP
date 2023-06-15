@extends('main')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Produkt - dodaj nowy</h1>

<hr />
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/products/create/{{ $model->Id }}">
        @csrf
            <div class="form-group">
                <label class="control-label font-weight-bold">Nazwa: </label>
                <input name="Title" class="form-control"/>
                @error('Title')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Opis: </label>
                <input name="Description" class="form-control"/>
                @error('Description')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Link do zdjęcia: </label>
                <input name="ImageLink" class="form-control"/>
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Ilość: </label>
                <input name="Quantity" class="form-control"/>
                @error('Quantity')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Cena: </label>
                <input name="Price" class="form-control"/>
                @error('Price')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Notatki: </label>
                <input name="Notes" class="form-control"/>
                @error('Notes')
                    <div class="text-danger font-weight-bold">{{ $message }}</div>
                @enderror
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Gatunki: </label>
                <select class="form-select" name="GenreId">
                    @foreach($genres as $item)
                        <option {{ $item->Id == $model->GenreId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Platformy: </label>
                <select class="form-select" name="PlatformId">
                    @foreach($platforms as $item)
                        <option {{ $item->Id == $model->PlatformId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr/>
            <div class="form-group">
                <label class="control-label font-weight-bold">Producenci: </label>
                <select class="form-select" name="DeveloperId">
                    @foreach($developers as $item)
                        <option {{ $item->Id == $model->DeveloperId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Title}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-plus-lg"></i></button> |
                <a href="{{ url('/products') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
        </form>
    </div>
</div>

    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection