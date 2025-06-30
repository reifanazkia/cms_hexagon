<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Http\Request;

class CostumRegisterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Simpan user TANPA login otomatis
        app(CreateNewUser::class)->create($request->all());

        return redirect('/login')->with('status', 'Registrasi berhasil, silakan login.');
    }
}
