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

    // 后台所有用户权限管理
    Route::post('/admin/user/ajaxrestatus','Admin\UserController@ajaxrestatus');

    //分类管理
    Route::resource('/admin/category',"Admin\CategoryController");
    Route::get('/admin/type/deleteAttr/{typeId}/{attrId}','Admin\CategoryController@deleteAttr');
    Route::get('/admin/getallCategory',"Admin\CategoryController@get");

    //属性管理
    Route::get('/admin/attr/index','Admin\AttrController@index');
    Route::get('/admin/attr/add','Admin\AttrController@add');
    Route::post('/admin/attr/insert','Admin\AttrController@insert');
    Route::get('/admin/attr/edit/{id}','Admin\AttrController@edit');
    Route::get('/admin/attr/deleteval/{attrId}/{valId}','Admin\Attrcontroller@deleteval');
    Route::post('/admin/attr/update','Admin\AttrController@update');
    Route::get('/admin/attr/delete/{id}','Admin\AttrController@delete');

    //属性值管理
    Route::get('/admin/value/index','Admin\ValueController@index');
    Route::post('/admin/value/insert','Admin\ValueController@insert');
    Route::post('/admin/value/ajaxRename','Admin\ValueController@ajaxRename');
    Route::get('/admin/value/delete/{id}','Admin\ValueController@delete');


});

//登录
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//生成验证码
Route::get('/kit/captcha/{tmp}','Admin\KitController@captcha');

