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

// 路由群组 后台
Route::group(['middleware'=>'adminlogin'],function(){

    //后台主页
    Route::get('/admin/index','Admin\IndexController@index');

    //管理员管理
    Route::get('/admin/user/add','Admin\UserController@add')->middleware('adminauth');
    Route::post('/admin/user/insert','Admin\UserController@insert')->middleware('adminauth');
    Route::get('/admin/user/index','Admin\UserController@index')->middleware('adminauth');
    Route::get('/admin/user/edit/{id}','Admin\UserController@edit')->middleware('adminauth');
    Route::post('/admin/user/update','Admin\UserController@update')->middleware('adminauth');
    Route::get('/admin/user/delete/{id}','Admin\UserController@delete')->middleware('adminauth');
    //ajax 操作 管理员
    Route::post('/admin/user/ajaxrename','Admin\UserController@ajaxRename');

    // 加盟商管理
    Route::get('/admin/shopuser/index','Admin\UserController@sindex');

    // 用户管理
    Route::get('/admin/homeuser/index','Admin\UserController@hindex');

    // 后台所有用户权限管理
    Route::post('/admin/user/ajaxrestatus','Admin\UserController@ajaxrestatus');


    // ++++++ 场地管理 ++++++

    Route::get('/admin/places/index', 'Admin\PlacesController@index');
    Route::get('/admin/shopuser/status', 'Admin\PlacesController@status');
    Route::get('/admin/shopuser/status/{id}', 'Admin\PlacesController@status_yes');
    Route::post('/admin/shopuser/status/{id}', 'Admin\PlacesController@status_no');
    Route::post('/admin/shopuser/isstatus', 'Admin\PlacesController@isstatus');

    // ++++++++++++++++++++++

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
    //将场地表信息改为广告表
    Route::get('admin/adver/toads',"Admin\AdverController@toads");
     //移除广告
    Route::get('admin/adver/removeads/{id}',"Admin\AdverController@removeads");
      //执行加入广告列表动作 
   Route::get('admin/adver/changeads/{id}',"Admin\AdverController@changeads");


    //订单管理
    //加载定单管理页面
    Route::get('admin/order/index/{status}',"Admin\OrderController@index");

    //缓存
    Route::get('admin/cache/cache','Admin\CacheController@cache');


    //手机登录二维码管理
    Route::get('admin/code','Admin\CodeController@index');
    //修改二维码
    Route::post('admin/code/update','Admin\CodeController@update');



});

// Route::get('/admin', 'Admin\LoginController@index');

//登录
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');

//生成验证码
Route::get('/kit/captcha/{tmp}','Admin\KitController@captcha');


// ========= 前台 ==================================================

// 前台首页
Route::get('/', 'Home\IndexController@index');

//手机开场二维码
Route::get('home/code','Home\IndexController@code');

// 列表页场地搜索
Route::get('/listSearch','Home\ListController@listSearch');

// 场地搜索结果详情页
Route::get('/detail/pid={pid}','Home\DetailsController@index');

// 购物车
Route::get('/shopcart/index','Home\ShopcartController@index');
Route::get('/shopcart/add','Home\ShopcartController@add');
Route::get('/shopcart/delete/{ctime}','Home\ShopcartController@delete');

// 前台订单
Route::get('/home/order/order',"Home\OrderController@index");
Route::get('/order/submitOrder','Home\OrderController@submitOrder');

//广告
Route::get('/adver/index','Home\AdverController@index');

// 支付
Route::get('/home/pay/pay',"Home\PayController@index");

// 忘记密码
Route::get('/forgot', 'Home\ForgotController@index');
Route::post('/forgot/email', 'Home\ForgotController@email');

// 重置密码
Route::get('/forgot/resetpass/{token}', 'Home\ForgotController@resetpass');
Route::post('/forgot/resetpass/{token}', 'Home\ForgotController@update');

//底部链接
Route::get('/home/foot/aboutus','Home\FootController@index');

//加载更多评论
Route::get('/morecomment','Home\DetailsController@morecomment');

// 前台用户中心
Route::group(['middleware' => 'homeuser'], function(){

    // 个人中心
    //个人中心主页面
    Route::get('/usercenter/index', 'Home\UserCenterController@details');
    //用户个人中心详细信息加载页面
    Route::get('/usercenter/details', 'Home\UserCenterController@details');
    //执行个人用户修改个人信息和修改密码
    Route::post('/usercenter/updetails','Home\UserCenterController@updetails');
    //修改密码
    Route::post('/usercenter/uppassword', 'Home\UserCenterController@uppassword');
    //个人用户订单
    Route::get('usercenter/order/{status}','Home\UserCenterController@order');
    Route::get('usercenter/orderCancel/{oid}','Home\UserCenterController@cancel');
    //个人中心购物车
    Route::get('usercenter/shopcart/shopcart','Home\UserCenterController@shopcart');

    //个人中心购物车
    Route::get('/usercenter/shopcart/shopcart','Home\UserCenterController@shopcart');
    // 收藏
    Route::get('/usercenter/collection','Home\UserCenterController@collection');
    Route::post('/collection/update','Home\CollectionCenterController@update');

    //用户评论
    Route::get('/home/comment/index/{oid}',"Home\UserCenterController@comment");
    Route::get('/home/comment/insert/{mid}',"Home\UserCenterController@insert");


});

   //底部链接
    Route::get('/home/foot/aboutus','Home\FootController@index');

// 用户注册
Route::post('/regist','Home\RegistController@regist');
Route::post('/storePhoneCode','Home\RegistController@storePhoneCode');

// 用户登录
Route::post('/login', 'Home\LoginController@doLogin');
Route::get('/logout', 'Home\LoginController@doLogout');

// 商户中心
Route::group(['middleware' => 'homeshoper'], function(){

    // 商户信息修改
    Route::get('/shopcenter/index', 'Home\ShopCenterController@index');
    Route::get('/shopcenter/detail', 'Home\ShopCenterController@detail');
    Route::post('/shopcenter/updetail', 'Home\ShopCenterController@updetail');
    Route::post('/shopcenter/uppassword', 'Home\ShopCenterController@uppassword');
    // 商户发布场地
    Route::get('/shopcenter/release','Home\ShopPlacesController@add');
    //ajax城市联动
    Route::get('/shopcenter/city','Home\ShopPlacesController@city');
    Route::post('/shopcenter/insert','Home\ShopPlacesController@insert');
    Route::get('/shopcenter/addMeet/{pid}','Home\ShopPlacesController@addMeet');
    Route::post('/shopcenter/insertMeet','Home\ShopPlacesController@insertMeet');
    Route::post('/shopcenter/insertMeetAgain','Home\ShopPlacesController@insertMeetAgain');
    
    // 商户管理场地
    Route::get('/shopcenter/places', 'Home\ShopPlacesController@index');
    Route::get('/shopcenter/places/detail', 'Home\ShopPlacesController@places');
    Route::post('/shopcenter/places/detail', 'Home\ShopPlacesController@upplaces');
    //图片上传
    Route::post('/upload_img','Home\UploadController@imgUpload');
    // 会场
    Route::get('/shopcenter/meetplaces', 'Home\ShopPlacesController@meetplaces');
    Route::get('/shopcenter/meetplaces/detail', 'Home\ShopPlacesController@meet_detail');
    Route::post('/shopcenter/meetplaces/detail', 'Home\ShopPlacesController@up_meet');
    Route::get('/shopcenter/meetplaces/delete', 'Home\ShopPlacesController@meet_delete');
    // 配套服务
    Route::post('/shopcenter/facilities/delete', 'Home\ShopPlacesController@fac_delete');
    // 商户订单管理
    Route::get('/shopcenter/order','Home\ShopOrdersController@orderList');
    Route::get('/shopcenter/takeOrder/{oid}','Home\ShopOrdersController@takeOrder');
    
});

// 商户注册
Route::get('/shopcenter/regist/index', 'Home\ShopRegistController@index');
// 商户注册
Route::post('/shopcenter/regist/regist', 'Home\ShopRegistController@regist');
Route::get('/shopcenter/regist/detail/{token}', 'Home\ShopRegistController@detail');
Route::post('/shopcenter/regist/detail/add/{token}', 'Home\ShopRegistController@addDetail');
Route::get('/shopcenter/regist/status/{token}', 'Home\ShopRegistController@status');


// 商户登录
Route::get('/shopcenter/login', 'Home\ShopLoginController@index');
Route::post('/shopcenter/dologin', 'Home\ShopLoginController@dologin');
Route::get('/shopcenter/logout', 'Home\ShopLoginController@logout');

// 错误页面
Route::get('/404', function(){
    return view('404');
});