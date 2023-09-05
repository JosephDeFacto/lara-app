@if(isset($products))
    @foreach($products->favorites as $product)
        {{ $product->name }}
    @endforeach
@endif
