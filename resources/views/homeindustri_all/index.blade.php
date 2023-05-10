@extends('layouts.app')

@section('content')
    @if ($homeindustri_profiles == null)
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Belum ada suplier</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    @else
        <div class="row">
            @foreach ($homeindustri_profiles as $homeindustri_profile)
                <div class="col-sm-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $homeindustri_profile->photo_profile) }}"
                            class="card-img-top mh-10
                        " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $homeindustri_profile->bussines_name }}</h5>
                            <p class="card-text">{{ $homeindustri_profile->description }}</p>
                            <a href="{{ route('supplier_all.show', $homeindustri_profile->id) }}"
                                class="btn btn-primary">Lihat
                                products</a>
                            {{-- <a href="{{ route('supplier.product.edit', $supplier_profile->id) }}" type="button"
                            class="btn btn-danger">edit</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    {{-- <div></div> --}}

@endsection
