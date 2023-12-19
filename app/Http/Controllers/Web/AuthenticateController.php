<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Posts;
use App\Models\Product;
use App\Models\User;
use App\Models\User_Subcribe;
use App\Models\UserAddress;
use App\Models\UserAdress;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    public function showIndex(Product $products, Request $request)
    {
        //    $products = Product::limit(20)->orderBy('id','desc')->get();
        // $products = Product::orderBy('id','desc')->paginate(8);

        //    $products = Product::where('id','desc')->get();
        //    $price = Product::min('price');
        //    dd($price);
        //    dd($price);

        //    if($request->price)
        //    {
        //     dd($request->price);
        //         $price = $request->price;

        //         switch($price)
        //         {
        //             case '1':
        //                $products->where('price','<',10000);                   
        //             break;
        //         }
        //         $products = Product::orderBy('id', 'DESC')->paginate(2);
        //    }

        //    $products = Product::find($id);
        // dd($products);
        // $user = Auth::user();

        // return view('frontend.index', compact('products'));


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
                $products = Product::orderBy('id', 'desc')->paginate(12);
        }
        $popularProducts = Product::orderByDesc('views')->take(8)->get();



        //category add error
        $categories = Category::all();
        $posts = Posts::with('category', 'user')
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();
             return view('frontend.index', compact('products', 'popularProducts', 'categories','posts'));
    }

    public function showLogin()
    {

        return view('frontend.authenticate.login');
    }
    public function login(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt([
            'email' => $email,
            'password' => $password,
            'role' => ['1','2','3']

        ], $request->remember_token ? true : false)) {
            // return redirect('/')->with('login', 'Logged in successfully');
            return redirect()->route('flower.index')->with('login', 'Đăng Nhập Thành Công');
        } else {

            Session::flash('error', 'Mậu khẩu hoặc email bị sai, xin vui lòng nhập lại');
            return view('frontend.authenticate.login');
        }
    }

    // public function login(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     $email = $request->input('email');
    //     $password = $request->input('password');
    //     $remember = $request->input('remember_token');

    //     if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
    //         return redirect('/');
    //     } else {
    //         Session::flash('error', 'Mật khẩu hoặc email bị sai, xin vui lòng nhập lại');
    //         return view('frontend.authenticate.login');
    //     }
    // }
    public function showRegisterForm()
    {
        $categories = Category::all();
        return view('frontend.authenticate.register', compact('categories'));
    }
    public function register(Request $request)
    {
        
        $request->validate([
            'user_name' => ['required', 'regex:/^[a-zA-Z\s]+$/u'],
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email|email',
            // 'role' => 'required|in:3',
            // 'role' => 'accepted',
            // 'address' => 'required',
            // 'city' => 'required',
            // 'country' => 'required',
            'password' => 'required|confirmed'
        ], [
            // 'user_name.required' => 'Bạn phải nhập trường này',
            'user_name.regex' => 'Viết Thường Không Dấu',
        ]);

        // dd($request->input());
        // $user= User::create($request->input()); // cap nhap vao bang user;

        $userData = array_merge($request->except(['address', 'city', 'country', 'password_confirmation']), ['role' => 3]);
        $user = User::create($userData);
        // dd($user->id);
        // $userAddressData = array_merge($request->only(['city', 'address', 'country']), ['user_id' => $user->id]);
        // UserAddress::create($userAddressData);
        $userAddressData = [
            'user_id' => $user->id,
            'address' => $request->filled('address') ? $request->input('address') : 'N/A',
            'city' => $request->filled('city') ? $request->input('city') : 'N/A',
            'country' => $request->filled('country') ? $request->input('country') : 'N/A',
        ];
        UserAddress::create($userAddressData);
        if ($user) {
            Auth::login($user); //login
            return redirect('');
        }
    }
    public function logout()
    {

        Auth::logout();
        // return redirect('');
        return redirect()->route('flower.index')->with('Logout ', 'Đăng Xuất Thành Công');

    }
}
