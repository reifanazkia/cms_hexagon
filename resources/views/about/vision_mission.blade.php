@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-10">
        @include('about._tabs')

        <h2 class="text-3xl font-bold text-blue-700">Vision & Mission</h2>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <form action="{{ route('vision-mission.update') }}" method="POST" class="space-y-10">
            @csrf

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Vision</label>
                <textarea name="vision" rows="6"
                    class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2">{{ $vision->value ?? '' }}</textarea>
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Mission</label>
                <textarea name="mission" rows="6"
                    class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2">{{ $mission->value ?? '' }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded shadow">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection
