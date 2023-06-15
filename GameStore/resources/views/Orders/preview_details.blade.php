@extends('preview')

@section('content')
@php
$imageUrl = asset('img/games.jpg');
@endphp
<section class="history-main" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,39,0.7)),url('{{ $imageUrl }}');box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.5);">
    <div class="history-box">
        <h2>Zamówienie nr: {{ $order }}</h2>
        <ul>
            <li>
                <div class="column-cart">
                    <p>Zdjęcie</p>
                </div>
                <div class="column-cart">
                    <p>Nazwa</p>
                </div>
                <div class="column-cart">
                    <p>Cena całkowita</p>
                </div>
                <div class="column-cart">
                    <p>Ilość w zamówieniu</p>
                </div>
            </li>
            @foreach($models as $model)
            <li>
                @php
                    $sumOfPrice = $model->ProductQuantity * $model->Products->Price;
                @endphp
                <div class="column-cart">
                    <img src="{{ $model->Products->ImageLink }}">
                </div>
                <div class="column-cart">
                    <p><b>{{ $model->Products->Title }}</b></p>
                </div>
                <div class="column-cart">
                    <p><b>{{ $sumOfPrice }} zł</b></p>
                </div>
                <div class="column-cart">
                    <p><b>{{ $model->ProductQuantity }}</b></p>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection