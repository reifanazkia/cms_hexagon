<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('about.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gallery'), $filename);

                Gallery::create(['image' => $filename]);
            }
        }

        return back()->with('status', 'Gambar berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $oldPath = public_path('gallery/' . $gallery->image);
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('gallery'), $filename);

        $gallery->update(['image' => $filename]);

        return back()->with('status', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus file dari folder public/gallery
        $filePath = public_path('gallery/' . $gallery->image);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Hapus data dari database
        $gallery->delete();

        return redirect()->back()->with('status', 'Gambar berhasil dihapus.');
    }
}
