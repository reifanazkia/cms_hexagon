{{-- resources/views/about/value.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="p-6 space-y-12">
    @include('about._tabs')

    {{-- Info bar --}}
    <div class="flex items-center gap-2 text-blue-600">
        <i class="fas fa-info-circle"></i>
        <span>Gunakan tanda <strong>|</strong> sebagai pemisah title dan text</span>
    </div>

    <form method="POST" action="{{ route('about.values.updateMultiple') }}">
        @csrf

        {{-- ============ OUR VALUE ============ --}}
        <div class="flex justify-between items-center mt-6">
            <h2 class="text-3xl font-bold text-blue-700">Our Value</h2>
            <button type="button" onclick="addInput('ourValuesContainer', 1)"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-plus mr-1"></i> Add New
            </button>
        </div>

        <div id="ourValuesContainer" class="space-y-4 mt-4">
            @foreach ($ourValues as $idx => $val)
                <div class="group border-2 border-gray-300 rounded-xl p-4 relative">
                    {{-- Delete (hover only) --}}
                    <button type="button"
                            class="absolute top-3 right-4 text-red-500 hover:text-red-700 text-sm opacity-0 group-hover:opacity-100 transition"
                            onclick="confirmDelete('{{ route('about.values.delete', $val->id) }}')">
                        <i class="fas fa-trash-alt mr-1"></i> Delete
                    </button>

                    <div class="flex gap-2 items-center">
                        <span class="text-xl font-semibold text-blue-600">#{{ $idx + 1 }}</span>
                        <input type="text"
                               name="values[{{ $val->id }}]"
                               value="{{ $val->value }}"
                               class="w-full border-none bg-transparent focus:outline-none text-gray-400 font-medium"
                               placeholder="Judul|Isi value">
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ============ WORK VALUE ============ --}}
        <div class="flex justify-between items-center mt-12">
            <h2 class="text-3xl font-bold text-blue-700">Work Value</h2>
            <button type="button" onclick="addInput('workValuesContainer', 2)"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                <i class="fas fa-plus mr-1"></i> Add New
            </button>
        </div>

        <div id="workValuesContainer" class="space-y-4 mt-4">
            @foreach ($workValues as $idx => $val)
                <div class="group border-2 border-gray-300 rounded-xl p-4 relative">
                    <button type="button"
                            class="absolute top-3 right-4 text-red-500 hover:text-red-700 text-sm opacity-0 group-hover:opacity-100 transition"
                            onclick="confirmDelete('{{ route('about.values.delete', $val->id) }}')">
                        <i class="fas fa-trash-alt mr-1"></i> Delete
                    </button>

                    <div class="flex gap-2 items-center">
                        <span class="text-xl font-semibold text-blue-600">#{{ $idx + 1 }}</span>
                        <input type="text"
                               name="values[{{ $val->id }}]"
                               value="{{ $val->value }}"
                               class="w-full border-none bg-transparent focus:outline-none text-gray-400 font-medium"
                               placeholder="Judul|Isi value">
                    </div>
                </div>
            @endforeach
        </div>

        {{-- ======== SAVE BUTTON ======== --}}
        <div class="text-right mt-12">
            <button type="submit"
                    class="bg-blue-700 hover:bg-blue-800 text-white px-8 py-3 rounded shadow">
                <i class="fas fa-save mr-2"></i> Save Changes
            </button>
        </div>
    </form>
</div>

{{-- ===================== JS ===================== --}}
<script>
/* Tambah baris baru inline */
function addInput(containerId, type) {
    const container = document.getElementById(containerId);
    const index     = container.children.length + 1;
    const key       = Date.now().toString(36);            // key unik

    const div = document.createElement('div');
    div.className = 'group border-2 border-blue-500 rounded-xl p-4 relative mt-4';

    div.innerHTML = `
        <button type="button"
                class="absolute top-3 right-4 text-red-500 hover:text-red-700 text-sm opacity-0 group-hover:opacity-100 transition"
                onclick="this.parentElement.remove()">
            <i class="fas fa-trash-alt mr-1"></i> Delete
        </button>
        <div class="flex gap-2 items-center">
            <span class="text-xl font-semibold text-blue-600">#${index}</span>
            <input type="hidden" name="new_values[${key}][type]" value="${type}">
            <input type="text"
                   name="new_values[${key}][value]"
                   class="w-full border-none bg-transparent focus:outline-none text-blue-800 font-medium"
                   placeholder="Judul|Isi value">
        </div>
    `;
    container.appendChild(div);
}

/* SweetAlert konfirmasi hapus data yang sudah ada di DB */
function confirmDelete(url) {
    Swal.fire({
        title: 'Hapus Value?',
        text: "Data yang dihapus tidak dapat dikembalikan.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.innerHTML = `@csrf @method('DELETE')`;
            document.body.appendChild(form);
            form.submit();
        }
    });
}
</script>

{{-- Toast SweetAlert untuk add / edit / delete --}}
@if (session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: '{{ session('success') }}',
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
});
</script>
@endif
@endsection
