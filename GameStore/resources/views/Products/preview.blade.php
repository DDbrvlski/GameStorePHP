@extends('preview')

@section('content')

@php
        $imageUrl = asset('img/games.jpg');
    @endphp
    <section class="banner" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,39,0.7)),url('{{ $imageUrl }}');box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.5);">
      <h1>Produkty</h1>
    </section>
    <div class="container" style="margin-top: 5rem; margin-bottom:5rem">
    <div class="row">
    @foreach($models as $model)
    <div class="col-sm-12 col-lg-4">
        <div class="card" style="margin-bottom:20px;width: 18rem;box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);">
        <img class="img-fluid" style="height:40vh; object-fit:cover; border-radius:8px 8px 0px 0px;" src="{{ $model->ImageLink }}">
      <div class="card-body">
        <h5 class="card-title">{{ $model->Title }}</h5>
        <p class="card-text">Cena: {{ $model->Price }}zł</p>
        <a href="{{ url()->current() }}/details/{{ $model->Id }}" class="btn btn-primary" style="background: gray; border: 0px;">Szczegóły</a>
      </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>
@endsection