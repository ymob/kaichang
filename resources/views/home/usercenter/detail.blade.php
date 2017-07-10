@extends('home.usercenter.layout')

@section('con')

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">我的资料</h3>
		</div>
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
		<form action="{{ url('/usercenter/updetail') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group">
					<label for="exampleInputPic">头像</label>
					<div class="row">
						<div class="col-xs-4">
							<img src="{{ asset('/uploads/user/'.$user->pic) }}" class="img-circle">
						</div>
						<div class="col-xs-8">
							<input type="file" name="pic">
				    		<p class="help-block">需要修改头像则点击上传</p>
						</div>
					</div>
				</div>
				<div class="form-group">
				  	<label for="exampleInputEmail1">Email</label>
				  	<input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<div class="form-group">
				  	<label for="exampleInputPassword1">手机号</label>
				  	<input type="text" name="phone" value="{{ $user->phone }}" class="form-control" id="exampleInputPassword1" placeholder="手机号">
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
		<form action="{{ url('/usercenter/uppassword') }}" method="post">
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