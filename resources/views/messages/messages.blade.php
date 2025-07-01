@extends('layouts.app') {{-- Sesuaikan dengan layout kamu --}}

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">

        {{-- CARD 1: Judul --}}
        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <h2 class="text-2xl font-semibold">Messages</h2>
        </div>

        {{-- CARD 2: Tabel --}}
        <div class="bg-white shadow rounded-lg p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Full
                                Name</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Email
                            </th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">
                                Subject</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">
                                Message</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($messages as $message)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $message->fullName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $message->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $message->subject }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $message->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="mt-4 flex justify-center">
                    {{ $messages->links() }} {{-- Gunakan default pagination --}}
                </div>
            </div>
        </div>

    </div>
@endsection
