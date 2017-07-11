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


//订单详情
Route::get('/home/order/order',"Home\OrderController@index");

//支付
Route::get('/home/pay/pay',"Home\PayController@index");

// 商户中心
Route::group(['middleware' => 'homeshoper'], function(){

    Route::get('/shopcenter/index', 'Home\ShopCenterController@index');
    Route::get('/shopcenter/detail', 'Home\ShopCenterController@detail');
    Route::post('/shopcenter/updetail', 'Home\ShopCenterController@updetail');
    Route::post('/shopcenter/uppassword', 'Home\ShopCenterController@uppassword');

});

// 商户登录
Route::get('/shopcenter/login', 'Home\ShopLoginController@index');
Route::post('/shopcenter/dologin', 'Home\ShopLoginController@dologin');
Route::get('/shopcenter/logout', 'Home\ShopLoginController@logout');

// 商户注册
Route::get('/shopcenter/regist/index', 'Home\ShopRegistController@index');
Route::post('/shopcenter/regist/regist', 'Home\ShopRegistController@regist');
Route::get('/shopcenter/regist/detail/{token}', 'Home\ShopRegistController@detail');
Route::post('/shopcenter/regist/detail/add/{token}', 'Home\ShopRegistController@addDetail');
Route::get('/shopcenter/regist/status/{token}', 'Home\ShopRegistController@status');


//场地搜索结果列表
Route::get('/list','Home\ListController@index');

//场地搜索结果详情
Route::get('/details','Home\DetailsController@index');