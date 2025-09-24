<?php

namespace App\Http\Controllers;

use App\Models\AboutTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutTeamController extends Controller
{
    /** LIST */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $teams = AboutTeam::when($search, function ($q) use ($search) {
                $q->where('nama_orang',  'like', "%$search%")
                  ->orWhere('jabatan',  'like', "%$search%");
            })
            ->latest()
            ->get();

        return view('about.teams', compact('teams'));
    }

    /** CREATE */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto_orang' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama_orang' => 'required|string|max:120',
            'jabatan'    => 'required|string|max:120',
            'link_ig'    => 'nullable|string|max:255',
            'link_in'    => 'nullable|string|max:255',
            'link_fb'    => 'nullable|string|max:255',
            'link_twt'   => 'nullable|url',
        ]);

        // simpan foto ke storage/app/public/foto_team
        $validated['foto_orang'] = $request->file('foto_orang')->store('foto_team', 'public');

        AboutTeam::create($validated);

        return back()->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    /** UPDATE */
    public function update(Request $request, $id)
    {
        $team = AboutTeam::findOrFail($id);

        $validated = $request->validate([
            'foto_orang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_orang' => 'required|string|max:120',
            'jabatan'    => 'required|string|max:120',
            'link_ig'    => 'nullable|string|max:255',
            'link_in'    => 'nullable|string|max:255',
            'link_fb'    => 'nullable|string|max:255',
            'link_twt'   => 'nullable|url',
        ]);

        /** ganti foto (jika di-upload lagi) */
        if ($request->hasFile('foto_orang')) {
            // hapus lama jika masih ada
            if ($team->foto_orang && Storage::disk('public')->exists($team->foto_orang)) {
                Storage::disk('public')->delete($team->foto_orang);
            }
            $validated['foto_orang'] = $request->file('foto_orang')->store('foto_team', 'public');
        }

        $team->update($validated);

        return back()->with('success', 'Data anggota tim diperbarui!');
    }

    /** DELETE */
    public function destroy($id)
    {
        $team = AboutTeam::findOrFail($id);

        // hapus file foto
        if ($team->foto_orang && Storage::disk('public')->exists($team->foto_orang)) {
            Storage::disk('public')->delete($team->foto_orang);
        }

        $team->delete();

        return back()->with('success', 'Data anggota tim dihapus!');
    }
}
