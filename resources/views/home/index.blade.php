@extends('layouts.app')

@section('content')
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
