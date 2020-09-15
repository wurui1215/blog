<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ListsController extends Controller
{
    //
    public function index(Request $request)
    {
    	$cates_data = IndexController::getPidCates();

    	$cid = $request->input('cid', '');
        if (!empty($cid)) {
            $cname[] = DB::table('cates')->select('id', 'cname')->where('id', $cid)->first();
            $cates_lists = DB::table('articles')->where('cid', $cid)->orderBy('ctime', 'desc')->get();
        }
    	
        $tagname_id = $request->input('tagname_id', '');
        if (!empty($tagname_id)) {
            $cates_lists = DB::table('articles')->where('tid', $tagname_id)->get();
            $cname = [];
            foreach ($cates_lists as $k => $v) {
                $temp = DB::table('cates')->select('id', 'cname')->where('id', $v->cid)->first();
                $cname[] = $temp;
            }
        }

    	$tagname_data = DB::table('tagname')->get();

    	return view('home.lists.index', ['cates_data' => $cates_data, 'cates_lists' => $cates_lists, 'cname' => $cname, 'tagname_data' => $tagname_data]);
    }
}
