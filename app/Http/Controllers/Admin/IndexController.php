<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class IndexController extends Controller
{
    //
    public function login()
    {
    	return view('admin.index.login');
    }

    public function dologin(Request $request)
    {
    	$uname = $request->input('uname', '');
    	$upass = $request->input('upass', '');
    	$data = DB::table('users')->where('uname', $uname)->first();
    	if (empty($data)) {
    		return back()->with('error', '用户名或密码错误');
    	}

    	if (!Hash::check($upass, $data->upass)) {
    		return back()->with('error', '用户名或密码错误');
    	}

    	session(['admin_login' => true]);
    	session(['admin_userinfo' => $data]);

    	return redirect('/admin/user');
    }

    public function logout()
    {
    	session(['admin_login' => false]);
    	session(['admin_userinfo' => false]);
    	return redirect('/admin');
    }
}
