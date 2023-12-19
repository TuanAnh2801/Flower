<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\UserSubcribeMail;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Product;
use App\Models\User_Subcribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class UserSubcribeController extends Controller
{
    public function userSubcribe(Request $request)
    {
        // dd($request->input());
        $products = Product::orderBy('id','desc')->paginate(8);
        $email = $request->input('email');
        $posts = Posts::with('category', 'user')->get();

        if (User_Subcribe::where('email', '=', $email)->count() > 0) {
            Session::flash('error2', 'Email Đã Được Đăng Ký Trước Đây');
            $popularProducts = Product::orderByDesc('views')->take(8)->get();
            $categories = Category::all();


            //category add error
            return view('frontend.index',compact('products','popularProducts','categories','posts'));

            // return view('frontend.index');
        } else {

            
            // echo 'gui mail';

            // $user = UserSubcribe::all();
            
            // Mail::to($user->email)->send(new MailUserSubcribe($user));

                // dd($user);
                //     // return redirect('')
                // $subcribe = UserSubcribe::where('email', $request->email)->first();
                
                // Mail::send('frontend.email.subcribe', function ($email) use ($subcribe) {
                    //     $email->subject('Flower_Nghi-Subcrice Thanks You');
                    //     $email->to($subcribe->email);
                    
                    // });

                    
                    $sub= User_Subcribe::create($request->all());
                    // dd($sub);
                    $user = DB::table('user_subcribe')->latest()->first();
                    // dd($user->email);
                    // Mail::to($user->email)->send(new UserSubcribeMail($user));
                    Mail::send('frontend.email.subcribe', compact('user'), function ($email) use ($user) {
                        $email->subject('Flower_Nghi-Tài Khoản Đăng Ký');
                        $email->to($user->email);
                    });
                 
                    return redirect()->route("flower.index")->with('email', 'bạn đã gửi mail thành công');
                    // return view('frontend.email.emailSuccess', compact('user'));
                

        }



        // $user_create = User_Subcribe::create([
        //     'email' => $request->input('email'),
        // ]);

        // if ($user_create)
        // {
        //     $users = User_Subcribe::all();
        //     foreach ($users as $user)
        //     {
        //         // dd($user->email);
        //         Mail::to($user->email)->send(new UserSubcribeMail($user));
        //     }

        //     return back()->with('message', 'đã gửi mail');
        // }
    }
}
