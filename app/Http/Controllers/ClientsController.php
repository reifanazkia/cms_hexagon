<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1,2',
            'foto_client' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('foto_client');
        $fileName = Str::random(20) . '.' . $file->extension();

        // simpan file langsung ke public/storage/foto_client
        $destination = public_path('storage/foto_client');
        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        $file->move($destination, $fileName);

        Clients::create([
            'name' => $request->name,
            'status' => $request->status,
            'foto_client' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Client berhasil ditambahkan');
    }

    /** Update data client. */
    public function update(Request $request, Clients $client)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'status'      => 'required|in:0,1,2',
            'foto_client' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto_client')) {
            // Hapus file lama
            $oldFile = public_path('storage/foto_client/' . $client->foto_client);
            if (File::exists($oldFile)) {
                File::delete($oldFile);
            }

            // Simpan file baru
            $file = $request->file('foto_client');
            $fileName = Str::random(20) . '.' . $file->extension();

            $destination = public_path('storage/foto_client');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file->move($destination, $fileName);
            $validated['foto_client'] = $fileName;
        }

        $client->update($validated);

        return redirect()->back()->with('success', 'Client berhasil diperbarui');
    }

    /** Hapus client. */
    public function destroy(Clients $client)
    {
        $file = public_path('storage/foto_client/' . $client->foto_client);
        if (File::exists($file)) {
            File::delete($file);
        }

        $client->delete();

        return redirect()->back()->with('success', 'Client berhasil dihapus');
    }
}
