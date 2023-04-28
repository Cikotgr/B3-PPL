@extends('layouts.app')

@section('content')
    <h2>Profile</h2>
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $supplier_profile->banner) }}" class="" style="object-fit: fill; height:300px "
            alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $supplier_profile->bussines_name }}</h5>
            <p class="card-text">{{ $supplier_profile->description }}</p>
            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
        </div>
    </div>
    <br>
    <h2>Product</h2>
    @if ($supplier_products == null)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Belum ada product</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($supplier_products as $item)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product_name }}</h5>
                            <h6 class="card-title">RP.{{ $item->price }}</h6>
                            <p class="card-text">{{ $item->description }}</p>

                            <a href="{{ route('supplier_all.show.product', $item->id) }}" class="btn btn-primary">Lihat
                                products</a>
                            {{-- <a href="{{ route('supplier.product.edit', $item->id) }}" type="button"
                                class="btn btn-danger">edit</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
