@extends('layouts.app')

@section('content')
    <div class="container text-align-center">
        <img src="{{ asset('storage/' . $product->photo) }}" alt="" class="mw-100">
        <div class="row">
            <div class="col-sm-12">
                <h2>{{ $product->product_name }}</h2>
            </div>
            <div class="col-sm-12">
                <p>Rp.{{ $product->price }}</p>
            </div>
            <div class="col-sm-12">
                <p>tersisa : {{ $product->stock }}</p>
            </div>
            <div class="col-sm-12">
                <p>{{ $product->description }}</p>
            </div>
        </div>


    </div>
@endsection
