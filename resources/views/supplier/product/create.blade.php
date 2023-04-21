@extends('supplier.layouts.app')

@section('content')
    <form action="{{ route('supplier.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Photo" class="form-label">Masukan Photo produk

            </label>
            <input type="file" class="form-control" name="Photo" placeholder="Masukan Photo">
        </div>
        <div class="mb-3">
            <label for="ProductName" class="form-label">Nama produk</label>
            <input type="text" class="form-control" name="ProductName" placeholder="Masukan nama">
        </div>
        <div class="mb-3">
            <label for="Stock" class="form-label">Stok</label>
            <input type="number" class="form-control" name="Stock" placeholder="Masukan stock">
        </div>
        <div class="mb-3">
            <label for="ProductType" class="form-label">Product type</label>
            <input type="number" class="form-control" name="ProductType" placeholder="Masukan stock">
        </div>
        <div class="mb-3">
            <label for="Price" class="form-label">Harga</label>
            <input type="number" class="form-control" name="Price" placeholder="Masukan stock">
        </div>

        <div class="mb-3">
            <label for="Description" class="form-label">Masukan descripsi</label>
            <textarea class="form-control" name="Description" rows="3"></textarea>
        </div>

        <div class="d-flex">
            <button type="submit" class="btn btn-primary me-3">Simpan</button>
            <a href="{{ route('supplier.product.index') }}" type="button" class="btn btn-danger">Batal</a>
        </div>
    </form>
@endsection
