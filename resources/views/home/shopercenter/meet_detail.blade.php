@extends('home.shopercenter.layout')

@section('header')
    <style>
        .top{width:100%;height:30px;background:#00c0ef;line-height:30px;font-size:16px;font-weight:bold;}
        form table{width:100%;}
        form table tr td{padding:6px 10px;}
        .tright{text-align:right;width:200px;}
        .ss{width:80px;height:30px;margin:0px 10px;}
        .s{width:130px;height:30px;margin:0px 10px;}
        .sm{width:200px;height:30px;margin:0px 10px;}
        .m{width:350px;height:30px;margin:0px 10px;}
        .left{float:left;}
        .right{float:right;line-height:30px;margin-right:10px;}
        .glyphicon-remove:hover{cursor:pointer;}
    </style>
@endsection

@section('con')

    <div class="row text-center" style="border:1px solid dodgerblue;">
        <div class="top">填写场地下的会场信息</div>
        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul >
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
            @endif
            <form id="form" action="{{ url('/shopcenter/meetplaces/detail') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table border="1">
                    <tr>
                        <td class="tright">
                            <input type="hidden" name="mid" value="{{ $mid }}">
                            * 会场名称:
                        </td>
                        <td>
                            <input type="text" name="title" value="{{ $meetplace->title }}" class="m left" >
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            会场面积:
                        </td>
                        <td>
                            <input type="text" name="area" value="{{ $meetplace->area }}" class="s left"><span class="left" style="line-height:30px;">平米</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright" rowspan="2">
                            最多容纳人数:
                        </td>
                        <td>
                            <span class="left" style="line-height:30px;">课桌式:</span> <input type="text" name="deskPeople" value="{{ $meetplace->deskPeople }}" class="s left"><span class="left" style="line-height:30px;">人</span>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span class="left" style="line-height:30px;">宴会式:</span> <input type="text" name="dinnerPeople" value="{{ $meetplace->dinnerPeople }}" class="s left"><span class="left" style="line-height:30px;">人</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            可提供免费服务:
                        </td>
                        <td>
                            <div class="left">
                                @if($arr['free'])
                                    @foreach($arr['free'] as $k => $v)
                                        @if(!is_array($v))
                                            <span class="ss"><input type="checkbox" name="freeService[]" value="{{ $k }}"> {{ $v }}</span>
                                        @else
                                            <span class="ss"><input type="checkbox" name="freeService[]" value="{{ $k }}" checked> {{ $v[0] }}</span>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            * 价格:
                        </td>
                        <td>
                            <input type="text" name="price" value="{{ $meetplace->price }}" class="s left"><span class="left" style="line-height:30px;"> 元/天</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            上传照片:
                        </td>
                        <td>
                            <a href="{{ url('/uploads/shoper/places/meetplaces/'.$meetplace->pic) }}">
                                <img src="{{ asset('/uploads/shoper/places/meetplaces/'.$meetplace->pic) }}" class="pull-left" height="50" alt="会场图片">
                            </a>
                            <input type="file" name="pic" class="sm left">
                            <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                        </td>
                    </tr>

                    <tr>
                        <td class="tright" rowspan="3">
                            可提供配套服务:
                        </td>
                        <td>
                            <table border="1">
                                <tr>
                                    <th class="text-center">id</th>
                                    <th class="text-center">配套服务</th>
                                    <th class="text-center">服务属性</th>
                                    <th class="text-center">价格</th>
                                    <th class="text-center">图片</th>
                                    <th class="text-center">删除</th>
                                </tr>
                                @foreach($fac as $key => $val)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    @if($val['supportType'] == 1)
                                    <td>茶歇</td>
                                        @if($val['type'] == 1)
                                        <td>中式</td>
                                        @else
                                        <td>西式</td>
                                        @endif
                                    @elseif($val['supportType'] == 2)
                                    <td>客房</td>
                                        @if($val['type'] == 1)
                                        <td>单人间</td>
                                        @elseif($val['type'] == 2)
                                        <td>标准间（双人床）</td>
                                        @elseif($val['type'] == 3)
                                        <td>双人间</td>
                                        @elseif($val['type'] == 4)
                                        <td>套间客房</td>
                                        @elseif($val['type'] == 5)
                                        <td>公寓式客房</td>
                                        @elseif($val['type'] == 6)
                                        <td>总统套房</td>
                                        @else
                                        <td>特色客房</td>
                                        @endif
                                    @else
                                    <td>AV设备</td>
                                        @if($val['type'] == 1)
                                        <td>音响设备</td>
                                        @elseif($val['type'] == 2)
                                        <td>麦克风</td>
                                        @else
                                        <td>投影仪</td>
                                        @endif
                                    @endif
                                    <td>{{ $val['price'] }}</td>
                                    <td>
                                        <a href="{{ url('/uploads/shoper/places/facilities/'.$val['pic']) }}">
                                            <img src="{{ asset('/uploads/shoper/places/facilities/'.$val['pic']) }}" height="50" alt="配套服务图片">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="javascript:" index="{{ $val->id }}" class="delete_server">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                    <tr>
                        
                        <td>
                            <div class="left">
                                <div class="left">
                                    <input type="hidden" id="sp" name="supportService" value="">
                                    @foreach($arr['support'] as $key => $val)
                                       <button class="btn btn-default support" type="button" value="{{ $key }}">{{ $val }}</button>
                                        {{--<span class="ss"><input type="checkbox" class="support" name="supportService[]" value="{{ $arr['supportKeys'][$loop->index] }}"> {{ $val }}</span>--}}
                                    @endforeach
                                    (点击添加,填写详细信息)
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td id="container">

                            {{--模板--}}
                            <div class="supportList" style="display:none;">
                                <div class="top">填写会场下的客房信息 <span class="right glyphicon glyphicon-remove"></span></div>
                                <div>
                                    <table>
                                        <tr>
                                            <td class="tright">
                                                客房分类:
                                                <input type="hidden" class="supportType" name="" value="1">
                                            </td>
                                            <td>
                                                <select name="" class="s left type">
                                                    <option value="1" selected>单人间</option>
                                                    <option value="2">标准间(双床)</option>
                                                    <option value="3">双人间</option>
                                                    <option value="4">套间客房</option>
                                                    <option value="5">公寓式客房</option>
                                                    <option value="6">总统套房</option>
                                                    <option value="7">特色客房</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                价格:
                                            </td>
                                            <td>
                                                <input type="text" name="" value="0" class="s left price"><span class="left"> 元/天</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                上传照片:
                                            </td>
                                            <td>
                                                <input type="file" name="" multiple class="sm left pic" style="margin:5px 10px 0px 10px;">
                                                <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="supportList" style="display:none;">
                                <div class="top">填写会场下的茶歇信息 <span class="right glyphicon glyphicon-remove"></span></div>
                                <div>
                                    <table>
                                        <tr>
                                            <td class="tright">
                                                茶歇类型:
                                                <input type="hidden" class="supportType" name="" value="2">
                                            </td>
                                            <td>
                                                <select name="" class="s left type">
                                                    <option value="1" selected>中式</option>
                                                    <option value="2">西式</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                价格:
                                            </td>
                                            <td>
                                                <input type="text" name="" value="0" class="s left price"><span class="left"> 元/天</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                上传照片:
                                            </td>
                                            <td>
                                                <input type="file" name="" multiple class="sm left pic">
                                                <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="supportList" style="display:none;">
                                <div class="top">填写会场下的AV设备信息 <span class="right glyphicon glyphicon-remove"></span></div>
                                <div>
                                    <table>
                                        <tr>
                                            <td class="tright">
                                                设备类型:
                                                <input type="hidden" class="supportType" name="" value="3">
                                            </td>
                                            <td>
                                                <select name="" class="s left type">
                                                    <option value="1" selected="">音响设备</option>
                                                    <option value="2">麦克风</option>
                                                    <option value="3">投影仪</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                价格:
                                            </td>
                                            <td>
                                                <input type="text" name="" value="0" class="s left price"><span class="left" style="line-height:30px;"> 元/天</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                上传照片:
                                            </td>
                                            <td>
                                                <input type="file" name="" multiple class="sm left pic" style="margin:5px 10px 0px 10px;">
                                                <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" class="btn btn-primary"> 修改 & 提交 </button>
                        </td>
                    </tr>
                </table>
            </form>


        </div>
    </div>

@endsection

@section('javascript')
    <script>

    //配套服务的添加与删除
    var i = 0;
    var val = '';
    var arr = [];
    $(".support").on('click',function () {
        if(i >= 50)
        {
            alert('超过提交上限，请分开提交');
            return false;
        }
        i++;
        var index = $(this).attr('value');

        arr[i] = index;

        var obj = $(".supportList").eq(index - 1).clone();
        var oldtop = obj.find(".top").html();
        var newtop = oldtop+'(配套服务'+i+')';
        obj.find(".top").html(newtop);

        obj.find(".supportType").attr('name','supportType'+i);

        obj.find(".glyphicon-remove").on('click',function() {
            arr.removeByValue(index);
            $(this).parents(".supportList").remove();
        });

        obj.find(".type").attr('name','type'+i);
        obj.find(".price").attr('name','price'+i);
        obj.find(".pic").attr('name','pic'+i);
        obj.css('display','block');

        $("#container").append(obj);

    });

    $('#form').on('submit', function(){

        val = arr.join(',');
        $("#sp").val(val);

    });

    $('.delete_server').on('click', function(){
        var id = $(this).attr('index');
        var tr = $(this).parents('tr').eq(0);
        $.ajax('/shopcenter/facilities/delete?id='  , {
            type: 'POST',
            data: {'id': id},
            dataType: 'json',
            success: function(data)
            {
                if(data)
                {
                    tr.remove();
                }else
                {
                    alert('删除失败！');
                }
            },
            error: function()
            {
                alert();
            }
        });
    });
    Array.prototype.removeByValue = function(val) {
      for(var i=0; i<this.length; i++) {
        if(this[i] == val) {
          this.splice(i, 1);
          break;
        }
      }
    }
    </script>
@endsection