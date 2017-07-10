@extends('home.usercenter.layout')

@section('con')
	<div class="box">
	    <div class="box-body">
	    	<div class="row">
	    		<div class="col-xs-3">
	    			<a href="{{ url('/usercenter/index?status=1') }}" class="list-group-item
					@if($code == 1)
	    			list-group-item-success
					@endif
	    			">未付款</a>
	    		</div>
	    		<div class="col-xs-3">
	    			<a href="{{ url('/usercenter/index?status=2') }}" class="list-group-item
					@if($code == 2)
	    			list-group-item-success
					@endif
	    			">审核中</a>
	    		</div>
	    		<div class="col-xs-3">
	    			<a href="{{ url('/usercenter/index?status=3') }}" class="list-group-item
					@if($code == 3)
	    			list-group-item-success
					@endif
	    			">使用中</a>
	    		</div>
	    		<div class="col-xs-3">
	    			<a href="#" class="list-group-item">未评论</a>
	    		</div>
	    	</div>
			<table class="table table-bordered" style="margin-top: 50px;">
				<tr>
					<th>日期</th>
					<th>编号</th>
					<th>商家</th>
					<th>价格</th>
					<th>详情</th>
				</tr>
				@foreach($data as $key => $val)
				<tr>
					<td>{{ date('Y-m-d', $val->created_at) }}</td>
					<td>{{ $val->number }}</td>
					<td>
						@foreach($val->snames as $k => $v)
							<a href="">{{ $v->name }}</a>
						@endforeach
					</td>
					<td>{{ $val->price }}</td>
					<td>
						<a href="">订单详情</a>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
  </div>
@endsection