<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostsNewsController extends Controller
{
    public function showPostDetails($id)
    {
        $posts = Posts::with('category', 'user')->findOrFail($id);

        $similarPosts = Posts::where('category_id',$posts->category_id )
        ->where('id', '!=', $id)
        ->paginate(5);
        
        // dd($similarPosts);
        $posts->views++;
        $posts->save();
        return view('frontend.posts.postDetails', compact('posts', 'similarPosts'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function showPost()
    {
        $featuredPostsView = Posts::with('category', 'user')
            ->orderBy('views', 'desc')
            ->get()->take(4);
        $featuredPosts = Posts::with('category', 'user')
            ->orderBy('views', 'desc')
            ->paginate(5);

        // $category = Posts::where('category_id', $category->id)->paginate(10);
        // $categories = CategoryPost::all();
        $categoriesPost = CategoryPost::with('posts')->get()->toArray();

        $today = Carbon::today();

        $categoryWithMostViews = Posts::with('category')->whereDate('created_at', $today)
        ->orderByDesc('views')
        ->first();
//  dd($categoryWithMostViews);
        return view('frontend.posts.posts', compact('featuredPostsView', 'featuredPosts', 'categoriesPost', 'categoryWithMostViews'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function Category(CategoryPost $category)
    {
        $featuredPosts = Posts::where('category_id', $category->id)->paginate(10);
        // dd($featuredPosts);

        $featuredPostsView = Posts::with('category', 'user')
            ->orderBy('views', 'desc')
            ->get()->take(4);
        // $featuredPosts = Posts::with('category', 'user')
        //     ->orderBy('views', 'desc')
        //     ->paginate(5);

        $categoriesPost = CategoryPost::with('posts')->get()->toArray();

        $today = Carbon::today();

        $categoryWithMostViews = Posts::with('category')->whereDate('created_at', $today)
        ->orderByDesc('views')
        ->first();

        return view('frontend.posts.posts', compact('featuredPostsView', 'featuredPosts', 'categoriesPost', 'categoryWithMostViews'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
}
