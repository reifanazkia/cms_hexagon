<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class ApiPortofolioController extends Controller
{
    public function index()
    {
        $porto = Portofolio::with('photos')->get();

        return response()->json([
            'status' => 'success',
            'data' => $porto
        ]);
    }

    public function show($id)
    {
        $porto = Portofolio::with('photos')->find($id);

        return response()->json([
            'status' => 'success',
            'data' => $porto
        ]);
    }
}
