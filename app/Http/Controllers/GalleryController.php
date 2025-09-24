<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('about.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'image.*.required' => 'Pilih minimal satu gambar.',
            'image.*.image'    => 'File harus berupa gambar.',
            'image.*.mimes'    => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.*.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                // simpan ke storage/app/public/gallery
                $filePath = $file->store('team', 'public');

                // simpan path ke DB
                Gallery::create([
                    'image' => $filePath
                ]);
            }

            return back()->with('status', 'Berhasil menambahkan gambar.');
        }

        return back()->withErrors(['image' => 'Tidak ada gambar yang dipilih.']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ], [
            'image.required' => 'Pilih gambar untuk diupdate.',
            'image.image'    => 'File harus berupa gambar.',
            'image.mimes'    => 'Format gambar harus jpg, jpeg, png, atau webp.',
            'image.max'      => 'Ukuran gambar maksimal 5MB.',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            // hapus file lama kalau ada
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            // upload file baru
            $filePath = $request->file('image')->store('team', 'public');

            // update DB
            $gallery->update([
                'image' => $filePath
            ]);

            return back()->with('status', 'Gambar berhasil diperbarui.');
        }

        return back()->withErrors(['image' => 'Gagal menyimpan gambar baru.']);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // hapus file dari storage kalau ada
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        // hapus record dari DB
        $gallery->delete();

        return back()->with('status', 'Gambar berhasil dihapus.');
    }
}
