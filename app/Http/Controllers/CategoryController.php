<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    // Menampilkan form create
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil ditambahkan!');
    }

    // Menampilkan detail kategori
    public function show($id)
        {
            $category = Category::findOrFail($id);
            $products = Product::where('category_id', $id)->get(); // 
            
            return view('categories.show', compact('category', 'products'));
        }

    // Menampilkan form edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // Update data kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil diupdate!');
    }

    // Hapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category berhasil dihapus!');
    }
}