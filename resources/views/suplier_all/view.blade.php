@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $supplier_profile->banner) }}" class="card-img-top w-100 h-25" alt="...">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content.
                This content is a little bit longer.</p>
            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
        </div>
    </div>

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
