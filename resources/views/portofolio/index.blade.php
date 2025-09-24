@extends('layouts.app')

@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Portfolio</h2>
            <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
                + Add New Portfolio
            </button>
        </div>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        <!-- TABEL -->
        <div class="bg-white rounded-lg shadow overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Keterangan</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($portfolios as $item)
                        <tr>
                            <td class="px-6 py-4">

                                @if ($item->photos->count())
                                  @php
                                $filePath = 'storage/' .$item->photos->first()->nama_foto;
                                @endphp
                                    <img src="{{ asset($filePath) }}" width="150"
                                        class="w-12 h-12 rounded object-cover">
                                @else
                                    <span class="italic text-gray-400">No Image</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-800">{{ $item->judul_porto }} </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($item->ket_porto, 60) }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="inline-flex gap-3">
                                    <button type="button" onclick="openDetailModal({{ $item->portofolio_id }})"
                                        class="text-gray-600 hover:text-blue-800" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" onclick="openEditModal({{ $item->portofolio_id }})"
                                        class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <button type="button" onclick="confirmDelete({{ $item->portofolio_id }})"
                                        class="text-red-500 hover:text-red-700" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $item->portofolio_id }}"
                                    action="{{ route('portofolio.delete', $item->portofolio_id) }}" method="POST"
                                    class="hidden">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="px-6 py-4 bg-gray-50">{{ $portfolios->links() }}</div>
        </div>
    </div>

    <!-- ============ ADD MODAL ============ -->
    <div id="addModal" class="modal fixed inset-0 z-50 bg-black/40 justify-center items-center">
        <div class="bg-white max-w-5xl w-full rounded-lg shadow p-8 overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-bold mb-4">Add New Portfolio</h2>
            <form action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-2 gap-4">
                    <!-- drag area -->
                    <div>
                        <label class="block font-medium mb-1">Foto</label>
                        <div id="addDrop" class="drop-zone">
                            <i class="fas fa-cloud-upload-alt text-4xl"></i>
                            <span>Drag & drop atau klik</span>
                            <small class="text-xs">(PNG/JPG max 2 MB)</small>
                            <input id="addInput" type="file" name="foto"
                                class="absolute inset-0 opacity-0 cursor-pointer">
                        </div>
                        <div id="addPreview" class="mt-2"></div>
                    </div>

                    <!-- kolom input -->
                    <div class="space-y-4">
                        <div>
                            <label class="block font-medium mb-1">Judul</label>
                            <input type="text" name="judul_porto" class="w-full border p-2 rounded" required>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Kategori</label>
                            <select name="category_id" class="w-full border p-2 rounded">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->nama_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">YouTube</label>
                            <input type="url" name="url_youtube" class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Keterangan</label>
                            <textarea name="ket_porto" rows="4" class="w-full border p-2 rounded" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button type="button" onclick="closeModal('addModal')"
                        class="bg-red-400 text-white px-4 py-2 rounded">Cancel</button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============ EDIT MODAL ============ -->
    <div id="editModal" class="modal fixed inset-0 z-50 bg-black/40 justify-center items-center">
        <div class="bg-white max-w-5xl w-full rounded-lg shadow p-8 overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-bold mb-4">Edit Portfolio</h2>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-2 gap-4">
                    <!-- drag area -->
                    <div>
                        <label class="block font-medium mb-1">Foto Baru</label>
                        <div id="editDrop" class="drop-zone">
                            <i class="fas fa-cloud-upload-alt text-4xl"></i>
                            <span>Drag & drop atau klik</span>
                            <input id="editInput" type="file" name="foto"
                                class="absolute inset-0 opacity-0 cursor-pointer">
                        </div>
                        <div id="editPreview" class="mt-2"></div>
                    </div>

                    <!-- kolom input -->
                    <div class="space-y-4">
                        <div>
                            <label class="block font-medium mb-1">Judul</label>
                            <input type="text" name="judul_porto" id="edit_judul" class="w-full border p-2 rounded"
                                required>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Kategori</label>
                            <select name="category_id" id="edit_kategori" class="w-full border p-2 rounded">
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->category_id }}">{{ $cat->nama_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block font-medium mb-1">YouTube</label>
                            <input type="url" name="url_youtube" id="edit_youtube"
                                class="w-full border p-2 rounded">
                        </div>
                        <div>
                            <label class="block font-medium mb-1">Keterangan</label>
                            <textarea name="ket_porto" id="edit_keterangan" rows="4" class="w-full border p-2 rounded" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-4">
                    <button type="button" onclick="closeModal('editModal')"
                        class="bg-red-400 text-white px-4 py-2 rounded">Cancel</button>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============ DETAIL MODAL ============ -->
    <div id="detailModal" class="modal fixed inset-0 z-50 bg-black/40 justify-center items-center">
        <div class="bg-white max-w-md w-full rounded-lg shadow p-6 overflow-y-auto max-h-[80vh]">
            <div id="detailImage" class="mb-3"></div>
            <h3 id="detailTitle" class="text-lg font-bold"></h3>
            <p id="detailCat" class="text-sm text-gray-600 mb-2"></p>
            <p class="font-semibold">Keterangan:</p>
            <p id="detailDesc" class="mb-3 text-gray-800 whitespace-pre-line"></p>
            <p><strong>YouTube:</strong> <a id="detailURL" href="#" target="_blank"
                    class="text-blue-500 underline"></a></p>
            <div class="text-right mt-4">
                <button type="button" onclick="closeModal('detailModal')"
                    class="bg-blue-400 text-white px-4 py-2 rounded">Tutup</button>
            </div>
        </div>
    </div>

    <!-- ============ STYLE ============ -->
    <style>
        .modal {
            display: none;
        }

        .modal.open {
            display: flex;
        }

        .drop-zone {
            border: 2px dashed #cbd5e0;
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            position: relative;
        }

        .drop-zone.drag {
            border-color: #3182ce;
            background-color: #ebf8ff;
        }
    </style>

    <!-- ============ SCRIPT ============ -->
    <script>
        function openAddModal() {
            document.getElementById('addModal').classList.add('open');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('open');
        }

        /* DRAG & DROP ------------------------------------------- */
        function initDrag(dropId, inputId, previewId) {
            const drop = document.getElementById(dropId);
            const input = document.getElementById(inputId);
            const prev = document.getElementById(previewId);

            ['dragenter', 'dragover'].forEach(e => drop.addEventListener(e, ev => {
                ev.preventDefault();
                drop.classList.add('drag');
            }));
            ['dragleave', 'dragend', 'drop'].forEach(e => drop.addEventListener(e, ev => {
                ev.preventDefault();
                drop.classList.remove('drag');
            }));

            drop.addEventListener('drop', ev => {
                const files = ev.dataTransfer.files;
                if (files.length > 0) {
                    input.files = files;
                    previewFiles(files, prev);
                }
            });
            input.addEventListener('change', () => previewFiles(input.files, prev));
        }

        function previewFiles(files, container) {
            container.innerHTML = '';
            if (files.length > 0) {
                const file = files[0]; // Hanya ambil file pertama
                if (file.type.startsWith('image/')) {
                    const rdr = new FileReader();
                    rdr.onload = e => {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'h-20 rounded';
                        container.appendChild(img);
                    };
                    rdr.readAsDataURL(file);
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            initDrag('addDrop', 'addInput', 'addPreview');
            initDrag('editDrop', 'editInput', 'editPreview');
        });

        /* CRUD helpers ------------------------------------------ */
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data akan hilang permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then(res => {
                if (res.isConfirmed) document.getElementById('delete-form-' + id).submit();
            });
        }

        function openEditModal(id) {
            fetch(`/portofolio/show/${id}`)
                .then(r => r.json())
                .then(d => {
                    const form = document.getElementById('editForm');
                    form.action = `/portofolio/update/${id}`;

                    document.getElementById('edit_judul').value = d.judul_porto;
                    document.getElementById('edit_kategori').value = d.category_id;
                    document.getElementById('edit_youtube').value = d.url_youtube ?? '';
                    document.getElementById('edit_keterangan').value = d.ket_porto;

                    const prev = document.getElementById('editPreview');
                    prev.innerHTML = d.photos.length ?
                        `<img src="/${d.photos[0].nama_foto}" class="h-20 rounded">` :
                        '<span class="italic text-gray-400">No Image</span>';

                    document.getElementById('editModal').classList.add('open');
                });
        }

        function openDetailModal(id) {
            fetch(`/portofolio/show/${id}`)
                .then(r => r.json())
                .then(d => {
                    document.getElementById('detailTitle').textContent = d.judul_porto;
                    document.getElementById('detailCat').textContent = d.category ? 'Kategori: ' + d.category.nama_category : 'Kategori: -';
                    document.getElementById('detailDesc').textContent = d.ket_porto;

                    document.getElementById('detailImage').innerHTML =
                        d.photos.length ?
                        `<img src="/${d.photos[0].nama_foto}" class="w-full rounded mb-3">` :
                        '<div class="italic text-gray-400 mb-3">No Image</div>';

                    const link = document.getElementById('detailURL');
                    if (d.url_youtube) {
                        link.href = d.url_youtube;
                        link.textContent = d.url_youtube;
                    } else {
                        link.href = '#';
                        link.textContent = '(tidak ada)';
                    }
                    document.getElementById('detailModal').classList.add('open');
                });
        }
    </script>
@endsection
