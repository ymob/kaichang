@extends('home.shopercenter.layout')

@section('con')
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">我的资料</h3>
		</div>
		<hr>
		<h3>公司信息</h3>
		<span class="text-info">公司信息修改需要联系平台管理员。</span>
		<table class="table table-bordered">
			<tr>
				<th>公司名称</th>
				<td>{{ $shopdetail->name }}</td>
			</tr>
			<tr>
				<th>公司联系电话</th>
				<td>{{ $shopdetail->phone }}</td>
			</tr>
			<tr>
				<th>公司邮编</th>
				<td>{{ $shopdetail->postcode }}</td>
			</tr>
			<tr>
				<th>公司地址</th>
				<td>{{ $shopdetail->address }}</td>
			</tr>
			<tr>
				<th>公司营业执照</th>
				<td>
					<img src="{{ asset('/uploads/shoper/license/'.$shopdetail->license) }}" alt="">
				</td>
			</tr>
		</table>
		<hr><hr>
		@if (session('info'))
            <div class="alert alert-danger">
                <ul>
                    {{ session('info')  }}
                </ul>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	<!-- /.box-header -->
	<!-- form start -->
		<form action="{{ url('/shopcenter/updetail') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputPic">头像</label>
					<div class="row">
						<div class="col-xs-4">
							<img src="{{ asset('/uploads/shoper/pic/'.$shoper->pic) }}" class="img-circle" width="100">
						</div>
						<div class="col-xs-8">
							<input type="file" name="pic">
				    		<p class="help-block">需要修改头像则点击上传</p>
						</div>
					</div>
				</div>
				<div class="form-group">
				  	<label for="exampleInputEmail1">Email</label>
				  	<input type="email" name="email" value="{{ $shoper->email }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<div class="form-group">
				  	<label for="exampleInputPassword1">手机号</label>
				  	<input type="text" name="phone" value="{{ $shoper->phone }}" class="form-control" id="exampleInputPassword1" placeholder="手机号">
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">修改</button>
			</div>
		</form>
	</div>
	<hr><hr>
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">修改密码</h3>
		</div>
	<!-- /.box-header -->
	<!-- form start -->
		<form action="{{ url('/shopcenter/uppassword') }}" method="post">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
				  	<label for="exampleInputOld">原密码</label>
				  	<input type="password" name="oldpass" class="form-control" id="exampleInputOld" placeholder="输入原密码">
				</div>
				<div class="form-group">
				  	<label for="exampleInputNew">新密码</label>
				  	<input type="password" name="password" class="form-control" id="exampleInputNew" placeholder="输入新密码">
				</div>
				<div class="form-group">
				  	<label for="exampleInputSure">确认密码</label>
				  	<input type="password" name="surepass" class="form-control" id="exampleInputSure" placeholder="确认新密码">
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">修改</button>
			</div>
		</form>
	</div>
@endsection