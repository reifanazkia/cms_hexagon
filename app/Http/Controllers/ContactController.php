<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('setting.setting', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::first();

        if (!$contact) {
            return back()->with('error', 'Data kontak belum tersedia.');
        }

        if ($request->has('notlp')) {
            $request->validate([
                'notlp' => 'required|string|max:255',
            ]);

            $contact->update([
                'notlp' => $request->notlp,
            ]);

            return back()->with('success', 'Nomor telepon berhasil diperbarui.');
        }

        if ($request->has('email')) {
            $request->validate([
                'email' => 'required|email|max:255',
            ]);

            $contact->update([
                'email' => $request->email,
            ]);

            return back()->with('success', 'Email berhasil diperbarui.');
        }

        return back()->with('error', 'Tidak ada data yang diperbarui.');
    }
}
