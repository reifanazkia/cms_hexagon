<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use Illuminate\Http\Request;

class ApiReviewController extends Controller
{
    public function index()
    {
        $review = ClientReview::all();

        return response()->json([

            'status' => 'success',
            'data' => $review

        ]);
    }
}
