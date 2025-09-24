<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;


class ServiceController extends Controller
{
    public function index()
    {
        $benefits = Service::all(); // ambil data dari tabel 'benefits'
        return view('service.service', compact('benefits')); // kirim ke blade
    }


    public function store(Request $request)
{
    foreach ($request->input('benefits', []) as $benefit) {
        Service::create([
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
        $benefit = Service::findOrFail($id);
        $benefit->delete();

        return redirect()->route('services.all')->with('success', 'Benefit deleted successfully.');
    }
}
