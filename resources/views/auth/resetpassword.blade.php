@extends('layouts.app') {{-- Ganti dengan layout utama kamu jika berbeda --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Reset Password</h4>
                </div>

                <div class="card-body">

                    {{-- Error Alert --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        {{-- Token dari URL --}}
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus class="form-control">
                        </div>

                        {{-- Password Baru --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" name="password" required class="form-control">
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" required class="form-control">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Reset Password</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
