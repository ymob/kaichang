<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title  }} </title>
	<link rel="stylesheet" href="{{ asset('/home/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home/css/index/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/home/css/index/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/home/css/index/nav.css') }}">

    @yield('head')

    <style>
        .form_my{width: 100%;height: 50px;}
        .form_ico{font-size:20px;line-height:50px;margin-right: 10px;}
        .font_size_15{font-size: 15px;}
    </style>
</head>
<body>
	<header>
		<nav class="bg-nav navbar navbar-default" style="height:25px;">
			<div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a id="top"></a>
                    <a class="navbar-brand" href="{{ url('/') }}">首页</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                    @if(session('user'))
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">全国</a></li>
                        <li>
                            <a href="">{{ session('user')->name }}</a>
                            <ul>
                                <li><a href="{{ url('/logout') }}">退出</a></li>
                            </ul>
                        </li>
                    @elseif(session('shopkeeper'))
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">全国</a></li>
                        <li>
                            <a href="">{{ session('shopkeeper')->name }}</a>
                            <ul>
                                <li><a href="{{ url('/shopcenter/logout') }}">退出</a></li>
                            </ul>
                        </li>
                    @else
                    <ul class="nav navbar-nav navbar-left" id="main_nav">
                        <li><a href="#">全国</a></li>
                        <li><a href="#" class="cd-login">登录</a></li>
                        <li><a href="#" class="cd-signup">注册</a></li>
                    @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">我的开场 <span class="glyphicon glyphicon-user"></span></a>
                            <ul>
                                <li><a href="{{ url('/usercenter/index') }}">个人中心</a></li>
                                <li><a href="#">开场</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('/shopcart/index') }}">
                                购物车
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                            </a>
                            {{--<ul>--}}
                                {{--<li><a href="#">开场</a></li>--}}
                                {{--<li><a href="#">开场</a></li>--}}
                            {{--</ul>--}}
                        </li>
                        <li>
                            <a href="#">
                                收藏夹 
                                <span class="glyphicon glyphicon-heart"></span>
                            </a>
                            </li>
                        <li>
                            <a href="{{ url('/shopcenter/index') }}">
                                商家中心
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                            <ul>
                                <li><a href="{{ url('/shopcenter/index') }}">我的场地</a></li>
                                <li><a href="{{ url('/shopcenter/regist/index') }}">商户入驻</a></li>
                                @if(session('shopkeeper'))
                                <li><a href="{{ url('/shopcenter/logout') }}">退出</a></li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                客服中心
                                <span class="glyphicon glyphicon-earphone"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                网站导航
                                <span class="glyphicon glyphicon-globe"></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                手机开场
                                <span class="glyphicon glyphicon-phone"></span>
                            </a>
                        </li>
                    </ul>
                </div>
			</div>
		</nav>
	</header>

@yield('content')

    <footer>
        <div class="text-center footer">
            <p>
                <a href="/home/foot/aboutus">关于我们</a> | 
                <a href="/home/foot/aboutus">联系我们</a> | 
                <a href="/home/foot/aboutus">联系客服</a> | 
                <a href="">商家中心</a> | 
                <a href="">手机开场</a> | 
                <a href="/home/foot/aboutus">友情链接</a> | 
                <a href="/home/foot/aboutus">隐私政策</a>
            </p>
            <p>COPYRIGHT &copy; 2017 - 2023 ALL RIGHTS RESERVED 开场网 版权所有</p>
            <p>经营许可证编号 : 京ICP证160741号 京ICP备11042446号-5</p>
        </div>
    </footer>

    <div class="cd-user-modal"> 
        <div class="cd-user-modal-container">
            <ul class="cd-switcher">
                <li><a href="#0">用户登录</a></li>
                <li><a href="#0">注册新用户</a></li>
            </ul>

            <div id="cd-login"> <!-- 登录表单 -->
                <form class="cd-form" action="{{ url('/login') }}" method="post">
                    {{ csrf_field() }}
                    @if (session('info'))
                    <div class="form-group alert alert-danger">
                        <ul>
                            <li>{{ session('info') }}</li>
                        </ul>
                    </div>
                    @endif
                    <div class="form-group has-feedback">
                        <input type="text" name="name" value="{{ session('name') }}" class="form-control form_my" placeholder="请输入用户名" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-user form_ico form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" value="" class="form-control form_my" placeholder="请输入密码" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-lock form_ico form-control-feedback" style=""></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="code" class="form-control form_my pull-left" style="width: 300px;padding-left: 20px;" placeholder="请输入验证码" >
                        <a onclick="javascript:re_captcha();" class="pull-left"><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="120" height="50" id="c2c98f0de5a04167a9e427d883690ff6" border="0" style="margin: 0px 0px 0px 25px;"></a>
                    </div>
                    <div class="row" style="margin-top: 100px;">
                        <div class="col-xs-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember_me" >记住我
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-5" style="height: 50px;margin-top: 10px;">
                            <a href="{{ url('/forgot?t=1') }}" class="text-muted font_size_15">忘记密码？</a>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="cd-signup"> <!-- 注册表单 -->
                <form class="cd-form" action="{{ url('/regist') }}" method="post">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul style="color:white;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('info'))
                        <div class="alert alert-danger">
                            {{ session('info') }}
                        </div>
                    @endif
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control form_my" id="name" placeholder="请输入用户名" value="{{ old('name')  }}" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-user form_ico form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control form_my" placeholder="请输入密码" value="{{ old('password')  }}" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-lock form_ico form-control-feedback" style=""></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="re_password" class="form-control form_my" placeholder="请确认密码" value="{{ old('re_password')  }}" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-lock form_ico form-control-feedback" style=""></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control form_my" placeholder="请输入邮箱" value="{{ old('email')  }}" style="padding-left: 20px;">
                        <span class="glyphicon glyphicon-envelope form_ico form-control-feedback"></span>
                    </div>
                    <div class="row" style="margin-top: px;">
                        <div class="col-xs-8">
                            <input id="phone" type="text" name="phone" class="form-control form_my" placeholder="请输入手机号" value="{{ old('phone')  }}" style="padding-left: 20px;">
                            <span class="glyphicon glyphicon-phone form_ico form-control-feedback"></span>
                        </div>
                        <div class="col-xs-4">
                            <button type="button" id="getcode" class="btn btn-default btn-lg btn-block">获取验证码</button>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xs-8">
                            <input type="text" name="phonecode" class="form-control form_my" placeholder="请输入验证码" style="padding-left: 20px;">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">注册</button>
                        </div>
                    </div>
                </form>
            </div>

                        
        </div>
    </div> 


    <!-- 购物车 -->
    <div class="J-global-toolbar">
        <div class="toolbar-wrap J-wrap">
            <div class="toolbar">
                <div class="toolbar-panels J-panel">

                    <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-cart toolbar-animate-out">
                        <h3 class="tbar-panel-header J-panel-header">
                            <a href="#" class="title"><i></i><em class="title">购物车</em></a>
                            <span class="close-panel J-close"></span>
                        </h3>
                        <div class="tbar-panel-main">
                            <div class="tbar-panel-content J-panel-content">
                                <div id="J-cart-tips" class="tbar-tipbox hide">
                                    <div class="tip-inner">
                                        <span class="tip-text">还没有登录，登录后商品将被保存</span>
                                        <a href="#none" class="tip-btn J-login">登录</a>
                                    </div>
                                </div>
                                <div id="J-cart-render">
                                    <div class="tbar-cart-list">

                                        @if(isset($shopcart))
                                        @foreach($shopcart as $k=>$v)
                                        <div class="tbar-cart-item" >
                                        <div class="jtc-item-promo">
                                            <a href="{{ url('/detail/pid=') }}{{ $v['pid'] }}"><em class="promo-tag promo-mz">{{ $v['pname'] }}<i class="arrow"></i></em></a>
                                        <div class="promo-text"></div>
                                        </div>
                                        <div class="jtc-item-goods">
                                        <span class="p-img"><a href="{{ url('/detail/pid=') }}{{ $v['pid'] }}" target="_blank"><img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{ $v['pic'] }}" alt="" height="50" width="50" /></a></span>
                                        <div class="p-name">
                                            <a href="{{ url('/detail/pid=') }}{{ $v['pid'] }}" style="font-weight:bold;">{{ $v['mname'] }}</a><br>
                                            @if(isset($v['fname']))
                                                @foreach($v['fname'] as $key=>$val)
                                                    {{ $val }} &nbsp;
                                                @endforeach
                                            @endif
                                        </div>
                                            <div class="p-price"><strong>¥<span class="meetprice">{{ $v['price'] }}</span> ×1 </strong></div>
                                        <a href="{{ url('/shopcart/delete') }}/{{ $v['started_at'] }}" class="p-del J-del">删除</a>
                                        </div>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbar-panel-footer J-panel-footer">
                            <div class="tbar-checkout">
                                <div class="jtc-number"> <strong class="J-count count" >0</strong> 件商品 </div>
                                <div class="jtc-sum"> 共计：<strong>¥</strong><strong class="J-total"></strong> </div>
                                <a class="jtc-btn J-btn" href="{{ url('/shopcart/index') }}" target="_blank">去购物车结算</a>
                            </div>
                        </div>
                    </div>

                    <div style="visibility: hidden;" data-name="follow" class="J-content toolbar-panel tbar-panel-follow">
                        <h3 class="tbar-panel-header J-panel-header">
                            <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的关注</em> </a>
                            <span class="close-panel J-close"></span>
                        </h3>
                        <div class="tbar-panel-main">
                            <div class="tbar-panel-content J-panel-content">
                                <div class="tbar-tipbox2">
                                    <div class="tip-inner"> <i class="i-loading"></i> </div>
                                </div>
                            </div>
                        </div>
                        <div class="tbar-panel-footer J-panel-footer"></div>
                    </div>
                    
                    <div style="visibility: hidden;" class="J-content toolbar-panel tbar-panel-history toolbar-animate-in">
                        <h3 class="tbar-panel-header J-panel-header">
                            <a href="#" target="_blank" class="title"> <i></i> <em class="title">我的足迹</em> </a>
                            <span class="close-panel J-close"></span>
                        </h3>
                        <div class="tbar-panel-main">
                            <div class="tbar-panel-content J-panel-content">
                                <div class="jt-history-wrap">
                                    <ul>
                                        <li class="jth-item">
                                            <a href="#" class="img-wrap"> <img src="" height="100" width="100" /> </a>
                                            <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                                            <a href="#" target="_blank" class="price">￥498.00</a>
                                        </li>
                                        <li class="jth-item">
                                            <a href="#" class="img-wrap"> <img src="" height="100" width="100" /></a>
                                            <a class="add-cart-button" href="#" target="_blank">加入购物车</a>
                                            <a href="#" target="_blank" class="price">￥498.00</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="history-bottom-more" target="_blank">查看更多足迹商品 &gt;&gt;</a>
                                </div>
                            </div>
                        </div>
                        <div class="tbar-panel-footer J-panel-footer"></div>
                    </div>
                </div>
                
                <div class="toolbar-header"></div>
                
                <div class="toolbar-tabs J-tab">
                    <div class="toolbar-tab tbar-tab-cart">
                        <i class="tab-ico"></i>
                        <em class="tab-text ">购物车</em>
                        <span class="tab-sub J-count count"></span>
                    </div>
                    <div class=" toolbar-tab tbar-tab-follow">
                        <i class="tab-ico"></i>
                        <em class="tab-text">我的关注</em>
                        <span class="tab-sub J-count hide">0</span> 
                    </div>
                    <div class=" toolbar-tab tbar-tab-history ">
                        <i class="tab-ico"></i>
                        <em class="tab-text">我的足迹</em>
                        <span class="tab-sub J-count hide">0</span>
                    </div>
                </div>
                
                <div class="toolbar-footer">
                    <div class="toolbar-tab tbar-tab-top"> <a href="#top"> <i class="tab-ico"></i> <em class="footer-tab-text">顶部</em> </a> </div>
                    <div class=" toolbar-tab tbar-tab-feedback"> <a href="#" target="_blank"> <i class="tab-ico"></i> <em class="footer-tab-text ">反馈</em> </a> </div>
                </div>
                
                <div class="toolbar-mini"></div>
                
            </div>
            
            <div id="J-toolbar-load-hook"></div>
            
        </div>
    </div>
    <!-- end 购物车 -->

    <script src="{{ asset('/home/bootstrap/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/home/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/home/js/index/main.js') }}"></script>
    <script src="{{ asset('/home/js/index/nav.js') }}"></script>

@yield('js')

@yield('modaljs');

    <script>

        var $form_modal = $('.cd-user-modal'),
            $form_login = $form_modal.find('#cd-login'),
            $form_signup = $form_modal.find('#cd-signup'),
            $form_modal_tab = $('.cd-switcher'),
            $tab_login = $form_modal_tab.children('li').eq(0).children('a'),
            $tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
            $main_nav = $('#main_nav');

        @if(session('code') == 1 && !session('user'))
            $main_nav.children('ul').removeClass('is-visible');
            $form_modal.addClass('is-visible'); 

            $form_login.addClass('is-selected');
            $tab_login.addClass('selected');
        @endif

        @if(session('code') == 2 && !session('user'))
            $main_nav.children('ul').removeClass('is-visible');
            $form_modal.addClass('is-visible');

            $form_signup.addClass('is-selected');
            $tab_signup.addClass('selected');
        @endif

        // 登陆 验证码
        function re_captcha()
        {
            $url = "{{ URL('kit/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 注册 获取验证码按钮倒计时
        $("#getcode").click(function () {

            var phone = $("#phone").val();
            var patt = /^1[3578]\d{9}$/;
            var res = patt.test(phone);
            if(!res)
            {
                alert('请输入正确的手机号')
                return false;
            }else
            {
                $("#phone").attr('readonly', true);
            }

            var num = 60;
            var inte = setInterval(function(){
                $("#getcode").html(num+' s');
                $("#getcode").attr('disabled','disabled');
                if(num >= 1)
                {
                    num--;
                }
                if(num == 0)
                {
                    $("#getcode").attr('disabled',false);
                    $("#getcode").html('获取验证码');
                    $("#phone").attr('readonly', false);
                    clearInterval(inte);
                }
            },1000);

            //手机验证
            $.ajax('/storePhoneCode', {
                type: 'POST',
                data:{phone: phone},
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    alert('发送手机验证码失败');
                },
                dataType: 'json'
            });
        });

        $("#getcode2").click(function () {

            var phone = $("#phone2").val();
            var patt = /^1[3578]\d{9}$/;
            var res = patt.test(phone);
            if(!res)
            {
                alert('请输入正确的手机号');
                return false;
            }else
            {
                $("#phone2").attr('readonly', true);
            }

            var num = 60;
            var inte = setInterval(function(){
                $("#getcode2").html(num+' s');
                $("#getcode2").attr('disabled','disabled');
                if(num >= 1)
                {
                    num--;
                }
                if(num == 0)
                {
                    $("#getcode2").attr('disabled',false);
                    $("#getcode2").html('获取验证码');
                    $("#phone2").attr('readonly', false);
                    clearInterval(inte);
                }
            },1000);

            //手机验证
            $.ajax('/storePhoneCode', {
                type: 'POST',
                data:{phone: phone},
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    alert('发送手机验证码失败');
                },
                dataType: 'json'
            });
        });

        //验证首页注册用户名
        $("#name").blur(function(){

            var name = $(this).val();
            var patt = /d{8,20}/;
            var res = patt.test(name);
            if(!res)
            {
//                $.session.set('code',2);
                $.session.set('info','213232323');
                window.location.href='/';
//                $(location).attr('href','/');
            }
        });

        // 侧边购物车 //
        // 关闭购物车按钮
        $(".close-panel").on('click',function(){

            $(".toolbar-wrap").removeClass("toolbar-open");

        });
        // 显示购物车中商品数
        $(".count").html($(".tbar-cart-list").find(".tbar-cart-item").length);
        // 计算购物车中商品总价
        var prices = $(".meetprice");
        var sum = 0;
        $.each(prices,function(i,n){
            sum += parseInt($(this).html());
        });
        $(".J-total").html(sum);



    </script>
</body>
</html>