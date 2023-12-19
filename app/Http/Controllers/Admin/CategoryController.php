<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategory()
    {
        $categories= Category::all();
        return view('backend.category.showCategory', compact('categories'));
    }
    public function Category(Request $request)
    {
        $request->validate([
            'name_category' => 'required',
            'desc' =>'required'
        ]);
        $categories= $request->input();
        Category::create($categories);
        return redirect()->back()->with('updateCategory', 'Create a Successful Portfolio');
    }
    public function showAllCategory()
    {
        $categories= Category::paginate(5);
        return view('backend.category.showAllCategory', compact('categories'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function delete($id)
    {
   
        $categories = Category::findOrFail($id);
        $categories ->delete($id);
        return redirect()->back();
    }
    public function updateCategory(Request $request,$id)
    {
        $categories = Category::find($id);
        //    dd($accounts);
        $categories->update($request->all());
        return redirect()->back()->with('updateCategory', 'Đã Cập Nhật Danh Mục');
    }
    public function showUpdateCategory($id)
    {

        $categories= Category::find($id);
        return view('backend.category.updateCategory',compact('categories'));
    }

}
