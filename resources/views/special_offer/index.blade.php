@extends('welcome')
@section('content')
    @if(isset($specialOfferProducts))
        {{ $specialOfferProducts }}
    @endif

@endsection
