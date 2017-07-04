
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{ url('/user/css/register/style.css')}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    
</head>
 
<body>
  <div class="main">
         <!-----start-main---->
         <div class="inset">
          <div class="social-icons">
               <div class="span"><a href="/user/login"><img src="{{ asset('/user/images/register/fb.png')}}" alt=""/><i>去登录 </i><div class="clear"></div></a></div>  
               <div class="span1"><a href="#"><img src="{{ asset('/user/images/register/t-bird.png')}}" alt=""/><i>第三方平台登录</i><div class="clear"></div></a></div>
               <div class="clear"></div>
          </div>
         </div> 
         <h2>Or sign up with</h2>
         @if(session('info'))
             <p style="color:#red">{{ session('info') }}</p>
         @endif
         @if (count($errors) > 0)
          <div class="span" id="active">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="color:red">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
         <form action="{{ url('/user/register')}}" method="post" enctype="multipart/form-data">
              {{ csrf_field()}}
              <div class="lable">
                <input type="text" name="userName" class="text" value="{{ old('userName')}}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号名';}" id="active" placeholder="账号名">

               <input type="password" name="password" class="text" value="{{ old('password')}}" onfocus="this.value = '';" onblur="if (this.value == '密 码') {this.value = '密 码';}" placeholder="输入密码">
                <input type="password" name="surepassword" class="text" value="{{ old('surepassword')}}" onfocus="this.value = '';" onblur="if (this.value == '确认密码') {this.value = '确认密码';}" placeholder="确认密码">
             </div>
             <div class="clear"> </div>
             <div class="lable">
             <!--  <input type="text" class="text" value="邮箱 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '邮箱 ';}"> -->
             
              <input type="text" class="text" name="code" value="{{ old('code')}}" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '验证码';}" id="active" placeholder="验证码">
                 <div class="clear"> </div>
                <a onclick="javascript:re_captcha();" ><img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
              </div>
              <div class="clear"> </div>                 
               <h3>By creating an account, you agree to our <span><a href="#">Terms & Conditions</a> <span></h3>
                 <div class="submit">
                  <input type="submit" onclick="myFunction()" value="递交数据" >
                </div>
                  <div class="clear"> </div>
         </form>
    <!-----//end-main---->
    </div>
     <!-----start-copyright---->
            <div class="copy-right">
            <p>More Templates <a href="/user/login">去登录</a></p> 
          </div>
        <!-----//end-copyright---->
    <script>  
    function re_captcha() {

      $url = "{{ URL('kit/captcha') }}";
          $url = $url + "/" + Math.random();
          document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
          
    }
    </script>
   
</body>
</html>