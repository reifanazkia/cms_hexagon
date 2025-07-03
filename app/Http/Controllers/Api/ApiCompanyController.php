<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class ApiCompanyController extends Controller
{
    public function index()
    {
        $company = Alamat::all();

        return response()->json([

            'status' => 'success',
            'data' => $company

        ]);
    }
}
