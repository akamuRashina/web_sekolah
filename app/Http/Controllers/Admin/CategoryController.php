<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    // Menampilkan halaman form tambah (Ini yang tadi kurang)
    public function create()
    {
        return view('category.create');
    }

    // Menyimpan data ke database
    public function store(Request $request)
    {

        Category::create(
           $request->all()
        );

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dibuat!');
    }
}