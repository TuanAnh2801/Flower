<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Product;
use Illuminate\Http\Request;

class CateGoryController extends Controller
{
    public function index(Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(10);
        $popularProducts = Product::orderByDesc('views')->take(8)->get();
        $categories= Category::all();
        $posts = Posts::with('category', 'user')->get();
        // return view('frontend.layouts.app', compact('categories'));
        return view('frontend.index', compact('products','popularProducts','categories','posts'));
    }
   
}
