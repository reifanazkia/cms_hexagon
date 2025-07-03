<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ApiContactController extends Controller
{
    public function index()
    {

        $contact = Contact::all();

        return response()->json([

            'status' => 'success',
            'data' => $contact

        ]);

    }
}
