<html>
<head>
    <title>View Cart</title>
</head>
<body>
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
                <a href="{{ route('cart.destroy', ['cartItemId' => $cartItem->id]) }}">Remove</a>
                <img src="{{ asset('storage/images/'.$cartItem->product->image) }}" style="height: 250px;width:250px;">
            @endforeach
            <a href="{{ url('checkout') }}">Proceed to checkout</a>
        </ul>

        <a href="{{ route('cart.clear') }}">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</body>
</html>
