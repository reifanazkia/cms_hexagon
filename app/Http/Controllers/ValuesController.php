<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Value;

class ValuesController extends Controller
{
    /** Tampilkan halaman Value */
    public function index()
    {
        // 1 = Our Value, 2 = Work Value
        $ourValues  = Value::where('type', 1)->orderBy('id')->get();
        $workValues = Value::where('type', 2)->orderBy('id')->get();

        return view('about.values', compact('ourValues', 'workValues'));
    }

    /** Simpan semua perubahan (edit + tambah) sekaligus */
    public function updateMultiple(Request $request)
    {
        /* ------------ UPDATE DATA LAMA ------------ */
        if ($request->filled('values')) {
            foreach ($request->input('values') as $id => $val) {
                Value::where('id', $id)->update(['value' => $val]);
            }
        }

        /* ------------ TAMBAH DATA BARU ------------ */
        if ($request->filled('new_values')) {
            foreach ($request->input('new_values') as $payload) {
                // Lewati jika kosong
                if (empty(trim($payload['value'] ?? ''))) {
                    continue;
                }
                Value::create([
                    'type'  => $payload['type'],   // 1 atau 2
                    'value' => $payload['value'],
                ]);
            }
        }

        return back()->with('success', 'Data berhasil disimpan.');
    }

    /** (Opsional) simpan 1 data baru—dipakai jika Anda masih punya route store terpisah */
    public function store(Request $request)
    {
        $request->validate([
            'type'  => 'required|integer|in:1,2',
            'value' => 'required|string',
        ]);

        Value::create($request->only('type', 'value'));

        return back()->with('success', 'Value berhasil ditambahkan.');
    }

    /** Hapus satu baris */
    public function destroy($id)
    {
        Value::destroy($id);
        return back()->with('success', 'Value berhasil dihapus.');
    }
}
