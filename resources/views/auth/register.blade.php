@extends('app')

@section('content')
<div class="login_header">
	<div class="header_content loginWidth">
    	<span><img src="{{ asset('/images/logo.jpg')}}"></span><a>欢迎注册</a>
    </div>
</div>
<div class="register_content">
	<form method="POST" action="{{ url('/doReg') }}">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="r_common">
            <div class="r_left leftArea">
            	<span>*</span><label>账号名：</label>
            </div>
            <div class="r_right leftArea">
            	<input type="text" class="bg_usernam" name="name" value="{{ old('name') }}">
            </div>
        </div>
        
        <div class="r_common">
            <div class="r_left leftArea">
            	<span>*</span><label>请设置密码：</label>
            </div>
            <div class="r_right leftArea">
            	<input type="password" class="bg_password" name="password">
            </div>
        </div>
        
        <div class="r_common">
            <div class="r_left leftArea">
            	<span>*</span><label>请确认密码：</label>
            </div>
            <div class="r_right leftArea">
            	<input type="password" class="bg_password" name="password_confirmation">
            </div>
        </div>
        
        <div class="r_common">
            <div class="r_left leftArea">
            	<span>*</span><label>邮箱：</label>
            </div>
            <div class="r_right leftArea">
            	<input type="text" class="bg_password" name="email" value="{{ old('email') }}">
            </div>
        </div>
       
        <div class="agree">
    		<input type="checkbox"><span>我已阅读并同意<a href="#">《用户注册协议》</a></span>
   		</div>
        <div>
        	<input type="submit" value="提交" class="submit">
        </div>
    </form>
</div>
@endsection
