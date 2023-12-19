<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticateController extends Controller
{
    public function showLoginAdmin()
    {
        return view('backend.authenticate.login');
    }
    public function loginAdmin(Request $request)
    {
        // dd($request->input());z
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
            'role' => ['1', '2']
        ])) {
            // return view('backend.authenticate.layouts.app')->with('login','Logged in successfully');
            return redirect()->route('backend.dashboard')->with('login', 'Logged in successfully');
            // return view('backend.dashboard.dashboard');
        }
        Session::flash('error', 'Mậu khẩu hoặc email bị sai, xin vui lòng nhập lại');
        return view('backend.authenticate.login');
        // return view('errors.503');
    }
    //1 để dùng đăng nhập trực tiếp bên ngoài nhưng bị chặng bowrr middleware
    public function index()
    {
        $count = 0;
        $feedbacks = Comment::all();
        $count = Comment::count();
        // dd($count);
        return view('backend.authenticate.layouts.app',compact('feedbacks', 'count'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin');
    }
    // public function showNav()
    // {
    //     return view('backend.authenticate.layouts.app');
    // }




}
