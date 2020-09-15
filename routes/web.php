<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 前台
Route::get('/', 'Home\IndexController@index');
Route::get('/home', 'Home\IndexController@index');
// 文章列表
Route::get('/home/list', 'Home\ListsController@index');
// 文章内容
Route::get('/home/detail', 'Home\DetailController@index');
// 前台登陆
Route::get('/home/login', 'Home\LoginController@login');
// 登陆验证
Route::post('/home/dologin', 'Home\LoginController@dologin');
// 退出登陆
Route::get('/home/logout', 'Home\LoginController@logout');
// 点赞
Route::get('/home/detail/goodnum', 'Home\DetailController@goodnum');
// 注册
Route::get('/home/register', 'Home\RegisterController@index');
Route::post('home/register/store', 'Home\RegisterController@store');

// 后台界面
Route::get('/admin', 'Admin\IndexController@login')->name('admin_login');
// 登陆
Route::post('/admin/dologin', 'Admin\IndexController@dologin');
// 退出
Route::get('/admin/logout', 'Admin\IndexController@logout');
// 后台
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function() {
    
    // 后台用户列表
    Route::get('/user', 'Admin\UsersController@index');
    // 后台用户添加
    Route::get('/user/create', 'Admin\UsersController@create');
    Route::post('/user/store', 'Admin\UsersController@store');
    // 删除后台用户
    Route::get('/user/destroy', 'Admin\UsersController@destroy');
    // 修改后台用户
    Route::get('/user/edit', 'Admin\UsersController@edit');
    Route::post('/user/update', 'Admin\UsersController@update');

    // 后台栏目列表
    Route::get('/cates', 'Admin\CatesController@index');
    // 后台栏目添加
    Route::get('/cates/create', 'Admin\CatesController@create');
    Route::post('/cates/store', 'Admin\CatesController@store');

    // 后台轮播图列表
    Route::get('/banner', 'Admin\BannersController@index');
    // 后台轮播图添加
    Route::get('/banner/create', 'Admin\BannersController@create');
    Route::post('/banner/store', 'Admin\BannersController@store');
    // 修改状态
    Route::get('/banner/changeStatus', 'Admin\BannersController@changeStatus');

    // 后台标签云列表
    Route::get('/tagname', 'Admin\TagnamesController@index');
    // 后台标签云添加
    Route::get('/tagname/create', 'Admin\TagnamesController@create');
    Route::post('/tagname/store', 'Admin\TagnamesController@store');

    // 后台文章列表
    Route::get('/article', 'Admin\ArticlesController@index');
    // 后台文章添加
    Route::get('/article/create', 'Admin\ArticlesController@create');
    Route::post('/article/store', 'Admin\ArticlesController@store');
});
