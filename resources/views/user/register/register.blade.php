
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
               <div class="span"><a href="#"><img src="{{ asset('/user/images/register/fb.png')}}" alt=""/><i>去登录 </i><div class="clear"></div></a></div>  
               <div class="span1"><a href="#"><img src="{{ asset('/user/images/register/t-bird.png')}}" alt=""/><i>第三方平台登录</i><div class="clear"></div></a></div>
               <div class="clear"></div>
          </div>
         </div> 
         <h2>Or sign up with</h2>
         <form>
              <div class="lable">
                          <input type="text" class="text" value="账号名 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号名';}" id="active">

                          <input type="password" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '密 码') {this.value = '密 码';}" placeholder="输入密码">
                          <input type="password" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '确认密码') {this.value = '确认密码';}" placeholder="确认密码">
                        </div>
                        <div class="clear"> </div>
                        <div class="lable-2">
                         <input type="text" class="text" value="邮箱 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '邮箱 ';}">
                         <input type="text" class="text" value="验证码 " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '账号名';}" id="active">

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
            <p>More Templates <a href="#">去登录</a></p> 
          </div>
        <!-----//end-copyright---->
   
</body>
</html>