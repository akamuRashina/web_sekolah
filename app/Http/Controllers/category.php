<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Category;
class CategoryController extends Controller
{
   public function index()
   {
        $categories = Category::all();
        return view('category.index', compact ('categories'));
   }
   public function store(Request $request)
   {
        Category::create([
            'category_name'=> $request->category_name
        ]);

        return redirect()->back();
   }
}
