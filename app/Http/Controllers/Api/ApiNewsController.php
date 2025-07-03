<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ApiNewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return response()->json([

            'status' => 'success',
            'data' => $news

        ]);

    }

    public function show($id)
    {
        $news = News::find($id);

        return response()->json([

            'status' => 'success',
            'data' => $news

        ]);

    }
}
