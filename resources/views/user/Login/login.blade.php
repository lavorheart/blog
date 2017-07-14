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
        
        <div >
            <h1>登录</h1>

            <form class="well form-search" action="/user/dologin" method="post">
            {{ csrf_field()}}
                @if(session('info'))         
                        <button class="btn">  {{ session('info')}}</button>        
                 @endif  
                <input type="text" name="userName" class="username" placeholder="用户名">
                <input type="password" name="password" class="password" placeholder="密码">
                <span>
                <input type="text" name="code" class="code" placeholder="验证码">
                <br>
                <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
                </span>
                <!-- <input type="password" name="code" class="password" placeholder="验证码"> -->
                <!-- <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a> -->
                <br>
                <br>
                <label class="checkbox"> 
                 
                    <input type="checkbox"><br>记住我 
                </label>
                    
                <button class="btn" >登录</button>
               
                   
                <div class="error"><span>+</span></div>
            </form>
             <br>
                    <a  class="btn btn-success" href="/user/register">
                <button class="btn btn-success">  注册</button>
                    </a>
                <br>
                    <a class="btn" href="/user/forget">
                <button class="btn">  密码找回</button>
                    </a>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>

            </div>
        </div>
       
           
                
               
           
    </div>
    <script>  
    function re_captcha() {

      $url = "{{ URL('kit/captcha') }}";
          $url = $url + "/" + Math.random();
          document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
          
    }
    </script>
        
        <!-- Javascript -->
        <script src="{{ asset('/user/js/login/jquery-1.8.2.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized.3.2.7.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized-init.js')}}"></script>
        <script src="{{ asset('/user/js/login/scripts.js')}}"></script>

    </body>

</html>

