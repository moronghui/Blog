<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎注册</title>
	<style type="text/css">
		.wrap{
			width: 200px;
			margin: 50px auto;
		}
	</style>
</head>
<body>
<div class="wrap">
<form method="post" action="/doReg">
	{{ csrf_field() }}
	<div>
		<label>用户名:</label>
		<input type="text" name="name" placeholder="请输入用户名">
	</div>

	<div>
		<label>邮箱:</label>
		<input type="email" name="email" placeholder="请输入邮箱">
	</div>

	<div>
		<label>密码:</label>
		<input type="password" name="password" placeholder="请输入密码">
	</div>

	<div>
		<input type="submit" value="注册">
		<input type="reset" value="重置">
	</div>
</form>
</div>
</body>
</html>