<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showCreatePost()
    {
        $categories = CategoryPost::all();
        // dd($categories);
        return view('backend.posts.ShowCreatePosts', compact('categories'));
    }
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categoriesPosts,id',
            'content' => 'required',
            // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            'images'=> 'required'
        ]);
    
        // Create new post
        $post = new Posts();
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->category_id = $validatedData['category_id'];
        $post->user_id = Auth::user()->id;
        $post->published_at = now();
        $post->save();
    
        // Save images to disk and database
        $images = [];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageNames = [];
            foreach ($images as $image) {
                // store image file and get the file name
                // $imageName = $image->store('backend/posts', 'public');
                // $imageName = $image->store('backend/posts', 'public');
                $imageName= $image->storeAs('', $image->getClientOriginalName(), 'posts');
                $imageNames[] = $imageName;
            }
            // save the image names as a JSON array in the 'images' column
            $post->images = json_encode($imageNames);
            $post->save();
        }
        return redirect('/admin/posts/showCreatePost')->with('success', 'Post created successfully.');
    
      
    }
    public function allPosts()
    {
        $posts = Posts::with('category')->paginate(5);
        // dd($categories);
        return view('backend.posts.showPosts', compact('posts'))->with('i',(request()->input('page',1)-1)*5);

    }
    public function delete($id)
    {
   
        $categories = Posts::findOrFail($id);
        $categories ->delete($id);
        return redirect()->back()->with('delete','1 product removed');
    }
    public function edit($id)
    {

        $posts = Posts::findOrFail($id);
        $categories = CategoryPost::all();
        return view('backend.posts.editPosts',compact('posts','categories'));

    }
    public function update(Request $request, $id)
    {
        // dd($request->input());
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categoriesPosts,id',
            'content' => 'required',
            // 'images' => 'required'
        ]);
    
        $post = Posts::findOrFail($id);
        $post->update($validatedData);
    
        // Save images to disk and database
        $images = [];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageNames = [];
            foreach ($images as $image) {
                // store image file and get the file name
                $imageName= $image->storeAs('', $image->getClientOriginalName(), 'posts');
                $imageNames[] = $imageName;
            }
            // save the image names as a JSON array in the 'images' column
            $post->images = json_encode($imageNames);
            $post->save();
        }
    
        return redirect()->back()->with('success', 'Post updated successfully.');
    }


    //categoryPosts


    public function showCategoryPost()
    {
        return view('backend.posts.createCategoryPosts');
    }
    public function createCategory(Request $request)
    {
                // dd($request->input());
      $request->validate([
            'name' => 'required',
        ]);
        $categories = $request->input();
        CategoryPost::create($categories);
        return redirect()->back()->with('updateCategory', 'Create a Successful Portfolio');
    }
    public function ShowAllCategory()
    {
        $categoriesPost = CategoryPost::paginate(5);
        return view('backend.posts.showAllCategoryPosts', compact('categoriesPost'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
    public function deleleCategory($id)
    {
   
        $categories = CategoryPost::findOrFail($id);
        $categories ->delete($id);
        return redirect()->back()->with('delete','1 product removed');
    }
    public function showEditCategoryPosts($id)
    {
        $categories = CategoryPost::findOrFail($id);
        return view('backend.posts.showEditCategoryPosts', compact('categories'));
    }
    public function updateCategoryPosts(Request $request, $id)
    {
        $categories = CategoryPost::find($id);
        //    dd($accounts);
        $categories->update($request->all());
        return redirect()->back()->with('updateCategory', 'Đã Cập Nhật Danh Mục');
    }

}
