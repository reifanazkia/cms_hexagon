@extends('layouts.auth')

@section('content')
    <h4 class="mb-3">Forget Password</h4>

    {{-- Pesan sukses --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Pesan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-3">
            <label for="email">Email Address</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary w-100">Send Password Link Reset</button>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">Back To Login</a>
    </div>
@endsection
