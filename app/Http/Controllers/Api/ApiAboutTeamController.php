<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutTeam;
use Illuminate\Http\Request;

class ApiAboutTeamController extends Controller
{
    /**
     * Tampilkan semua anggota tim
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $teams = AboutTeam::when($search, function ($q) use ($search) {
                $q->where('nama_orang', 'like', "%$search%")
                  ->orWhere('jabatan', 'like', "%$search%");
            })
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $teams
        ]);
    }

    /**
     * Tampilkan detail anggota tim
     */
    public function show($id)
    {
        $team = AboutTeam::find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Data anggota tim tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $team
        ]);
    }
}
