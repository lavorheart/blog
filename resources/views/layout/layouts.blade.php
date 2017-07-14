<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>{{ config('app.name') }} - {{ $title }}</title>
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

   <!-- bootstrap引入  -->
  <link href="{{ asset('/bootstrap/css/bootstrap-combined.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/bootstrap/css/layoutit.css') }}" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="\bootstrap\js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="{{ asset('/bootstrap/img/favicon.png') }}">
    
    <script type="text/javascript" src="{{ asset('/bootstrap/js/jquery-2.0.0.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="\bootstrap\http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src=" {{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/js/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/js/jquery.htmlClean.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/ckeditor/config.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/bootstrap/js/scripts.js') }}"></script>
    <!-- bootstrap引入结束  -->

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
                 <li><a href="/userHome/{{ $userName}}/blog" class="active">主页</a></li>    
                 <li><a href="{{ url('/userBG')}}/{{ $userName }}/post">博文</a></li>    
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
                <li><a href="{{ url('/userBG')}}/{{ $userName }}/post">博文(编辑||删除)</a></li>  
                <li><a href="{{ url('/userBG')}}/{{ $userName }}/post/create" class="active">创建新博文</a></li> 
                <li><a href="{{ url('/userBG')}}/{{$userName}}/Type">分区(编辑||删除)</a></li>  
                <li><a href="{{ url('/userBG/')}}/{{$userName}}/Type/create">创建分区</a></li> 
               <li class=""> <a href="/userBG/{{ $userName }}/Personal_Center">个人中心</a></li>
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
                <div class="">
                    
                    <a href="#">
                        <img src="/user/images/photo/person/{{ $UrlData['userdetail']['photo'] }}" alt="" title="用户头像">
                    </a>
                    
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                  
                    <em>
                        昵称 :: {{ $UrlData['userdetail']['nickName'] }}
                        <br>
                        等级 :: {{ $UrlData['userdetail']['level'] }}
                    </em>

                </div><!-- end comment-text -->
            </div><!-- end comment-block -->   
        </div>
        <div class="">
       
            <a href="{{ $UrlData['config']['LinkMasterUrl_config'] }}">
                <img src="/admin/images/config/{{ $UrlData['config']['logo'] }}" width="800px" title="LOGO" alt="Ads" />
            </a>
      
        </div>
    </div><!-- .center-block -->
</div><!-- #logo-bar -->
<!-- END LOGO SECTION -->


<!-- START WRAPPER SECTION -->
<div id="wrapper">

    <div id="separator">
        <div class="center-block">
            <!-- <h3>超级飞侠</h3> -->
            <span>:{{ $UrlData['userdetail']['nickName'] }}</span>
        </div>
    </div>
    
            
            
    <!-- 主题开启 -->
    <div class="center-block">

        @yield('content')


        <div class="right-sidebar">
            <!-- SEARCH -->
            <div class="widget">
                <h5>搜索</h5>
                <!-- <form method="get" id="searchform" action="#">
                    <fieldset>
                        <input type="text" name="s" id="s" value="搜索" onfocus="if(this.value=='搜索')this.value='';" onblur="if(this.value=='')this.value='搜索';">
                    </fieldset>
                </form> -->
                <form id="searchform" action="/userBG/{{ $userName }}/post" method="GET">
                  <input type="text" name="Keywords" id="s" value="搜索" onfocus="if(this.value=='搜索')this.value='';" onblur="if(this.value=='')this.value='搜索';">
                  <button type="submit" class="btn btn-success" contenteditable="true">查找</button>
                </form>
            </div><!-- end .widget -->

            <!-- 类别 -->
            <div class="widget">
                <h5>类别</h5>
                <ul class="list play">

                @foreach($UrlData['type'] as $v) 
                    <li><a href="/userBG/{{ $userName }}/post?tid={{ $v['id']}}" title="Quote Post">{{ $v['name']}}</a></li>
                @endforeach
                
                </ul>
            </div><!-- end .widget -->

            <!-- COMMENTS -->
            <div class="widget">
                <h5>最近评论</h5>
                <ul class="list comment">

                @foreach($UrlData['reply'] as $v) 
                <li>{{ $v['reply_userName']}} on <a href="/userBG/{{ $userName }}/post/{{ $v['pid_reply']}}">{{ $v['content_reply']}}</a></li>
                @endforeach

                </ul>
            </div><!-- end .widget -->

            <!-- 最近博文 -->
            <div class="widget">
                <h5>最近博文</h5>
                <ul class="list text">
                @foreach($UrlData['post'] as $v) 
                <li><a href="/userBG/{{ $userName }}/post?id={{ $v['id']}}">{{ $v['title']}}</a></li>
                <br>
                @endforeach
                </ul>
            </div><!-- end .widget -->
        
            <!-- TWITTER -->
            <div class="widget">
                <h5>友情链接</h5>
                <div id="twitter-widget">
                @foreach($UrlData['friendlink'] as $v) 
                    <div class="tweet-sb">
                        <ul class="tweet_list">
                            <li class="tweet_first tweet_odd"> 
                            <span class="tweet_text">{{ $v['linkname']}} <a href="{{ $v['url']}}">{{ $v['url']}}</a></span>
                            </li>
                        </ul>
                    </div>  
                @endforeach
                </div>
            </div><!-- end .widget -->
            

            <!-- ADVERTISING -->
            <div class="widget advertising">
                <h5>广告</h5>

                <div class="ads">
                    @foreach($UrlData['adv'] as $v)
                    <a href="{{ $v['url_adv']}} " class="advertising-link"><img src="{{ url('/admin/images/adv')}}/{{ $v['photo_adv']}}" alt="图片加载失败" width="200px"></a>
                    @endforeach                                                    
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
            <h6>联系我们</h6>
            
            <p>{{ $UrlData['config']['Contact Info'] }}</p>

            <div>
                <span class="location">{{ $UrlData['config']['address'] }}</span>
                <span class="phone">phone: {{ $UrlData['config']['phone'] }}</span>
                <span class="email"><a href="{{ url('#')}}">{{ $UrlData['config']['mail'] }}</a></span>
            </div>    
               
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>Twitter Feed</h6>
            <div class="tweet"></div>
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>友情链接图片</h6>
            @foreach($UrlData['friendlink'] as $v) 
            <ul id="cbox" class="thumbs">
                <li>
                    <a href="{{ $v['url']}}">
                        <img src="/admin/images/friendlink/{{ $v['logo'] }}" height="50px" title="{{ $v['linkname'] }}" alt="图片加载失败" /> 
                    </a>
                </li>
            </ul>
            @endforeach
        </div><!-- .widget -->
        
        <div class="widget">
            <img src="/admin/images/config/{{ $UrlData['config']['logo'] }}" width="240px" title="{{ $v['linkname'] }}" alt="图片加载失败" />
            <br><br>
            <p> {{ $UrlData['config']['product_show'] }} </p>
            <br>
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


</body>
</html>
