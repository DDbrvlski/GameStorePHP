@extends('main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Zamówienie - edytuj</h1>
</div>
<hr  style="border: 1px solid gray"/>
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/orders/update/{{ $model->Id }}">
            @csrf
            <div class="form-group">
                <label class="control-label font-weight-bold">Klienci: </label>
                <select class="form-select" name="ClientId">
                    @foreach($clients as $item)
                        <option {{ $item->Id == $model->ClientsId ? "selected" : "" }} value="{{ $item->Id }}">{{$item->Name}} {{$item->Surname}}</option>
                    @endforeach                    
                </select>
            </div>
            <hr class="hrstyle"/>
            <label class="control-label font-weight-bold">Produkty: </label>
            <hr class="hrstyle"/>
            @foreach($products as $product)
                @php
                    $order = collect($orders)->firstWhere('ProductId', $product->Id);
                    $productQuantity = $order ? $order['ProductQuantity'] : 0;
                    $isChecked = $order ? 'checked' : '';
                @endphp
                <div class="form-group d-flex align-items-center">
                <label class="control-label font-weight-bold mr-2" style="width: 150px;">{{ $product->Title }}</label>
                <div class="form-check mr-3" style=" margin-bottom:10px; margin-left:15px;">
                    <input class="form-check-input" {{$isChecked}} name="selectedProducts[]" value="{{ $product->Id }}" type="checkbox" type="checkbox"/>
                </div>
                <label class="control-label font-weight-bold mr-2">Sztuk:</label>
                <input name="quantities[{{ $product->Id }}]" type="number" value="{{ $productQuantity }}" class="form-control" style="max-width: 60px; margin-bottom:10px;"/>
                </div>
                @error('quantities.' . $product->Id)
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <hr class="hrstyle"/>
            @endforeach
            <hr/>
            <div class="form-group">
                <button class="btn btn-dark"><i class="bi bi-save"></i></button> |
                <a href="{{ url('/orders') }}" class="btn btn-dark"><i class="bi bi-arrow-left"></i></a>
            </div>
    
        </form>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

@endsection