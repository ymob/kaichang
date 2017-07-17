@extends('home.layout')

@section('head')

	<link rel="stylesheet" href="{{ asset('/home/css/shopcenter/index.css') }}">

	@yield('header')
@endsection

@section('content')

			<div class="container">
				<div class="row">

				</div>
				<div class="col-xs-3">
					<div class="user-wrapper">
						<div class="user-info">
							<img src="/uploads/shoper/pic/{{session('shopkeeper')->pic}}" class="user-img" alt="个人头像">
							<div class="user-name">{{session('shopkeeper')->name}}</div>
							<a href="{{asset('/shopcenter/detail')}}" class="improve-info">修改个人信息</a>
						</div>

						<div>
							<ul class="nav-son">
								<li class="clear-fix active-nav-son left-list">
									<i class="glyphicon glyphicon-pawn"></i>
									<a href="{{asset('/shopcenter/index')}}">商户中心</a>
								</li>
								<li>
									<i class="glyphicon glyphicon-pawn"></i>
									<a href="{{asset('/shopcenter/detail')}}">我的资料</a>
								</li>
								<li>
									<i class="glyphicon glyphicon-gift"></i>
									<a href="{{asset('/shopcenter/release')}}"  class="left-list">发布场地</a>
								</li>
								<li>
									<i class="glyphicon glyphicon-gift"></i>
									<a href="{{asset('/shopcenter/release')}}"  class="left-list">场地管理</a>
								</li>
								<li>
									<i class="glyphicon glyphicon-queen"></i>
									<a href="{{asset('/shopcenter/release')}}"  class="left-list">我的订单</a>
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
	@yield('javascript')
@endsection