@extends('app')

@section('content')
<div class="login_header">
	<div class="header_content loginWidth">
    	<span><img src="{{ asset('/images/logo.jpg')}}" alt="头像"></span><a>欢迎登陆</a>
    </div>
</div>
<div class="login_content loginWidth">
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form method="get" action="{{ url('/doLogin') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label>邮箱:</label><br />
        <input type="text" class="username" name="email" value="{{ old('email') }}" placeholder="请输入邮箱"><br />
        <label>密码:</label><br />
        <input type="password" class="password" name="password" placeholder="请输入密码">

        <input type="submit" class="submit" value="登陆">
    </form>
</div>
<div class=" loginWidth l_register"><a href="/register">免费注册</a></div>
</body>
@endsection
