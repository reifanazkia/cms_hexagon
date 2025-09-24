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
            'foto'          => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
            'url_youtube'   => 'nullable|url'
        ]);

        $portfolio = Portofolio::create($request->only([
            'judul_porto', 'category_id', 'ket_porto', 'url_youtube'
        ]));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // // pastikan folder ada
            // Storage::makeDirectory('porto', 'public');


        if ($request->hasFile('foto')) {
            $filePath = $request->file('foto')->store('porto', 'public');
        } else {
            $filePath = null;

        }

            FotoPorto::create([
                'nama_foto'  =>  $filePath, // untuk akses via URL
                'project_id' => $portfolio->portofolio_id
            ]);
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
        'foto'          => 'nullable|mimes:jpg,jpeg,png,webp|max:2048',
        'url_youtube'   => 'nullable|url'
    ]);

    $portfolio = Portofolio::with('photos')->findOrFail($id);

    $portfolio->update($request->only([
        'judul_porto', 'category_id', 'ket_porto', 'url_youtube'
    ]));

    if ($request->hasFile('foto')) {
        // hapus foto lama
        foreach ($portfolio->photos as $photo) {
            if (Storage::disk('public')->exists($photo->nama_foto)) {
                Storage::disk('public')->delete($photo->nama_foto);
            }
            $photo->delete();
        }

        // upload foto baru
        $filePath = $request->file('foto')->store('porto', 'public');

        FotoPorto::create([
            'nama_foto'  => $filePath, // simpan path sama seperti di store()
            'project_id' => $portfolio->portofolio_id
        ]);
    }

    return back()->with('success', 'Portfolio berhasil diperbarui');
}


    // DELETE /portfolio/delete/{id}
    public function destroy($id)
    {
        $portfolio = Portofolio::with('photos')->findOrFail($id);

        foreach ($portfolio->photos as $photo) {
            $oldPath = str_replace('storage/', 'public/', $photo->nama_foto);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
            $photo->delete();
        }

        $portfolio->delete();

        return back()->with('success', 'Portfolio berhasil dihapus');
    }
}
