<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetailPricing;

class ApiDetailPricingController extends Controller
{
    /**
     * GET /api/detail-pricings
     * Ambil semua detail pricing beserta relasi pricing.
     */
    public function index()
    {
        $details = DetailPricing::with('pricing')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List data detail pricing',
            'data'    => $details,
        ]);
    }

    /**
     * GET /api/detail-pricings/{id}
     * Ambil detail satu record detail pricing.
     */
    public function show($id)
    {
        $detail = DetailPricing::with('pricing')->find($id);

        if (!$detail) {
            return response()->json([
                'success' => false,
                'message' => 'Detail pricing tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail data pricing',
            'data'    => $detail,
        ]);
    }
}
