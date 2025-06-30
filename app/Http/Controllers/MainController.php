<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class MainController extends Controller
{
    public function index()
    {
        $main = Main::first(); // ambil satu-satunya baris dari tabel about
        return view('about.main', compact('main')); // kirim ke blade
    }

    public function update(Request $request)
    {
        $request->validate([
            'youtube_url'     => 'nullable|string',
            'journey_title'   => 'nullable|string',
            'journey_text_1'  => 'nullable|string',
            'journey_text_2'  => 'nullable|string',
            'philosophy'      => 'nullable|string',
        ]);

        $main = Main::first(); // ambil baris yang akan diperbarui

        $main->update($request->only([
            'youtube_url',
            'journey_title',
            'journey_text_1',
            'journey_text_2',
            'philosophy',
        ]));

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
