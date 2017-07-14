<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>邮件发送</title>
</head>
<body>

	<dl contenteditable="true" tyle="height:200px;background:pink">
		<dt>{{ $data['nickName']}}:您好.<hr></dt>
		<a href="{{ env('APP_URL')}}/user/link/{{ $data->remember_token}}">点击次链接重置密码</a>
	</dl>
	
</body>
</html>