@extends('home.layout2')

@section('header')
	<link rel="stylesheet" href="{{ asset('/home/css/index/index2.css') }}">
@endsection

@section('con')
	<div class="row bg-progress">
		<div class="col-md-2 "></div>
		<div class="col-md-8" ><span>首页>确认订单信息</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row base-title">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title"><span>基本信息</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row base-main">
		<div class="col-md-3 "></div>
		<div class="col-md-6" >
			<form>
				<div class="col-md-5" >
					活动名称:<input type="text" name="" value="">*<br/><br/>
					&nbsp;&nbsp;&nbsp;主办方:<input type="text" name="" value="">*<br/><br/>
					参会人数:<input type="text" name="" value="">*<br/><br/>
				</div>
				<div class="col-md-5" >
					&nbsp;&nbsp;&nbsp;联系人:<input type="text" name="" value="">*<br/><br/>
					联系方式:<input type="text" name="" value="">*<br/><br/>
					联系地址:<input type="text" name="" value="">*<br/><br/>
					
				</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row order-title">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title1"><span>订单信息</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-head">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title2">
			<div class="col-md-2 ">商家会场</div>
			<div class="col-md-2 ">类型</div>
			<div class="col-md-2 ">单价</div>
			<div class="col-md-2 ">档期</div>
			<div class="col-md-2 ">数量</div>
			<div class="col-md-2 ">小计</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-name">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title3">
			<div class="col-md-4 ">北京四川五粮液龙爪树宾馆</div>
			<div class="col-md-2 "><a href="#">联系客服</a></div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 "></div>
			
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-detail">
		<div class="col-md-2 "></div>
		<div class="col-md-8 "id="title3">
			<div class="col-md-2 ">
				<div class="left">
					<img src="{{ asset('/home/images/order_1.png') }}" width="40" height="40px">
				</div>
				<div class="left">
					<div class="describe"><span>场地方正</span></div>
					
				</div>
			</div>
			<div class="col-md-2 ">大宴会厅</div>
			<div class="col-md-2 ">300.00</div>
			<div class="col-md-2 ">2017年7月9日</div>
			<div class="col-md-2 ">1</div>
			<div class="col-md-2 ">300.00</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-detail">
		<div class="col-md-2 "></div>
		<div class="col-md-8 "id="title3">
			<div class="col-md-2 ">
				<div class="left">
					<img src="{{ asset('/home/images/order_2.png') }}" width="40" height="40px">
				</div>
				<div class="left">
					<div class="describe"><span>场地方正</span></div>
					
				</div>
			</div>
			<div class="col-md-2 ">会议茶歇</div>
			<div class="col-md-2 ">300.00</div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 ">1</div>
			<div class="col-md-2 ">300.00</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-name">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title3">
			<div class="col-md-6">
				<form>
					给商家留言:<input type="text" size="50">
				</form>
			</div>
			<div class="col-md-2 "><a href="#">场地租赁条款须知?</a></div>
			
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-name">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title3">
			<div class="col-md-4 ">北京四川五粮液龙爪树宾馆</div>
			<div class="col-md-2 "><a href="#">联系客服</a></div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 "></div>
			
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-detail">
		<div class="col-md-2 "></div>
		<div class="col-md-8 "id="title3">
			<div class="col-md-2 ">
				<div class="left">
					<img src="{{ asset('/home/images/order_1.png') }}" width="40" height="40px">
				</div>
				<div class="left">
					<div class="describe"><span>场地方正</span></div>
					
				</div>
			</div>
			<div class="col-md-2 ">大宴会厅</div>
			<div class="col-md-2 ">300.00</div>
			<div class="col-md-2 ">2017年7月9日</div>
			<div class="col-md-2 ">1</div>
			<div class="col-md-2 ">300.00</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-detail">
		<div class="col-md-2 "></div>
		<div class="col-md-8 "id="title3">
			<div class="col-md-2 ">
				<div class="left">
					<img src="{{ asset('/home/images/order_2.png') }}" width="40" height="40px">
				</div>
				<div class="left">
					<div class="describe"><span>场地方正</span></div>
					
				</div>
			</div>
			<div class="col-md-2 ">会议茶歇</div>
			<div class="col-md-2 ">300.00</div>
			<div class="col-md-2 "></div>
			<div class="col-md-2 ">1</div>
			<div class="col-md-2 ">300.00</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row order-name">
		<div class="col-md-2 "></div>
		<div class="col-md-8"id="title3">
			<div class="col-md-6">
				<form>
					给商家留言:<input type="text" size="50">
				</form>
			</div>
			<div class="col-md-2 "><a href="#">场地租赁条款须知?</a></div>
			
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 total">
			<div class="col-md-3 col-md-offset-9">总计:&nbsp;&nbsp;&nbsp;<span>¥330,300.00</span></div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="col-md-3 col-md-offset-9"><button><img src="{{asset('/home/images/submit.png')}}"></button></div>
		</div>
		<div class="col-md-2"></div>
	</div>


@endsection

@section('javascript')
    
@endsection