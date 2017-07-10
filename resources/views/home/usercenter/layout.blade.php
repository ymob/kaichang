@extends('home.layout')

@section('content')
	<article>
        <div class="container">
        	<div class="row">

        	</div>
            <div class="row">
	            <div class="col-xs-3">
	            	<div class="list-group">
						<a href="{{ url('/usercenter/index') }}" class="list-group-item active">个人中心</a>
						<a href="{{ url('/usercenter/detail') }}" class="list-group-item">我的资料</a>
						<a href="{{ url('/usercenter/orders') }}" class="list-group-item">我的订单</a>
						<a href="#" class="list-group-item">我的收藏</a>
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