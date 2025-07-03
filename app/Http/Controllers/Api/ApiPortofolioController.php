<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class ApiPortofolioController extends Controller
{
    public function index()
    {
        $porto = Portofolio::all();

        return response()->json([

            'status' => 'success',
            'data' => $porto

        ]);
    }

    public function show($id)
    {
        $porto = Portofolio::find($id);

        return response()->json([

            'status' => 'success',
            'data' => $porto

        ]);
    }
}
