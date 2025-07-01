@extends('layouts.app')

@section('content')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Our Team</h2>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded shadow"
                onclick="document.getElementById('addTeamModal').classList.remove('hidden')">
                + Add New Member
            </button>
        </div>

        <!-- Search -->
        <div class="mb-4">
            <form method="GET">
                <input type="text" name="search" placeholder=" Search team members..." value="{{ request('search') }}"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </form>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium">PHOTO</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">NAME</th>
                        <th class="px-6 py-3 text-left text-sm font-medium">POSITION</th>
                        <th class="px-6 py-3 text-right text-sm font-medium">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-800">
                    @foreach ($teams as $member)
                        <tr>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/foto_team/' . $member->foto_orang) }}" alt="Photo"
                                    class="w-12 h-12 rounded-full object-cover">
                            </td>
                            <td class="px-6 py-4">{{ $member->nama_orang }}</td>
                            <td class="px-6 py-4">{{ $member->jabatan }}</td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <!-- Edit -->
                                <button onclick="openEditModal({{ $member->id }})"
                                    class="text-blue-600 hover:text-blue-800" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </button>

                                <!-- Delete with SweetAlert -->
                                <form id="deleteForm{{ $member->id }}" action="{{ route('teams.destroy', $member->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $member->id }})"
                                       class="text-red-500 hover:text-red-700" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div id="editTeamModal{{ $member->id }}" class="fixed inset-0 z-50 flex items-center justify-center bg-white/30 backdrop-blur-sm hidden">
                            <div class="bg-white w-full max-w-2xl rounded-xl p-6 relative shadow-lg">
                                <button class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-xl"
                                    onclick="document.getElementById('editTeamModal{{ $member->id }}').classList.add('hidden')">
                                    &times;
                                </button>

                                <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">Edit Team Member</h2>

                                <form action="{{ route('teams.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="flex justify-center mb-6">
                                        <div id="editPreviewContainer{{ $member->id }}"
                                            class="w-24 h-24 rounded-full border-2 border-dashed border-gray-300 overflow-hidden flex items-center justify-center text-gray-400 text-2xl">
                                            <img id="editPreviewImage{{ $member->id }}"
                                                src="{{ asset('storage/foto_team/' . $member->foto_orang) }}" alt="Preview"
                                                class="object-contain w-full h-full" />
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2 mb-5">
                                        <label
                                            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded cursor-pointer">
                                            CHOOSE FILE
                                            <input type="file" name="foto_orang" class="hidden"
                                                onchange="previewEditImage(event, {{ $member->id }})">
                                        </label>
                                        <span id="editFileName{{ $member->id }}" class="text-gray-500 text-sm">Current: {{ $member->foto_orang }}</span>
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                        <input type="text" name="nama_orang" required value="{{ $member->nama_orang }}"
                                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                    </div>

                                    <div class="mb-5">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                        <input type="text" name="jabatan" required value="{{ $member->jabatan }}"
                                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                                            <input type="text" name="link_ig" value="{{ $member->link_ig }}"
                                                class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                                            <input type="text" name="link_in" value="{{ $member->link_in }}"
                                                class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                                            <input type="text" name="link_fb" value="{{ $member->link_fb }}"
                                                class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-1">X</label>
                                            <input type="text" name="link_team" value="{{ $member->link_team }}"
                                                class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                                        </div>
                                    </div>

                                    <div class="flex justify-end gap-3">
                                        <button type="button" class="bg-gray-100 text-gray-800 px-4 py-2 rounded"
                                            onclick="document.getElementById('editTeamModal{{ $member->id }}').classList.add('hidden')">
                                            Batal
                                        </button>
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addTeamModal" class="fixed inset-0 z-50 flex items-center justify-center bg-white/30 hidden">
        <div class="bg-white w-full max-w-2xl rounded-xl p-6 relative shadow-lg">
            <!-- Tombol Close -->
            <button class="absolute top-3 right-4 text-gray-500 hover:text-gray-700 text-xl"
                onclick="document.getElementById('addTeamModal').classList.add('hidden')">
                &times;
            </button>

            <!-- Title -->
            <h2 class="text-xl font-semibold text-center text-gray-800 mb-6">Tambah Anggota Tim Baru</h2>

            <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Upload preview -->
                <div class="flex justify-center mb-6">
                    <div id="addPreviewContainer"
                        class="w-24 h-24 rounded-full border-2 border-dashed border-gray-300 overflow-hidden flex items-center justify-center text-gray-400 text-2xl">
                        <img id="addPreviewImage" src="{{ asset('images/preview-icon.png') }}" alt="Preview"
                            class="object-contain w-full h-full hidden" />
                        <span id="addPlaceholderIcon"><i class="fas fa-image"></i></span>
                    </div>
                </div>

                <!-- File Upload -->
                <div class="flex items-center gap-2 mb-5">
                    <label
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded cursor-pointer">
                        CHOOSE FILE
                        <input type="file" name="foto_orang" class="hidden" onchange="previewAddImage(event)">
                    </label>
                    <span id="addFileName" class="text-gray-500 text-sm">No file chosen</span>
                </div>

                <!-- Nama -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama_orang" placeholder="Masukkan nama anggota tim"
                        class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <!-- Jabatan -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                    <input type="text" name="jabatan" placeholder="Masukkan jabatan"
                        class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required />
                </div>

                <!-- Social Links -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Instagram</label>
                        <input type="text" name="link_ig" placeholder="username"
                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">LinkedIn</label>
                        <input type="text" name="link_in" placeholder="username"
                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Facebook</label>
                        <input type="text" name="link_fb" placeholder="username or id"
                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Website / Team Link</label>
                        <input type="text" name="link_team" placeholder="https://example.com/profile"
                            class="w-full px-4 py-2 border-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" />
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end gap-3">
                    <button type="button" class="bg-gray-100 text-gray-800 px-4 py-2 rounded"
                        onclick="document.getElementById('addTeamModal').classList.add('hidden')">
                        Batal
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
   <!-- Script Preview & SweetAlert -->
    <script>
        function openEditModal(id) {
            const modal = document.getElementById('editTeamModal' + id);
            if (modal) modal.classList.remove('hidden');
        }

        function previewEditImage(event, id) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('editPreviewImage' + id);
            const fileName = document.getElementById('editFileName' + id);

            if (file && file.type.startsWith('image/')) {
                previewImage.src = URL.createObjectURL(file);
                fileName.textContent = file.name;
            }
        }

        function previewAddImage(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('addPreviewImage');
            const placeholderIcon = document.getElementById('addPlaceholderIcon');
            const fileName = document.getElementById('addFileName');

            if (file && file.type.startsWith('image/')) {
                previewImage.src = URL.createObjectURL(file);
                previewImage.classList.remove('hidden');
                placeholderIcon.classList.add('hidden');
                fileName.textContent = file.name;
            }
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Data?',
                text: "Data ini tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: @json(session('success')),
                    timer: 2500,
                    showConfirmButton: false
                });
            });
        </script>
    @endif
@endsection
