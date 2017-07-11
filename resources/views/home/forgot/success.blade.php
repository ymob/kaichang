@extends('home.layout')

@section('content')
	<article>
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <h1>邮件发送成功</h1>
                <hr>
                <p style="font-size: 20px;">邮件已成功发送至你的邮箱，你现在可以登录你的邮箱并完成验证。</p>
                <a style="color: #3399CC;font-size: 20px;" href="{{ url('http://mail.'.$email) }}">点击登录邮箱</a>
            </div>
            <hr>
        </div>
    </article>
@endsection