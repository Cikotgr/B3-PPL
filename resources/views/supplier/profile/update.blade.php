@extends('layouts.app')

@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#provincy').on('change', function() {
                let id_provinces = $('#provincy').val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('getregency') }}",
                    data: {
                        id_provinces: id_provinces
                    },
                    cache: false,

                    success: function(msg) {
                        $('#regency').html(msg);
                    },

                    error: function(data) {
                        console.log('error:', data);
                    },
                })
            })

        });
        // $('#provincy').change(function() {
        //     let id_provinces = $('#provincy').val();

        //     console.log(id_provinces);
        // });
    </script>
@endsection


@section('content')
    <div class="container">
        <form action="{{ route('supplier.profile.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="PhotoProfile" class="form-label">Photo Profile</label>
                <input type="file" class="form-control" name="PhotoProfile" placeholder="Masukan Photo">
            </div>
            <div class="mb-3">
                <label for="Banner" class="form-label">Banner
                </label>
                <input type="file" class="form-control" name="Banner" placeholder="Masukan Banner">
            </div>
            <div class="mb-3">
                <label for="OwnerName" class="form-label">Nama Pemilik</label>
                <input type="text" class="form-control" name="OwnerName" value="{{ $item->owner_name }}">
            </div>
            <div class="mb-3">
                <label for="OwnerTelephone" class="form-label">No telepon pemilik</label>
                <input type="text" class="form-control" name="OwnerTelephone" value="{{ $item->owner_telephone }}">
            </div>
            <div class="mb-3">
                <label for="OwnerEmail" class="form-label">Masukan emaill pemilik</label>
                <input type="email" class="form-control" name="OwnerEmail" placeholder="{{ $item->owner_email }}">
            </div>
            <div class="mb-3">
                <label for="BussinesName" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" name="BussinesName" value="{{ $item->bussines_name }}">
            </div>
            <div class="mb-3">
                <label for="BussinesEmail" class="form-label">email toko</label>
                <input type="email" class="form-control" name="BussinesEmail" value="{{ $item->bussines_email }}">
            </div>
            <div class="mb-3">
                <label for="BussinesTelephone" class="form-label">No telepon toko</label>
                <input type="text" class="form-control" name="BussinesTelephone" value="{{ $item->bussines_telephone }}">
            </div>
            <div class="mb-3">
                <label for="BussinesType" class="form-label">Type bisnis</label>
                <select name="BussinesType" id="BussinesType" class="form-select" aria-label="Default select example">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->bussines_type }}</option>
                    @endforeach

                </select>

                <div class="mb-3">
                    <label for="Provincy" class="form-label">Provinsi</label>
                    <select name="Provincy" id="provincy" class="form-select" aria-label="Default select example">
                        <option value="">{{ $item->fkRegency->province->name }}</option>
                        @foreach ($provinces as $provincy)
                            <option value="{{ $provincy->id }}">{{ $provincy->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="regency" class="form-label">Kabupaten</label>
                    <select name="regency" id="regency" class="form-select" aria-label="Default select example">
                        <option value="">{{ $item->fkRegency->name }}</option>
                    </select>
                </div>

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
