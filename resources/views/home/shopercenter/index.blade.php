@extends('home.shopercenter.layout')
@section('header')
	<style>
		.order-title {
			border:1px solid #e3eaee;
			font-size:14px;
			color:#001f3b;
			height:40px;
			width:715px;
			border-right:none;
			/*border-radius: 10px;*/
		}
		.order-title li{
			cursor:pointer;
			float:left;
			padding:5px 32px;
			border-right:1px solid #e3eaee;
			position:relative;
			height:40px;
			line-height:30px;
		}
		.order-title li:hover{
			color:cornflowerblue;
			background:aliceblue;
		}
		.style-table
		{
			border:1px solid #e3eaee;
			width:715px;
		}
		.style-td{
			font-size:16px;
			font-family:serif,Times;
			color:#001f3b;
			border:1px solid  #e3eaee;
			text-align:center;
		}
		td{
			height:20px;
			line-height:10px;
		}
		td a:hover{
			color:cornflowerblue;
		}
		.myorder{
			width:100px;
			height:10px;
			margin:30px;
			font-size:20px;
		}
	</style>
@endsection
@section('con')
	<div class="myorder">待处理订单</div>
	<div>
	</div>
	<table class="style-table table table-striped table-hover" style="margin-top: 10px;">
		<tr class="style-tr info">

			<th class="style-td">编号</th>
			<th class="style-td">会场</th>
			<th class="style-td">详情</th>
			<th class="style-td">价格</th>
			<th class="style-td">状态</th>
			<th class="style-td">操作</th>
		</tr>
		@foreach($data as $key=>$val)
			<tr>

				<td class="style-td">{{$val['number']}}</td>
				<td class="style-td">
					<a href="{{ url('/detail/pid=') }}{{ $val['pid'] }}" target="_blank">
						<img src="{{ url('uploads/shoper/places/meetplaces/') }}/{{ $val['pic'] }}" alt="" height="50" width="50">
					</a>
				</td>
				<td class="style-td">
					{{ $val['pname'] }}&nbsp;{{$val['mname']}}<br>
					@if(isset($val['fname']))
						@foreach($val['fname'] as $k=>$v)
							{{ $v }}
						@endforeach
					@endif
				</td>
				<td class="style-td">{{$val['price']}}</td>
				<td class="style-td">
					@if($val['status']==1)
						未接单
					@elseif($val['status']==2)
						用户未付款
					@elseif($val['status']==3)
						交易中
					@elseif($val['status']==4)
						交易完成
					@elseif($val['status']==5)
						交易取消
					@endif
				</td>
				<td class="style-td">
					@if($val['status']==1)
						<a href="{{ url('/shopcenter/takeOrder/') }}/{{ $val['id'] }}">接单</a>
					@endif
					@if($val['status']==2)
						<a href="javascript:" class="pay">提醒付款</a>
					@endif
				</td>

			</tr>
		@endforeach

	</table>

@endsection

@section('javascript')
	<script>

        //全局变量
        var id=0;
        $(".del").click(function(){

            id=$(this).parents('.parent').find('.ids').html();
        });

        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });

        $(".cur").click(function(){
            // alert(111);
            $(this).addClass("current").siblings().removeClass("current");
        });

        $(".pay").on('click',function(){
            alert('已提醒用户尽快付款!');
        });

	</script>
@endsection

