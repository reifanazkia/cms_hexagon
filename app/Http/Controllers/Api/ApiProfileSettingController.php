<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class ApiProfileSettingController extends Controller
{
    public function index()
    {
        $profile = Sosmed::all();

        return response()->json([

            'status' => 'success',
            'data' => $profile

        ]);
    }
}
