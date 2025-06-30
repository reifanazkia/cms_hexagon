<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ClientsController extends Controller
{
    /** Tampilkan daftar client. */
    public function index()
    {
        $clients = Clients::latest()->get();
        return view('about.clients', compact('clients'));
    }

    /** Simpan client baru. */
    public function store(Request $request)
    {
        // 1. VALIDASI
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'status'      => 'required|in:0,1,2',
            'foto_client' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // 2. UPLOAD LOGO
        $fileName = Str::random(20) . '.' . $request->file('foto_client')->extension();
        $request->file('foto_client')->storeAs('public/logos', $fileName);

        // 3. SIMPAN DB
        Clients::create([
            'name'        => $validated['name'],
            'status'      => $validated['status'],
            'foto_client' => $fileName,
        ]);

        return redirect()-> back()->with('success', 'Client berhasil ditambahkan');
    }

    /** Update data client. */
    public function update(Request $request, Clients $client)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'status'      => 'required|in:0,1,2',
            'foto_client' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ganti logo jika ada file baru
        if ($request->hasFile('foto_client')) {
            // hapus logo lama
            if ($client->foto_client && Storage::exists('public/logos/' . $client->foto_client)) {
                Storage::delete('public/logos/' . $client->foto_client);
            }
            $fileName = Str::random(20) . '.' . $request->file('foto_client')->extension();
            $request->file('foto_client')->storeAs('public/logos', $fileName);
            $validated['foto_client'] = $fileName;
        }

        $client->update($validated);

        return redirect()-> back()->with('success', 'Client berhasil diperbarui');
    }

    /** Hapus client. */
    public function destroy(Clients $client)
    {
        // hapus logo di storage
        if ($client->foto_client && Storage::exists('public/logos/' . $client->foto_client)) {
            Storage::delete('public/logos/' . $client->foto_client);
        }
        $client->delete();

        return redirect()-> back()->with('success', 'Client berhasil dihapus');
    }
}
