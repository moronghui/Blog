@extends('home/default')
@section('content')
<div class="content comWidth">
	<div class="c_left left">
		<!-- 个人资料 -->
		<div class="data">
			<div class="title">
				<span class="left">个人资料</span>
				<span class="right"><a href="{{ asset('/personal/profile')}}">[管理]</a></span>
			</div>
			<div class="img">
				<img src="<?php echo $user->face?asset('/uploads/'.$user->face) :asset('/uploads/default.jpg') ?>" alt="头像">
			</div>
			<div class="name">{{ $user->name}}</div>
			<div class="info">
				<label>性别：</label><span>{{ $user->sex}}</span>
			</div>
			<div class="info">
				<label>邮箱：</label><span>{{ $user->email}}</span>
			</div>
			<div class="info">
				<label>签名：</label><br><p>{{ $user->word}}</p>
			</div>
			
		</div>
		<!-- 评论 -->
		<div class="comment">
			<div class="title">
				<span class="left">评论</span>
				<span class="right"><a href="{{ asset('/comment/index')}}">[管理]</a></span>
			</div>
			@if(count($comment)==0)
				<p style="margin-left:25px;">暂时没有评论！</p>
			@else
				@foreach($comment as $com)
					<div class="item">
						<div class="user">
							<span class="left username">{{ $com->name}}</span> 
							<span class="right">{{ $com->created_at}}</span>
						</div>
						<div class="c_content">
							<span class="left"><?php echo substr($com->content,0,30).'...';  ?> </span>
							<span class="right"><a href="#">[删除]</a></span> 
						</div>				
					</div>
				@endforeach
				
			@endif
			
			<div class="more">
					<a href="#" class="right">更多>></a>
			</div>
		</div>
		<!-- 分类 -->
		<div class="category">
			<div class="title">
				<span class="left">分类</span>
				<span class="right"><a href="{{ asset('/category/index')}}">[管理]</a></span>
			</div>
			@if(count($category)==0)
				<p style="margin-left:25px;">您还没添加分类！</p>
			@else
			<ul>
				<li><a href="#">全部博文</a>({{ count($blog)}})</li>
				@foreach($category as $cate)
					<li><a href="#">{{ $cate->name}}</a>({{ $cate->blog_num}})</li>
				@endforeach
			</ul>
			@endif
		</div>
	</div>
	<div class="c_right right">
		<div class="title">
			<span class="left">全部博文（{{ count($blog)}}）</span>
		</div>
		@if(count($blog)==0)
			<p style="margin-left:25px;">您还没发过博文！</p>
		@else
			@foreach($blog as $bg)
			<div class="blog_item">
				<div class="left"><a href="#" class="title">{{ $bg->title}}</a></div>
				<div class="right">
					<span>{{ $bg->created_at}}</span><a href="#">[编辑]</a><a href="#">[更改分类]</a><a href="#">[删除]</a>
				</div>
			</div>
		@endforeach
		@endif		
		<div class="page"><?php echo $blog->render(); ?></div>
	</div>
</div>
@endsection