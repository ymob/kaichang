@extends('home.shopercenter.layout')

@section('con')
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

                        {{--
                            <form action="/admin/user/index" method="get">
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
                        --}}


                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>场地名称</th>
                                <th>可提供免费服务</th>
                                <th>可提供配套服务</th>
                                <th>价格</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key => $val)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $val->title }}</td>
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
                                <td>
                                    {{ $val->price }}
                                </td>
                                <td>
                                    @if($val->status == 1)
                                    正常
                                    @else
                                    <span title="联系平台管理员" style="color: red;">关闭</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/shopcenter/meetplaces/detail?id='.$val->id.'&pid='.$pid) }}">详情</a> <br>
                                    <a href="{{ url('/shopcenter/meetplaces/delete?id='.$val->id) }}" onClick="javascript:return del();">删除</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{-- $data->appends($request)->links() --}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
@endsection

@section('javascript')
    <script>
        function del() {
            var msg = "您真的确定要删除吗？\n\n请确认！";
            if (confirm(msg)==true){
                return true;
            }else{
                return false;
            }
        }
    </script>
@endsection