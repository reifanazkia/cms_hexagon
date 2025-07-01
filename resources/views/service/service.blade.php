@extends('layouts.app')

@section('content')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Script trigger alert jika session tersedia --}}
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    <div class="px-6 py-8">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow p-6">

            <!-- Tabs -->
            <div class="mb-6">
                <div class="flex border-b border-gray-200">
                    <button class="text-blue-600 px-4 py-2 border-b-2 border-blue-600 font-semibold">Benefits</button>
                </div>
            </div>

            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-blue-600">Benefits Management</h1>
                <button onclick="addBenefitInput()" type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-6">
                    + Add New Benefit
                </button>
            </div>


            @foreach ($benefits as $index => $benefit)
                <div
                    class="group relative mb-6 border border-blue-400 rounded-xl px-6 py-4 shadow hover:shadow-md transition">

                    <!-- Tombol Delete (ikon trash, muncul saat hover) -->
                    <form action="{{ route('services.destroy', $benefit->id) }}" method="POST"
                        class="absolute top-3 right-3 hidden group-hover:block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                            <!-- SVG Trash Icon -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22m-5 0V5a2 2 0 00-2-2H9a2 2 0 00-2 2v2h10z" />
                            </svg>
                        </button>
                    </form>


                    <!-- Konten Benefit -->
                    <div class="flex items-start gap-4">
                        <div
                            class="bg-blue-100 text-blue-600 font-bold w-10 h-10 flex items-center justify-center rounded-full">
                            #{{ $index + 1 }}
                        </div>
                        <div class="flex-1">
                            <div class="text-lg font-semibold text-gray-800">{{ $benefit->title }}</div>
                            <div class="text-sm text-gray-600 mt-1">{{ $benefit->subtitle }}</div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form action="{{ route('services.store') }}" method="POST">
                @csrf

                <div id="benefits-wrapper" class="space-y-4">
                    {{-- Kolom input akan muncul di sini --}}
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>
    </div>
@endsection


<script>
    function addBenefitInput() {
        const wrapper = document.getElementById('benefits-wrapper');

        // Hitung jumlah form input yang sudah ditampilkan
        const existingForms = wrapper.querySelectorAll('.benefit-input');
        const newIndex = {{ count($benefits) }} + existingForms.length + 1;

        const div = document.createElement('div');
        div.classList.add('p-4', 'border', 'rounded', 'bg-white', 'shadow', 'benefit-input');
        div.innerHTML = `
            <div class="flex items-start gap-4 relative">
                <div class="bg-blue-100 text-blue-800 font-bold w-8 h-8 flex items-center justify-center rounded-full">
                    #${newIndex}
                </div>
                <div class="flex-1">
                    <input type="text" name="benefits[${newIndex}][title]" placeholder="Benefit Title"
                        class="w-full border border-gray-300 px-3 py-2 rounded mb-2" required>

                    <textarea name="benefits[${newIndex}][subtitle]" placeholder="Benefit Description"
                        class="w-full border border-gray-300 px-3 py-2 rounded" required></textarea>
                </div>
                <button type="button" onclick="removeBenefit(this)" 
                    class="absolute top-0 right-0 text-red-600 hover:text-red-800 text-lg font-bold">
                    ×
                </button>
            </div>
        `;
        wrapper.appendChild(div);
    }

    function removeBenefit(btn) {
        btn.closest('.benefit-input').remove();
    }
</script>
