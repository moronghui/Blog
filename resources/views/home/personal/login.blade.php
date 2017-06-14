<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎登录</title>
	<style type="text/css">
		.wrap{
			width: 200px;
			margin: 50px auto;
		}
	</style>
</head>
<body>
<div class="wrap">
<form method="get" action="/doLogin">
	<div>
		<label>邮箱:</label>
		<input type="email" name="email" placeholder="请输入邮箱">
	</div>

	<div>
		<label>密码:</label>
		<input type="password" name="password" placeholder="请输入密码">
	</div>

	<div>
		<input type="submit" value="登录">
		<input type="reset" value="重置">
	</div>
</form>
</div>
</body>
</html>