@extends('home.layout')

@section('content')
	<article>
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <h1>修改密码</h1>
                <hr>
				<div class="col-xs-8 col-xs-offset-2" style="margin-top: 50px;margin-bottom: 100px;">
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
					<form action="{{ url('/forgot/resetpass/'.$data->remember_token.'?t='.$t) }}" method="post">
						{{ csrf_field() }}
						<div class="box-body">
							<div class="form-group">
							  	<label for="exampleInputNew">密码</label>
							  	<input type="password" name="password" class="form-control" id="exampleInputNew" placeholder="输入新密码">
							</div>
							<div class="form-group">
							  	<label for="exampleInputSure">确认密码</label>
							  	<input type="password" name="surepass" class="form-control" id="exampleInputSure" placeholder="确认新密码">
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"> 修改 </button>
						</div>
					</form>
				</div>

            </div>
            <hr>
        </div>
    </article>
@endsection