<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('home.login.login');
    }

    public function dologin(Request $request)
    {
    	$uname = $request->input('uname', '');
    	$upass = $request->input('upass', '');
    	$data = DB::table('users')->where('uname', $uname)->first();
    	if (empty($data)) {
    		echo json_encode(['msg' => 'error', 'info' => '用户名或密码错误']);
    		exit;
    	}

    	if (!Hash::check($upass, $data->upass)) {
    		echo json_encode(['msg' => 'error', 'info' => '用户名或密码错误']);
    		exit;
    	}

    	session(['home_login' => true]);
    	session(['home_userinfo' => $data]);

    	echo json_encode(['msg' => 'OK', 'info' => '登陆成功']);
    }

    public function logout(Request $request)
    {
    	session(['home_login' => false]);
    	session(['home_userinfo' => false]);
    	header('location:/home');
    }
}
