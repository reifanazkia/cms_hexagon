@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">News</h2>
        <button onclick="toggleModal('addModal', true)" class="bg-blue-600 text-white px-4 py-2 rounded">
            <i class="fas fa-plus mr-1"></i> Add News
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Kategori</th>
                    <th class="px-6 py-3">Keterangan</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y">
                @forelse ($news as $item)
                    <tr>
                        <td class="px-6 py-4 font-text-gray-800">{{ $item->judul_news }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $item->category_id }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ Str::limit($item->ket_news, 60) }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick='openDetailModal(@json($item))' class="text-gray-500 hover:text-blue-700"><i class="fas fa-eye"></i></button>
                                <button onclick='openEditModal(@json($item))' class="text-blue-600 hover:text-green-800"><i class="fas fa-pen"></i></button>
                                <form action="{{ route('news.destroy', $item->news_id) }}" method="POST" class="delete-form inline">@csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="py-4 text-center text-gray-400">No news found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div id="addModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-xl p-6 rounded shadow relative">
        <button onclick="toggleModal('addModal', false)" class="absolute top-2 right-2 text-xl text-gray-400">&times;</button>
        <form action="{{ route('news.store') }}" method="POST">@csrf
            <h2 class="text-lg font-bold mb-4">Add News</h2>

            <div class="mb-4">
                <label class="font-medium">Kategori (pilih satu / lebih):</label>
                <div class="flex flex-wrap gap-2 mt-1">
                    @foreach(['Keuangan','Teknologi','Politik','Olahraga','Ekonomi','Hiburan','Kesehatan','Sains','Pendidikan','Travel','Kuliner'] as $cat)
                        <label class="flex items-center gap-1 text-sm">
                            <input type="checkbox" name="category_id[]" value="{{ $cat }}" class="accent-blue-600">
                            {{ $cat }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input name="judul_news" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="ket_news" rows="3" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
            <div class="text-right">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-xl p-6 rounded shadow relative">
        <button onclick="toggleModal('editModal', false)" class="absolute top-2 right-2 text-xl text-gray-400">&times;</button>
        <form id="editForm" method="POST">@csrf @method('PUT')
            <h2 class="text-lg font-bold mb-4">Edit News</h2>

            <div class="mb-4">
                <label class="font-medium">Kategori:</label>
                <div id="edit_category_checkboxes" class="flex flex-wrap gap-2 mt-1">
                    @foreach(['Keuangan','Teknologi','Politik','Olahraga','Ekonomi','Hiburan','Kesehatan','Sains','Pendidikan','Travel','Kuliner'] as $cat)
                        <label class="flex items-center gap-1 text-sm">
                            <input type="checkbox" value="{{ $cat }}" class="edit-category-checkbox accent-blue-600" name="category_id[]">
                            {{ $cat }}
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label>Judul</label>
                <input id="edit_judul_news" name="judul_news" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-3">
                <label>Keterangan</label>
                <textarea id="edit_ket_news" name="ket_news" rows="3" class="w-full border px-3 py-2 rounded" required></textarea>
            </div>
            <div class="text-right">
                <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- DETAIL MODAL -->
<div id="detailModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
    <div class="bg-white w-full max-w-xl p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Detail News</h2>
        <p><strong>Kategori:</strong> <span id="detail_kategori"></span></p>
        <p class="mt-2"><strong>Judul:</strong> <span id="detail_judul"></span></p>
        <p class="mt-2"><strong>Keterangan:</strong> <span id="detail_ket"></span></p>
        <div class="text-right mt-4">
            <button onclick="toggleModal('detailModal', false)" class="bg-blue-600 text-white px-4 py-1 rounded">Tutup</button>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function toggleModal(id, show = true) { document.getElementById(id).classList.toggle('hidden', !show); }

    function openEditModal(d){
        toggleModal('editModal', true);
        document.getElementById('edit_judul_news').value = d.judul_news;
        document.getElementById('edit_ket_news').value = d.ket_news;
        document.getElementById('editForm').action = `/news/${d.news_id}`;

        const selected = d.category_id.split(',').map(c=>c.trim());
        document.querySelectorAll('.edit-category-checkbox').forEach(cb=>{
            cb.checked = selected.includes(cb.value);
        });
    }

    function openDetailModal(d){
        document.getElementById('detail_kategori').textContent = d.category_id;
        document.getElementById('detail_judul').textContent    = d.judul_news;
        document.getElementById('detail_ket').textContent      = d.ket_news;
        toggleModal('detailModal', true);
    }

    // SweetAlert delete
    document.querySelectorAll('.delete-form').forEach(f=>{
        f.addEventListener('submit',e=>{
            e.preventDefault();
            Swal.fire({
                title:'Hapus data?', text:'Data tidak bisa dikembalikan!',
                icon:'warning', showCancelButton:true,
                confirmButtonColor:'#e3342f', cancelButtonColor:'#6c757d',
                confirmButtonText:'Ya, hapus!'
            }).then(r=>{ if(r.isConfirmed) f.submit(); });
        });
    });

    @if(session('success'))
        Swal.fire({ icon:'success', title:'Berhasil', text:'{{ session("success") }}', timer:2000, showConfirmButton:false });
    @endif
</script>
@endsection
