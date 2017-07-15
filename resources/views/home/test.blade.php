@extends('home.layout')

@section('content')
	<article>
        <div class="container">
        	<div class="row">

        	</div>
            <div class="row">

            	@foreach($data as $a)
            	<div class="border-blue pull-left">
	                <a id="input_trigger_demo{{ $loop->index }}" href="#">
	                <span id="date_demo{{ $loop->index }}"></span>
	            	<input type="hidden" name="time">
	                <span class="caret"></span>
	                </a>
            	</div>
	            <script type="text/javascript">

	                var dateRange = new pickerDateRange('date_demo{{ $loop->index }}', {
	                    aRecent7Days : 'aRecent7DaysDemo2', //最近7天
	                    isTodayValid : false,
	                    startDate : '2017-04-14',
	                    disCertainDate : [4, 2],
	                    //needCompare : true,
	                    //isSingleDay : true,
	                    //shortOpr : true,
	                    dayRangeMax : '999', // 日期最大范围(以天计算)
	                    startDateId : 'startDate',
	                    endDateId : 'endDate',
	                    defaultText : ' - ',
	                    inputTrigger : 'input_trigger_demo3',
	                    theme : 'ta',
	                    success : function(obj) {
	                    	$('#date_demo{{ $loop->index }}').next('input').attr('value', obj.startDate + ',' + obj.endDate);
							// console.log(obj);	                        
	                    }
	                });
	            </script>
				@endforeach

            </div>
        </div>
    </article>
@endsection