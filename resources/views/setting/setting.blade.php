@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Profile Setting</h2>

        <div class="grid md:grid-cols-3 gap-6">
            {{-- Kiri --}}
            <div class="space-y-6">
                {{-- Logo --}}
                <div class="bg-white shadow rounded p-4 text-center">
                    <img src="{{ asset('img/logo.png') }}" class="w-20 mx-auto mb-2">
                    <h3 class="font-semibold">Hexagon Inc</h3>
                </div>

                {{-- Contact --}}
                <div class="bg-white shadow rounded p-4">
                    <h4 class="font-semibold mb-3">Contact</h4>

                    {{-- Phone --}}
                    <div class="mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <i class="fas fa-phone mr-2"></i> Nomor Telpon
                                <div id="notlp-display" class="text-sm text-blue-600">
                                    <a href="tel:{{ $contact->notlp }}">{{ $contact->notlp }}</a>
                                </div>
                            </div>
                            <button onclick="editField('notlp')" class="text-blue-600"><i class="fas fa-pen"></i></button>
                        </div>
                        <form id="notlp-form" class="hidden mt-2" method="POST" action="{{ route('contact.update') }}">
                            @csrf
                            <input type="hidden" name="type" value="notlp">
                            <input type="text" name="notlp" class="w-full text-sm border rounded px-2 py-1"
                                value="{{ $contact->notlp }}">
                            <div class="flex gap-2 mt-2">
                                <button type="submit"
                                    class="bg-blue-600 text-white text-sm px-3 py-1 rounded">Simpan</button>
                                <button type="button" onclick="cancelEdit('notlp')"
                                    class="bg-red-500 text-white text-sm px-3 py-1 rounded">Batal</button>
                            </div>
                        </form>
                    </div>

                    {{-- Email --}}
                    <div>
                        <div class="flex justify-between items-center">
                            <div>
                                <i class="fas fa-envelope mr-2"></i> Email
                                <div id="email-display" class="text-sm text-blue-600">
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </div>
                            </div>
                            <button onclick="editField('email')" class="text-blue-600"><i class="fas fa-pen"></i></button>
                        </div>
                        <form id="email-form" class="hidden mt-2" method="POST" action="{{ route('contact.update') }}">
                            @csrf
                            <input type="hidden" name="type" value="email">
                            <input type="email" name="email" class="w-full text-sm border rounded px-2 py-1"
                                value="{{ $contact->email }}">
                            <div class="flex gap-2 mt-2">
                                <button type="submit"
                                    class="bg-blue-600 text-white text-sm px-3 py-1 rounded">Simpan</button>
                                <button type="button" onclick="cancelEdit('email')"
                                    class="bg-red-500 text-white text-sm px-3 py-1 rounded">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Social Account --}}
                <div class="bg-white shadow rounded p-4">
                    <h4 class="font-semibold mb-3">Social Account</h4>
                    @foreach ($socialAccounts as $sosmed)
                        @php
                            $iconClass = match (strtolower($sosmed->nama)) {
                                'instagram' => 'fab fa-instagram',
                                'youtube' => 'fab fa-youtube',
                                'facebook' => 'fab fa-facebook',
                                'linkedin' => 'fab fa-linkedin',
                                default => 'fas fa-globe',
                            };
                        @endphp

                        <div class="mb-3">
                            <div class="flex justify-between items-start">
                                <div class="w-full">
                                    <div class="flex items-center mb-1">
                                        <i class="{{ $iconClass }} mr-2"></i>
                                        <strong class="capitalize">{{ $sosmed->nama }}</strong>
                                    </div>

                                    <div id="sosmed-display-{{ $sosmed->id }}">
                                        <a href="{{ $sosmed->link }}" class="text-sm text-blue-600 break-all block"
                                            target="_blank">
                                            {{ $sosmed->link }}
                                        </a>
                                    </div>

                                    <form id="sosmed-form-{{ $sosmed->id }}" method="POST"
                                        action="{{ route('social.update', $sosmed->id) }}" class="hidden mt-1">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="link" value="{{ $sosmed->link }}"
                                            class="w-full border px-2 py-1 text-sm rounded">
                                        <div class="flex gap-2 mt-1">
                                            <button type="submit"
                                                class="bg-blue-600 text-white px-3 py-1 rounded text-sm">Simpan</button>
                                            <button type="button" onclick="cancelSosmedEdit({{ $sosmed->id }})"
                                                class="bg-red-500 text-white px-3 py-1 rounded text-sm">Batal</button>
                                        </div>
                                    </form>
                                </div>

                                <button onclick="toggleSosmedEdit({{ $sosmed->id }})" class="text-blue-600 mt-1">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Kanan --}}
            <div class="md:col-span-2 space-y-4">
                <div class="flex justify-between items-center">
                    <h4 class="font-semibold">Address</h4>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded shadow"
                onclick="document.getElementById('addAddressForm').classList.remove('hidden')">
                + Add Address
            </button>
                </div>

                {{-- Form Add --}}
                <div id="addAddressForm" class="bg-white shadow rounded p-4 hidden">
                    <form action="{{ route('company-profile.store') }}" method="POST" class="grid md:grid-cols-2 gap-4">
                        @csrf
                        <input type="text" name="nama_tempat" class="border px-2 py-1 rounded"
                            placeholder="Nama Tempat" required>
                        <input type="text" name="lokasi" class="border px-2 py-1 rounded" placeholder="Lokasi"
                            required>
                        <div class="md:col-span-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded text-sm">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- List Address --}}
                @foreach ($companyProfiles as $profile)
                    <div class="bg-white shadow p-4 relative group">
                        <div id="address-display-{{ $profile->id }}">
                            <div class="font-semibold text-blue-700">{{ $profile->nama_tempat }}</div>
                            <div class="text-sm text-gray-600">{{ $profile->lokasi }}</div>
                        </div>

                        <form id="address-form-{{ $profile->id }}" class="hidden mt-2" method="POST"
                            action="{{ route('company-profile.update', $profile->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid md:grid-cols-2 gap-2">
                                <input type="text" name="nama_tempat" class="px-2 py-1 border rounded text-sm"
                                    value="{{ $profile->nama_tempat }}">
                                <input type="text" name="lokasi" class="px-2 py-1 border rounded text-sm"
                                    value="{{ $profile->lokasi }}">
                                <div class="flex gap-2">
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                        <i class="fas fa-save"></i>
                                    </button>
                                    <button type="button" onclick="cancelAddressEdit({{ $profile->id }})"
                                        class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="absolute top-2 right-2 flex gap-2 opacity-0 group-hover:opacity-100 transition">
                            <button onclick="editAddress({{ $profile->id }})" class="text-blue-600 text-sm">
                                <i class="fas fa-pen"></i>
                            </button>
                            <form id="delete-form-{{ $profile->id }}" method="POST"
                                action="{{ route('company-profile.destroy', $profile->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmDelete({{ $profile->id }})"
                                    class="text-red-600 text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        function editField(field) {
            document.getElementById(`${field}-display`).classList.add('hidden');
            document.getElementById(`${field}-form`).classList.remove('hidden');
        }

        function cancelEdit(field) {
            document.getElementById(`${field}-display`).classList.remove('hidden');
            document.getElementById(`${field}-form`).classList.add('hidden');
        }

        function toggleSosmedEdit(id) {
            document.getElementById(`sosmed-display-${id}`).classList.add('hidden');
            document.getElementById(`sosmed-form-${id}`).classList.remove('hidden');
        }

        function cancelSosmedEdit(id) {
            document.getElementById(`sosmed-display-${id}`).classList.remove('hidden');
            document.getElementById(`sosmed-form-${id}`).classList.add('hidden');
        }

        function editAddress(id) {
            document.getElementById(`address-display-${id}`).classList.add('hidden');
            document.getElementById(`address-form-${id}`).classList.remove('hidden');
        }

        function cancelAddressEdit(id) {
            document.getElementById(`address-display-${id}`).classList.remove('hidden');
            document.getElementById(`address-form-${id}`).classList.add('hidden');
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
    </script>

    {{-- SweetAlert Success & Error --}}
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

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
