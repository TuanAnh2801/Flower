<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function create()
    {
        $categories=  Category::all();
        return view('backend.product.createProduct', compact('categories'));
    }
    public function edit($id)
    {

        $products = Product::with('inventory')->where('id',$id)->first();
        $categories = Category::all();  
        return view('backend.product.editProduct',compact('products','categories'));

    }
    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'name' => 'required',
        'desc' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'img' => 'required',
    ]);

        $imageNames = [];
        if ($request->hasFile('img')) {
            $images = $request->file('img');
            foreach ($images as $image) {
                $imageNames[] = $image->getClientOriginalName();
            }
        } else {
            $imageNames = $request->input('img');
        }

        $product = Product::findOrFail($id);
        $product->update(array_merge($request->except('quantity'), ['img' => $imageNames]));
        Inventory::findOrFail($product->inventory_id)->update(['quantity' => $request->input('quantity')]);
        if ($product) {
            if ($request->hasFile('img')) {
                foreach ($images as $image) {
                    $image->storeAs('', $image->getClientOriginalName(), 'product');
                }
            }
            return redirect('admin/product/all');
        }
    }

    public function store(Request $request)
    { 
    
        $images = $request->file('img');
        $imageNames = [];
        foreach ($images as $image) {
            $imageNames[] = $image->getClientOriginalName();
        }
        $inventory = Inventory::create(['quantity' => $request->input('quantity')]);
        $product = Product::create(array_merge($request->except('quantity'), ['img' => $imageNames, 'inventory_id' => $inventory->id]));
        if ($product && $inventory) {
            foreach ($images as $image) {
                $image->storeAs('', $image->getClientOriginalName(), 'product');
            }
            return redirect('/admin/product/all')->with('success','successfully created 1 product');
        }
    }

    public function allProduct()
    {
        $products=Product::paginate(5);
        $categories=Category::all();
        return view('backend.product.allProduct',compact('products','categories'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function category( Category $category)
    {
        $products = Product::where('category_id', $category->id)->paginate(5);
        $categories=Category::all();
        return view('backend.product.allProduct',compact('products','categories'))->with('i',(request()->input('page',1)-1)*5);

    }

    public function tet_flower(Request $request)
    {

            $products=Product::whereHas('category', function ($query) {
                return $query->where('name_category', 'Hoa Tet 2023');
            })->with('inventory')->paginate(5);

  
        return view('backend.product.tet_flower',compact('products'))->with('i',(request()->input('page',1)-1)*5);

    }
    public function flower_wedding()
    {
        $products=Product::whereHas('category', function ($query) {
            return $query->where('name_category', 'Hoa Cuoi');
        })->with('inventory')->paginate(5);

        return view('backend.product.flower-wedding', compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function flower_birthday()
    {
        $products=Product::whereHas('category', function ($query) {
            return $query->where('name_category', 'Hoa Sinh Nhat');
        })->with('inventory')->paginate(5);

        return view('backend.product.flower-wedding', compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function flower_opeing()
    {
        $products=Product::whereHas('category', function ($query) {
            return $query->where('name_category', 'Hoa Khai Truong');
        })->with('inventory')->paginate(5);

        return view('backend.product.flower-opeing', compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }


    
    public function destroy($id)
    {
   
        $product = Product::findOrFail($id);
        $product->delete($id);
        return redirect()->back()->with('delete','1 product removed');
    }


}
