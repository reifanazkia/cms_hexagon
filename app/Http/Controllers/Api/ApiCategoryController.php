<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        return response()->json([

            'status' => 'success',
            'data' => $category

        ]);
    }
}
