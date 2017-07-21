@extends('home.usercenter.layout')
@section('header')
    <style>
        .account-container{
            width:700px;
            border:1px solid #00a7d0;
            margin-left:13px;
            margin-bottom:13px;
            height:auto;
        }
        .user-title{
            width:700px;
            height:33px;
            border:1px solid #00a7d0;
            line-height:33px;
            background:#00a7d0;
            margin-bottom:20px;
        }
        .user-list{
            margin-left:30px;
        }
        .info{
            width:700px;
            height:40px;
            font-size:16px;
            background: #00a7d0;
            margin-left:13px;
            border-radius:3px;
            line-height:40px;
            /*padding:5px;*/
            margin:15px;
        }

    </style>
@endsection
@section('con')


    <div class="account-container">
        <form action="{{asset('/usercenter/updetails')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="user-title">个人信息</div>


            <ul class="user-list">
                <li class="clearfix">
                    <label>用户名</label>
                    <input type="text" name="name" value="{{session('user')->name}}" size="30px" readonly>
                </li><br/>
                <li class="clearfix">
                    &nbsp;&nbsp;&nbsp;<label>邮箱</label>
                    <input type="email" name="email" value="{{session('user')->email}}" size="30px">
                </li><br/>
                <li class="clearfix">
                    &nbsp;&nbsp;&nbsp;<label>电话</label>
                    <input type="text" name="phone" value="{{session('user')->phone}}" size="30px">
                </li><br/>
                <li class="clearfix">
                    <label>个人头像</label>
                    <input type="file" name="pic" value="" size="30px">
                </li><br/>
                <li class="clearfix">
                    <button class="btn btn-info">保存</button>
                </li><br/>

            </ul>

        </form>

    </div>

    @if (count($errors) > 0)
        <div class="info" >
            <ul>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    @if(session('info'))
        <div class="info" >
         提示:   {{ session('info') }}
        </div>
    @endif


    <div class="account-container">
        <form action="{{asset('usercenter/uppassword')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="user-title">修改密码</div>
            <ul class="user-list">
                <li class="clearfix">
                    <label>输入原始密码</label>
                    <input type="password" name="oldpass" value="" size="30px">
                </li><br/>
                <li class="clearfix">
                    &nbsp;&nbsp;&nbsp;&nbsp;<label>输入新密码</label>
                    <input type="password" name="password" value="" size="30px">
                </li><br/>
                <li class="clearfix">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>确认密码</label>
                    <input type="password" name="surepass" value="" size="30px">
                </li><br/>
                <li class="clearfix">
                    <button class="btn btn-info">保存</button>
                </li><br/>
      </ul>

        </form>

    </div>
@endsection