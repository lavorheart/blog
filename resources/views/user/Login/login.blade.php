<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>BLOG Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="{{ url('/user/css/login/reset.css')}}">
        <link rel="stylesheet" href="{{ url('/user/css/login/supersized.css')}}">
        <link rel="stylesheet" href="{{ url('/user/css/login/style.css')}}">

     

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="/user/login" method="post">
            {{ csrf_field()}}
                <input type="text" name="userName" class="username" placeholder="UserName">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <div align="center">去注册 <a href="#">注册</a></div>

        <!-- Javascript -->
        <script src="{{ asset('/user/js/login/jquery-1.8.2.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized.3.2.7.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized-init.js')}}"></script>
        <script src="{{ asset('/user/js/login/scripts.js')}}"></script>

    </body>

</html>

