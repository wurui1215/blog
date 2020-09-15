<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Captcha;
use DB;
use Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
    	return view('home.register.index');
    }

    public function store(Request $request)
    {
    	$uname = $request->input('uname', '');
    	$upass = Hash::make($request->input('upass', ''));
    	$code = $request->input('code', '');

    	if (!Captcha::check($code)) {
    		echo json_encode(['msg' => 'error', 'info' => '验证码错误']);
    		exit;
    	}

    	$token = str_random(50);
    	$res = DB::table('users')->insert(['uname' => $uname, 'upass' => $upass, 'token' => $token]);
    	if ($res) {
    		echo json_encode(['msg' => 'OK', 'info' => '注册成功']);
    		exit;
    	} else {
    		echo json_encode(['msg' => 'error', 'info' => '注册失败']);
    		exit;
    	}
    }
}
