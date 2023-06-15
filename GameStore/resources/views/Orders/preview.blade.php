@extends('preview')

@section('content')
@php
        $imageUrl = asset('img/games.jpg');
    @endphp
    <section class="history-main" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,39,0.7)),url('{{ $imageUrl }}');box-shadow: 0 8px 6px -6px rgba(0, 0, 0, 0.5);">
        <div class="history-box">
            <h2>Historia zamówień</h2>
            <h5>Wybrany klient: {{ $client->Name }} {{ $client->Surname }}</h5>
            <ul>
                <li>
                    <div class="column-cart">
                        <p>Numer zamówienia</p>
                    </div>
                    <div class="column-cart">
                        <p>Ilość produktów</p>
                    </div>
                    <div class="column-cart">
                        <p>Cena</p>
                    </div>
                    <div class="column-cart">
                    </div>
                </li>
                @foreach($models as $model)
                    <li>
                        @php
                            $sumOfPrice = 0.0;
                            $sumOfOrders = 0;
                            $ordersTemp = $orders->where('OrderId', $model->Id);
                        @endphp
                        @foreach($ordersTemp as $order)
                            @php
                                $sumOfOrders += $order->ProductQuantity;
                                $sumOfPrice += $order->ProductQuantity * $order->Products->Price;
                            @endphp
                        @endforeach
                        <div class="column-cart">
                            <p><b>{{ $model->Id }}</b></p>
                        </div>
                        <div class="column-cart">
                            <p><b>{{ $sumOfOrders }}</b></p>
                        </div>
                        <div class="column-cart">
                            <p><b>{{ $sumOfPrice }} zł</b></p>
                        </div>
                        <div class="column-cart">
                            <div class="buttons-list">
                                <a class="cart-links" href="/orders-preview/details/{{$model->Id}}">Szczegóły</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection