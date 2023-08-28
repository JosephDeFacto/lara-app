@extends('welcome')
@section('content')

    <h1>Cart Items</h1>
    @php
         $currency = '$';
    @endphp
    @if ($cart)
        <ul>
            @foreach ($cart->cartItems as $cartItem)
                {{ $cartItem->product->name }}<br>
                {{ $cartItem->product->description }}<br>
                {{ $cartItem->product->price }}{{ $currency }}<br>
                 Quantity: {{ $cartItem->quantity }}<br>
                <form class="change-quantity-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $cartItem->product->id }}">
                    <button type="button" class="change-quantity-btn" data-action="decrement">-</button>
                    <span class="quantity">{{ $cartItem->quantity }}</span>
                    <button type="button" class="change-quantity-btn" data-action="increment">+</button>

                    {{--<input type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" max="10">--}}
                    {{--<input type="submit" value="submit">--}}
                </form>
                <a href="{{ route('cart.destroy', ['cartItemId' => $cartItem->id]) }}">Remove</a>
                <img src="{{ asset('storage/images/'.$cartItem->product->image) }}" style="height: 250px;width:250px;">
            @endforeach
            <a href="{{ url('checkout') }}">Proceed to checkout</a>
        </ul>

        <a href="{{ route('cart.clear') }}">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.change-quantity-btn').on('click', function() {
                var form = $(this).closest('.change-quantity-form');
                var product_id = form.find('input[name="product_id"]').val();
                var action = $(this).data('action');
                var cartCount = $('.cart-count');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.changeQuantity') }}',
                    data: {
                        _token: '{{csrf_token()}}',
                        product_id: product_id,
                        action: action
                    },
                    success: function (response) {
                        console.log(response.cartCount.quantity);
                        console.log(response.quantity);
                        let quantityElement = form.find('.quantity');
                        quantityElement.text(response.quantity);
                        cartCount.text(response.quantity);
                    },
                    error: function () {
                        alert('error occurred');
                    }
                })
            });
        });

    </script>
@endsection
