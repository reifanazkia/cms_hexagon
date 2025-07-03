<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutTeam;
use Illuminate\Http\Request;

class ApiAboutTeamController extends Controller
{
    public function index()
    {
        $team = AboutTeam::all();

        return response()->json([
            'status' => 'success',
            'data' => $team

        ]);
    }
}
