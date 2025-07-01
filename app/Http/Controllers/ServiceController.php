<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\service;

class ServiceController extends Controller
{
    public function index()
    {
        $benefits = service::all(); // ambil data dari tabel 'benefits'
        return view('service.service', compact('benefits')); // kirim ke blade
    }


    public function store(Request $request)
{
    foreach ($request->input('benefits', []) as $benefit) {
        service::create([
            'title' => $benefit['title'],
            'subtitle' => $benefit['subtitle'],
        ]);
    }

    return redirect()->back()->with('success', 'Benefits saved succesfully!');
}


    public function create()
    {
        return view('services.create'); // Buat view 'create' untuk form input
    }

    public function destroy($id)
    {
        $benefit = service::findOrFail($id);
        $benefit->delete();

        return redirect()->route('services.all')->with('success', 'Benefit deleted successfully.');
    }
}
