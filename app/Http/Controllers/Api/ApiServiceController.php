<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    public function index()
    {
        $service = service::all();

        return response()->json([

            'status' => 'success',
            'data' => $service

        ]);
    }
}
