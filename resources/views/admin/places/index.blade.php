@extends('admin.layout')

@section('content')

	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            场地管理
            <small>场地列表</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">场地列表 </h3>&nbsp;&nbsp;&nbsp;&nbsp;

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if(session('info'))
                            <div class="alert alert-danger">
                                {{ session('info') }}
                            </div>
                        @endif

                        <form action="{{ url('/admin/places/index') }}" method="get">
                            <div class="row">
                                <div class="col-md-2">
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
                                <div class="col-md-4 col-md-offset-6">
                                    <div class="input-group input-group">
                                        <input type="text" name="keywords" value="{{ $request['keywords'] or '' }}" class="form-control">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">搜索</button>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </form>


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>场地名称</th>
                                <th>所属商户</th>
                                <th>场地类型</th>
                                <th>酒店星级</th>
                                <th>地址</th>
                                <th>电话</th>
                                <th>场地出租凭证</th>
                                <th>停车位</th>
                                <th>最大会场面积</th>
                                <th>最多容纳人数</th>
                                <th>可提供免费服务</th>
                                <th>可提供配套服务</th>
                                <th>场地介绍</th>
                                <th>场地图片（3张）</th>
                                <th>价格</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key => $val)
                            <tr class="parent">
                                <td class="ids">{{ $val->id  }}</td>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->name }}</td>
                                <td>
                                	@if($val->typeId == 1)
									酒店
                                	@elseif($val->typeId == 2)
									会议中心
                                	@elseif($val->typeId == 3)
                                	体育馆
                                	@elseif($val->typeId == 4)
                                	展览馆
                                	@elseif($val->typeId == 5)
                                	酒吧/餐厅/会所
                                	@elseif($val->typeId == 6)
                                	艺术中心/剧院
                                	@else
                                	咖啡厅/茶室
                                	@endif
                                </td>
                                <td>
                                	@if($val->hotelStar == 2)
									三星以下
                                	@elseif($val->hotelStar == 3)
									三星级
                                	@elseif($val->hotelStar == 4)
                                	四星级
                                	@elseif($val->hotelStar == 5)
                                	五星级
                                	@elseif($val->hotelStar == 6)
                                	六星级
                                	@else
                                	七星级
                                	@endif
                                </td>
                                <td>{{ $val->address }}</td>
                                <td>{{ $val->phone }}</td>
                                <td>
                                    <img src="{{ asset('/uploads/shoper/places/evidence/'.$val->evidencePic) }}" style="width: 50px;">
                                </td>
                                <td>{{ $val->park }}</td>
                                <td>{{ $val->maxArea }}</td>
                                <td>{{ $val->maxPeople }}</td>
                                <td>
    								@foreach($val->freeService as $f_k => $f_v)
                                    	@if($f_v == 1)
    									暖气
                                    	@elseif($f_v == 2)
    									地毯
                                    	@elseif($f_v == 3)
                                    	音响
                                    	@elseif($f_v == 4)
                                    	无线话筒
                                    	@elseif($f_v == 5)
                                    	固定投影
                                    	@elseif($f_v == 6)
                                    	固定幕布
                                    	@elseif($f_v == 7)
    									移动投影
                                    	@elseif($f_v == 8)
                                    	电视屏
                                    	@elseif($f_v == 9)
                                    	白板
                                    	@elseif($f_v == 10)
                                    	移动舞台
                                    	@elseif($f_v == 11)
                                    	茶/水
                                    	@elseif($f_v == 12)
    									纸笔
                                    	@elseif($f_v == 13)
                                    	桌卡
                                    	@elseif($f_v == 14)
                                    	指引牌
                                    	@elseif($f_v == 15)
                                    	签到台
                                    	@elseif($f_v == 16)
                                    	鲜花
                                    	@elseif($f_v == 17)
                                    	茶歇
                                    	@elseif($f_v == 18)
                                    	有线话筒
                                    	@elseif($f_v == 19)
                                    	台式话筒
                                    	@elseif($f_v == 20)
                                    	小蜜蜂
                                    	@elseif($f_v == 21)
                                    	移动幕布
                                    	@elseif($f_v == 22)
                                    	LED屏
                                    	@elseif($f_v == 23)
                                    	移动讲台
                                    	@elseif($f_v == 24)
                                    	宽带接口
                                    	@elseif($f_v == 25)
                                    	代客泊车
                                    	@else
    									停车场
                                    	@endif
                                        ,
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($val->supportService as $s_k => $s_v)
                                        @if($s_v == 1)
                                        茶歇
                                        @elseif($s_v == 2)
                                        客房
                                        @else
                                        AV设备
                                        @endif
                                        ,
                                    @endforeach
                                </td>
                                <td>{{ $val->description }}</td>
                                <td>
                                    @foreach($val->pic as $p_k => $p_v)
                                        <a href="{{ asset('/uploads/shoper/places/places/'.$p_v) }}"><img src="{{ asset('/uploads/shoper/places/places/'.$p_v) }}" style="width: 50px;"></a>
                                    @endforeach
                                </td>
                                <td>{{ $val->price }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="status_show">
                                                @if($val->status == 1)
                                                启用
                                                @else
                                                禁用
                                                @endif
                                            </span>&nbsp;
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="status_sel" index="places" href="javascript:">
                                                    @if($val->status == 1)
                                                    禁用
                                                    @else
                                                    启用
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                @foreach($val->meetplace as $mk => $mv)
                            <tr class="parent">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="display: none;" class="ids">{{ $mv->id }}</td>
                                <th>会场：</th>
                                <td>{{ $mv->title }}</td>
                                <td>面积：{{ $mv->area }}M<sup>2</sup></td>
                                <td>课桌式：{{ $mv->deskPeople }}</td>
                                <td>宴会式：{{ $mv->dinnerPeople }}</td>
                                <td>
                                    免费服务：
                                    @foreach($mv->freeService as $f_k => $f_v)
                                        @if($f_v == 1)
                                        暖气
                                        @elseif($f_v == 2)
                                        地毯
                                        @elseif($f_v == 3)
                                        音响
                                        @elseif($f_v == 4)
                                        无线话筒
                                        @elseif($f_v == 5)
                                        固定投影
                                        @elseif($f_v == 6)
                                        固定幕布
                                        @elseif($f_v == 7)
                                        移动投影
                                        @elseif($f_v == 8)
                                        电视屏
                                        @elseif($f_v == 9)
                                        白板
                                        @elseif($f_v == 10)
                                        移动舞台
                                        @elseif($f_v == 11)
                                        茶/水
                                        @elseif($f_v == 12)
                                        纸笔
                                        @elseif($f_v == 13)
                                        桌卡
                                        @elseif($f_v == 14)
                                        指引牌
                                        @elseif($f_v == 15)
                                        签到台
                                        @elseif($f_v == 16)
                                        鲜花
                                        @elseif($f_v == 17)
                                        茶歇
                                        @elseif($f_v == 18)
                                        有线话筒
                                        @elseif($f_v == 19)
                                        台式话筒
                                        @elseif($f_v == 20)
                                        小蜜蜂
                                        @elseif($f_v == 21)
                                        移动幕布
                                        @elseif($f_v == 22)
                                        LED屏
                                        @elseif($f_v == 23)
                                        移动讲台
                                        @elseif($f_v == 24)
                                        宽带接口
                                        @elseif($f_v == 25)
                                        代客泊车
                                        @else
                                        停车场
                                        @endif
                                        ,
                                    @endforeach
                                </td>
                                <td>
                                    可提供服务：
                                    @foreach($mv->supportService as $s_k => $s_v)
                                        @if($s_v == 1)
                                        茶歇
                                        @elseif($s_v == 2)
                                        客房
                                        @else
                                        AV设备
                                        @endif
                                        ,
                                    @endforeach
                                </td>
                                <td>价格：{{ $mv->price }}</td>
                                <td>
                                    <a href="{{ url('/uploads/shoper/places/meetplaces/'.$mv->pic) }}"><img src="{{ asset('/uploads/shoper/places/meetplaces/'.$mv->pic) }}" style="width: 50px;"></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="status_show">
                                                @if($mv->status == 1)
                                                启用
                                                @else
                                                禁用
                                                @endif
                                            </span>&nbsp;
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="status_sel" index="meetplaces" href="#">
                                                    @if($mv->status == 1)
                                                    禁用
                                                    @else
                                                    启用
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                                    @foreach($mv->facilitie as $fk => $fv)

                            <tr class="parent">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="display: none;" class="ids">{{ $fv->id }}</td>
                                <td>
                                    @if($fv->supportType == 1)
                                    客房
                                    @elseif($fv->supportType == 2)
                                    茶歇
                                    @else
                                    AV设备
                                    @endif
                                </td>
                                <td>
                                    @if($fv->supportType == 1)
                                        @if($fv->type == 1)
                                        单人间
                                        @elseif($fv->type == 2)
                                        标准间（双床）
                                        @elseif($fv->type == 3)
                                        双人间
                                        @elseif($fv->type == 4)
                                        套间客房
                                        @elseif($fv->type == 5)
                                        公寓式客房
                                        @elseif($fv->type == 6)
                                        总统套房
                                        @else
                                        特色客房
                                        @endif
                                    @elseif($fv->supportType == 2)
                                        @if($fv->type == 1)
                                        中式
                                        @else
                                        西式
                                        @endif
                                    @else
                                        @if($fv->type == 1)
                                        音响设备
                                        @elseif($fv->type == 2)
                                        麦克风
                                        @else
                                        投影仪
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $fv->price }}</td>
                                <td>
                                    <a href="{{ asset('/uploads/shoper/places/facilities/'.$fv->pic) }}"><img src="{{ asset('/uploads/shoper/places/facilities/'.$fv->pic) }}" style="width: 50px;"></a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="status_show">
                                                @if($fv->status == 1)
                                                启用
                                                @else
                                                禁用
                                                @endif
                                            </span>&nbsp;
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="status_sel" index="facilities" href="#">
                                                    @if($fv->status == 1)
                                                    禁用
                                                    @else
                                                    启用
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                                    @endforeach
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                        {{ $data->appends($request)->links() }}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 每页条数下拉框选中事件
        $('#num').on('change', function(){
            $('form').eq(0).submit();
        });
        
        // 状态开启关闭
        $('.status_sel').on('click', function(){
            var index = $(this).attr('index');
            var id = $(this).parents('.parent').find('.ids').html();
            var status = $.trim($(this).html());

            $(this).html($(this).parents('.btn-group').find('.status_show').html());
            $(this).parents('.btn-group').find('.status_show').html(status);

            if(status == '禁用')
            {
                var value = 0;
            }else
            {
                var value = 1;
            }

            $.ajax('/admin/user/ajaxrestatus', {
                type: 'POST',
                data: {id: id, table: index, status: value},
                success: function (data) {
                    if(data == 0) {
                        alert('修改失败，稍后重试');
                    }
                },
                error: function (data) {
                    alert('数据异常，稍后重试');
                },
                dataType: 'json'
            });

        });
    </script>
@endsection