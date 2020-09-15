<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DetailController extends Controller
{
    private function prev($id, $cid)
    {
        $data = DB::table('articles')->where('id', '<', $id)->where('cid', $cid)->first();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    private function next($id, $cid)
    {
        $data = DB::table('articles')->where('id', '>', $id)->where('cid', $cid)->first();
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    //
    public function index(Request $request)
    {
    	$cates_data = IndexController::getPidCates();

    	$id = $request->input('id', '');
        DB::update("update articles set num = num + 1 where id = ".$id);
    	$data = DB::table('articles')->where('id', $id)->first();

    	$cid = $request->input('cid', '');
    	$cname = DB::table('cates')->select('id', 'cname')->where('id', $cid)->first();

        $tagname_data = DB::table('tagname')->get();

        $tagname_id = $request->input('tagname_id', '');
        $tagname = DB::table('tagname')->where('id', $tagname_id)->get();

        $article_prev = self::prev($id, $cid);
        $article_next = self::next($id, $cid);

    	return view('home.detail.index', ['cates_data' => $cates_data, 'data' => $data, 'cname' => $cname, 'tagname_data' => $tagname_data, 'tagname' => $tagname, 'article_prev' => $article_prev, 'article_next' => $article_next]);
    }

    public function goodnum(Request $request)
    {
        if (!session('home_login')) {
            echo json_encode(['msg' => 'error', 'info' => '请先登陆']);
            exit;
        }

        $id = $request->input('id', '');
        $uid = session('home_userinfo')->id;
        $res = DB::table('users_articles')->where('tid', $id)->where('uid', $uid)->first();
        if (!empty($res)) {
            echo json_encode(['msg' => 'error', 'info' => '不能重复点赞']);
            exit;
        } else {
            DB::table('users_articles')->insert(['uid' => $uid, 'tid' => $id]);
        }

        $res2 = DB::update('update articles set goodnum = goodnum + 1 where id = '.$id);

        if ($res2) {
            echo json_encode(['msg' => 'OK', 'info' => '点赞成功']);
            exit;
        } else {
            echo json_encode(['msg' => 'error', 'info' => '点赞失败']);
            exit;
        }
    }
}
