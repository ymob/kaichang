@extends('home.usercenter.layout')

@section('con')
	<div class="box">
	    <div class="box-body">
	    	<form action="/usercenter/orders" method="get">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <select id="num" name="num" class="form-control">
                                <option value="10"
                                        @if(!empty($request['num']) && $request['num']=='10')
                                        selected="selected"
                                        @endif
                                >每页10条</option>
                                <option value="25"
                                        @if(!empty($request['num']) && $request['num']=='25')
                                        selected="selected"
                                        @endif
                                >每页25条</option>
                                <option value="50"
                                        @if(!empty($request['num']) && $request['num']=='50')
                                        selected="selected"
                                        @endif
                                >每页50条</option>
                                <option value="100"
                                        @if(!empty($request['num']) && $request['num']=='100')
                                        selected="selected"
                                        @endif
                                >每页100条</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-4 col-xs-offset-4">
                        <div class="form-group">
                            <select id="status" name="status" class="form-control">
                            	<option value="">所有订单</option>
                                <option value="1"
                                        @if(!empty($request['status']) && $request['status']=='1')
                                        selected="selected"
                                        @endif
                                >未付款</option>
                                <option value="2"
                                        @if(!empty($request['status']) && $request['status']=='2')
                                        selected="selected"
                                        @endif
                                >审核中</option>
                                <option value="3"
                                        @if(!empty($request['status']) && $request['status']=='3')
                                        selected="selected"
                                        @endif
                                >租赁中</option>
                                <option value="4"
                                        @if(!empty($request['status']) && $request['status']=='4')
                                        selected="selected"
                                        @endif
                                >完成租赁</option>
                                <option value="5"
                                        @if(!empty($request['status']) && $request['status']=='4')
                                        selected="selected"
                                        @endif
                                >交易取消</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
			<table class="table table-bordered" style="margin-top: 50px;">
				<tr>
					<th>日期</th>
					<th>编号</th>
					<th>商家</th>
					<th>价格</th>
					<th>状态</th>
					<th>详情</th>
				</tr>
				@foreach($data as $key => $val)
				<tr>
					<td>{{ date('Y-m-d', $val->created_at) }}</td>
					<td>{{ $val->number }}</td>
					<td>
						@foreach($val->snames as $k => $v)
							<a href="">{{ $v->name }}</a><br>
						@endforeach
					</td>
					<td>{{ $val->price }}</td>
					<td>
						@if($val->status == 1)
							未付款
						@elseif($val->status == 2)
							审核中
						@elseif($val->status == 3)
							租赁中
						@elseif($val->status == 4)
							完成租赁
						@else
							交易取消
						@endif
					</td>
					<td>
						<a href="">订单详情</a>
					</td>
				</tr>
				@endforeach
			</table>
			{{ $data->appends($request)->links() }}
		</div>
  </div>
@endsection

@section('js')
	<script>
		$('#num').on('change', function(){
			$('form').eq(0).submit();
		});
		$('#status').on('change', function(){
			$('form').eq(0).submit();
		});
	</script>
@endsection