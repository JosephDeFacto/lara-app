@extends('welcome')
@section('content')

    @php
        $totalPrice = 0;
    @endphp

    @foreach($orders as $order)
        @foreach($order->orderItems as $orderItem)

            {{ $orderItem->product->name }}
            {{ $orderItem->product->description }}
            {{ $orderItem->quantity }}
            Subtotal: {{ $subtotal = $orderItem->product->price * $orderItem->quantity }}<br>
            <img src="{{ asset('storage/images/'.$orderItem->product->image) }}" style="height: 250px; width: 250px;">

            @php
                $totalPrice += $subtotal;
            @endphp
        @endforeach
    @endforeach

    @if($totalPrice > 0)
        Total Price: {{ $totalPrice }}
    @else
        {{ "There is no orders, yet" }}
    @endif

@endsection
