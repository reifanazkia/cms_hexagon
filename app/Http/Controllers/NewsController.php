<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Tampilkan semua berita.
     */
    public function index()
    {
        $news = News::with('fotos')->latest()->get();
        return view('news.index', compact('news'));
    }

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_news'   => 'required|string|max:255',
            'ket_news'     => 'required|string',
            'category_id'  => 'required|array',   // karena checkbox multiple
            'category_id.*'=> 'string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5000',
        ]);

        // Gabungkan kategori array → string
        $categories = implode(',', $request->category_id);

        // Simpan data news
        $news = News::create([
            'judul_news'  => $request->judul_news,
            'ket_news'    => $request->ket_news,
            'category_id' => $categories,
        ]);

        // Simpan foto (jika ada)
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            if ($foto->isValid()) {
                $filename = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
                $filePath = $foto->storeAs('news', $filename, 'public');

                $news->fotos()->create([
                    'nama_foto' => $filePath,
                ]);
            }
        }

        return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail berita.
     */
    public function show($id)
    {
        $news = News::with('fotos')->findOrFail($id);
        return response()->json($news);
    }

    /**
     * Update berita.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_news'   => 'required|string|max:255',
            'ket_news'     => 'required|string',
            'category_id'  => 'required|array',
            'category_id.*'=> 'string',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5000',
        ]);

        $news = News::with('fotos')->findOrFail($id);

        // Gabungkan kategori array → string
        $categories = implode(',', $request->category_id);

        $news->update([
            'judul_news'  => $request->judul_news,
            'ket_news'    => $request->ket_news,
            'category_id' => $categories,
        ]);

        // Jika ada foto baru, hapus lama & simpan baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            foreach ($news->fotos as $foto) {
                Storage::disk('public')->delete($foto->nama_foto);
                $foto->delete();
            }

            // Simpan foto baru
            $file = $request->file('foto');
            if ($file->isValid()) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('news', $filename, 'public');

                $news->fotos()->create([
                    'nama_foto' => $filePath,
                ]);
            }
        }

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Hapus berita.
     */
    public function destroy($id)
    {
        $news = News::with('fotos')->findOrFail($id);

        // Hapus semua foto dari storage & DB
        foreach ($news->fotos as $foto) {
            Storage::disk('public')->delete($foto->nama_foto);
            $foto->delete();
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus.');
    }
}
