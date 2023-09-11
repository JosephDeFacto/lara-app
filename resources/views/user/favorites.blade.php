@extends('welcome')
@section('content')
@foreach($favoriteProducts as $favorites)
    {{ $favorites->products->name }}
    {{ $favorites->products->description }}
@endforeach
@endsection
