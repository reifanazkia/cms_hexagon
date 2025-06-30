@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-4">Edit Alamat</h4>

    <form action="{{ route('profile-setting', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Nama Tempat</label>
            <input type="text" name="company_name" class="form-control" value="{{ $profile->company_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Lokasi</label>
            <textarea name="address" class="form-control" rows="3" required>{{ $profile->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('profile-setting') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
