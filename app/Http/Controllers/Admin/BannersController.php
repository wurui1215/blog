<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BannersController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('banner')->get();
    	return view('admin.banner.index', ['data' => $data]);
    }

    public function create()
    {
    	return view('admin.banner.create');
    }

    public function store(Request $request)
    {
    	if ($request->hasFile('url')) {
    		$url = $request->file('url')->store(date('Ymd'));
    	} else {
    		return back()->with('error', '请选择图片');
    	}

    	$data = [
    		'title' => $request->input('title', ''),
    		'desc' => $request->input('desc', ''),
    		'url' => $url,
    		'status' => $request->input('status', '')
    	];

    	$res = DB::table('banner')->insert($data);
    	if ($res) {
    		return redirect('/admin/banner')->with('添加成功', '');
    	} else {
    		return back()->with('error', '添加失败');
    	}
    }

    public function changeStatus(Request $request)
    {
    	$id = $request->input('id', '');
    	$status = $request->input('status', '');

    	$res = DB::table('banner')->where('id', $id)->update(['status' => $status]);
    	if ($res) {
    		return back()->with('success', '修改成功');
    	} else {
    		return back()->with('error', '修改失败');
    	}
    }
}
