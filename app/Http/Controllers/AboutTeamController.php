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
            'foto_orang' => 'required|image|mimes:jpg,jpeg,png,webp|max:5000',
            'nama_orang' => 'required|string|max:120',
            'jabatan'    => 'required|string|max:120',
            'link_ig'    => 'nullable',
            'link_in'    => 'nullable',
            'link_fb'    => 'nullable',
            'link_twt'   => 'nullable',
        ]);

        if ($request->hasFile('foto_orang')) {
            $validated['foto_orang'] = $request->file('foto_orang')->store('foto_team', 'public');
        }

        AboutTeam::create($validated);

        return back()->with('success', 'Anggota tim berhasil ditambahkan!');
    }


    /** UPDATE */
   public function update(Request $request, $id)
{
    $team = AboutTeam::findOrFail($id);

    $validated = $request->validate([
        'foto_orang' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5000',
        'nama_orang' => 'required|string|max:120',
        'jabatan'    => 'required|string|max:120',
        'link_ig'    => 'nullable',
        'link_in'    => 'nullable',
        'link_fb'    => 'nullable',
        'link_twt'   => 'nullable',
    ]);

    // Kalau ada foto baru, simpan dan hapus foto lama
    if ($request->hasFile('foto_orang')) {
        // Hapus foto lama
        if ($team->foto_orang && Storage::disk('public')->exists($team->foto_orang)) {
            Storage::disk('public')->delete($team->foto_orang);
        }

        // Simpan foto baru
        $validated['foto_orang'] = $request->file('foto_orang')->store('foto_team', 'public');
    }

    // Update data
    $team->update($validated);

    return back()->with('success', 'Data anggota tim berhasil diperbarui!');
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
