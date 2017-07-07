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

// Route::get('/', function () {
//     return view('welcome');
// });

// 路由群组 后台
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


    // 后台所有用户权限管理
    Route::post('/admin/user/ajaxrestatus','Admin\UserController@ajaxrestatus');

    //分类管理
    Route::resource('/admin/category',"Admin\CategoryController");
    Route::get('/admin/getallCategory',"Admin\CategoryController@get");
    Route::get('/admin/category/addAttr/{id}','Admin\CategoryController@addAttr');

    //属性管理
    Route::get('/admin/attr/index','Admin\AttrController@index');
    Route::get('/admin/attr/add','Admin\AttrController@add');
    Route::post('/admin/attr/insert','Admin\AttrController@insert');

});

//登录
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//生成验证码
Route::get('/kit/captcha/{tmp}','Admin\KitController@captcha');


// ========= 前台 ==================================================


Route::get('/', 'Home\IndexController@index');

// 执行登录
Route::post('/login', 'Home\LoginController@doLogin');
Route::get('/logout', 'Home\LoginController@doLogout');