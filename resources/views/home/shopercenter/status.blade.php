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
					<p>申请开场商户完全免费，一个企业只能开设一个账户；申请到正式开通语句需1-3个工作日。了解更多请查看<a href="" style="color: blue;">《开场商户守则》</a></p>
					<div class="row" style="height: 83px;background-image: url('{{ asset('/home/images/regist_3.png') }}');background-repeat: no-repeat;background-size: 100%;"></div>
				</div>
				<div class="col-xs-8 col-xs-offset-2" style="border:1px solid #ccc;border-radius: 10px;margin-top:50px;padding-top: 50px;padding-bottom:50px;">
					<h3>您公司信息已经提交我平台，等待管理员审核。</h3>
				</div>
            </div>
            <hr>
        </div>
    </article>
@endsection