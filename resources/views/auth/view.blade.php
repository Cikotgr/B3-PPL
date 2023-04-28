@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <label for="UserName" class="form-label">Username</label>
            <input type="text" class="form-control" value="{{ $account->name }}" name="UserName">
        </div>
        <div class="mb-3">
            <label for="UserEmail" class="form-label">Username</label>
            <input type="text" class="form-control" value="{{ $account->email }}" name="UserEmail">
        </div>
    </div>
@endsection
