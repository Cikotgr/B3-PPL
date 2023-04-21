<form action="{{ route('supplier.profile.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="PhotoProduct" class="form-label">Photo Profile

        </label>
        <input type="file" class="form-control" name="PhotoProduct" placeholder="Masukan Photo baru">
    </div>
    <div class="mb-3">
        <label for="OwnerName" class="form-label">Nama Pemilik</label>
        <input type="text" class="form-control" name="OwnerName" placeholder="Masukan nama">
    </div>
    <div class="mb-3">
        <label for="OwnerTelephone" class="form-label">No telepon pemilik</label>
        <input type="text" class="form-control" name="OwnerTelephone" placeholder="Isikan No telepon pemilik">
    </div>
    <div class="mb-3">
        <label for="BussinesName" class="form-label">Nama Toko</label>
        <input type="text" class="form-control" name="BussinesName" placeholder="Isikan Nama toko">
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
