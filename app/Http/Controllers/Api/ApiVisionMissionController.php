<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class ApiVisionMissionController extends Controller
{
    public function index()
    {
        $vision = VisionMission::all();

        return response()->json([

            'status' => 'success',
            'data' => $vision

        ]);
    }
}
