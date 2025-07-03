<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Value;
use Illuminate\Http\Request;

class ApiValueController extends Controller
{
    public function index()
    {
        $value = Value::all();

        return response()->json([

            'status' => 'success',
            'data' => $value

        ]);
    }
}
