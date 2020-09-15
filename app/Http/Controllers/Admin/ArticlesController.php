<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ArticlesController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('articles')->orderBy('id', 'asc')->paginate(10);

        return view('admin.article.index', ['data' => $data]);
    }

    public function create()
    {
    	$tagname_data = DB::table('tagname')->get();
    	$cates_data = CatesController::getCates();
    	return view('admin.article.create', ['tagname_data' => $tagname_data, 'cates_data' => $cates_data]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:128',
            'auth' => 'required|max:32',
            'desc' => 'required|max:255'
        ], [
            'title.required' => '标题必填',
            'title.max' => '标题过长',
            'auth.required' => '作者必填',
            'auth.max' => '作者名称过长',
            'desc.required' => '描述必填',
            'desc.max' => '描述过长',
        ]);

        if ($request->hasFile('thumb')) {
        	$thumb = $request->file('thumb')->store(date('Ymd'));
        } else {
        	return back()->with('error', '请选择图片');
        }

        $data = $request->except(['_token', 'thumb']);
        $data['ctime'] = date('Y-m-d H:i:s', time());
        $data['thumb'] = $thumb;
        $data['num'] = rand(1000, 4000);
        $data['goodnum'] = rand(100, 1000);

        $res = DB::table('articles')->insert($data);

        if ($res) {
        	return redirect('/admin/article')->with('success', '添加成功');
        } else {
        	return back()->with('error', '添加失败');
        }
    }
}
