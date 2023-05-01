@extends('layouts.app')

@section('scripts')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" /> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}
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
        @if ($homeindustriprofiles != null)
            @foreach ($homeindustriprofiles as $item)
                @if ($item->photo_profile != null)
                    <div style="width:150px">
                        <img src="{{ asset('storage/' . $item->photo_profile) }}" class="img-fluid" alt="...">
                    </div>
                @else
                    <p class="text-info">tidak ada foto</p>
                @endif
                @if ($item->banner != null)
                    <div style="width:150px">
                        <img src="{{ asset('storage/' . $item->banner) }}" class="img-fluid" alt="...">
                    </div>
                @else
                    <p class="text-info">tidak ada foto</p>
                @endif
                <div class="mb-3">
                    <label for="OwnerName" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" id="OwnerName" value="{{ $item->owner_name }}" disabled
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="OwnerTelephone" class="form-label">No telepon pemilik</label>
                    <input type="text" class="form-control" id="OwnerTelephone"
                        value="{{ $item->owner_telephone }}"disabled readonly>
                </div>
                <div class="mb-3">
                    <label for="BussinesName" class="form-label">Email pemilik</label></label>
                    <input type="text" class="form-control" id="BussinesName" value="{{ $item->owner_email }}"disabled
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="BussinesName" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" id="BussinesName" value="{{ $item->bussines_name }}"disabled
                        readonly>
                </div>
                <div class="mb-3">
                    <label for="BussinesEmail" class="form-label">email toko</label>
                    <input type="email" class="form-control" id="BussinesEmail"
                        value="{{ $item->bussines_email }}"disabled readonly>
                </div>
                <div class="mb-3">
                    <label for="BussinesTelephone" class="form-label">No telepon toko</label>
                    <input type="email" class="form-control" id="BussinesTelephone"
                        value="{{ $item->bussines_telephone }}"disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="regency" class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" id="regency" value="{{ $item->fkRegency->name }}"disabled
                        readonly>
                </div>

                <div class="mb-3">
                    <label for="BussinesType" class="form-label">Type bisnis</label>
                    <input type="text" class="form-control" id="BussinesType"
                        value="{{ $item->fkBussinesType->bussines_type }}"disabled readonly>
                </div>

                <div class="mb-3">
                    <label for="BussinesTelephone" class="form-label">Deskripsi</label>
                    <div class="card">
                        <p>
                            {{ $item->description }}
                        </p>
                    </div>
                </div>

                <div class="d-flex">
                    {{-- <button type="submit" class="btn btn-primary me-3">Simpan</button> --}}
                    <a href="{{ route('homeindustri.profile.edit', $item->id) }}" type="button"
                        class="btn btn-danger">Edit</a>
                </div>
            @endforeach
        @else
            <form action="{{ route('homeindustri.profile.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="PhotoProfile" class="form-label">Photo Profile
                    </label>
                    <input type="file" class="form-control" name="PhotoProfile" placeholder="Masukan Photo">
                </div>
                <div class="mb-3">
                    <label for="Banner" class="form-label">Banner
                    </label>
                    <input type="file" class="form-control" name="Banner" placeholder="Masukan Banner">
                </div>
                <div class="mb-3">
                    <label for="OwnerName" class="form-label">Nama Pemilik</label>
                    <input type="text" class="form-control" name="OwnerName" placeholder="Masukan nama">
                </div>
                <div class="mb-3">
                    <label for="OwnerTelephone" class="form-label">No telepon pemilik</label>
                    <input type="text" class="form-control" name="OwnerTelephone"
                        placeholder="Isikan No telepon pemilik">
                </div>
                <div class="mb-3">
                    <label for="OwnerEmail" class="form-label">Masukan emaill pemilik</label>
                    <input type="email" class="form-control" name="OwnerEmail" placeholder="Isikan Email Pemilik">
                </div>
                <div class="mb-3">
                    <label for="BussinesName" class="form-label">Nama Toko</label>
                    <input type="text" class="form-control" name="BussinesName" placeholder="Isikan Nama toko">
                </div>
                <div class="mb-3">
                    <label for="BussinesEmail" class="form-label">email toko</label>
                    <input type="email" class="form-control" name="BussinesEmail" placeholder="Isikan email toko">
                </div>
                <div class="mb-3">
                    <label for="BussinesTelephone" class="form-label">No telepon toko</label>
                    <input type="text" class="form-control" name="BussinesTelephone"
                        placeholder="Isikan No telepon pemilik">
                </div>
                <div class="mb-3">
                    <label for="BussinesType" class="form-label">Type bisnis</label>
                    <select name="BussinesType" id="BussinesType" class="form-select"
                        aria-label="Default select example">
                        <option value="">Pilih Salah satu bisnis</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->bussines_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="Provincy" class="form-label">Provinsi</label>
                    <select name="Provincy" id="provincy" class="form-select" aria-label="Default select example">
                        <option value="">Pilih salah satu provinsi...</option>
                        @foreach ($provinces as $provincy)
                            <option value="{{ $provincy->id }}">{{ $provincy->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="regency" class="form-label">Kabupaten</label>
                    <select name="regency" id="regency" class="form-select" aria-label="Default select example">
                        <option value="">Pilih salah satu Kabupaten...</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Address" class="form-label">Masukan Alamat</label>
                    <textarea class="form-control" name="Address" rows="2"></textarea>
                </div>

                <div class="mb-3">
                    <label for="Description" class="form-label">Masukan descripsi toko</label>
                    <textarea class="form-control" name="Description" rows="3"></textarea>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-3">Simpan</button>
                    {{-- <a href="{{ route('supplier_profile.index') }}" type="button" class="btn btn-danger">Batal</a> --}}
                </div>
            </form>
        @endif

    </div>


@endsection

@section('js')
@endsection
