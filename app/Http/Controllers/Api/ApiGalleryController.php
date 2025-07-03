<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class ApiGalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();

        return response()->json([

            'status' => 'success',
            'data' => $gallery

        ]);
    }
}
