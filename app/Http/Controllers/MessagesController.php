<?php

namespace App\Http\Controllers;

use App\Models\messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    // Menampilkan semua pesan
    public function index()
    {
        $messages = messages::latest()->paginate(2); // Pagination

        return view('messages.messages', compact('messages'));
    }

    // Menyimpan pesan dari form
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        messages::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
