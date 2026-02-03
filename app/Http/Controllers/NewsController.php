<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
     
           $news =  News::with('category')->get();
           return view('admin.news.index', compact ('news'));
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required',
            'category_id'   => 'required|exists:categories,category_id',
            'publish_date'  => 'required|date',
            'status'        => 'required|in:draft,published',
            'author_id'     => 'required'
        ]);

        $news = News::create($request->all());

        return response()->json($news, 201);
    }
    public function create()
{
    // misal kamu mau mengambil data kategori untuk dropdown
    $categories = \App\Models\Category::all();
    return view('admin.news.create', compact('categories'));
}

    public function show($id)
    {
        return response()->json(
            News::with('category')->findOrFail($id)
        );
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title'        => 'required|string|max:255',
            'content'      => 'required',
            'category_id'  => 'required|exists:categories,category_id',
            'status'       => 'required|in:draft,published',
        ]);

        $news->update($request->all());

        return response()->json($news);
    }

    public function destroy($id)
    {
        News::destroy($id);

        return response()->json(['message' => 'News deleted']);
    }
}