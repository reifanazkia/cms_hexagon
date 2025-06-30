<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisionMission;

class VisionMissionController extends Controller
{
    public function index()
    {
        // Ambil berdasarkan angka type
        $vision  = VisionMission::where('type', 1)->first();
        $mission = VisionMission::where('type', 2)->first();

        return view('about.vision_mission', compact('vision', 'mission'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'vision'  => 'required|string',
            'mission' => 'required|string',
        ]);

        // Update or insert vision
        VisionMission::updateOrCreate(
            ['type' => 1],
            ['value' => $request->vision]
        );

        // Update or insert mission
        VisionMission::updateOrCreate(
            ['type' => 2],
            ['value' => $request->mission]
        );

        return redirect()->back()->with('success', 'Vision & Mission berhasil diperbarui.');
    }
}
