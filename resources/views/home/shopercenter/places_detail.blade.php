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
    </style>
@endsection

@section('con')

    <div class="row text-center" style="border:1px solid dodgerblue;">
       <div class="top">场地详情</div>
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
           <form action="{{ url('/shopcenter/places/detail') }}" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" name="id" value="{{ $data->id }}">
               <table border="0">
                    <tr>
                        <td class="tright">上架</td>
                        <td>
                            <span class="left ss">是 <input type="radio" name="updown" value="1"
                           @if($data->updown == 1)
                           checked
                           @endif
                           >&nbsp;</span>
                           <span class="left ss">否 <input type="radio" name="updown" value="0"
                           @if($data->updown == 0)
                           checked
                           @endif
                           ></span>
                        </td>
                    </tr>
                   <tr>
                       <td class="tright">
                        * 场地类型:
                       </td>
                       <td>
                           <select name="typeId" id="" class="s left">
                               <option value="">请选择</option>
                               <option value="1"
                                @if($data->typeId == 1)
                                selected
                                @endif
                               >酒店</option>
                               <option value="2"
                                @if($data->typeId == 2)
                                selected
                                @endif
                               >会议中心</option>
                               <option value="3"
                                @if($data->typeId == 3)
                                selected
                                @endif
                               >体育馆</option>
                               <option value="4"
                                @if($data->typeId == 4)
                                selected
                                @endif
                               >展览馆</option>
                               <option value="5"
                                @if($data->typeId == 5)
                                selected
                                @endif
                               >酒吧/餐厅/会所</option>
                               <option value="6"
                                @if($data->typeId == 6)
                                selected
                                @endif
                               >艺术中心/剧院</option>
                               <option value="7"
                                @if($data->typeId == 7)
                                selected
                                @endif
                               >咖啡厅/茶室</option>
                           </select>
                           <select name="hotelStar" id="" class="s left">
                               <option value="">酒店星级</option>
                               <option value="2"
                                @if($data->hotelStar == 2)
                                selected
                                @endif
                               >三星以下</option>
                               <option value="3"
                                @if($data->hotelStar == 3)
                                selected
                                @endif
                               >三星级</option>
                               <option value="4"
                                @if($data->hotelStar == 4)
                                selected
                                @endif
                               >四星级</option>
                               <option value="5"
                                @if($data->hotelStar == 5)
                                selected
                                @endif
                               >五星级</option>
                               <option value="6"
                                @if($data->hotelStar == 6)
                                selected
                                @endif
                               >六星级</option>
                               <option value="7"
                                @if($data->hotelStar == 7)
                                selected
                                @endif
                               >七星级</option>
                           </select>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 地址:
                       </td>
                       <td>
                           <select name="address1" class="s left" >
                               <option value="">请选择</option>
                           </select>
                           <select name="address2" class="s left" >
                               <option value="">请选择</option>
                           </select>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">

                       </td>
                       <td>
                           <input type="text" name="address3" class="m left" placeholder="请 填 写 详 细 街 道 位 置">
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 场地名称:
                       </td>
                       <td>
                           <input type="text" name="title" class="m left" value="{{ $data->title }}">
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            * 电话:
                       </td>
                       <td>
                           <input type="text" name="phone" class="m left" value="{{ $data->phone }}">
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            * 上传场地出租凭证:
                       </td>
                       <td>
                            <a href="{{ url('/uploads/shoper/places/evidence/'.$data->evidencePic) }}">
                                <img class=" left" src="{{ asset('/uploads/shoper/places/evidence/'.$data->evidencePic) }}" width="50" alt="场地出租凭证" title="点击查看原图">
                            </a>
                           <input type="file" name="evidencePic" class="sm left" style="margin:5px 10px 0px 10px;">
                           <span class="left">企业请上传公司营业执照副本复印件并加盖公章<br>闲置会议室出租请上传租赁合同或房产证</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            最大会场面积:
                       </td>
                       <td>
                           <input type="text" name="maxArea" value="{{ $data->maxArea }}" class="s left"><span class="left" style="line-height:30px;">平米</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            最多容纳人数:
                       </td>
                       <td>
                           <input type="text" name="maxPeople" value="{{ $data->maxPeople }}" class="s left"><span class="left" style="line-height:30px;">人</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            停车位:
                       </td>
                       <td>
                           <span class="left ss">有 <input type="radio" name="park" value="1"
                           @if($data->park == 1)
                           checked
                           @endif
                           >&nbsp;</span>
                           <span class="left ss">无 <input type="radio" name="park" value="0"
                           @if($data->park == 0)
                           checked
                           @endif
                           ></span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            可提供免费服务:
                       </td>
                       <td>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="1"
                                    <?php if(in_array('1', $data->freeService)) echo 'checked'; ?>
                               > 暖气</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="2"
                                    <?php if(in_array('2', $data->freeService)) echo 'checked'; ?>
                               > 地毯</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="3"
                                    <?php if(in_array('3', $data->freeService)) echo 'checked'; ?>
                               > 音响</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="4"
                                    <?php if(in_array('4', $data->freeService)) echo 'checked'; ?>
                               > 无线话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="5"
                                    <?php if(in_array('5', $data->freeService)) echo 'checked'; ?>
                               > 固定投影</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="6"
                                    <?php if(in_array('6', $data->freeService)) echo 'checked'; ?>
                               > 固定幕布</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="7"
                                    <?php if(in_array('7', $data->freeService)) echo 'checked'; ?>
                               > 移动投影</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="8"
                                    <?php if(in_array('8', $data->freeService)) echo 'checked'; ?>
                               > 电视屏</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="9"
                                    <?php if(in_array('9', $data->freeService)) echo 'checked'; ?>
                               > 白板</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="10"
                                    <?php if(in_array('10', $data->freeService)) echo 'checked'; ?>
                               > 移动舞台</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="11"
                                    <?php if(in_array('11', $data->freeService)) echo 'checked'; ?>
                               > 茶/水</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="12"
                                    <?php if(in_array('12', $data->freeService)) echo 'checked'; ?>
                               > 纸笔</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="13"
                                    <?php if(in_array('13', $data->freeService)) echo 'checked'; ?>
                               > 桌卡</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="14"
                                    <?php if(in_array('14', $data->freeService)) echo 'checked'; ?>
                               > 指引牌</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="15"
                                    <?php if(in_array('15', $data->freeService)) echo 'checked'; ?>
                               > 签到台</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="16"
                                    <?php if(in_array('16', $data->freeService)) echo 'checked'; ?>
                               > 鲜花</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="17"
                                    <?php if(in_array('17', $data->freeService)) echo 'checked'; ?>
                               > 茶歇</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="18"
                                    <?php if(in_array('18', $data->freeService)) echo 'checked'; ?>
                               > 有线话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="19"
                                    <?php if(in_array('19', $data->freeService)) echo 'checked'; ?>
                               > 台式话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="20"
                                    <?php if(in_array('20', $data->freeService)) echo 'checked'; ?>
                               > 小蜜蜂</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="21"
                                    <?php if(in_array('21', $data->freeService)) echo 'checked'; ?>
                               > 移动幕布</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="22"
                                    <?php if(in_array('22', $data->freeService)) echo 'checked'; ?>
                               > LED屏</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="23"
                                    <?php if(in_array('23', $data->freeService)) echo 'checked'; ?>
                               > 移动讲台</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="24"
                                    <?php if(in_array('24', $data->freeService)) echo 'checked'; ?>
                               > 宽带接口</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="25"
                                    <?php if(in_array('25', $data->freeService)) echo 'checked'; ?>
                               > 代客泊车</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="26"
                                    <?php if(in_array('26', $data->freeService)) echo 'checked'; ?>
                               > 停车场</span>
                           </div>

                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            可提供配套服务:
                       </td>
                       <td>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="supportService[]" value="1"
                                    <?php if(in_array('1', $data->supportService)) echo 'checked'; ?>
                               > 茶歇</span>
                               <span class="ss"><input type="checkbox" name="supportService[]" value="2"
                                    <?php if(in_array('2', $data->supportService)) echo 'checked'; ?>
                               > 客房</span>
                               <span class="ss"><input type="checkbox" name="supportService[]" value="3"
                                    <?php if(in_array('3', $data->supportService)) echo 'checked'; ?>
                               > AV设备</span>
                           </div>

                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 场地价格(起价):
                       </td>
                       <td>
                           <input type="text" name="price" value="{{ $data->price }}" class="s left"><span class="left" style="line-height:30px;"> 元/天</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            场地介绍:
                       </td>
                       <td>
                           <textarea name="description" id="" cols="80" rows="3" style="resize:none;float:left;margin:0px 15px;">{{ $data->description }}</textarea>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            上传照片:
                       </td>
                       <td>
                           {{--<input type="file" name="pic" multiple class="sm left" style="margin:5px 10px 0px 10px;">--}}
                            @foreach($data->pic as $key => $val)
                            <div style="width: 100%">
                                <a class="left" href="{{ url('/uploads/shoper/places/places/'.$val) }}">
                                    <img class="" src="{{ asset('/uploads/shoper/places/places/'.$val) }}" height="50px" alt="场地" title="点击查看原图">
                                </a>
                               <input type="file" name="pic[]" class="" style="margin:5px 10px 0px 10px;">
                               <span class="" style="line-height:35px;">展示大小: 576px * 350px</span>
                            </div>
                            @endforeach
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <button type="submit" class="btn btn-primary">修改</button>
                       </td>
                   </tr>
               </table>
           </form>
       </div>
    </div>

@endsection