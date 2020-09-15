<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use DB;

class CatesController extends Controller
{

    public static function getCates()
    {
        $data = DB::table('cates')->select('*', DB::raw('concat(path,".",id) as paths'))->orderBy('paths', 'asc')->get();
        foreach ($data as $k => $v) {
            $n = substr_count($v->path, '.');
            $data[$k]->cname = str_repeat('|--', $n).$v->cname;
        }
        return $data;
    }

    //
    public function index()
    {
        // DB::select('select *,concat(path,",",id) as paths from cates order by paths asc');
        
        return view('admin.cates.index', ['data' => self::getCates()]);
    }

    public function create(Request $request)
    {
        $id = $request->input('id', '');
    	return view('admin.cates.create', ['data' => self::getCates(), 'id' => $id]);
    }

    public function store(Request $request)
    {
        // 检查Redis缓存是否存在
        if (Redis::exists('cates_redis_data')) {
            Redis::del('cates_redis_data');
        }

    	$pid = $request->input('pid', '');

    	if ($pid == 0) {
    		$path = 0;
    	} else {
    		$path_data = DB::table('cates')->where('id', $pid)->first();
    		$path = $path_data->path . '.' . $path_data->id;
    	}

    	$data = [
    		'cname' => $request->input('cname', ''),
    		'path' => $path,
    		'pid' => $request->input('pid', '')
    	];
    	$res = DB::table('cates')->insert($data);
    	if ($res) {
    		return redirect('/admin/cates')->with('success', '添加成功');
    	} else {
    		return back()->with('errot', '添加失败');
    	}
    }
}
