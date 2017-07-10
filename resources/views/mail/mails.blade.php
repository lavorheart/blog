<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>邮件发送</title>
</head>
<body>
	<div style="height:200px;background:pink">
		{{ $data['nickName']}}:您好.<hr>
	  	<a href="{{ env('APP_URL')}}/user/link/{{ $data->remember_token}}">点击次链接重置密码</a>
		}
	</div>
</body>
</html>