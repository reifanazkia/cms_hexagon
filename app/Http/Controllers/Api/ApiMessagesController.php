<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\messages;
use Illuminate\Http\Request;

class ApiMessagesController extends Controller
{
    public function index()
    {
        $messages = messages::all();

        return response()->json([

            'status' => 'success',
            'data' => $messages


        ]);
    }


}
