<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class TagnamesController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('tagname')->get();
    	return view('admin.tagname.index', ['data' => $data]);
    }

    public function create()
    {
    	return view('admin.tagname.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'tagname' => 'required',
    		'bgcolor' => 'required'
    	], [
    		'tagname.required' => '名称必填',
    		'bgcolor.required' => '请选择颜色'
    	]);

    	$data = [
    		'tagname' => $request->input('tagname', ''),
    		'bgcolor' => $request->input('bgcolor', '')
    	];

    	$res = DB::table('tagname')->insert($data);
    	if ($res) {
    		return redirect('/admin/tagname')->with('success', '添加成功');
    	} else {
    		return back()->with('error', '添加失败');
    	}
    }
}
