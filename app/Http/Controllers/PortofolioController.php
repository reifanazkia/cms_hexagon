<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\FotoPorto;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    /* GET /portfolio */
    public function index()
    {
        $portfolios = Portofolio::with('photos')->orderByDesc('portofolio_id')->paginate(10);
        $categories = Category::all();          // untuk dropdown Add / Edit

        return view('portofolio.index', compact('portfolios', 'categories'));
    }

    /* POST /portfolio/store */
    public function store(Request $request)
    {
        $request->validate([
            'judul_porto'   => 'required|string|max:255',
            'category_id'   => 'required|integer|exists:category,category_id',
            'ket_porto'     => 'required|string',
            'foto.*'        => 'nullable|image|max:2048',
            'url_youtube'   => 'nullable|url'
        ]);

        $porto = Portofolio::create($request->only([
            'judul_porto', 'category_id', 'ket_porto', 'url_youtube'
        ]));

        /* simpan seluruh foto */
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('foto_porto', 'public');   // storage/app/public/foto_porto
                FotoPorto::create([
                    'nama_foto' => $path,
                    'project_id'=> $porto->portofolio_id
                ]);
            }
        }

        return back()->with('success', 'Portfolio berhasil ditambahkan');
    }

    /* GET /portfolio/show/{id} –– untuk modal Detail & Edit (JSON) */
    public function show($id)
    {
        return Portofolio::with('photos')->findOrFail($id);
    }

    /* POST /portfolio/update/{id} */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_porto' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:category,category_id',
            'ket_porto'   => 'required|string',
            'foto.*'      => 'nullable|image|max:2048',
            'url_youtube' => 'nullable|url'
        ]);

        $porto = Portofolio::findOrFail($id);
        $porto->update($request->only([
            'judul_porto', 'category_id', 'ket_porto', 'url_youtube', 'url'
        ]));

        /* tambah foto baru (jika ada) */
        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $file) {
                $path = $file->store('foto_porto', 'public');
                FotoPorto::create([
                    'nama_foto' => $path,
                    'project_id'=> $porto->portofolio_id
                ]);
            }
        }

        return back()->with('success', 'Portfolio berhasil diperbarui');
    }

    /* DELETE /portfolio/delete/{id} */
    public function destroy($id)
    {
        $porto = Portofolio::with('photos')->findOrFail($id);

        /* hapus file-foto fisik */
        foreach ($porto->photos as $photo) {
            Storage::disk('public')->delete($photo->nama_foto);
            $photo->delete();
        }

        $porto->delete();

        return back()->with('success', 'Portfolio berhasil dihapus');
    }
}
