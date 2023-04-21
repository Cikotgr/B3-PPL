@extends('layouts.app')

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('supplier.profile.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="PhotoProfile" class="form-label">Photo Profile

                </label>
                <input type="file" class="form-control" name="PhotoProfile" placeholder="Masukan Photo">
            </div>
            <div class="mb-3">
                <label for="OwnerName" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" id="OwnerName" value="{{ $item->owner_name }}">
            </div>
            <div class="mb-3">
                <label for="OwnerTelephone" class="form-label">No telepon pemilik</label>
                <input type="text" class="form-control" id="OwnerTelephone" value="{{ $item->owner_telephone }}">
            </div>
            <div class="mb-3">
                <label for="BussinesName" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="BussinesName" value="{{ $item->bussines_name }}">
            </div>
            <div class="mb-3">
                <label for="BussinesEmail" class="form-label">email toko</label>
                <input type="email" class="form-control" id="BussinesEmail" value="{{ $item->bussines_email }}">
            </div>
            <div class="mb-3">
                <label for="BussinesTelephone" class="form-label">No telepon toko</label>
                <input type="text" class="form-control" id="BussinesTelephone" value="{{ $item->bussines_telephone }}">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Masukan descripsi toko</label>
                <textarea class="form-control" name="Description" rows="3">{{ $item->description }}</textarea>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary me-3">Simpan</button>
                <a href="{{ route('supplier.profile.index') }}" type="button" class="btn btn-danger">Batal</a>
            </div>

        </form>




    </div>
@endsection
