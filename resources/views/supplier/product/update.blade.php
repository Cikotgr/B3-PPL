@extends('supplier.layouts.app')
@section('content')
    <form action="{{ route('supplier.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Photo" class="form-label">Masukan Photo produk

            </label>
            <input type="file" class="form-control" name="Photo" value="{{ $product->pho }}">
        </div>
        <div class="mb-3">
            <label for="ProductName" class="form-label">Nama produk</label>
            <input type="text" class="form-control" name="ProductName" value="{{ $product->product_name }}">
        </div>
        <div class="mb-3">
            <label for="Stock" class="form-label">Stok</label>
            <input type="number" class="form-control" name="Stock" value="{{ $product->stock }}">
        </div>
        <select class="form-select" aria-label="Default select example" name="ProductType">
            <option selected>{{ $product->fkProductType->product_type }}</option>
            @foreach ($type as $type_item)
                <option value="{{ $type_item->id }}">{{ $type_item->product_type }}</option>
            @endforeach

        </select>
        <div class="mb-3">
            <label for="Price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="Price" value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label for="Description" class="form-label">Masukan descripsi</label>
            <textarea class="form-control" name="Description" rows="3">{{ $product->description }}</textarea>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('supplier.product.index') }}" type="button" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
