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


// ========= 前台 ==================================================


Route::get('/', 'Home\IndexController@index');

Route::get('/404', function(){
    return view('404');
});


// 忘记密码
Route::get('/forgot', 'Home\ForgotController@index');
Route::post('/forgot/email', 'Home\ForgotController@email');

// 重置密码
Route::get('/forgot/resetpass/{token}', 'Home\ForgotController@resetpass');
Route::post('/forgot/resetpass/{token}', 'Home\ForgotController@update');


// 前台用户
Route::group(['middleware' => 'homeuser'], function(){

    // 个人中心
    Route::get('/usercenter/index', 'Home\UserCenterController@index');
    Route::get('/usercenter/detail', 'Home\UserCenterController@detail');
    Route::post('/usercenter/updetail', 'Home\UserCenterController@updetail');
    Route::post('/usercenter/uppassword', 'Home\UserCenterController@uppassword');
    Route::get('/usercenter/orders', 'Home\UserCenterController@orders');

});

// 用户注册
Route::post('/regist','Home\RegistController@regist');
Route::post('/storePhoneCode','Home\RegistController@storePhoneCode');

// 用户登录
Route::post('/login', 'Home\LoginController@doLogin');
Route::get('/logout', 'Home\LoginController@doLogout');



// 商户中心
Route::group(['middleware' => 'homeshoper'], function(){

    Route::get('/shopcenter/index', 'Home\ShopCenterController@index');


});

// 商户登录
Route::get('/shopcenter/login', 'Home\ShopLoginController@index');
Route::post('/shopcenter/dologin', 'Home\ShopLoginController@dologin');

// 加盟商注册
Route::get('/shopcenter/regist/index', 'Home\ShopRegistController@index');
Route::post('/shopcenter/regist/regist', 'Home\ShopRegistController@regist');
Route::get('/shopcenter/regist/detail/{token}', 'Home\ShopRegistController@detail');
Route::post('/shopcenter/regist/detail/add/{token}', 'Home\ShopRegistController@addDetail');
Route::get('/shopcenter/regist/status/{token}', 'Home\ShopRegistController@status');