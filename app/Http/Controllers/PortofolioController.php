<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\FotoPorto;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    // GET /portfolio
    public function index()
    {
        $portfolios = Portofolio::with('photos')->orderByDesc('portofolio_id')->paginate(10);
        $categories = Category::all();

        return view('portofolio.index', compact('portfolios', 'categories'));
    }

    // POST /portfolio/store
    public function store(Request $request)
    {
        $request->validate([
            'judul_porto'   => 'required|string|max:255',
            'category_id'   => 'required|integer|exists:category,category_id',
            'ket_porto'     => 'required|string',
            'foto.*'        => 'nullable|image|max:2048',
            'url_youtube'   => 'nullable|url'
        ]);

        $portfolio = Portofolio::create($request->only([
            'judul_porto', 'category_id', 'ket_porto', 'url_youtube'
        ]));

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('foto_porto', 'public');
                FotoPorto::create([
                    'nama_foto'  => $path,
                    'project_id' => $portfolio->portofolio_id
                ]);
            }
        }

        return back()->with('success', 'Portfolio berhasil ditambahkan');
    }

    // GET /portfolio/show/{id}
    public function show($id)
    {
        $portfolio = Portofolio::with('photos')->findOrFail($id);
        return response()->json($portfolio);
    }

    // POST /portfolio/update/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_porto'   => 'required|string|max:255',
            'category_id'   => 'required|integer|exists:category,category_id',
            'ket_porto'     => 'required|string',
            'foto.*'        => 'nullable|image|max:2048',
            'url_youtube'   => 'nullable|url'
        ]);

        $portfolio = Portofolio::with('photos')->findOrFail($id);

        $portfolio->update($request->only([
            'judul_porto', 'category_id', 'ket_porto', 'url_youtube'
        ]));

        // Jika ada foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            foreach ($portfolio->photos as $photo) {
                if (Storage::disk('public')->exists($photo->nama_foto)) {
                    Storage::disk('public')->delete($photo->nama_foto);
                }
                $photo->delete();
            }

            foreach ($request->file('foto') as $file) {
                $path = $file->store('foto_porto', 'public');
                FotoPorto::create([
                    'nama_foto'  => $path,
                    'project_id' => $portfolio->portofolio_id
                ]);
            }
        }

        return back()->with('success', 'Portfolio berhasil diperbarui');
    }

    // DELETE /portfolio/delete/{id}
    public function destroy($id)
    {
        $portfolio = Portofolio::with('photos')->findOrFail($id);

        foreach ($portfolio->photos as $photo) {
            if (Storage::disk('public')->exists($photo->nama_foto)) {
                Storage::disk('public')->delete($photo->nama_foto);
            }
            $photo->delete();
        }

        $portfolio->delete();

        return back()->with('success', 'Portfolio berhasil dihapus');
    }
}
