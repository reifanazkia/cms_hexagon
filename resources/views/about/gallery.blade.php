@extends('layouts.app')

@section('content')
    @include('about._tabs')
    <div class="mb-6">
        <div class="flex justify-between items-center mb-6 px-6 max-w-4xl mx-auto">
            <h2 class="text-3xl font-semibold text-gray-800">Gallery</h2>
            <div class="relative inline-block text-left self-center md:self-auto">
                <button onclick="toggleDropdown()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-bars mr-2"></i> Menu
                </button>
                <div id="dropdown" class="hidden absolute right-0 mt-2 w-32 bg-white shadow-lg rounded z-50">
                    <button onclick="openAddModal()" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-green-600">
                        <i class="fas fa-plus mr-1"></i>Add</button>
                    <button onclick="openEditModal()" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-blue-600">
                        <i class="fas fa-edit mr-1"></i>Edit</button>
                    <button onclick="confirmDelete()" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                        <i class="fas fa-trash mr-1"></i>Delete</button>
                </div>
            </div>
        </div>
    </div>


    @if ($galleries->count())
        <div class="rounded overflow-hidden shadow mb-6 max-w-4xl mx-auto aspect-video">
            <img id="mainImage" src="{{ asset('gallery/' . $galleries->first()->image) }}"
                class="w-full h-full object-cover rounded transition-all duration-300" />
        </div>
    @endif

    <div class="flex flex-wrap gap-3 justify-center mb-6">
        @foreach ($galleries as $gallery)
            <div class="w-24 h-24 cursor-pointer rounded overflow-hidden border-2 border-transparent hover:border-blue-500 transition"
                onclick="changeMainImage('{{ asset('gallery/' . $gallery->image) }}', '{{ route('about.gallery.delete', $gallery->id) }}', '{{ route('about.gallery.update', $gallery->id) }}')">
                <img src="{{ asset('gallery/' . $gallery->image) }}" class="object-cover h-full w-full">
            </div>
        @endforeach
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="fixed inset-0 z-50 bg-white/30 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-[400px]">
            <h3 class="text-xl font-bold mb-4 text-blue-600">Upload New Images</h3>
            <form method="POST" action="{{ route('about.gallery.store') }}" enctype="multipart/form-data" id="addForm">
                @csrf
                <div id="fileInputs">
                    <input type="file" name="image[]" class="mb-2 block w-full border p-2 rounded" multiple required>
                </div>
                <button type="button" onclick="addMoreFiles()" class="bg-blue-600 text-white w-full py-2 rounded mb-2">Add
                    More Files</button>
                <div class="flex justify-between">
                    <button type="button" onclick="closeAddModal()"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Upload</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 bg-white/30 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-[400px]">
            <h3 class="text-xl font-bold mb-4 text-blue-600">Edit Image</h3>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" class="mb-4 block w-full border p-2 rounded" required>
                <div class="flex justify-between">
                    <button type="button" onclick="closeEditModal()"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let deleteUrl = '';
        let updateUrl = '';

        function toggleDropdown() {
            document.getElementById('dropdown').classList.toggle('hidden');
        }

        function openAddModal() {
            document.getElementById('addModal').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('addForm').reset();
            document.getElementById('addModal').classList.add('hidden');
        }

        function openEditModal() {
            if (!updateUrl) {
                Swal.fire('Pilih gambar dulu!', '', 'info');
                return;
            }
            const form = document.getElementById('editForm');
            form.action = updateUrl;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editForm').reset();
            document.getElementById('editModal').classList.add('hidden');
        }

        function changeMainImage(src, deleteRoute, updateRoute) {
            const mainImage = document.getElementById('mainImage');
            if (mainImage.src !== src) {
                mainImage.src = src;
                setSelected(deleteRoute, updateRoute);
            }
        }

        function setSelected(deleteRoute, updateRoute) {
            deleteUrl = deleteRoute;
            updateUrl = updateRoute;
        }

        function confirmDelete() {
            if (!deleteUrl) {
                Swal.fire('Pilih gambar dulu!', '', 'info');
                return;
            }

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#3b82f6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.action = deleteUrl;
                    form.method = 'POST';

                    const csrf = document.createElement('input');
                    csrf.type = 'hidden';
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    const method = document.createElement('input');
                    method.type = 'hidden';
                    method.name = '_method';
                    method.value = 'DELETE';
                    form.appendChild(method);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        function addMoreFiles() {
            const container = document.getElementById('fileInputs');
            const input = document.createElement('input');
            input.type = 'file';
            input.name = 'image[]';
            input.classList = 'mb-2 block w-full border p-2 rounded';
            input.required = true;
            container.appendChild(input);
        }
    </script>

    @if (session('status'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('status') }}',
                icon: 'success',
                confirmButtonColor: '#3b82f6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
