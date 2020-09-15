<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        $uname = $request->input('uname', '');

        $data = DB::table('users')->where('uname', 'like', '%'.$uname.'%')->paginate(5);
    	return view('admin.user.index', ['data' => $data, 'uname' => $uname]);
    }

    public function create()
    {
    	return view('admin.user.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
    		'upass' => 'required|regex:/^[\w]{6,18}$/',
    		'repass' => 'required|same:upass',
    	], [
    		'uname.required' => '用户名必填',
    		'uname.regex' => '用户名格式错误',
    		'upass.required' => '密码必填',
    		'upass.regex' => '密码格式错误',
    		'repass.required' => '确认密码必填',
    		'repass.same' => '两次密码不一致',
    	]);

    	if ($request->hasFile('profile')) {
    		$path = $request->file('profile')->store(date('Ymd'));
    	} else {
    		$path = '';
    	}

        $users = new AdminUser();
        $users->uname = $request->input('uname', '');
        $users->upass = Hash::make($request->input('upass', ''));
        $users->token = str_random(50);
        $users->status = 0;
        $users->profile = $path;
        $res = $users->save();
    	if ($res) {
    		return redirect('/admin/user')->with('success', '添加成功');
    	} else {
    		return back()->with('error', '添加失败');
    	}
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id', '');
        $token = $request->input('token', '');
        $res = DB::table('users')->where('id', $id)->where('token', $token)->delete();
        if ($res) {
            echo "OK";
            return;
        } else {
            echo "error";
            return;
        }
    }

    public function edit(Request $request)
    {
        $id = $request->input('id', '');
        $token = $request->input('token', '');
        $data = DB::table('users')->where('id', $id)->where('token', $token)->first();
        if (empty($data)) {
            echo "<script>alert('非法操作');location.href='/admin/user'</script>";
            exit;
        }
        return view('admin.user.edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'email' => 'required|regex:/[\w]@[\w]+\.[\w]+$/',
        ], [
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'email.required' => '邮箱必填',
            'email.regex' => '邮箱格式错误'
        ]);
        $id = $request->input('id', '');
        $uname = $request->input('uname', '');
        $email = $request->input('email', '');

        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store(date('Ymd'));

            Storage::delete($request->input('profile', ''));
        } else {
            $path = $request->input('profile', '');
        }

        $data = [
            'uname' => $uname,
            'email' => $email,
            'profile' => $path,
            'token' => str_random(50)
        ];
        $res = DB::table('users')->where('id', $id)->update($data);
        if ($res) {
            return redirect('/admin/user')->with('success', '修改成功');
        } else {
            return back()->with('error', '修改失败');
        }
    }
}
