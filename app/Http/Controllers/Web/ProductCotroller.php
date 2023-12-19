<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Models\Posts;
use App\Models\Product;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ProductCotroller extends Controller
{
    public function showProduct(Product $products, Request $request)
    {
        $price = $request->query('price');
        switch ($price) {
            case 1:
                $products = Product::where('price', '<', 1000000)->paginate(8);
                break;
            case 2:
                $products = Product::where('price', '>=', 1000000)
                    ->where('price', '<', 2000000)
                    ->paginate(8);
                break;
            case 3:
                $products = Product::where('price', '>=', 2000000)
                    ->where('price', '<', 3000000)
                    ->paginate(8);
                break;
            case 4:
                $products = Product::where('price', '>=', 3000000)->paginate(8);
                break;
            case 5:
                $products = Product::orderBy('created_at', 'desc')->paginate(12);
                break;
            case 6:
                $products = Product::orderBy('created_at', 'asc')->paginate(12);
                break;
            default:
                $products = Product::orderBy('id', 'desc')->paginate(8);
        }
        

        view('frontend.layouts._product_feature', compact('products'));
    }
    public function detail_Product($id)
    {
        $products = Product::with('comment')->findOrFail($id);
        $comments = Comment::with(['user', 'replies' => function ($query) {
            $query->with(['user', 'replies']);
        }])->where('product_id', $id)->whereNull('parent_id')->orderBy('created_at', 'desc')->get();
        $avatar = User::where('id', Auth::user()->id)->get()->toArray();
        $relatedProducts = Product::where('category_id', $products->category_id)
            ->where('id', '!=', $id)
            ->take(8)
            ->get();
        $products->views++;
        $products->save();


        //category
        $categories = Category::all();
        return view('frontend.product.details', compact('products','avatar', 'comments', 'relatedProducts', 'categories'));
    }
  

    public function searchAll(Request $request)
    {
        // dd($request->input());
        $searchText = $request->query('search');
        $products = $searchText ? Product::with('category')->with('inventory')
            ->where('name', 'LIKE', "%$searchText%")->paginate(8) : Product::with('category')->with('inventory')->paginate(10);
        $products->appends(['search' => $searchText]);
        $popularProducts = Product::orderByDesc('views')->take(8)->get();
        $categories = Category::all();
        $posts = Posts::with('category', 'user')->get();
        return view('frontend.index', compact('products', 'popularProducts', 'categories','posts'));
    }
   

    public function orderdetail()
    {
        $name = 'Phạm Năng Nghi';
        Mail::send('frontend.email.test', compact('name'), function ($email) use ($name) {
            $email->subject('demo');
            $email->to('mathetesnghi@gmail.com', $name);
        });
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'content',

        ]);

        $product = Product::findOrFail($id);

        $parent_id = $request->input('parent_id');
        // $level = $parent_id ? Comment::find($parent_id)->level + 1 : 1;

        $commentData = [
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'content' => $request->input('content'),
            'parent_id' => $parent_id,
            // 'level' => $level
        ];
        Comment::create($commentData);

        return redirect()->back();
    }
    public function store2(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'content',
        ]);
        $product = Product::findOrFail($id);
        $commentData = [
            'user_id' => Auth::user()->id,
            'product_id' => $product->id,
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id')
        ];
        Comment::create($commentData);
        return redirect()->back();
    }


}
