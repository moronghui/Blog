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
		<!-- <img src="" alt="头像" id="faceImg2"> -->
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

	<div class="blog comWidth">
		<div class="head">
			<span class="left">发博文</span>
		</div>
		@if(session('success'))
			<div class="stip">
				{{session('success')}}
			</div>
		@endif

		@if(session('fail'))
			<div class="ftip">
				{{session('fail')}}
			</div>
		@endif

		<form action="{{ asset('/blog/deliver')}}" method="POST" class="form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<label for="title" class="title_l">标题：</label>
			<input type="text" name="title" class="title" id="title" required="required"/><br><br>
			<label for="cate" class="cate_l" required="required">分类：</label>
			<select class="cate" name="category" id="cate">
				<option>选择分类</option>
				@if(count($category)>0)
					@foreach($category as $cate)
						<option value="{{$cate->id}}">{{$cate->name}}</option>
					@endforeach
				@endif
			</select><br><br>
			<label for="label">标签：</label>
			<input type="text" name="label" class="label" id="label" />
			<textarea name="content" class="content" required="required"></textarea><br>
			<div class="div"><input type="submit" value="发表" class="submit"></div>

		</form>
	</div>
</body>
</html>
