@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-[80vh] bg-[#f9f9f9]">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900">
                Selamat Datang di <span class="text-[#0057ff]">Hexagon</span>
            </h1>
            <p class="text-gray-600 text-base md:text-lg mt-4">
                Temukan pengalaman luar biasa dalam satu dashboard.
            </p>
            <a href="{{ route('profile-setting') }}"
                class="mt-6 inline-block bg-[#0057ff] text-white text-sm font-semibold py-3 px-6 rounded-full shadow">
                Mulai Eksplorasi
            </a>
        </div>
    </div>

    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('status') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
