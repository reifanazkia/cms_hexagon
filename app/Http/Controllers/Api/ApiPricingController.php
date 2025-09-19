<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pricing;

class ApiPricingController extends Controller
{
    /**
     * GET /api/pricings
     * Ambil semua data pricing.
     */
    public function index()
    {
        $pricings = Pricing::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List data pricing',
            'data'    => $pricings,
        ]);
    }

    /**
     * GET /api/pricings/{id}
     * Ambil detail satu data pricing.
     */
    public function show($id)
    {
        $pricing = Pricing::find($id);

        if (!$pricing) {
            return response()->json([
                'success' => false,
                'message' => 'Data pricing tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data pricing',
            'data'    => $pricing,
        ]);
    }
}
