<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="博客">
<title>博客</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/home/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/home/css/reset.css')}}">
<script type="text/javascript" src="{{ asset('/home/js/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/home/js/jquery.form.js')}}"></script>
<script>
        // wait for the DOM to be loaded
        
</script>
<style type="text/css">
	.stip{
		width: 80%;
		margin: 10px auto;
		padding-left: 95px;
		height: 50px;
		line-height: 50px;
		color: #000;
		background:#98FB98;
		font-size: 20px;
	}

	.ftip{
		width: 80%;
		margin: 10px auto;
		padding-left: 95px;
		height: 50px;
		line-height: 50px;
		color: #000;
		background:#EE9572;
		font-size: 20px;
	}
</style>
</head>
<body>
<div class="comWidth header">
	<div class="info">
		<p><a href="{{ asset('/')}}">{{$user->name}}的博客</a></p>
	</div>
	<div class="nav right" >
		<ul>
			<li><a href="{{ asset('/blog')}}">首页</a></li>
			<li><a href="{{ asset('/blog/lists')}}">博文目录</a></li>
			<li><a href="{{ asset('/blog/index')}}">发博文</a></li>
		</ul>
	</div>
</div><!-- header结束 -->
	@yield('content');
</body>
</html>