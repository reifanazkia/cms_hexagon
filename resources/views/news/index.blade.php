@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">News</h2>
        <button onclick="toggleModal('addModal', true)" class="bg-blue-600 text-white px-4 py-2 rounded">
            <i class="fas fa-plus mr-1"></i> Add News
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Foto</th>
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Keterangan</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y">
                @forelse ($news as $item)
                    <tr>
                        <td class="px-6 py-4">
                            @if($item->fotos && $item->fotos->count() > 0)
                                <img src="{{ asset('storage/' . $item->fotos->first()->nama_foto) }}" alt="Foto berita" class="w-16 h-12 object-cover rounded">
                            @else
                                <div class="w-16 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $item->judul_news }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $item->category_id }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ Str::limit($item->ket_news, 60) }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick='openDetailModal(@json($item))' class="text-gray-500 hover:text-blue-700"><i class="fas fa-eye"></i></button>
                                <button onclick='openEditModal(@json($item))' class="text-blue-600 hover:text-green-800"><i class="fas fa-pen"></i></button>
                                <form action="{{ route('news.destroy', $item->news_id) }}" method="POST" class="delete-form inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="py-4 text-center text-gray-400">No news found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Add --}}
<div id="addModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl max-h-[90vh] rounded shadow relative flex flex-col">
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-lg font-bold">Add News</h2>
            <button onclick="toggleModal('addModal', false)" class="text-xl text-gray-400 hover:text-gray-600">&times;</button>
        </div>

        <div class="flex-1 overflow-y-auto p-6">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" id="addForm">
                @csrf
                <div class="mb-6">
                    <label class="block font-medium mb-2">Upload Foto</label>
                    <div class="relative">
                        <div id="addPhotoDropZone" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors cursor-pointer">
                            <div id="addPhotoPlaceholder">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 mb-2">Klik untuk upload atau drag and drop</p>
                                <p class="text-sm text-gray-500">PNG, JPG, or GIF (MAX. 5MB)</p>
                            </div>
                            <div id="addPhotoPreview" class="hidden">
                                <img id="addPreviewImage" src="" alt="Preview" class="w-48 h-32 mx-auto object-cover rounded border">
                                <p id="addFileName" class="mt-2 text-sm text-gray-600"></p>
                                <button type="button" onclick="removeAddPhoto()" class="mt-2 text-red-500 hover:text-red-700 text-sm">
                                    <i class="fas fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                        <input type="file" id="addPhotoInput" name="foto" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="font-medium block mb-2">Kategori <span class="text-red-500">*</span> (pilih satu / lebih):</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach(['Keuangan','Teknologi','Politik','Olahraga','Ekonomi','Hiburan','Kesehatan','Sains','Pendidikan','Travel','Kuliner'] as $cat)
                            <label class="flex items-center gap-2 text-sm p-2 border rounded hover:bg-gray-50">
                                <input type="checkbox" name="category_id[]" value="{{ $cat }}" class="accent-blue-600">
                                {{ $cat }}
                            </label>
                        @endforeach
                    </div>
                    <div id="add_category_error" class="text-red-500 text-xs mt-1 hidden">Pilih minimal satu kategori</div>
                </div>

                <div class="mb-4">
                    <label class="font-medium block mb-1">Judul <span class="text-red-500">*</span></label>
                    <input name="judul_news" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-6">
                    <label class="font-medium block mb-1">Keterangan <span class="text-red-500">*</span></label>
                    <textarea name="ket_news" rows="4" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <div class="text-right">
                    <button type="button" onclick="toggleModal('addModal', false)" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 mr-2">Batal</button>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div id="editModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl max-h-[90vh] rounded shadow relative flex flex-col">
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-lg font-bold">Edit News</h2>
            <button onclick="toggleModal('editModal', false)" class="text-xl text-gray-400 hover:text-gray-600">&times;</button>
        </div>

        <div class="flex-1 overflow-y-auto p-6">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label class="block font-medium mb-2">Upload Foto</label>
                    <div id="currentPhotoContainer" class="mb-4"></div>

                    <div class="relative">
                        <div id="editPhotoDropZone" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center hover:border-gray-400 transition-colors cursor-pointer">
                            <div id="editPhotoPlaceholder">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 mb-2">Klik untuk upload atau drag and drop</p>
                                <p class="text-sm text-gray-500">PNG, JPG, or GIF (MAX. 5MB)</p>
                                <p class="text-xs text-gray-400 mt-1">Kosongkan jika tidak ingin mengubah</p>
                            </div>
                            <div id="editPhotoPreview" class="hidden">
                                <img id="editPreviewImage" src="" alt="Preview" class="w-48 h-32 mx-auto object-cover rounded border">
                                <p id="editFileName" class="mt-2 text-sm text-gray-600"></p>
                                <button type="button" onclick="removeEditPhoto()" class="mt-2 text-red-500 hover:text-red-700 text-sm">
                                    <i class="fas fa-times"></i> Remove
                                </button>
                            </div>
                        </div>
                        <input type="file" id="editPhotoInput" name="foto" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="font-medium block mb-2">Kategori <span class="text-red-500">*</span>:</label>
                    <div id="edit_category_checkboxes" class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach(['Keuangan','Teknologi','Politik','Olahraga','Ekonomi','Hiburan','Kesehatan','Sains','Pendidikan','Travel','Kuliner'] as $cat)
                            <label class="flex items-center gap-2 text-sm p-2 border rounded hover:bg-gray-50">
                                <input type="checkbox" value="{{ $cat }}" class="edit-category-checkbox accent-blue-600" name="category_id[]">
                                {{ $cat }}
                            </label>
                        @endforeach
                    </div>
                    <div id="edit_category_error" class="text-red-500 text-xs mt-1 hidden">Pilih minimal satu kategori</div>
                </div>

                <div class="mb-4">
                    <label class="font-medium block mb-1">Judul <span class="text-red-500">*</span></label>
                    <input id="edit_judul_news" name="judul_news" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-6">
                    <label class="font-medium block mb-1">Keterangan <span class="text-red-500">*</span></label>
                    <textarea id="edit_ket_news" name="ket_news" rows="4" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <div class="text-right">
                    <button type="button" onclick="toggleModal('editModal', false)" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 mr-2">Batal</button>
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Detail --}}
<div id="detailModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-2xl max-h-[90vh] rounded shadow flex flex-col">
        <div class="flex justify-between items-center p-6 border-b">
            <h2 class="text-xl font-bold">Detail News</h2>
            <button onclick="toggleModal('detailModal', false)" class="text-xl text-gray-400 hover:text-gray-600">&times;</button>
        </div>

        <div class="flex-1 overflow-y-auto p-6">
            <div id="detail_foto_container" class="mb-4"></div>
            <p><strong>Kategori:</strong> <span id="detail_kategori"></span></p>
            <p class="mt-2"><strong>Judul:</strong> <span id="detail_judul"></span></p>
            <p class="mt-2"><strong>Keterangan:</strong> <span id="detail_ket"></span></p>
        </div>

        <div class="p-6 border-t text-right">
            <button onclick="toggleModal('detailModal', false)" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tutup</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function resetAddForm() {
        document.querySelector('#addForm').reset();
        removeAddPhoto();
        document.querySelectorAll('#addModal input[name="category_id[]"]').forEach(cb => cb.checked = false);
        document.getElementById('add_category_error').classList.add('hidden');
    }

    function toggleModal(id, show = true) {
        document.getElementById(id).classList.toggle('hidden', !show);
        if (show && (id === 'addModal' || id === 'editModal')) {
            document.body.style.overflow = 'hidden';
        } else if (!show) {
            document.body.style.overflow = '';
            if (id === 'addModal') resetAddForm();
            if (id === 'editModal') removeEditPhoto();
        }
    }

    function setupPhotoUpload(inputId, dropZoneId, placeholderId, previewId, previewImageId, fileNameId) {
        const input = document.getElementById(inputId);
        const dropZone = document.getElementById(dropZoneId);
        const placeholder = document.getElementById(placeholderId);
        const preview = document.getElementById(previewId);
        const previewImage = document.getElementById(previewImageId);
        const fileName = document.getElementById(fileNameId);

        dropZone.addEventListener('click', (e) => {
            // Only trigger file input if clicking on the drop zone itself, not on remove button
            if (!e.target.closest('button')) {
                input.click();
            }
        });

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('border-blue-400','bg-blue-50');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-400','bg-blue-50');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-blue-400','bg-blue-50');
            if (e.dataTransfer.files.length > 0) {
                input.files = e.dataTransfer.files;
                handlePhotoSelect(e.dataTransfer.files[0], placeholder, preview, previewImage, fileName);
            }
        });

        input.addEventListener('change', (e) => {
            if (e.target.files.length > 0) {
                handlePhotoSelect(e.target.files[0], placeholder, preview, previewImage, fileName);
            }
        });
    }

    function handlePhotoSelect(file, placeholder, preview, previewImage, fileName) {
        if (file && file.type.startsWith('image/')) {
            if (file.size > 5242880) { // 5MB limit
                Swal.fire('Error!', 'Ukuran file maksimal 5MB', 'error');
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                fileName.textContent = file.name;
                placeholder.classList.add('hidden');
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            Swal.fire('Error!', 'File harus berupa gambar', 'error');
        }
    }

    function removeAddPhoto() {
        document.getElementById('addPhotoInput').value = '';
        document.getElementById('addPhotoPlaceholder').classList.remove('hidden');
        document.getElementById('addPhotoPreview').classList.add('hidden');
    }

    function removeEditPhoto() {
        document.getElementById('editPhotoInput').value = '';
        document.getElementById('editPhotoPlaceholder').classList.remove('hidden');
        document.getElementById('editPhotoPreview').classList.add('hidden');
    }

    // Setup photo upload functionality
    setupPhotoUpload('addPhotoInput','addPhotoDropZone','addPhotoPlaceholder','addPhotoPreview','addPreviewImage','addFileName');
    setupPhotoUpload('editPhotoInput','editPhotoDropZone','editPhotoPlaceholder','editPhotoPreview','editPreviewImage','editFileName');

    // Form validation before submit
    document.getElementById('addForm').addEventListener('submit', function(e) {
        const categoryChecked = document.querySelectorAll('#addModal input[name="category_id[]"]:checked');
        if (categoryChecked.length === 0) {
            e.preventDefault();
            document.getElementById('add_category_error').classList.remove('hidden');
            Swal.fire('Error!', 'Pilih minimal satu kategori', 'error');
            return false;
        } else {
            document.getElementById('add_category_error').classList.add('hidden');
        }
    });

    document.getElementById('editForm').addEventListener('submit', function(e) {
        const categoryChecked = document.querySelectorAll('#editModal input[name="category_id[]"]:checked');
        if (categoryChecked.length === 0) {
            e.preventDefault();
            document.getElementById('edit_category_error').classList.remove('hidden');
            Swal.fire('Error!', 'Pilih minimal satu kategori', 'error');
            return false;
        } else {
            document.getElementById('edit_category_error').classList.add('hidden');
        }
    });

    function openEditModal(d){
        toggleModal('editModal', true);
        document.getElementById('edit_judul_news').value = d.judul_news || '';
        document.getElementById('edit_ket_news').value = d.ket_news || '';
        document.getElementById('editForm').action = `/news/${d.news_id}`;
        removeEditPhoto();

        const currentPhotoContainer = document.getElementById('currentPhotoContainer');
        currentPhotoContainer.innerHTML = '';
        if (d.fotos && d.fotos.length > 0) {
            currentPhotoContainer.innerHTML = `
                <div class="p-4 bg-gray-50 rounded-lg border">
                    <p class="text-sm text-gray-600 mb-2">Foto saat ini:</p>
                    <img src="/storage/${d.fotos[0].nama_foto}" alt="Current foto" class="w-48 h-32 object-cover rounded border">
                </div>
            `;
        } else {
            currentPhotoContainer.innerHTML = `<div class="p-4 bg-gray-50 rounded-lg border"><p class="text-sm text-gray-500">Tidak ada foto saat ini</p></div>`;
        }

        // Set categories
        const selected = d.category_id ? d.category_id.split(',').map(c => c.trim()) : [];
        document.querySelectorAll('.edit-category-checkbox').forEach(cb => {
            cb.checked = selected.includes(cb.value);
        });
    }

    function openDetailModal(d){
        document.getElementById('detail_kategori').textContent = d.category_id || '-';
        document.getElementById('detail_judul').textContent = d.judul_news || '-';
        document.getElementById('detail_ket').textContent = d.ket_news || '-';

        const fotoContainer = document.getElementById('detail_foto_container');
        fotoContainer.innerHTML = '';
        if (d.fotos && d.fotos.length > 0) {
            fotoContainer.innerHTML = `
                <div>
                    <strong>Foto:</strong>
                    <div class="mt-2">
                        <img src="/storage/${d.fotos[0].nama_foto}" alt="Foto berita" class="w-full max-w-md h-64 object-cover rounded border mx-auto">
                    </div>
                </div>
            `;
        } else {
            fotoContainer.innerHTML = '<p><strong>Foto:</strong> <span class="text-gray-500">Tidak ada foto</span></p>';
        }
        toggleModal('detailModal', true);
    }

    // Delete confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data ini akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if(result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });

    // Close modal when clicking outside
    document.addEventListener('click', function(e) {
        const modals = ['addModal', 'editModal', 'detailModal'];
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (e.target === modal) {
                toggleModal(modalId, false);
            }
        });
    });
</script>
@endsection
