<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class ApiCareerController extends Controller
{
    public function index()
    {
        $career = Career::all();

        return response()->json([

            'status' => 'success',
            'data' => $career

        ]);
    }

     public function show($id)
    {
        $career = Career::find($id);

        if (!$career) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $career
        ]);
    }
}
