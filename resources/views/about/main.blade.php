@extends('layouts.app')

@section('content')
    <div class="p-6 space-y-10">
        @include('about._tabs')

        <h2 class="text-3xl font-bold text-blue-700">Main</h2>

        {{-- SweetAlert --}}
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

        <form action="{{ route('main.update') }}" method="POST" class="space-y-10">
            @csrf

            {{-- YouTube --}}
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-700 border-b pb-2">YouTube Preview</h3>
                <div class="aspect-w-16 aspect-h-9">
                    <iframe src="{{ $main->youtube_url }}" class="w-full h-96 rounded" frameborder="0" allowfullscreen></iframe>
                </div>
                <input type="text" name="youtube_url" placeholder="https://youtube.com/embed/..."
                    class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2"
                    value="{{ $main->youtube_url }}">
            </div>

            {{-- Our Journey --}}
            <div class="space-y-6">
                <h3 class="text-xl text-gray-700 border-b pb-2">Our Journey</h3>

                <div>
                    <label class="block font-medium text-gray-600 mb-1">Journey Title</label>
                    <input type="text" name="journey_title"
                        class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2"
                        value="{{ $main->journey_title }}">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium text-gray-600 mb-1">Journey Text 1</label>
                        <textarea name="journey_text_1" rows="6"
                            class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2">{{ $main->journey_text_1 }}</textarea>
                    </div>
                    <div>
                        <label class="block font-medium text-gray-600 mb-1">Journey Text 2</label>
                        <textarea name="journey_text_2" rows="6"
                            class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2">{{ $main->journey_text_2 }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Our Philosophy --}}
            <div class="space-y-4">
                <h3 class="text-xl  ext-gray-700 border-b pb-2">Our Philosophy</h3>
                <textarea name="philosophy" rows="6"
                    class="w-full border text-gray-400 border-gray-300 rounded px-4 py-2">{{ $main->philosophy }}</textarea>
            </div>

            {{-- Submit Button --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded shadow">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

