<?php

namespace App\Http\Controllers;

use App\Models\DetailPricing;
use App\Models\Pricing;
use Illuminate\Http\Request;

class DetailPricingController extends Controller
{
    public function index()
    {
        $details = DetailPricing::with('pricing')->latest()->get();
        $pricings = Pricing::all();
        return view('detail-pricings.index', compact('details', 'pricings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pricings' => 'nullable|exists:pricings,id',
            'name'        => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'status'      => 'required|string|max:50',
        ]);

        DetailPricing::create($request->all());

        return redirect()->back()->with('success', 'Detail Pricing berhasil ditambahkan!');
    }

    public function show($id)
    {
        $detail = DetailPricing::with('pricing')->findOrFail($id);
        return response()->json($detail);
    }

    public function edit($id)
    {
        $detail = DetailPricing::findOrFail($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id)
    {
        $detail = DetailPricing::findOrFail($id);

        $request->validate([
            'id_pricings' => 'nullable|exists:pricings,id',
            'name'        => 'required|string|max:255',
            'deskripsi'   => 'nullable|string',
            'status'      => 'required|string|max:50',
        ]);

        $detail->update($request->all());

        return redirect()->back()->with('success', 'Detail Pricing berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $detail = DetailPricing::findOrFail($id);
        $detail->delete();

        return redirect()->back()->with('success', 'Detail Pricing berhasil dihapus!');
    }
}
