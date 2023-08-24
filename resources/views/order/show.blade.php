@extends('welcome')
@section('content')
    @if ($orders)
    @foreach ($orders->orderItems as $orderItem)
        {{ $orderItem->product->name }}<br>
        {{ $orderItem->product->description }}<br>
        {{ $orderItem->product->image }}<br>
        {{ $orderItem->quantity }}
    @endforeach
    @endif

@endsection
