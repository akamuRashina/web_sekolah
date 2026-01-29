<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Http\Requests\NewsRequest;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::with('category')->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(News $request)
    {
        News::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'category_id' => $request->category_id,
            'upload_date' => date('Y-m-d'),
            'status'      => $request->status, // Draft / Upload
            'author_id'   => 1
        ]);

        return redirect('/news')->with('success', 'News saved successfully');
    }

    public function publicNews()
    {
        $news = News::where('status', 'Upload')->get();
        return view('news.public', compact('news'));
    }
}