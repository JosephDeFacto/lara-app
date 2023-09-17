@extends('welcome')
@section('content')
    @if (count($favorites ?? []) > 0)
        @foreach($favoriteProducts as $favorites)
        {{ $favorites->products->name }}
        {{ $favorites->products->description }}

        <a href="{{ route('remove' , ['id' => $favorites->id ]) }}">Remove from wishlist</a>
        @endforeach
    @else
        {{ 'You have no items in wishlist' }}
    @endif
@endsection
