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

Route::get('/', function () {
    return view('welcome');
});

//路由群组
Route::group(['middleware'=>'adminlogin'],function(){

    //后台主页
    Route::get('/admin/index','Admin\IndexController@index');

    //管理员管理
    Route::get('/admin/user/add','Admin\UserController@add')->middleware('adminauth');
    Route::post('/admin/user/insert','Admin\UserController@insert');
    Route::get('/admin/user/index','Admin\UserController@index');
    Route::get('/admin/user/edit/{id}','Admin\UserController@edit')->middleware('adminauth');
    Route::post('/admin/user/update','Admin\UserController@update');
    Route::get('/admin/user/delete/{id}','Admin\UserController@delete')->middleware('adminauth');
    //ajax 操作 管理员
    Route::post('/admin/user/ajaxrename','Admin\UserController@ajaxRename');

    // 加盟商管理
    Route::get('/admin/shopuser/index','Admin\UserController@sindex')->middleware('adminauth');

    // 用户管理
    Route::get('/admin/homeuser/index','Admin\UserController@hindex')->middleware('adminauth');

    //分类管理
    Route::resource('/admin/category',"Admin\CategoryController");
    Route::get('/admin/getallCategory',"Admin\CategoryController@get");



    //评论管理
    //加载评论管理页面
    Route::get('admin/comment/index',"Admin\CommentController@index");
    //编辑评论
    Route::get('admin/comment/edit/{id}','Admin\CommentController@edit');
    //执行评论修改动作
    Route::post('admin/comment/update','Admin\CommentController@update');
    //将评论加入回收站
    Route::get('admin/comment/recycle/{id}','Admin\CommentController@recycle');
    //加载回收站页面
    Route::get('admin/comment/recover/','Admin\CommentController@recover');
    //执行恢复
    Route::get('admin/comment/reback/{id}','Admin\CommentController@reback');



    //广告管理
    //加载广告列表
    Route::get('admin/adver/index',"Admin\AdverController@index");
    //加载编辑广告页面
    Route::get('admin/adver/edit/{id}','Admin\AdverController@edit');
    //执行广告编辑动作
    Route::post('admin/adver/update','Admin\AdverController@update');
    //删除广告
    Route::get('admin/adver/delete/{id}','Admin\AdverController@delete');
    //加载添加广告页面
    Route::get('admin/adver/add','Admin\AdverController@add');
    //执行添加广告动作
    Route::post('admin/adver/insert','Admin\AdverController@insert');



    //订单管理
    //加载定单管理页面
    Route::get('admin/order/index/{status}',"Admin\OrderController@index");



    //缓存
    Route::get('admin/cache/cache','Admin\CacheController@cache');

});

//登录
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//生成验证码
Route::get('/kit/captcha/{tmp}','Admin\KitController@captcha');

