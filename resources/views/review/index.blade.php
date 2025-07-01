@extends('layouts.app')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
                closeModal();
            });
        </script>
    @endif

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-800">Client Reviews</h2>
        <button onclick="openAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Add Review</button>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Dari</th>
                    <th class="px-6 py-3">Review</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($review as $r)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-3 whitespace-nowrap">{{ $r->nama }}</td>
                        <td class="px-6 py-3">{{ $r->dari }}</td>
                        <td class="px-6 py-3 max-w-xl">{{ Str::limit($r->review, 50) }}</td>
                        <td class="px-6 py-3 text-center">
                            <div class="inline-flex gap-3">
                                <button type="button" onclick='showDetail(@json($r))' class="text-gray-500 hover:text-blue-600" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" onclick='openEditModal(@json($r))' class="text-blue-600 hover:text-blue-800" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <form action="{{ route('review.destroy', $r->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Add/Edit -->
<div id="formModal" class="fixed inset-0 z-[999] hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-xl border border-gray-200 shadow-lg">
        <h3 id="modalTitle" class="text-lg font-semibold mb-4">Tambah Review</h3>
        <form id="formAction" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <div class="mb-4">
                <label class="block mb-1 font-normal">Review</label>
                <textarea name="review" id="inputReview" class="w-full border p-2 rounded" required></textarea>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-normal">Photo</label>
                <input type="file" name="foto" id="fotoInput" class="w-full border p-2 rounded" onchange="previewFoto()">
                <img id="previewImage" class="mt-2 hidden w-24 h-24 object-cover rounded border">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-normal">Name</label>
                <input type="text" name="nama" id="inputNama" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-normal">From</label>
                <input type="text" name="dari" id="inputDari" class="w-full border p-2 rounded" required>
            </div>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detail -->
<div id="detailModal" class="fixed inset-0 z-[999] hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-full max-w-md border border-gray-200 shadow-lg">
        <div class="flex items-center space-x-4 mb-4">
            <img id="fotoDetail" src="" class="w-16 h-16 rounded-full object-cover border" />
            <div>
                <h4 id="namaDetail" class="font-semibold text-lg text-gray-800"></h4>
                <p id="dariDetail" class="text-sm text-gray-500"></p>
            </div>
        </div>
        <div>
            <label class="block font-normal mb-1">Review</label>
            <p id="reviewDetail" class="bg-gray-100 p-3 rounded text-sm text-gray-700"></p>
        </div>
        <div class="flex justify-end mt-4">
            <button onclick="closeModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
</div>

<script>
    function openAddModal() {
        closeModal();
        document.getElementById('modalTitle').innerText = 'Tambah Review';
        document.getElementById('formAction').action = "{{ route('review.store') }}";
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('inputNama').value = '';
        document.getElementById('inputDari').value = '';
        document.getElementById('inputReview').value = '';
        document.getElementById('fotoInput').value = '';
        document.getElementById('previewImage').classList.add('hidden');
        document.getElementById('formModal').classList.remove('hidden');
    }

    function openEditModal(data) {
        closeModal();
        document.getElementById('modalTitle').innerText = 'Edit Review';
        document.getElementById('formAction').action = "/reviews/update/" + data.id;
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('inputNama').value = data.nama;
        document.getElementById('inputDari').value = data.dari;
        document.getElementById('inputReview').value = data.review;
        document.getElementById('fotoInput').value = '';
        document.getElementById('previewImage').classList.add('hidden');
        document.getElementById('formModal').classList.remove('hidden');
    }

    function showDetail(data) {
        closeModal();
        document.getElementById('fotoDetail').src = data.foto ? '/' + data.foto : 'https://ui-avatars.com/api/?name=' + encodeURIComponent(data.nama);
        document.getElementById('namaDetail').innerText = data.nama;
        document.getElementById('dariDetail').innerText = data.dari;
        document.getElementById('reviewDetail').innerText = data.review;
        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('formModal').classList.add('hidden');
        document.getElementById('detailModal').classList.add('hidden');
    }

    function confirmDelete(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Yakin ingin hapus?',
            text: 'Data yang dihapus tidak bisa dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                e.target.submit();
            }
        });
    }

    function previewFoto() {
        const input = document.getElementById('fotoInput');
        const preview = document.getElementById('previewImage');
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    }
</script>
@endsection
