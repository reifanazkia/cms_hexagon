<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:50',
            'link' => 'required|url|max:255',
        ]);

        Sosmed::updateOrCreate(
            ['nama' => $request->nama],
            ['link' => $request->link]
        );

        return back()->with('success', 'Akun sosial berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required|url|max:255',
        ]);

        $sosmed = Sosmed::findOrFail($id);
        $sosmed->update([
            'link' => $request->link,
        ]);

        return back()->with('success', 'Akun sosial berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sosmed = Sosmed::findOrFail($id);
        $sosmed->delete();

        return back()->with('success', 'Akun sosial berhasil dihapus.');
    }
}
