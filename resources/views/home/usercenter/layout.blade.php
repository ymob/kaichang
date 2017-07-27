@extends('home.layout')

@section('head')
	<link rel="stylesheet" href="{{ asset('/home/css/usercenter/index.css') }}">
	
	@yield('header')

@endsection

@section('content')

		<div class="container">
			<div class="row">

			</div>
			<div class="col-xs-3">
				<div class="user-wrapper">
					<div class="user-info">
						<img src="{{ url('/uploads/user/') }}/{{session('user')->pic}}" class="user-img" alt="个人头像">
						<div class="user-name">{{session('user')->name}}</div>
						<a href="{{asset('/usercenter/details')}}" class="improve-info">修改个人信息</a>
					</div>

					<div>
						<ul class="nav-son">
							<li class="clear-fix left-list">
								<i class="glyphicon glyphicon-pawn"></i>
								<a href="{{asset('/usercenter/order/0')}}">我的订单</a>
							</li>
							<li class="left-list">
								<i class="glyphicon glyphicon-gift"></i>
								<a href="{{asset('usercenter/shopcart/shopcart')}}">购物车</a>
							</li>
							<li class="left-list">
								<i class="glyphicon glyphicon-heart"></i>
								<a href="/usercenter/collection">我的收藏</a>
							</li>
							<li class="left-list" style="border-bottom:none">
								<i class="glyphicon glyphicon-king"></i>
								<a href="#">我的足迹</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-9">
				@yield('con')
			</div>
		</div>

@endsection

@section('js')
	<script>
		
    $(".left-list").click(function(){
    	// alert(111);
        $(this).addClass("active-nav-son").siblings().removeClass("active-nav-son");
    });

    $.each($(".nav-son li"),function(i,n){
        $(this).removeClass('active-nav-son');
    });

    $(".nav-son li").eq(0).addClass('active-nav-son');

	</script>

	@yield('javascript')

@endsection