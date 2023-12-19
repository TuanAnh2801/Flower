<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        // @dd($user);
        $userAddress = UserAddress::where('user_id', Auth::user()->id)->firstOrNew();
        $categories = Category::all();
        return view('frontend.User.profile', compact('user', 'userAddress', 'categories'));
    }
    public function editProfile()
    {
        $user = Auth::user();
        $userAddress = UserAddress::where('user_id', Auth::user()->id)->firstOrNew();
        // @dd($user);
        $categories = Category::all();
        return view('frontend.User.editProfile', compact('user', 'userAddress', 'categories'));
    }
    // public function updateProfile(Request $request)
    // {

    //     $request->validate(
    //         [
    //             'first_name' => 'required',
    //             'last_name' => 'required',
    //             'email' => ['required', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
    //         ]
    //     );
    //     $avatar=$request->file('avatar');
    //     $data = [
    //         'avatar' =>$avatar->getClientOriginalName()
    //     ];

    //     $avatar->storeAs('', $avatar->getClientOriginalName(),'avatar');
    //     $ar=Auth::user()->update($data);

    //     Auth::user()->update($request->only(['first_name', 'last_name', 'email', 'telephone']));
    //     UserAddress::updateOrCreate(['user_id' => Auth::user()->id], $request->only(['address', 'city', 'country']));
    //     return redirect('user/profile');
    // }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore(Auth::user()->id)],
        ]);

        $avatar = $request->file('avatar');
        if ($avatar) {
            $avatarName = $avatar->getClientOriginalName();
            $avatar->storeAs('frontend/userProfile', $avatarName, 'public');
            $data = [
                'avatar' => $avatarName,
            ];
            Auth::user()->update($data);
        }

        Auth::user()->update($request->only(['first_name', 'last_name', 'email', 'telephone']));

        UserAddress::updateOrCreate(
            ['user_id' => Auth::user()->id],
            $request->only(['address', 'city', 'country'])
        );

        return redirect('user/profile');
    }
}
