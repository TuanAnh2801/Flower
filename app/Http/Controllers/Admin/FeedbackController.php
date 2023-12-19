<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function showFeedback()
    {
        $feedbacks = Comment::with('product')->with('user')->orderBy('id', 'desc')->paginate(10);
        $count = Comment::count();
        return view('backend.feedback.showFeedback', compact('feedbacks', 'count'))->with('i', (request()->input('page', 1) - 1) * 5);
        // Comment::where('product_id', $comment->product_id)->update(['is_new' => false]);
    }
    public function updateFeedback($id)
    {
        $comment = Comment::find($id);
        $comment->is_new = 2;
        $comment->save();
        return redirect()->route('product.detail', $comment->product->id);
    }
    public function deleteFeedback($id)
    {
   
        $product = Comment::findOrFail($id);
        $product->delete($id);
        return redirect()->back();
    }
}
