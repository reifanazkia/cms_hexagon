<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    public function index()
    {
        $review = ClientReview::orderBy('id', 'desc')->get();
        return view('review.index', compact('review'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'dari'   => 'required|string|max:255',
            'review' => 'required|string',
            'foto'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = '';
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('client_review'), $filename);
        }

        ClientReview::create([
            'nama'   => $request->nama,
            'dari'   => $request->dari,
            'review' => $request->review,
            'foto'   => $filename ? 'client_review/' . $filename : '', // string kosong untuk mengtidak wajib kan mengisi foto
        ]);

        return redirect()->back()->with('success', 'Review Berhasil Ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $review = ClientReview::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'dari'   => 'required|string|max:255',
            'review' => 'required|string',
            'foto'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = $review->foto; // Default: pakai yang lama

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($review->foto && file_exists(public_path($review->foto))) {
                File::delete(public_path($review->foto));
            }

            $file = $request->file('foto');
            $newFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('client_review'), $newFile);
            $filename = 'client_review/' . $newFile;
        }

        $review->update([
            'nama'   => $request->nama,
            'dari'   => $request->dari,
            'review' => $request->review,
            'foto'   => $filename,
        ]);

        return redirect()->back()->with('success', 'Review Berhasil Diubah');
    }

    public function destroy(string $id)
    {
        $review = ClientReview::findOrFail($id);

        if ($review->foto && file_exists(public_path($review->foto))) {
            File::delete(public_path($review->foto));
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }
}
