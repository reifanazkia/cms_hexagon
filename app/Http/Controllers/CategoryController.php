<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /* GET /category */
    public function index()
    {
        $categories = Category::orderByDesc('category_id')->paginate(10);

        return view('category.index', compact('categories'));
    }

    /* POST /category/store */
    public function store(Request $request)
    {
        $request->validate(['nama_category' => 'required|string|max:255']);

        Category::create($request->only('nama_category'));

        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    /* POST /category/update/{id} */
    public function update(Request $request, $id)
    {
        $request->validate(['nama_category' => 'required|string|max:255']);

        $cat = Category::findOrFail($id);
        $cat->update($request->only('nama_category'));

        return back()->with('success', 'Kategori berhasil diperbarui');
    }

    /* DELETE /category/delete/{id} */
    public function destroy($id)
    {
        Category::where('category_id', $id)->delete();

        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
