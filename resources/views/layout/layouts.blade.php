<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>{{ config('app.name') }}</title>
<link rel="icon" type="image/png" href="{{ url('/user/images/photo/favicon.png')}}" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="/user/css/index/ie-fix.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{ asset('/user/css/index/reset.css')}}" >
<link rel="stylesheet" type="text/css" href="{{ asset('/user/css/index/style.css')}}" >
<link rel="stylesheet" type="text/css" href="{{ asset('/user/css/index/superfish.css')}}" >
<link rel="stylesheet" type="text/css" href="{{ asset('/user/css/index/colorbox.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/user/css/index/mediaelementplayer.min.css')}}" />
<script type="text/javascript" src="{{ asset('/user/js/index/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/login/jquery-1.8.2.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/superfish.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/jquery.tweet.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/jquery.colorbox-min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/jflickrfeed.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/slides.min.jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/mediaelement-and-player.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/scrolltopcontrol.js')}}"></script>
<script type="text/javascript" src="{{ asset('/user/js/index/custom.js')}}"></script>

<script>
jQuery.noConflict()(function($){
    $(document).ready(function(){
        $('audio,video').mediaelementplayer();
    });
});
</script>

<script type="text/javascript">
//<![CDATA[  
jQuery.noConflict()(function($){
    $(document).ready(function(){
            $('#slides').slides({
                preload: true,
                preloadImage: '/user/images/photo/loading.gif',
                effect: 'fade',
                crossfade: true,                
                pause: 2500,
                hoverPause: true
            });
        });
   });   
//]]>               
</script>

<!-- 后台CSS 开始-->
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/dist/css/skins/_all-skins.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/iCheck/flat/blue.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/morris/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/datepicker/datepicker3.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
<!-- 后台CSS 结束-->
</head>

<body>

<!-- START MENU SECTION  -->
<div id="top-line"></div>
<div id="menu-bar">
    <div class="center-block clearfix">
        <!-- start menu -->
        <div id="menu" class="fix-fish-menu">
            <div class="white-fix-left"></div>
            <ul id="nav" class="sf-menu">              
                 <li><a href="{{ url('/')}}" class="active">主页</a></li>    
                 <li><a href="{{ url('/post')}}">帖子</a></li>    
                 <li class=""> <a href="{{ url('/Message_board')}}">留言板</a></li>
                 <li class=""><a href="{{ url('/Music')}}">音乐</a></li>
                 <li class=""><a href="{{ url('/video')}}">视频</a></li>
                 <li class=""><a href="{{ url('/mood')}}">心情</a></li>
                 <li class=""><a href="{{ url('/Album')}}">相册</a></li>
                 <li class=""><a href="{{ url('/Friend')}}">博友</a></li>
                 <li class=""><a href="{{ url('/user/login')}}">登录</a></li>
                 <li class=""><a href="{{ url('/user/register')}}">注册</a></li>
            </ul>  <!-- end #nav  -->
        </div>  <!-- end #menu  --> 
    </div><!-- end .center-block  -->   
</div><!-- end #menu-bar -->
<!-- END MENU SECTION -->


    @if(session('master'))
<!-- USER 登录后后台管理登录后状态开启 -->
    
    <div class="center-block clearfix">
        <!-- start menu -->          
            <ul id="nav" class="sf-menu">     
                 <li><a href="{{ url('/')}}" class="active">主页</a></li>         
                 <li><a href="{{ url('/post')}}">帖子</a></li>         
                <li class=""><a href="#">管理</a>
                    <ul>
                        <li><a href="{{ url('/userBG/Type')}}/{{session('master')->userName}}">分区(编辑\删除)</a></li>  
                        <li><a href="{{ url('/userBG/Type/create')}}?userName={{session('master')->userName}}">创建分区</a></li> 
                        <li><a href="{{ url('/Album')}}">相册</a></li>
                        <li class=""><a href="{{ url('/Friend')}}">博友</a>
                        <li class=""><a href="{{ url('/mood')}}">心情</a>
                    </ul>
                </li>     
                  <li class=""> <a href="{{ url('/Music')}}">音乐</a></li>
                  <li class=""> <a href="{{ url('/video')}}">视频</a></li>
                  <li class=""> <a href="{{ url('/Message_board')}}">留言板</a></li>
                  <li class=""> <a href="{{ url('/userBG/Personal_Center')}}/{{session('master')->userName}}">个人中心</a></li>
                  <li class=""> <a href="{{ url('/user/logout')}}">退出</a></li>
            </ul>  <!-- end #nav  -->
       
    </div><!-- end .center-block  -->   

<!-- 判断用户登录后状态判断结束 -->
    @endif

<!-- START LOGO SECTION -->
<div id="logo-bar">
    <div class="center-block clearfix">
        <div class="ads">
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/admin-gravatar.jpg" alt="" title="ZERGE"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                  
                    <p class="comment">
                        xx 的签名
                    </p>

                </div><!-- end comment-text -->
            </div><!-- end comment-block -->   
        </div>
        <div class="logo"><a href="{{ url('#')}}"><img src="{{ url('/user/images/index/468x60.png')}}" title="Advertisement" alt="Ads" /></a></div>
    </div><!-- .center-block -->
</div><!-- #logo-bar -->
<!-- END LOGO SECTION -->


<!-- START WRAPPER SECTION -->
<div id="wrapper">

    <div id="separator">
        <div class="center-block">
            <!-- <h3>超级飞侠</h3> -->
            <span>:多多</span>
        </div>
    </div>
    
            
            
    <!-- 主题开启 -->
    <div class="center-block">

        @yield('content')


        <div class="right-sidebar">
            <!-- SEARCH -->
            <div class="widget">
                <h5>搜索</h5>
                <form method="get" id="searchform" action="#">
                    <fieldset>
                        <input type="text" name="s" id="s" value="搜索" onfocus="if(this.value=='搜索')this.value='';" onblur="if(this.value=='')this.value='搜索';">
                    </fieldset>
                </form>
            </div><!-- end .widget -->

            <!-- 类别 -->
            <div class="widget">
                <h5>类别</h5>
                <ul class="list play">
                <li><a href="#" title="Post With Gallery">Post With Gallery</a></li>
                <li><a href="#" title="Quote Post">Quote Post</a></li>
                <li><a href="#" title="Audio Post">Audio Post</a></li>
                <li><a href="#" title="Post With Link">Post With Link</a></li>
                <li><a href="#" title="Post With Featured Image">Post With Featured Image</a></li>
                </ul>
            </div><!-- end .widget -->

            <!-- COMMENTS -->
            <div class="widget">
                <h5>最近评论</h5>
                <ul class="list comment">
                <li>zerge on <a href="{{ url('#')}}" >Post With Gallery</a></li>
                <li>dimetrio on <a href="{{ url('#')}}">Quote Post</a></li>
                <li>ikea on <a href="{{ url('#')}}">Audio Post</a></li>
                <li>kseniya on <a href="{{ url('#')}}">Post With Link</a></li>
                <li>kolyan on <a href="{{ url('#')}}">Post With Featured Image</a></li>
                </ul>
            </div><!-- end .widget -->

            <!-- 最近帖子 -->
            <div class="widget">
                <h5>最近帖子</h5>
                <ul class="list text">
                <li><a href="{{ url('#')}}">Getting Good with Git</a></li>
                <li><a href="{{ url('#')}}">Theme Tumblr Like a Pro</a></li>
                <li><a href="{{ url('#')}}">Post with Slideshow</a></li>
                <li><a href="{{ url('#')}}">Simple Text Post</a></li>
                <li><a href="{{ url('#')}}">Corporate Motivation Audio Theme</a></li>
                </ul>
            </div><!-- end .widget -->
        
            <!-- TWITTER -->
            <div class="widget">
                <h5>推荐软件</h5>
                <div id="twitter-widget">
                    <div class="tweet-sb"><ul class="tweet_list"><li class="tweet_first tweet_odd"> <span class="tweet_text">Your Say: How many emails are in your inbox? <a href="{{ url('#')}}">http://t.co/fOiQRKwz</a></span><span class="tweet_time"><a href="#" title="view tweet on twitter"> about 17 hours ago</a></span></li><li class="tweet_even"> <span class="tweet_text">How Long Does It Take to Make a Quality Item? <a href="#">http://t.co/vZ0yABEI</a></span><span class="tweet_time"><a href="{{ url('#')}}" title="view tweet on twitter"> about a day ago</a></span></li><li class="tweet_odd"> <span class="tweet_text">@<a href="#">flexihood</a> Thanks! we love you too! :D</span><span class="tweet_time"><a href="{{ url('#')}}" title="view tweet on twitter"> about a day ago</a></span></li></ul></div>  
                </div>
            </div><!-- end .widget -->
            
            <!-- FLICKR -->
            <div class="widget">
                <h5>Flickr Widget</h5>
                <ul id="cbox-sidebar" class="thumbs"></ul>
            </div><!-- end .widget -->
            
            <!-- VIDEO -->
            <div class="widget video">
                <h5>Video Widget</h5>
                <!-- <iframe src="{{ asset('/user/mp4/01.mp4')}}" width="213" height="120" ></iframe> -->
                <p>My latest video, watch it!</p>
            </div><!-- end .widget -->

            <!-- ADVERTISING -->
            <div class="widget advertising">
                <h5>广告</h5>
                <div class="ads">
                    <a href="{{ url('#')}}" class="advertising-link"><img src="{{ url('#')}}" alt=""></a>
                    <a href="{{ url('#')}}" class="advertising-link"><img src="{{ url('/user/images/index/ads/freelance.jpg')}}" alt=""></a>
                    <a href="http://www.cssmoban.com/?books/successful-facebook-marketing" class="advertising-link"><img src="/user/images/index/ads/facebook.jpg" class="left margin-right-5px no-margin-bottom" alt=""></a>                           
                    <a href="{{ url('#')}}"><img src="{{ url('/user/images/index/ads/wordpress.jpg')}}" class="no-margin-bottom" alt=""></a>                                                        
                </div><!-- .ads -->
            </div><!-- end .widget -->
            
        </div><!-- end .right-sidebar -->
        <div class="clear"></div>
        <!-- END SIDEBAR-->     
        
    </div><!-- .center-block -->
<div class="clear"></div>       
    <!-- END CONTENT -->
<div class="clear"></div>   

</div><!-- #wrapper -->
<div class="clear"></div>
<!-- END WRAPPER -->        


<!-- START FOOTER -->
<div class="divider-100-2px"></div>
<div id="footer">
    <div class="center-block">
        <div class="widget">
            <h6>Contact Info</h6>
            <p>Pinup is an American multinational compane that designs 
            and markets consumer electronics, computer software, and personal computers.
            </p>
            <div>
                <span class="location">12345 / Some Street<br>New York, USA</span>
                <span class="phone">phone: +1 (44)  123-45-67</span>
                <span class="email"><a href="{{ url('#')}}">support@color-theme.com</a></span>
            </div>          
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>Twitter Feed</h6>
            <div class="tweet"></div>
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>Flickr Photos</h6>
            <ul id="cbox" class="thumbs"></ul>
        </div><!-- .widget -->
        
        <div class="widget">
            <img src="{{ url('/user/images/index/logo-mini.png')}}" alt="Logo Mini" class="logo" />
            <p>We are a group of designers combining our skills to create traditional 
            and new creative websites for your communicational issues.</p>
            <ul id="footer-social">
                <li class="twitter"><a href="{{ url('#')}}"></a></li>
                <li class="dribbble"><a href="{{ url('#')}}"></a></li>
                <li class="facebook"><a href="{{ url('#')}}"></a></li>
                <li class="google"><a href="{{ url('#')}}"></a></li>
                <li class="linkedin"><a href="{{ url('#')}}"></a></li>
                <li class="behance"><a href="{{ url('#')}}"></a></li>
                <li class="rss"><a href="{{ url('#')}}"></a></li>
            </ul>       
        </div><!-- .widget -->

        <div class="clear"></div>
    </div><!-- .center-block -->
    <div class="clear"></div>
</div><!-- #footer -->
<!-- END FOOTER -->


<!-- START FOOTER MENU  -->
<div id="footer-menu">
    <div class="center-block">
        <ul id="second-menu">
            <li><a href="{{ url('#')}}">Home</a></li>
            <li><a href="{{ url('#')}}">Features</a></li>
            <li><a href="{{ url('#')}}">Typography</a></li>
            <li><a href="{{ url('#')}}">Pages</a></li>
            <li><a href="{{ url('#')}}">Portfolio</a></li>
            <li><a href="{{ url('#')}}">Blog</a></li>
        </ul>
        <div class="copyright">&copy; Copyright &copy; 2013.Company name All rights reserved.<a target="_blank" href="{{ url('#')}}">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></div>
        <div class="clear"></div>
    </div><!-- .center-block -->
    <div class="clear"></div>   
</div><!-- #footer-menu -->
<!-- END FOOTER MENU  -->

<!-- 加载后台js开始 -->
<!-- jQuery 2.2.3 -->
<script src="{{ asset('/admin/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/raphael-min.js') }}"></script>
<script src="{{ asset('/admin/adminlte/plugins/morris/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('/admin/adminlte/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/admin/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/admin/adminlte/plugins/knob/jquery.knob.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('/admin/adminlte/bootstrap/js/moment.min.js') }}"></script>
<script src="{{ asset('/admin/adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('/admin/adminlte/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/admin/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('/admin/adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/admin/adminlte/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/admin/adminlte/dist/js/app.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/admin/adminlte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/admin/adminlte/dist/js/demo.js') }}"></script>
<!-- 加载后台js结束-->

</body>
</html>
