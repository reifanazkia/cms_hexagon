@extends('layouts.app')

@section('content')
    <div class="p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Career</h2>
            <button onclick="document.getElementById('addForm').classList.toggle('hidden')"
                class="bg-blue-600 text-white px-4 py-1 rounded">
                <i class="fas fa-plus mr-1"></i> Add New Career
            </button>
        </div>

        <!-- Search -->
        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <input type="text" placeholder="Search team members..."
                class="w-full md:w-1/2 px-4 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Job Type</th>
                        <th class="px-6 py-3">Position</th>
                        <th class="px-6 py-3">Description</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 divide-y">
                    @foreach ($careers as $career)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $career->tipe }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $career->lowong_krj }}</td>
                            <td class="px-6 py-4 max-w-xl">{{ Str::limit($career->ket_lowong['ringkasan'] ?? '-', 150) }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-3">
                                    <button onclick='openDetailModal(@json($career))'
                                        class="text-gray-500 hover:text-blue-600" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    <button onclick='openEditModal(@json($career))'
                                        class="text-blue-600 hover:text-blue-800" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                    <form action="{{ route('career.destroy', $career->id) }}" method="POST"
                                        class="inline delete-form">
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
                    @if ($careers->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-400">No career data found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Career Modal -->
    <div id="addForm" class="hidden mb-6 bg-white p-6 rounded-lg shadow-lg border">
        <form method="POST" action="{{ route('career.store') }}" enctype="multipart/form-data"
            class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf

            <div class="mb-4">
                <label class="block font-medium mb-1">Job Type</label>
                <select name="tipe" required class="w-full border px-3 py-2 rounded">
                    <option value="">Select job type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Position Title</label>
                <input type="text" name="lowong_krj" required placeholder="e.g. Senior Software Engineer"
                    class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Ringkasan</label>
                <input type="text" name="ringkasan" class="w-full border px-3 py-2 rounded"
                    placeholder="Ringkasan pekerjaan">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Klasifikasi</label>
                <div id="klasifikasiWrapper">
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="klasifikasi[]" class="w-full border px-3 py-2 rounded"
                            placeholder="Masukkan klasifikasi">
                        <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
                    </div>
                </div>
                <button type="button" onclick="addTextField('klasifikasiWrapper','klasifikasi[]')"
                    class="text-blue-600 text-sm">+ Add Klasifikasi</button>
            </div>

            <div class="mb-4 md:col-span-2">
                <label class="block font-medium mb-1">Deskripsi</label>
                <div id="deskripsiWrapper">
                    <div class="flex gap-2 mb-2">
                        <textarea name="deskripsi[]" class="w-full border px-3 py-2 rounded" placeholder="Masukkan deskripsi"></textarea>
                        <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
                    </div>
                </div>
                <button type="button" onclick="addTextareaField('deskripsiWrapper','deskripsi[]')"
                    class="text-blue-600 text-sm mt-2">+ Add Deskripsi</button>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Skillsets</label>
                <div id="skillWrapper">
                    <div class="flex gap-2 mb-2">
                        <input type="text" name="skillsets[]" class="w-full border px-3 py-2 rounded"
                            placeholder="Masukkan skill">
                        <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
                    </div>
                </div>
                <button type="button" onclick="addTextField('skillWrapper','skillsets[]')"
                    class="text-blue-600 text-sm">+ Add Skillset</button>
            </div>


            <div class="mb-4">
                <label class="block font-medium mb-1">Pengalaman</label>
                <input type="text" name="pengalaman" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. 1-3 tahun">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Jam Kerja</label>
                <input type="text" name="jam_kerja" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. 08.00 - 16.00 WIB">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Hari Kerja</label>
                <input type="text" name="hari_kerja" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Senin-Sabtu">
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-1">Lokasi</label>
                <input type="text" name="lokasi" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Cigugur Tengah">
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('addForm').classList.add('hidden')"
                    class="px-4 py-2 rounded border border-gray-400 text-gray-700 hover:bg-gray-100">Cencel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
    </div>

    <!-- Edit Career Inline Form -->
    <div id="editForm" class="hidden mb-6 bg-white p-6 rounded-lg shadow-lg border">
        <form method="POST" id="editCareerForm" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="edit_id">

            <div class="mb-4">
                <label class="block font-medium mb-1">Job Type</label>
                <select name="tipe" id="edit_tipe" required class="w-full border px-3 py-2 rounded">
                    <option value="">Select job type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Position Title</label>
                <input type="text" name="lowong_krj" id="edit_lowong_krj" required
                    placeholder="e.g. Senior Software Engineer" class="w-full border px-3 py-2 rounded">
            </div>

            <div class="mb-4 md:col-span-2">
                <label class="block font-medium mb-1">Ringkasan</label>
                <input type="text" name="ringkasan" id="edit_ringkasan" class="w-full border px-3 py-2 rounded"
                    placeholder="Ringkasan pekerjaan">
            </div>

            <div class="mb-4 md:col-span-2">
                <label class="block font-medium mb-1">Klasifikasi</label>
                <div id="editKlasifikasiWrapper" class="space-y-2">
                    <!-- Dynamic field will appear here -->
                </div>
                <button type="button" onclick="addTextField('editKlasifikasiWrapper','klasifikasi[]')"
                    class="text-blue-600 text-sm mt-2">+ Add Klasifikasi</button>
            </div>


            <div class="mb-4 md:col-span-2">
                <label class="block font-medium mb-1">Deskripsi</label>
                <div id="editDeskripsiWrapper" class="space-y-2">
                    <!-- Dynamic field will appear here -->
                </div>
                <button type="button" onclick="addTextareaField('editDeskripsiWrapper','deskripsi[]')"
                    class="text-blue-600 text-sm mt-2">+ Add Deskripsi</button>
            </div>


            <div class="mb-4 md:col-span-2">
                <label class="block font-medium mb-1">Skillsets</label>
                <div id="editSkillWrapper" class="space-y-2">
                    <!-- Dynamic field will appear here -->
                </div>
                <button type="button" onclick="addTextField('editSkillWrapper','skillsets[]')"
                    class="text-blue-600 text-sm mt-2">+ Add Skillset</button>
            </div>


            <div class="mb-4">
                <label class="block font-medium mb-1">Pengalaman</label>
                <input type="text" name="pengalaman" id="edit_pengalaman" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. 1-3 tahun">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Jam Kerja</label>
                <input type="text" name="jam_kerja" id="edit_jam_kerja" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. 08.00 - 16.00 WIB">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Hari Kerja</label>
                <input type="text" name="hari_kerja" id="edit_hari_kerja" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Senin-Sabtu">
            </div>

            <div class="mb-6">
                <label class="block font-medium mb-1">Lokasi</label>
                <input type="text" name="lokasi" id="edit_lokasi" class="w-full border px-3 py-2 rounded"
                    placeholder="e.g. Cigugur Tengah">
            </div>

            <div class="flex justify-end gap-3 col-span-2">
                <button type="button" onclick="document.getElementById('editForm').classList.add('hidden')"
                    class="px-4 py-2 rounded border border-gray-400 text-gray-700 hover:bg-gray-100">Cancel</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save
                    Changes</button>
            </div>
        </form>
    </div>


    <!-- Modal Detail -->
    <div id="detailModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <div class="bg-white w-full max-w-3xl p-6 rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <h2 class="text-xl font-bold text-blue-700 mb-4">Career Detail</h2>
            <div class="grid md:grid-cols-2 gap-4 text-sm">
                <div>
                    <h4 class="font-semibold">Ringkasan</h4>
                    <p id="detail_ringkasan" class="text-gray-700"></p>
                </div>
                <div>
                    <h4 class="font-semibold">Pengalaman</h4>
                    <p id="detail_pengalaman"></p>
                    <h4 class="font-semibold mt-2">Jam Kerja</h4>
                    <p id="detail_jam_kerja"></p>
                    <h4 class="font-semibold mt-2">Hari Kerja</h4>
                    <p id="detail_hari_kerja"></p>
                    <h4 class="font-semibold mt-2">Lokasi</h4>
                    <p id="detail_lokasi"></p>
                </div>
                <div class="md:col-span-2">
                    <h4 class="font-semibold mt-4">Klasifikasi</h4>
                    <ul id="detail_klasifikasi" class="list-disc ml-5 text-gray-700"></ul>
                    <h4 class="font-semibold mt-4">Deskripsi</h4>
                    <ul id="detail_deskripsi" class="list-disc ml-5 text-gray-700"></ul>
                    <h4 class="font-semibold mt-4">Skillsets</h4>
                    <ul id="detail_skillsets" class="list-disc ml-5 text-gray-700"></ul>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button onclick="closeDetailModal()"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Close</button>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function openEditModal(data) {
            const form = document.getElementById('editCareerForm');
            form.action = `{{ route('career.update', ':id') }}`.replace(':id', data.id);

            document.getElementById('edit_id').value = data.id;
            document.getElementById('edit_tipe').value = data.tipe || '';
            document.getElementById('edit_lowong_krj').value = data.lowong_krj || '';
            document.getElementById('edit_ringkasan').value = data.ket_lowong?.ringkasan || '';
            document.getElementById('edit_pengalaman').value = data.ket_lowong?.pengalaman || '';
            document.getElementById('edit_jam_kerja').value = data.ket_lowong?.jam_kerja || '';
            document.getElementById('edit_hari_kerja').value = data.ket_lowong?.hari_kerja || '';
            document.getElementById('edit_lokasi').value = data.ket_lowong?.lokasi || '';

            // Klasifikasi
            const klasifikasiWrapper = document.getElementById('editKlasifikasiWrapper');
            klasifikasiWrapper.innerHTML = '';
            (data.ket_lowong?.klasifikasi || ['']).forEach(value => {
                klasifikasiWrapper.innerHTML += `
            <div class="flex gap-2 mb-2">
                <input type="text" name="klasifikasi[]" class="w-full border px-3 py-2 rounded" value="${value}" placeholder="Masukkan klasifikasi">
                <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
            </div>
        `;
            });

            // Deskripsi
            const deskripsiWrapper = document.getElementById('editDeskripsiWrapper');
            deskripsiWrapper.innerHTML = '';
            (data.ket_lowong?.deskripsi || ['']).forEach(value => {
                deskripsiWrapper.innerHTML += `
            <div class="flex gap-2 mb-2">
                <textarea name="deskripsi[]" class="w-full border px-3 py-2 rounded" placeholder="Masukkan deskripsi">${value}</textarea>
                <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
            </div>
        `;
            });

            // Skillsets
            const skillWrapper = document.getElementById('editSkillWrapper');
            skillWrapper.innerHTML = '';
            (data.ket_lowong?.skillsets || ['']).forEach(value => {
                skillWrapper.innerHTML += `
            <div class="flex gap-2 mb-2">
                <input type="text" name="skillsets[]" class="w-full border px-3 py-2 rounded" value="${value}" placeholder="Masukkan skill">
                <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
            </div>
        `;
            });

            document.getElementById('editForm').classList.remove('hidden');
        }
    </script>



    <script>
        function openDetailModal(data) {
            const ket = data.ket_lowong || {};

            document.getElementById('detail_ringkasan').innerText = ket.ringkasan || '-';
            document.getElementById('detail_pengalaman').innerText = ket.pengalaman || '-';
            document.getElementById('detail_jam_kerja').innerText = ket.jam_kerja || '-';
            document.getElementById('detail_hari_kerja').innerText = ket.hari_kerja || '-';
            document.getElementById('detail_lokasi').innerText = ket.lokasi || '-';

            function populateList(id, items) {
                const el = document.getElementById(id);
                el.innerHTML = '';
                (items || []).forEach(i => {
                    el.innerHTML += `<li>${i}</li>`;
                });
            }

            populateList('detail_klasifikasi', ket.klasifikasi);
            populateList('detail_deskripsi', ket.deskripsi);
            populateList('detail_skillsets', ket.skillsets);

            const modal = document.getElementById('detailModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDetailModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>



    <script>
        // Tambah konfirmasi SweetAlert pada tombol delete
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah kamu yakin?',
                        text: "Data akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    <script>
        function addTextField(wrapperId, inputName) {
            const wrapper = document.getElementById(wrapperId);
            const div = document.createElement('div');
            div.classList.add('flex', 'gap-2', 'mb-2');
            div.innerHTML = `
            <input type="text" name="${inputName}" class="w-full border px-3 py-2 rounded" placeholder="Masukkan data">
            <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
        `;
            wrapper.appendChild(div);
        }

        function addTextareaField(wrapperId, inputName) {
            const wrapper = document.getElementById(wrapperId);
            const div = document.createElement('div');
            div.classList.add('flex', 'gap-2', 'mb-2');
            div.innerHTML = `
            <textarea name="${inputName}" class="w-full border px-3 py-2 rounded" placeholder="Masukkan deskripsi"></textarea>
            <button type="button" onclick="removeField(this)" class="text-red-500">Remove</button>
        `;
            wrapper.appendChild(div);
        }

        function removeField(button) {
            button.parentElement.remove();
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tambahkan konfirmasi sebelum submit addForm
            const addForm = document.querySelector('form[action="{{ route('career.store') }}"]');
            if (addForm) {
                addForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Simpan Data?',
                        text: "Pastikan data sudah sesuai.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, simpan',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            addForm.submit();
                        }
                    });
                });
            }

            // Tambahkan konfirmasi sebelum submit editForm
            const editForm = document.getElementById('editCareerForm');
            if (editForm) {
                editForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Update Data?',
                        text: "Yakin ingin memperbarui data ini?",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, update',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            editForm.submit();
                        }
                    });
                });
            }
        });
    </script>
@endsection
