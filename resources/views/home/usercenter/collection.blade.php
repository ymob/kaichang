@extends('home.usercenter.layout')
@section('header')
    <style>
        .bw { filter: grayscale(100%); -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%); }
    </style>
@endsection

@section('con')
	<table class="table">
		<tr>
			<th>id</th>
			<th>场地名</th>
			<th>场地图</th>
			<th>取消收藏</th>
		</tr>
		@foreach($data as $val)
		<tr>
			<td style="line-height: 100px;">{{ $loop->index + 1 }}</td>
			@if($val->updown)
			<td style="line-height: 100px; font-size: 18px;">
				<a href="{{ url('/detail/pid='.$val->id) }}" style="color: #2D7FBE;">{{ $val->title }}</a>
			</td>
			<td>
				<a href="{{ url('/detail/pid='.$val->id) }}">
					<img src="{{ url('uploads/shoper/places/places/'.$val->pic) }}" height="100px" alt="场地图片">
				</a>
			</td>
			@else
			<td style="line-height: 100px; font-size: 18px;">
				<a href="javascript: no_up()" style="color: #bbb;">{{ $val->title }}</a>
			</td>
			<td>
				<a href="javascript: no_up()">
					<img class="bw" src="{{ url('uploads/shoper/places/places/'.$val->pic) }}" height="100px" alt="场地图片">
				</a>
			</td>
			@endif
			<td style="line-height: 100px;">
				<a href="javascript:" class="coll" index="{{ $val->id }}">取消收藏</a>
			</td>
		</tr>
		@endforeach
	</table>
@endsection

@section('javascript')
	<script>
        function no_up()
        {
        	alert('该场地已下架，可取消收藏。');
        }

        $('.coll').on('click', function(){
        	var msg = "您真的确定要取消吗？取消后不可恢复！\n\n请确认！";
            if (confirm(msg)==true){
            	var coll = $(this);
            	var pid = coll.attr('index');
            	$.ajax('/collection/update', {
                    data: {pid: pid},
                    type: 'post',
                    dataType: 'json',
                    success: function(data)
                    {
                        if(data.code == 1 && data.status == 0)
                        {
                            coll.parents('tr').remove();
                        }else
                        {
                            alert('系统异常，稍后重试');
                        }
                    },
                    error: function()
                    {
                        alert('系统异常，稍后重试');
                    }
                });
            }else{
                return false;
            }
        });
    </script>
@endsection