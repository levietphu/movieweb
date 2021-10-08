<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Session;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('backend.dashboard.index');
    }
    public function login()
    {
        return view('backend.dashboard.login');
    }
    public function post_login(Request $req)
    {
        $req->validate([
            'email'=>'required|max:256',
            'password'=>'required'
        ]);
        $admin = Admin::where('email',$req->email)->first();
        if (empty($admin)) {
            return redirect()->back()->with('error','Email chưa đăng ký');
        }else{
            if (Hash::check($req->password, $admin->password)) {
                Session::push('admin',$admin);
                return redirect()->route('admin');
            }else{
                return redirect()->back()->with('error','Sai mật khẩu');
            }
        }
    }
    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('login');
    }
}
