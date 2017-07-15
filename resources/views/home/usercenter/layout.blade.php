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
						<img src="/uploads/user/{{session('user')->pic}}" class="user-img" alt="个人头像">
						<div class="user-name">{{session('user')->name}}</div>
						<a href="{{asset('/usercenter/details')}}" class="improve-info">修改个人信息</a>
					</div>

					<div>
						<ul class="nav-son">
							<li class="clear-fix active-nav-son left-list">
								<i class="glyphicon glyphicon-pawn"></i>
								<a href="{{asset('/usercenter/order/0')}}">我的订单</a>

							</li>
							<li>
								<i class="glyphicon glyphicon-gift"></i>
								<a href="#"  class="left-list">购物车</a>

							</li>
							<li>
								<i class="glyphicon glyphicon-queen"></i>
								<a href="#"  class="left-list">我的收藏</a>

							</li>
							<li>
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

//        alert($);
        $('a').click(function() {
            alert(1);
        });


	</script>
@endsection