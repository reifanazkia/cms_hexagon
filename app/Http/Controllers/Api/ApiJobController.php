<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class ApiJobController extends Controller
{
    public function index()
    {
        $job = Job::all();

        return response()->json([
            'status' => 'success',
            'data' => $job

        ]);
    }
}
