<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('career.index', compact('careers'));
    }

    public function show($id)
    {
        $career = Career::findOrFail($id);
        return response()->json([
            'id' => $career->id,
            'lowong_krj' => $career->lowong_krj,
            'tipe' => $career->tipe,
            'ket_lowong' => $career->ket_lowong, // ini sudah array karena di-cast di model
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lowong_krj' => 'required|string|max:255',
            'tipe'       => 'required|string|max:255',
        ]);

        Career::create([
            'lowong_krj' => $request->lowong_krj,
            'tipe'       => $request->tipe,
            'ket_lowong' => [
                'ringkasan'   => $request->ringkasan,
                'klasifikasi' => $request->klasifikasi ?? [],
                'deskripsi'   => $request->deskripsi ?? [],
                'skillsets'   => $request->skillsets ?? [],
                'pengalaman'  => $request->pengalaman,
                'jam_kerja'   => $request->jam_kerja,
                'hari_kerja'  => $request->hari_kerja,
                'lokasi'      => $request->lokasi,
            ]
        ]);

         return redirect()->route('career.index')->with('success', 'Data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'lowong_krj' => 'required|string|max:255',
            'tipe'       => 'required|string|max:255',
        ]);

        $career = Career::findOrFail($id);
        $career->update([
            'lowong_krj' => $request->lowong_krj,
            'tipe'       => $request->tipe,
            'ket_lowong' => [
                'ringkasan'   => $request->ringkasan,
                'klasifikasi' => $request->klasifikasi ?? [],
                'deskripsi'   => $request->deskripsi ?? [],
                'skillsets'   => $request->skillsets ?? [],
                'pengalaman'  => $request->pengalaman,
                'jam_kerja'   => $request->jam_kerja,
                'hari_kerja'  => $request->hari_kerja,
                'lokasi'      => $request->lokasi,
            ]
        ]);

         return redirect()->route('career.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();

        return redirect()->route('career.index')->with('success', 'Data berhasil dihapus');

    }
}
