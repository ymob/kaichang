@extends('home.layout')

@section('content')
    <article>
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <h1>商户注册</h1>
                <hr>
				<div style="padding: 0px 50px;">
					<p>申请开场商户完全免费，一个企业只能开设一个账户；申请刀正式开通语句需1-3个工作日。了解更多请查看<a href="" style="color: blue;">《开场商户守则》</a></p>
					<div class="row" style="height: 83px;background-image: url('{{ asset('/home/images/regist_1.png') }}');background-repeat: no-repeat;background-size: 100%;"></div>
				</div>
				<div class="col-xs-8 col-xs-offset-2" style="border:1px solid #ccc;border-radius: 10px;margin-top:50px;padding-top: 50px;padding-bottom:50px;">
					<form action="{{ url('/shopcenter/regist/regist') }}" method="post">
	                    {{ csrf_field() }}
	                    @if (count($errors) > 0)
	                        <div class="alert alert-danger">
	                            <ul >
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
	                            <input id="phone2" type="text" name="phone" class="form-control form_my" placeholder="请输入手机号" value="{{ old('phone')  }}" style="padding-left: 20px;">
	                            <span class="glyphicon glyphicon-phone form_ico form-control-feedback"></span>
	                        </div>
	                        <div class="col-xs-4">
	                            <button type="button" id="getcode2" class="btn btn-default btn-lg btn-block">获取验证码</button>
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
            <hr>
        </div>
    </article>
@endsection