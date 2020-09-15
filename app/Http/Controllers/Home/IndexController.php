<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use DB;

class IndexController extends Controller
{
	public static function getPidCates()
	{
		$cates_parent_data = DB::table('cates')->where('pid', 0)->orderBy('id', 'asc')->get();
		$temp = [];
    	foreach ($cates_parent_data as $k => $v) {
    		$cates_child_data = DB::table('cates')->where('pid', $v->id)->get();
    		$v->sub = $cates_child_data;
    		$temp[] = $v;
    	}
    	return $temp;
	}

    public static function getCatesCname()
    {
        $cates_cname_data = DB::table('cates')->select('id', 'cname')->get();
        foreach ($cates_cname_data as $k => $v) {
            $temp[$v->id] = $v->cname;
        }
        return $temp;
    }

    //
    public function index()
    {
        if (Redis::exists('cates_redis_data')) {
            $cates_data = json_decode(Redis::get('cates_redis_data'));
        } else {
            $cates_data = self::getPidCates();
            $cates_data_str = json_encode($cates_data);
            Redis::setex('cates_redis_data', 600, $cates_data_str);
        }

        $banners_data = DB::table('banner')->where('status', 1)->get();

        $tagname_data = DB::table('tagname')->get();

        $data = DB::table('articles')->orderBy('ctime', 'desc')->skip(0)->take(3)->get();

        $cates_cname_data = self::getCatesCname();
        
    	return view('home.index.index', ['cates_data' => $cates_data, 'banners_data' => $banners_data, 'tagname_data' => $tagname_data, 'data' => $data, 'cates_cname_data' => $cates_cname_data]);
    }
}
