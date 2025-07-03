<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use Illuminate\Http\Request;

class ApiClientsController extends Controller
{
    public function index()
    {
        $clients = Clients::all();

        return response()-> json([

            'status' => 'success',
            'data' => $clients

        ]);
    }
}
