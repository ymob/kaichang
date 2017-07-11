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
					<div class="row" style="height: 83px;background-image: url('{{ asset('/home/images/regist_2.png') }}');background-repeat: no-repeat;background-size: 100%;"></div>
				</div>
				<div class="col-xs-8 col-xs-offset-2" style="border:1px solid #ccc;border-radius: 10px;margin-top:50px;padding-top: 50px;padding-bottom:50px;">
					<form action="{{ url('/shopcenter/regist/detail/add/'.$token) }}" method="post" method="post" enctype="multipart/form-data">
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
	                        <input type="text" name="name" class="form-control form_my" placeholder="请输入公司名" value="{{ old('name')  }}" style="padding-left: 20px;">
	                        <span class="glyphicon glyphicon-home form_ico form-control-feedback"></span>
	                    </div>
	                    <div class="form-group has-feedback">
	                        <input type="text" name="phone" class="form-control form_my" placeholder="请输入公司联系人手机号" value="{{ old('phone')  }}" style="padding-left: 20px;">
	                        <span class="glyphicon glyphicon-phone-alt form_ico form-control-feedback"></span>
	                    </div>
	                    <div class="form-group has-feedback">
	                        <input type="text" name="postcode" class="form-control form_my" placeholder="请输入邮编" value="{{ old('postcode')  }}" style="padding-left: 20px;">
	                        <span class="glyphicon glyphicon-flag form_ico form-control-feedback"></span>
	                    </div>
	                    <div class="form-group has-feedback">
	                        <input type="text" name="address" class="form-control form_my" placeholder="请输入公司地址" value="{{ old('address')  }}" style="padding-left: 20px;">
	                        <span class="glyphicon glyphicon-envelope form_ico form-control-feedback"></span>
	                    </div>
	                    <div class="form-group has-feedback">
	                        <input type="file" name="license" class="form-control form_my"value="{{ old('email')  }}" style="padding-left: 20px;">
	                        <span class="glyphicon glyphicon-open-file form_ico form-control-feedback"></span>
	                    	<p class="text-info text-right">上传公司营业执照&nbsp;&nbsp;&nbsp;&nbsp;</p>
	                    </div>

	                    <div class="row" style="margin-top: 15px;">
	                        <div class="col-xs-12">
	                            <button type="submit" class="btn btn-primary btn-lg btn-block">提交审核</button>
	                        </div>
	                    </div>
	                </form>	
				</div>	
            </div>
            <hr>
        </div>
    </article>
@endsection