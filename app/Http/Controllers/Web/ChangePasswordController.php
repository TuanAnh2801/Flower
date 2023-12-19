<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


use Symfony\Component\Console\Input\Input;

class ChangePasswordController extends Controller
{
    public function showMail(Request $request)
    {
        // $token = strtoupper(Str::random(10));
        // $custormer = User::where('email', $request->email)->first();


        // $request->validate([

        //     'email' => 'required',
        // ]);
        $categories = Category::all();

        return view('frontend.User.showEmail_changePassword' ,compact('categories'));
    }
    public function postForgetPass(Request $request)
    {

        $request->validate([
            'email' => 'required'
        ], [
            'email.required' => 'Vui Lòng Nhập Lại Email'
        ]);

        // $token = strtoupper(Str::random(10));
        // $custormer = User::where('email', $request->email)->first();
        // $custormer->update(['token' => $token]);
        $email = $request->input('email');
        if (User::where('email', '=', $email)->count() > 0) {

            $token = strtoupper(Str::random(10));
            $custormer = User::where('email', $request->email)->first();
            $custormer->update(['token' => $token]);
            // $email = $request->input('email');

            Mail::send('frontend.email.changePassword', compact('custormer'), function ($email) use ($custormer) {
                $email->subject('Flower_Nghi-Lấy Lại Mật Khẩu tài khoản');
                $email->to($custormer->email, $custormer->user_name);
                
            });
            return redirect()->back()->with('sendmail','Check Mail Của bạn');
        } else {
            $categories = Category::all();
            Session::flash('error1', 'Email Không Tồn Tại');

            return view('frontend.User.showEmail_changePassword', compact('categories'));
        }
    }
    public function getPass(User $custormer, $token)
    {
        // $token = strtoupper(Str::random(10));
        // $custormer = User::where('email', $request->email)->first();
        // $custormer->update(['token' => $token]);
        // dd($custormer->token);
            // dd($token);
            // $user=User::where('token', $token)->first();
            // dd($user);
            if($custormer->token === $token)
            {
                $user=User::where('token', $token)->first();
                // dd($user->email);
                $categories= Category::all();
                return view('frontend.User.getPass', compact('user','categories'));
                // if()
            }
            return abort(503);
        // User::find(auth()->user()->id)->update(['password'=> Hash::make($request->name)]);
        // dd('password được thay đổi');
        // $auth = Auth::user();
        // $user =  User::find($auth->id);
        // $user->password =  Hash::make($request->password);
        // $user->save();
        // return back()->with('success', "Password Changed Successfully");
    }
    public function postPass(User $user, Request $request,$token)
    {
        // dd($request->input());
        $user=User::where('token', $token)->first();
                // dd($user->email);
        // dd($request->input());
        $request->validate([
            'password' => 'required|confirmed'
            
        ]);
        if($user)
        {
            $password_h = $request->password;
        // dd($password_h);
        $user->update(['password'=>$password_h]);
        }
        // dd($user->email);
        // $password_h = $request->password;
        // // dd($password_h);
        // $user->update(['password'=>$password_h,'token'=>null]);

        return view('frontend.authenticate.login');
    }
}
