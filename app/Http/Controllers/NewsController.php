<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|array',
            'judul_news' => 'required|string|max:250',
            'ket_news' => 'required|string|max:250',
        ]);

        News::create([
            'category_id' => implode(', ', $request->category_id),
            'judul_news' => $request->judul_news,
            'ket_news' => $request->ket_news,
        ]);

        return redirect()->route('news.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return response()->json([
            'news_id'     => $news->news_id,
            'category_id' => $news->category_id,
            'judul_news'  => $news->judul_news,
            'ket_news'    => $news->ket_news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|array',
            'judul_news' => 'required|string|max:250',
            'ket_news' => 'required|string|max:250',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'category_id' => implode(', ', $request->category_id),
            'judul_news' => $request->judul_news,
            'ket_news' => $request->ket_news,
        ]);

        return redirect()->route('news.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Data berhasil dihapus');
    }
}
