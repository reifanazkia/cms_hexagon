@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
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

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Lamaran Pekerjaan</h2>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Buat Laporan PDF</a>
        </div>

        <form method="GET" class="flex flex-wrap gap-2 mb-4">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari berdasarkan nama, email, atau posisi..."
                class="flex-1 border p-2 rounded w-full md:w-1/3">
            <input type="date" name="start" value="{{ request('start') }}" class="border p-2 rounded w-full md:w-auto">
            <span class="self-center">s/d</span>
            <input type="date" name="end" value="{{ request('end') }}" class="border p-2 rounded w-full md:w-auto">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
        </form>

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Name</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Phone</th>
                        <th class="px-6 py-3">Position</th>
                        <th class="px-6 py-3">Applied At</th>
                        <th class="px-6 py-3 text-center">Dokumen</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($applications as $app)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-3">{{ $app->full_name }}</td>
                            <td class="px-6 py-3">{{ $app->email }}</td>
                            <td class="px-6 py-3">{{ $app->phone }}</td>
                            <td class="px-6 py-3">{{ $app->position }}</td>
                            <td class="px-6 py-3">
                                {{ \Carbon\Carbon::parse($app->created_at)->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-6 py-3 text-center">
                                @if ($app->resume_path && $app->resume_path !== '0')
                                    <a href="{{ url($app->resume_path) }}" target="_blank"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
                                        <i class="fas fa-eye mr-1"></i> Lihat Dokumen
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data lamaran ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $applications->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
