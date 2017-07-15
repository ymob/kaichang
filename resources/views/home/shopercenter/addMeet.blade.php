@extends('home.shopercenter.layout')

@section('header')
    <style>
        .top{width:100%;height:30px;background:#00c0ef;line-height:30px;font-size:16px;font-weight:bold;}
        form table{width:100%;}
        form table tr td{padding:0px 10px;}
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
            <form id="form" action="/shopcenter/insertMeet" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <table border="1">
                    <tr>
                        <td class="tright">
                            <input type="hidden" name="pid" value="{{ $pid }}">
                            * 会场名称:
                        </td>
                        <td>
                            <input type="text" name="title" class="m left" >
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            会场面积:
                        </td>
                        <td>
                            <input type="text" name="area" class="s left"><span class="left" style="line-height:30px;">平米</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright" rowspan="2">
                            最多容纳人数:
                        </td>
                        <td>
                            <span class="left" style="line-height:30px;">课桌式:</span> <input type="text" name="deskPeople" class="s left"><span class="left" style="line-height:30px;">人</span>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span class="left" style="line-height:30px;">宴会式:</span> <input type="text" name="dinnerPeople" class="s left"><span class="left" style="line-height:30px;">人</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            可提供免费服务:
                        </td>
                        <td>
                            <div class="left">
                                @foreach($arr['free'] as $v)
                                    <span class="ss"><input type="checkbox" name="freeService[]" value="{{ $arr['freeKeys'][$loop->index] }}"> {{ $v }}</span>
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            * 价格:
                        </td>
                        <td>
                            <input type="text" name="price" class="s left"><span class="left" style="line-height:30px;"> 元/天</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright">
                            上传照片:
                        </td>
                        <td>
                            <input type="file" name="pic" class="sm left">
                            <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="tright" rowspan="2">
                            可提供配套服务:
                        </td>
                        <td>
                            <div class="left">
                                <div class="left">
                                    <input type="hidden" id="sp" name="supportService" value="">
                                    @foreach($arr['support'] as $val)
                                        <button class="btn btn-default support" type="button" value="{{ $arr['supportKeys'][$loop->index] }}">{{ $val }}</button>
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
                            <div class="supportList" style="display:none;"></div>
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
                                                    <option value="">请选择</option>
                                                    <option value="1">单人间</option>
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
                                                <input type="text" name="" class="s left price"><span class="left"> 元/天</span>
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
                                                    <option value="">请选择</option>
                                                    <option value="1">中式</option>
                                                    <option value="2">西式</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="tright">
                                                价格:
                                            </td>
                                            <td>
                                                <input type="text" name="" class="s left price"><span class="left"> 元/天</span>
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
                                                    <option value="">请选择</option>
                                                    <option value="1">音响设备</option>
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
                                                <input type="text" name="" class="s left price"><span class="left" style="line-height:30px;"> 元/天</span>
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
                            <button type="submit" class="btn btn-primary">完成</button><span>&nbsp;&nbsp;&nbsp;</span>
                            <a class="btn btn-primary" href="#" role="button" style="color:white;">提交并继续添加会场</a>
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

            i++;
            var index = $(this).attr('value');

            arr[i] = index;
            val = arr.join(',');
            $("#sp").val(val);

            var obj = $(".supportList").eq(index).clone();

            var oldtop = obj.find(".top").html();
            var newtop = oldtop+'(配套服务'+i+')';
            obj.find(".top").html(newtop);

            obj.find(".supportType").attr('name','supportType'+i);

            obj.find(".glyphicon-remove").on('click',function() {
                $(this).parents(".supportList").css('display','none');
            });

            obj.find(".type").attr('name','type'+i);
            obj.find(".price").attr('name','price'+i);
            obj.find(".pic").attr('name','pic'+i);
            obj.css('display','block');

            $("#container").append(obj);

        });


    </script>
@endsection