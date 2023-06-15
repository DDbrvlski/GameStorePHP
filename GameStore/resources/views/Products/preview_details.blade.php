@extends('preview')

@section('content')
@php
$imageUrl = asset('img/games.jpg');
@endphp
<section class="product-ui" style="background-image: url('{{ $imageUrl }}');">
  <div class="window-product" style="width: 1100px;border-radius:5%">
    <div class="product-row">
      <div style="max-width: 700px; overflow: hidden;">
      <img class="img-fluid mx-auto" src="{{ $model->ImageLink }}" style="max-width: 100%;height: 700px;border-radius:5%">
      </div>
      
      <div class="info-panel">
        <h3>{{ $model->Title }}</h3>
        <p>Cena: {{ $model->Price }} zł</p>
        <p>Opis: {{ $model->Description }}</p>
        <p>Gatunek: {{ $model->Genre->Title }}</p>
        <p>Platroma: {{ $model->Platform->Title }}</p>
        <p>Producent: {{ $model->Developer->Title }}</p>
        <form class="add-form-order">
          <input type="number" name="amount" min="1" max='.$wiersz[3].' value="0" style="width: 60px;">
          <a href="/" class="btn btn-primary" style="background: gray; border: 0px; color:white; width:195px; margin-left:10px;">Dodaj do koszyka</a>
        </form>
        <a href="/products-preview" class="btn btn-primary" style="background: gray; border: 0px; color:white; width:195px; margin-left:15px;">Powrót do menu</a>
      </div>
    </div>
  </div>
</section>
@endsection