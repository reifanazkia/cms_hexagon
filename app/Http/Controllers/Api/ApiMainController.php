<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Main;
use Illuminate\Http\Request;

class ApiMainController extends Controller
{
    public function index()
    {
        $main = Main::all();

        return response()->json([

            'status' => 'success',
            'data' => $main

        ]);
    }

}
