@extends('supplier.layouts.app')

@section('content')
    <div class="container-fluid text-center">

        <div class="image">
            <img src="{{ asset('storage/' . $products->photo) }}" class="card-img-top" style="max-width: 200px" alt="...">
        </div>
    </div>
    <div class="body1">
        <h5 class="produkName">{{ $products->product_name }}</h5>
    </div>
    <div class="row gx-4">
        <div class="col">
            <p>{{ $products->price }}</p>
        </div>
        <div class="col">
            <p>{{ $products->stock }}</p>
        </div>
    </div>
    <div class="body2">
        <p>{{ $products->description }}</p>
    </div>
@endsection
