@extends('home.shopercenter.layout')

@section('header')
    <style>
        .top{width:100%;height:30px;background:#00a7d0;line-height:30px;font-size:16px;font-weight:bold;}
        form table{width:100%;}
        #form table tr td{padding:6px 10px;}
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
       <div class="top">发布场地</div>
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
           <form id="form" name="form" action="/shopcenter/insert" method="POST" enctype="multipart/form-data">
               {{ csrf_field() }}
               <table border="1">
                   <tr>
                       <td class="tright">
                        * 场地类型:
                       </td>
                       <td>
                           <select name="typeId" id="" class="s left">
                               <option value="">请选择</option>
                               <option value="1">酒店</option>
                               <option value="2">会议中心</option>
                               <option value="3">体育馆</option>
                               <option value="4">展览馆</option>
                               <option value="5">酒吧/餐厅/会所</option>
                               <option value="6">艺术中心/剧院</option>
                               <option value="7">咖啡厅/茶室</option>
                           </select>
                           <select name="hotelStar" id="" class="s left">
                               <option value="">酒店星级</option>
                               <option value="2">三星以下</option>
                               <option value="3">三星级</option>
                               <option value="4">四星级</option>
                               <option value="5">五星级</option>
                               <option value="6">六星级</option>
                               <option value="7">七星级</option>
                           </select>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 地址:
                       </td>
                       <td>
                           <select name="address1" class="s left select" >
                               <option value="">请选择</option>
                           </select>
                           <select name="address2" class="s left select" >
                               <option value="">请选择</option>
                           </select>
                           <select name="address3" class="s left select" >
                               <option value="">请选择</option>
                           </select>
                          

                       </td>
                   </tr>
                   <tr>
                       <td class="tright">

                       </td>
                       <td>
                           <input type="text" name="address4" class="m left" placeholder="请 填 写 详 细 街 道 位 置">
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 场地名称:
                       </td>
                       <td>
                           <input type="text" name="title" class="m left" >
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            * 电话:
                       </td>
                       <td>
                           <input type="text" name="phone" class="m left" >
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            * 上传场地出租凭证:
                       </td>
                       <td>
                           <input type="file" onchange="check1()" id="evidencePic" name="evidencePic" class="sm left" style="margin:5px 10px 0px 10px;">
                           <span class="left">企业请上传公司营业执照副本复印件并加盖公章<br>闲置会议室出租请上传租赁合同或房产证</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            最大会场面积:
                       </td>
                       <td>
                           <input type="text" name="maxArea" class="s left"><span class="left" style="line-height:30px;">平米</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            最多容纳人数:
                       </td>
                       <td>
                           <input type="text" name="maxPeople" class="s left"><span class="left" style="line-height:30px;">人</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            停车位:
                       </td>
                       <td>
                           <span class="left ss">有 <input type="radio" name="park" value="1" >&nbsp;</span>
                           <span class="left ss">无 <input type="radio" name="park" value="0"></span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            可提供免费服务:
                       </td>
                       <td>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="1"> 暖气</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="2"> 地毯</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="3"> 音响</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="4"> 无线话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="5"> 固定投影</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="6"> 固定幕布</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="7"> 移动投影</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="8"> 电视屏</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="9"> 白板</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="10"> 移动舞台</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="11"> 茶/水</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="12"> 纸笔</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="13"> 桌卡</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="14"> 指引牌</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="15"> 签到台</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="16"> 鲜花</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="17"> 茶歇</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="18"> 有线话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="19"> 台式话筒</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="20"> 小蜜蜂</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="21"> 移动幕布</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="22"> LED屏</span>
                           </div>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="freeService[]" value="23"> 移动讲台</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="24"> 宽带接口</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="25"> 代客泊车</span>
                               <span class="ss"><input type="checkbox" name="freeService[]" value="26"> 停车场</span>
                           </div>

                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            可提供配套服务:
                       </td>
                       <td>
                           <div class="left">
                               <span class="ss"><input type="checkbox" name="supportService[]" value="1"> 茶歇</span>
                               <span class="ss"><input type="checkbox" name="supportService[]" value="2"> 客房</span>
                               <span class="ss"><input type="checkbox" name="supportService[]" value="3"> AV设备</span>
                           </div>

                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                           * 场地价格(起价):
                       </td>
                       <td>
                           <input type="text" name="price" class="s left"><span class="left" style="line-height:30px;"> 元/天</span>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            场地介绍:
                       </td>
                       <td>
                           <textarea name="description" id="" cols="80" rows="3" style="resize:none;float:left;margin:0px 15px;"></textarea>
                       </td>
                   </tr>
                   <tr>
                       <td class="tright">
                            上传照片:
                       </td>
                       <td><input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                           <input type="file" id="pic" onchange="check()" name="pic" class="sm left" style="margin:5px 10px 0px 10px;">
                           <span class="left" style="line-height:35px;">展示大小: 576px * 350px</span>
                       </td>
                   </tr>
                   <tr>
                       <td colspan="2">
                           <button type="submit" class="btn btn-primary">已填写好场地信息,继续填写场地下的会场信息 <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                       </td>
                   </tr>
               </table>
           </form>
       </div>
    </div>

@endsection

@section('javascript')
  <script type="text/javascript">
      //默认获取省份信息
    $.get('/shopcenter/city',{"level":1,"upid":0},function(data){
      // console.log(data);
      var str="<option value=''>请选择</option>";
      $.each(data,function(i,n){
        str+="<option value='"+n.id+"'>"+n.name+"</option>";
      });
      $('.select').eq(0).html(str);
    },'json');

        //为省份添加change事件,查询对应城市信息
        $('.select').eq(0).on('change',function(){
          // $('select').eq(1).attr('class','form-control show');
          // $('select').eq(2).attr('class','form-control hidden');
          var value=$(this).val();
          $.get('/shopcenter/city',{"level":2,"upid":value},function(data){
            // console.log(data);
            var str="";
            $.each(data,function(i,n){
              str+="<option value='"+n.id+"'>"+n.name+"</option>";
            });
            $('.select').eq(1).html(str);
          },'json');

        });

        //为城市添加chang事件,查询对应县区信息
        $('.select').eq(1).on('change',function(){
          // $('select').eq(2).attr('class','form-control show');
          var value=$(this).val();
          $.get('/shopcenter/city',{"level":3,"upid":value},function(data){
            var str="";
            $.each(data,function(i,n){
              str+="<option value='"+n.id+"'>"+n.name+"</option>";
            });
            $('.select').eq(2).html(str);
          },'json');

        });



        //限制上传图片大小
         function check()
        {
          
          var imagSize =  document.getElementById("pic").files[0].size;
          var size = imagSize/(1024*1024);
          var res = size.toFixed(2);
          // alert("图片大小："+imagSize+"B")
          if(imagSize>1024*1024*0.5)
            alert("图片不得大于0.5MB，当前大小为："+ res+"M");
            return false;
        }

         function check1()
        {
          
          var imagSize =  document.getElementById("evidencePic").files[0].size;
          var size = imagSize/(1024*1024);
          var res = size.toFixed(2);
          // alert("图片大小："+imagSize+"B")
          if(imagSize>1024*1024*0.5)
            alert("图片不得大于0.5MB，当前大小为："+ res+"M");
            return false;
        }
     
     
          
      </script>
@endsection