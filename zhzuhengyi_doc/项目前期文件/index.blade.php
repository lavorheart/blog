<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>博客主页</title>
<link rel="icon" type="image/png" href="/user/images/index/favicon.png" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="/user/css/index/ie-fix.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="/user/css/index/reset.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/style.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/superfish.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/colorbox.css" />
<link rel="stylesheet" href="/user/css/index/nivo-slider.css" type="text/css" media="screen" >


<script type="text/javascript" src="/user/js/index/jquery.min.js"></script>
<script type="text/javascript" src="/user/js/index/superfish.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.tweet.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="/user/js/index/jflickrfeed.min.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.carouFredSel-5.5.0-packed.js"></script>
<script type="text/javascript" src="/user/js/index/scrolltopcontrol.js"></script>

<script type="text/javascript" src="/user/js/index/custom.js"></script><!-- Custom scripts -->
<script type="text/javascript" src="/user/js/index/custom-main.js"></script><!-- Only for home page -->

<script type="text/javascript">
/***************************************************
            Nivo Slider
***************************************************/
jQuery.noConflict()(function($){
$(document).ready(function() {
            $('#nvslider').nivoSlider({
            effect: 'random',
            pauseTime: 5000,
            captionOpacity: 0.7,
             directionNavHide: false
            });        
    });
});
</script>

</head>

<body>
     @if(session('info'))
     <div id="wrapper-home">
            <table style="color:green" >
                <tr>
                    <td colspan="2" align="center">
                        {{ session('info')}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="/user/images/photo/{{ session('master')->photo }}" width="40">                     
                    </td>
                    <td>
                        {{ session('master')->nickName}}
                    </td>
                </tr>
                <tr>
                    <td>
                        等级:{{ session('master')->level}}
                    </td>
                    <td>
                        积分:{{ session('master')->num}}分
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#">个人中心</a>
                    </td>
                    <td>
                        <a href="{{ url('/user/logout')}}">退出</a>
                    </td>
                </tr>
            </table>
    </div>
         @endif
<!-- START MENU SECTION -->
<div id="top-line"></div>
<div id="menu-bar">
    <div class="center-block clearfix">
        <!-- start menu -->
        <div id="menu" class="fix-fish-menu">
            <div class="white-fix-left"></div>
            <ul id="nav" class="sf-menu">
                <li><a href="index-2.html" class="active">主页</a></li>         
                </li>
                <li class=""> <a href="#">留言板</a>
                    <ul>
                        <li><a href="#">Headings</a></li>
                        <li><a href="#">Drop Caps</a></li>
                        <li><a href="#">Highlights</a></li>
                        </ul>
                    </li>
                <li class=""><a href="#">心情</a>
                    <ul>
                        <li><a href="#">Blog Style 1</a></li>
                    </ul>
                </li>
                 <li class=""><a href="#">博友</a>
                </li>
                  <li class=""> <a href="#">个人中心</a>
                </li>
            </ul>  <!-- end #nav  -->
        </div>  <!-- end #menu  --> 
    </div><!-- end .center-block  -->   
</div><!-- end #menu-bar -->
<!-- END MENU SECTION -->


<!-- START LOGO SECTION -->
<div id="logo-bar">
    <div class="center-block clearfix">
        <div class="logo"><img src="/user/images/index/logo.png" alt="Logo" /></div>
        <div class="ads"><a href="http://www.cssmoban.com/?books/freelance-confidential"><img src="/user/images/index/468x60.png" title="Advertisement" alt="Ads" /></a></div>
    </div><!-- .center-block -->
</div><!-- #logo-bar -->
<!-- END LOGO SECTION -->
<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>

<!-- START SLIDER -->
<div id="slider-wrapper">
    <!-- START CTA BLOCK -->
    <div id="cta-block">
        <div class="center-block">
            <div class="slogan">
                <h3 class="darkgray"> 广告 <a href="#" class="firebrick">联系我们</a></h3>
                <h5 class="darkgray">用心做出最好的作品</h5>
            </div>
        </div>
    </div>
    <!-- END CTA BLOCK -->
    
    <div id="nvslider" class="nivoSlider">
        <img src="/user/images/index/sliders/ei-slider/slide03.jpg" alt="" title="Buy the eBook, and get PDF, ePub and Mobi versions!" />
        <a href="http://www.cssmoban.com/"><img src="/user/images/index/sliders/ei-slider/slide02.jpg" alt="" /></a>
        <img src="/user/images/index/sliders/ei-slider/slide04.jpg" alt="" />                   
        <img src="/user/images/index/sliders/ei-slider/slide06.jpg" alt="" /> 
        <img src="/user/images/index/sliders/ei-slider/slide07.jpg" alt="" title="Rock Star Icon Designer" />                   
    </div> <!-- end #nvslider .nivoSlider -->
</div><!-- end slider-wrapper -->
<!-- END SLIDER -->


<!-- START WRAPPER SECTION -->
<div id="wrapper-home">

    <!-- START ABOUT BLOCK -->
    <div id="about-main">
        <div class="center-block clearfix">
            <div class="about-us">
                <h4>猪八戒做哪件事让人感动得热泪盈眶？</h4>
                <p>猪八戒做哪件事让人感动得热泪盈眶？（西游说禅之五十七：回向之心）</p>
                <div class="about-img">
                    <div class="about-bg-white">
                        <img src="/user/images/index/blog/recent/5.jpg" alt="" />
                    </div><!-- .about-bg-white -->
                </div><!-- .about-img -->
                <p class="small-italic">孔子说，见义而不为，是缺乏勇敢之心。猪八戒也是这样，看到通天河的妖怪要吃童男童女，在大师兄的棍棒政策的强制下，才勉强同意参加扮成童男童女的救援行动。当然，猪八戒并不蠢！理由是，他做了充分的调查，因为按照历史惯例，妖怪第一个开吃的是童男——大师兄假扮的是也，自己只要坐在旁边看热闹就行，反正吃的不是自己。
                </p>
                <p class="small-italic">
                    这个惯性思维极为害人，大家不觉得很熟悉吗？在看解放战争的影视片中，国军的高级将领经常犯下这个错误吗？孟良崮被困的张灵甫，如果坐在旁边的“猪八戒”们肯努力搭救，或许可以转变战局；彭大将军进军大西北，胡宗南总是让地方杂牌军顶在前面，最后坐在旁边的“猪八戒”都死了。“士不可不弘毅，任重而道远”，只有在危难时候，互相支持，才能共济时艰，取得好的结果。
                </p>
                <div class="go-to readmore no-margin-bottom">
                    <a href="#">Read more</a>
                    <span></span>
                </div><!-- .go-to -->
            </div><!-- .about-us -->

          
        </div><!-- .center-block -->
    </div><!-- #about-us -->
    <!-- END ABOUT BLOCK -->

    <div class="divider-2px"></div>
    
    <!-- START RECENT PROJECTS -->
    <div id="recent-projects">
        <div class="center-block">

            <!-- start recent project block -->     
            <div class="rp-block-main">
                <h4>心情</h4>
                <p>状态</p>


            <!-- CarouFredSel - Recent Projects -->
            <div class="projects_carousel">
                <div id="rp-carousel">
                    <!-- start recent project block -->
                    <div class="rp-block rp-bg">
                        <div class="rp-bg-white">
                            <img src="/user/images/index/projects/recent/1.jpg" alt="" />
                            <div class="mask">
                                <a href="/user/images/index/projects/recent/1-big.jpg" class="view-icon" data-rel="zoom-img"></a>
                            </div><!-- .mask -->
                            <div class="rp-arrow-up"></div>
                            <div class="rp-content">
                                <h6><a href="#">开心</a></h6>
                                <p>今天中彩票了</p>
                            </div><!-- .rp-content -->
                        </div><!-- .rp-bg-white -->
                    </div><!-- .rp-block -->
        
                    <!-- start recent project block -->
                    <div class="rp-block rp-bg">
                        <div class="rp-bg-white">
                            <img src="/user/images/index/projects/recent/2.jpg" alt="" />
                            <div class="mask">
                                <a href="/user/images/index/projects/recent/2-big.jpg" class="view-icon" data-rel="zoom-img"></a>
                            </div><!-- .mask -->                    
                            <div class="rp-arrow-up"></div>
                            <div class="rp-content">
                                <h6><a href="portfolio-1.html">开心</a></h6>
                                <p>今天挣钱了</p>
                            </div><!-- .rp-content -->
                        </div><!-- .rp-bg-white -->
                    </div><!-- .rp-block -->
                    <div class="rp-block rp-bg">
                        <div class="rp-bg-white">
                            <img src="/user/images/index/projects/recent/2.jpg" alt="" />
                            <div class="mask">
                                <a href="/user/images/index/projects/recent/2-big.jpg" class="view-icon" data-rel="zoom-img"></a>
                            </div><!-- .mask -->                    
                            <div class="rp-arrow-up"></div>
                            <div class="rp-content">
                                <h6><a href="portfolio-1.html">开心</a></h6>
                                <p>今天挣钱了</p>
                            </div><!-- .rp-content -->
                        </div><!-- .rp-bg-white -->
                    </div><!-- .rp-block -->

                </div><!-- #rp-carousel -->
                <div class="clearfix"></div>
                <a class="prev" id="rp-carousel_prev" href="#"><span>prev</span></a>
                <a class="next" id="rp-carousel_next" href="#"><span>next</span></a>
            </div><!-- .projects_carousel -->
            <div class="clear"></div>   

            </div><!-- .rp-block-main -->
            
            

        </div><!-- .center-block -->
        <div class="clear"></div>
    </div><!-- #recent-projects -->
    <!-- END RECENT PROJECTS -->

    <div class="divider-2px"></div>

    <!-- START CLIENTS -->
    <div id="clients" class="center-block"> 
        <div class="cl-block">
            <h4>用户留言</h4>
            <!-- CarouFredSel -->

            <div class="testmain_carousel">
                <ul id="testmain_carousel">
                    <li>好很好不错的网站!
                    <span>&mdash; 张飞</span></li>               
                </ul>
                <div class="test-arrow-up"></div>
                <div class="clearfix"></div>
            </div><!-- .test_carousel -->
            <div class="clear"></div>           
        </div><!-- .cl-block -->
       
        <div class="clear"></div>   
    </div><!-- #clients -->
    <!-- END CLIENTS -->

</div><!-- #wrapper -->
<div class="clear"></div>
<!-- END WRAPPER -->


<!-- START FOOTER -->
<div class="divider-100-2px"></div>
<div id="footer">
    <div class="center-block">
        <div class="widget">
            <h6>Contact Info</h6>
            <p>LinkUp is an American multinational compane that designs 
            and markets consumer electronics, computer software, and personal computers.
            </p>
            <div>
                <span class="location">12345 / Some Street<br>New York, USA</span>
                <span class="phone">phone: +1 (44)  123-45-67</span>
                <span class="email"><a href="mailto:support@color-theme.com">support@color-theme.com</a></span>
            </div>          
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>Twitter Feed</h6>
            
        </div><!-- .widget -->
        
        <div class="widget">
            <h6>Flickr Photos</h6>
            
        </div><!-- .widget -->
        
        <div class="widget">
            <img src="/user/images/index/logo-mini.png" alt="Logo Mini" class="logo" />
            <p>We are a group of designers combining our skills to create traditional 
            and new creative websites for your communicational issues.</p>
            <ul id="footer-social">
                <li class="twitter"><a href="#"></a></li>
                <li class="dribbble"><a href="#"></a></li>
                <li class="facebook"><a href="#"></a></li>
                <li class="google"><a href="#"></a></li>
                <li class="linkedin"><a href="#"></a></li>
                <li class="behance"><a href="#"></a></li>
                <li class="rss"><a href="#"></a></li>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">Features</a></li>
            <li><a href="#">Typography</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
        <div class="copyright">&copy; Copyright &copy; 2013.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a> - More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></div>
        <div class="clear"></div>
    </div><!-- .center-block -->
    <div class="clear"></div>   
</div><!-- #footer-menu -->
<!-- END FOOTER MENU  -->

</body>
</html>