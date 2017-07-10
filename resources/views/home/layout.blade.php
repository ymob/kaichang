<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title  }} </title>
	<link rel="stylesheet" href="{{ asset('/home/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/home/css/index/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/home/css/index/style.css') }}">
    <style>
        .form_my{width: 100%;height: 50px;}
        .form_ico{font-size:20px;line-height:50px;margin-right: 10px;}
        .font_size_15{font-size: 15px;}
    </style>
</head>
<body>
	<header>
		<nav class="bg-nav navbar navbar-default ">
			<div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
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
                            <a href="#">
                                购物车
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                            </a>
                            <ul>
                                <li><a href="#">开场</a></li>
                                <li><a href="#">开场</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                收藏夹 
                                <span class="glyphicon glyphicon-heart"></span>
                            </a>
                            </li>
                        <li>
                            <a href="#">
                                商家中心
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                            <ul>
                                <li><a href="{{ url('/shopcenter/index') }}">我的场地</a></li>
                                <li><a href="{{ url('/shoper') }}">商户入驻</a></li>
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
                <a href="">关于我们</a> | 
                <a href="">联系我们</a> | 
                <a href="">联系客服</a> | 
                <a href="">商家中心</a> | 
                <a href="">手机开场</a> | 
                <a href="">友情链接</a> | 
                <a href="">隐私政策</a>
            </p>
            <p>COPYRIGHT &copy; 2007 - 2013 ALL RIGHTS RESERVED 开场网 版权所有</p>
            <p>经营许可证编号 : 京ICP证100040 号</p>
        </div>
    </footer>

    <div class="cd-user-modal"> 
        <div class="cd-user-modal-container">
            <ul class="cd-switcher">
                <li><a href="#0">用户登录</a></li>
                <li><a href="#0">注册新用户</a></li>
            </ul>

            <div id="cd-login"> <!-- 登录表单 -->
                <form class="cd-form" action="/login" method="post">
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
                            <a href="" class="text-muted font_size_15">忘记密码？</a>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="cd-signup"> <!-- 注册表单 -->
                <form class="cd-form" action="/regist" method="post">
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
                        <input type="text" name="name" class="form-control form_my" placeholder="请输入用户名" value="{{ old('name')  }}" style="padding-left: 20px;">
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

	<script src="{{ asset('/home/bootstrap/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/home/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/home/js/index/main.js') }}"></script>

@yield('js')

@yield('modaljs');

    <script>
        $('a[href="#"]').on('click', function(){
            retrun false;
        });


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
        function re_captcha() {
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
                    clearInterval(inte);
                }
            },1000);

            //手机验证
            var phone = $("#phone").val();
            $.ajax('/storePhoneCode', {
                type: 'POST',
                data:{phone:phone},
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    alert('发送手机验证码失败');
                },
                dataType: 'json'
            });
        });

    </script>
</body>
</html>