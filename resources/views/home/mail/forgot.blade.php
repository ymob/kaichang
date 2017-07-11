<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body{background: #ccc;}
	</style>
</head>
<body>
	<h1>开场</h1>
	<hr>
	<b>{{ $data->name }}：</b>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;点击下面链接重置密码，如果不是您的操作，则无需点击。</p>
	<a href="{{ url('http://kaichang.com/forgot/resetpass/'.$data->remember_token.'?t='.$t) }}">链接</a>
</body>
</html>