@extends('home.layout')

@section('head')
	@yield('header')
@endsection

@section('content')
	<article>
        <div class="container">
        	<div class="row">

        	</div>
            <div class="row">
	            <div class="col-xs-3">
	            	<div class="list-group">
						<a href="{{ url('/shopcenter/index') }}" class="list-group-item active">商户中心</a>
						<a href="{{ url('/shopcenter/detail') }}" class="list-group-item">我的资料</a>
						<a href="{{ url('/shopcenter/release') }}" class="list-group-item">发布场地</a>
						<a href="{{ url('/shopcenter/orders') }}" class="list-group-item">我的订单</a>
						<a href="{{ url('/shopcenter/place/add') }}" class="list-group-item">商品发布</a>
						<a href="#" class="list-group-item">我的足迹</a>
					</div>
	            </div>
				<div class="col-xs-9">
					@yield('con')
				</div>
            </div>
        </div>
    </article>
@endsection

@section('js')
	@yield('javascript')
@endsection