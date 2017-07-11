@extends('home.layout2')

@section('header')
	<link rel="stylesheet" href="{{ asset('/home/css/index/index2.css') }}">
@endsection

@section('con')
	<div class="row bg-progress" >
		<div class="col-md-2 "></div>
		<div class="col-md-8" ><span>首页>订单支付</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row code">
		<div class="col-md-2 "></div>
		<div class="col-md-8 " >
			<div class="col-md-2 ">
				<img src="{{ asset('/home/images/code.png') }}" width="80" height="80px">
			</div>
			<div class="col-md-8 tip ">
				<span>订单提交成功:订单号:123123123</span><br/>
				<span>请您在24小时内完成支付,否则订单会被自动取消(档期紧张的会场期限以订单详情为准)</span>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row" >
		<div class="col-md-2 "></div>
		<div class="col-md-8 invoice" ><span class=" glyphicon glyphicon-download"></span>&nbsp;&nbsp;<span>发票选择</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" >
			<div class="">
				<div class="col-md-10">
					<form action="">
						<table>
							<tr>
								<th class="fsize">
									发票抬头:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
							<tr>
								<th class="fsize">
									开户行:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
							<tr>
								<th class="fsize">
									账号:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
							<tr>
								<th class="fsize">
									地址:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
							<tr>
								<th class="fsize">
									纳税人识别号:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
							<tr>
								<th class="fsize">
									电话:
								</th>
								<td>
									<input type="text" name="" value="" size="30px">*
								</td>
							</tr>
						</table>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>		
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row" >
		<div class="col-md-2 "></div>
		<div class="col-md-8 invoice" ><span class=" glyphicon glyphicon-download"></span>&nbsp;&nbsp;<span>付款方式</span></div>
		<div class="col-md-2"></div>
	</div>
	<div class="row" >
		<div class="col-md-2 "></div>
		<div class="col-md-8" >
			<div class="col-md-8 ">
				<div class="col-md-3 pay"><button class="btn btn-default">微信支付</button></div>
				<div class="col-md-3 pay"><button class="btn btn-default">支付宝支付</button></div>
				<div class="col-md-3 pay"><button class="btn btn-default">银联支付</button></div>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row " >
		<div class="col-md-2 "></div>
		<div class="col-md-8 bank border1" >
			<div class="col-md-3">
				<span class=" fa fa-circle-o"></span>&nbsp;&nbsp;<span>中国银行</span>
			</div>
			<div class="col-md-3">
				<span class=" "></span>&nbsp;&nbsp;<span>**********1234</span>
			</div>
			<div class="col-md-2">
				
				<span class=""></span>&nbsp;&nbsp;<span>储蓄卡|快捷</span>
			</div>
			<div class="col-md-4 total2">
				<span >总计:&nbsp;&nbsp;&nbsp;</span><span>¥330,300.00</span>
			</div>
		</div>
		<div class="col-md-2"></div>

	</div>
	<div class="row" style="margin:15px">
		<div class="col-md-2 "></div>
		<div class="col-md-8" >
			<div class="col-md-4"><span>请输入6位数字支付密码</span></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row" style="margin:15px">
		<div class="col-md-2 "></div>
		<div class="col-md-8" >
			<div class="col-md-2 "><span>□□□□□□</span></div>
			<div class="col-md-2 ">忘记支付密码?</div>
			<div class="col-md-4 "></div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="row" style="margin:15px">
		<div class="col-md-2 "></div>
		<div class="col-md-8" >
			<div class="col-md-2 "><button type="button" class="btn btn-danger">立即支付</button></div>
			<div class="col-md-2 "></div>
			<div class="col-md-4 "></div>
		</div>
		<div class="col-md-2"></div>
	</div>
@endsection