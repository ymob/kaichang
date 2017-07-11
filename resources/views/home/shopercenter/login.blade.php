@extends('home.layout')

@section('content')
    <article>
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <h1>加盟商登录</h1>
                <hr>
                <div class="col-xs-6 col-xs-offset-3" style="margin-top: 50px;margin-bottom: 50px;">
                    <form action="{{ url('/shopcenter/dologin') }}" method="post">
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
                        <div class="form-group has-feedback row">
                            <div class="col-md-8">
                                <input type="text" name="code" class="form-control form_my pull-left" placeholder="请输入验证码" >
                            </div>
                            <div class="col-md-4">
                                <a onclick="javascript:re_captcha();" class="pull-left"><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="120" height="50" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember_me" >记住我
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-3" style="height: 50px;margin-top: 10px;">
                                <a href="{{ url('/forgot?t=2') }}" class="text-muted font_size_15">忘记密码？</a>
                            </div>
                            <div class="col-xs-7">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </article>
@endsection