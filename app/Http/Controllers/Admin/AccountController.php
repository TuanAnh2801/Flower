<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function account()
    {
        $accounts = User::all();
        return view('backend.account.admin', compact('accounts'));
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect('admin/search/admin');
    }
    public function adminInex()
    {
        // $accounts = DB::table('users')->where('role', 1)->paginate(5);
        $accounts = DB::table('users')->whereIn('role', [1, 2])->paginate(5);
        return view('backend.account.admin', compact('accounts'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function clientInex()
    {
        $accounts = DB::table('users')->where('role', 3)->paginate(5);
        return view('backend.account.client', compact('accounts'))->with('i',(request()->input('page',1)-1)*5);
    }
    public function editAccount($id)
    {
        $accounts = User::find($id);
        // dd($accounts);
        return view('backend.account.editAccount', compact('accounts'));
    }
    public function update(Request $request, $id)
    {
        $accounts = User::find($id);
        //    dd($accounts);
        $accounts->update($request->all());
        return redirect()->back();
    }
    public function ShowCreateAdmin()
    {
        return view("backend.account.createAdmin");
    }
    public function CreateAdmin(Request $request)
    {
        // dd($request->input());
        $request->validate([
            'user_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email|email',
            // 'role' => 'required|in:3',
            // 'role' => 'accepted',
            'telephone' => 'required',
         
        ]);
        $input = $request->all();
        // $input['role'] = 1;
        $input['role'] = 2;
        User::create($input);
        return redirect()->back()->with('updateAdmin', 'Tạo Admin Thành Công');
    }
}
