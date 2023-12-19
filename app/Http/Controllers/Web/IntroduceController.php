<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IntroduceController extends Controller
{
    public function showIntroduce()
    {
         
         //category add error
         $categories= Category::all();
        return view('frontend.Introduce.showIntroduce',compact('categories'));
    }
}
