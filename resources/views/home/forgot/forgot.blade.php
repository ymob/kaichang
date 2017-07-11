@extends('home.layout')

@section('content')
	<article>
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <h1>忘记密码</h1>
                <hr>
                <div class="col-xs-6 col-xs-offset-3" style="margin-top: 50px;margin-bottom: 50px;">
                    <form action="{{ url('/forgot/email') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="t" value="{{ $t }}">
                        @if (session('info'))
                        <div class="form-group alert alert-danger">
                            <ul>
                                <li>{{ session('info') }}</li>
                            </ul>
                        </div>
                        @endif
                        <div class="form-group has-feedback">
                            <input type="enail" name="email" value="{{ session('email') }}" class="form-control form_my" placeholder="请输入邮箱" style="padding-left: 20px;">
                            <span class="glyphicon glyphicon-envelope form_ico form-control-feedback"></span>
                        </div>
                        <p class="text-info">输入您注册时填写的邮箱，然后登录您的邮箱，完成验证。</p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">登录邮箱完成验证</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </article>
@endsection