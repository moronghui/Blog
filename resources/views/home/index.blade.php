@extends('home.default')
@section('content')
<div class="content comWidth">
	<div class="c_left left">
		<!-- 个人资料 -->
		<div class="data">
			<div class="title">
				<span class="left">个人资料</span>
				<span class="right"><a href="#">[管理]</a></span>
			</div>
			<div class="img">
				<img src="" alt="头像">
			</div>
			<div class="name"></div>
		</div>
		<!-- 分类 -->
		<div class="category">
			<div class="title">
				<span class="left">分类</span>
				<span class="right"><a href="#">[管理]</a></span>
			</div>
			@if(count($category)==0)
				<p style="margin-left:25px;">您还没添加分类！</p>
			@else
			<ul>
				<li><a href="#">全部博文</a>({{ count($blog)}})</li>
				@foreach($category as $cate)
					<li><a href="#">{{ $cate->name}}</a></li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>
	<div class="c_right right">
		<div class="title">
			<span class="left">博文</span>
			<span class="right"><a href="{{ asset('blog/lists')}}">[管理]</a></span>
		</div>
		@if(count($blog)==0)
			<p style="margin-left:25px;">您还没发过博文！</p>
		@else
			@foreach($blog as $bg)
				<div class="item">
					<a href="#" class="title">{{ $bg->title}}</a><span>({{ $bg->created_at}})</span><a href="{{ asset('/blog/edit')}}/{{ $bg->id}}">[编辑]</a><a href="{{ asset('/blog/del')}}/{{ $bg->id}}">[删除]</a>
					<p>标签：<span class="lable">{{ $bg->label}}</span> &nbsp;&nbsp;</p>
					<article class="article">
						{{ $bg->content}}
					</article>
					<!-- <div class="flooter">
						<a href="{{ asset('/blog/blogMore')}}/{{ $bg->id}}" class="right">查看正文</a>
					</div> -->
				</div> 
			@endforeach
		@endif
		
	</div>
</div>
@endsection