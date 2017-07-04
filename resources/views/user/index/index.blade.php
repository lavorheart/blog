<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>博客主页</title>
<link rel="icon" type="image/png" href="images/favicon.png" />
<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="/user/css/index/ie-fix.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="/user/css/index/reset.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/style.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/superfish.css" >
<link rel="stylesheet" type="text/css" href="/user/css/index/colorbox.css" />
<link rel="stylesheet" type="text/css" href="/user/css/index/mediaelementplayer.min.css" />


<script type="text/javascript" src="/user/js/index/jquery.min.js"></script>
<script type="text/javascript" src="/user/js/index/superfish.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.tweet.js"></script>
<script type="text/javascript" src="/user/js/index/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="/user/js/index/jflickrfeed.min.js"></script>
<script type="text/javascript" src="/user/js/index/slides.min.jquery.js"></script>
<script type="text/javascript" src="/user/js/index/mediaelement-and-player.min.js"></script>
<script type="text/javascript" src="/user/js/index/scrolltopcontrol.js"></script>

<script type="text/javascript" src="/user/js/index/custom.js"></script>

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
                preloadImage: 'images/loading.gif',
                effect: 'fade',
                crossfade: true,                
                pause: 2500,
                hoverPause: true
            });
        });
   });   
//]]>               
</script>

</head>

<body>

<!-- START MENU SECTION -->
<div id="top-line"></div>
<div id="menu-bar">
    <div class="center-block clearfix">
        <!-- start menu -->
        <div id="menu" class="fix-fish-menu">
            <div class="white-fix-left"></div>
            <ul id="nav" class="sf-menu">
                @if(session('info'))
                    <li style="color:red">
                       <img src="/user/images/photo/{{ session('master')->photo }}" width="40"> &nbsp&nbsp&nbsp {{ session('master')->nickName}}&nbsp&nbsp&nbsp等级:{{ session('master')->level}}&nbsp&nbsp&nbsp积分:{{ session('master')->num}}分
                    </li>
                @endif
                 <li><a href="#" class="active">主页</a></li>         
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
                 <li class=""><a href="#">相册</a>
                 </li>
                 <li class=""><a href="#">博友</a>
                 </li>
                  <li class=""> <a href="#">个人中心</a>
                </li>
                </li>
                  <li class=""> <a href="{{ url('/user/logout')}}">退出</a>
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


<!-- START WRAPPER SECTION -->
<div id="wrapper">

    <div id="separator">
        <div class="center-block">
            <h3>帖子</h3>
            <span>:帖子列表</span>
        </div>
    </div>
    
    <!-- START CONTENT -->
    <div class="center-block">
        <div class="left-content">

            <!-- POST #1 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="standard"><a href="blog-post.html" title="Standard Post"></a></li>
                                <li class="tag"><a href="#" title="Category - Development">Develop</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">孙悟空生命中不会做的是哪件事？</a></h4>
                        <div class="meta">
                            <span class="date" title="20 April 2012 ">6 小时前</span>
                            <span class="author">by <a href="#">作者</a></span>
                            <a href="#" class="comments" title="Comments">17</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <div class="thumb">
                        <img src="/user/images/index/blog/1/img01.jpg" alt="" />
                        <div class="thumb-arrow-up"></div>
                    </div><!-- .thumb -->
                    <div class="text">
                        <p>In Getting Good With Git, Nettuts+ Associate Editor Andrew Burgess will guide 
                        you through the sometimes-scary waters of source code management with Git, the fast version control system.</p>
                        <p>Git's speed, efficiency, and ease-of-use have made it the popular choice in the world of source code managers. 
                        And with a service like GitHub available for sharing your code, there's no question about whether learning Git is worth your time!</p>
                        <div class="go-to readmore no-margin-bottom"> 
                            <a href="/user/detail">Read more</a>
                            <span></span>
                        </div><!-- .go-to -->
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #1 -->

            <!-- POST #2 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="image"><a href="blog-post.html" title="Image Post"></a></li>
                                <li class="tag"><a href="#" title="Category - Development">Develop</a></li>
                                <li class="tag"><a href="#" title="Category - Design">Design</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">猪八戒做哪件事让人感动得热泪盈眶？</a></h4>
                        <div class="meta">
                            <span class="date" title="20 March 2012 ">1 个月前</span>
                            <span class="author">by <a href="#">Jeffrey Way</a></span>
                            <a href="#" class="comments" title="Comments">14</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <div class="thumb">
                        <img src="/user/images/index/blog/1/img02.jpg" alt="" />
                        <div class="thumb-arrow-up"></div>
                    </div><!-- .thumb -->
                    <div class="text">
                        <p>猪八戒做哪件事让人感动得热泪盈眶？（西游说禅之五十七：回向之心）</p>
                        <p>这个惯性思维极为害人，大家不觉得很熟悉吗？在看解放战争的影视片中，国军的高级将领经常犯下这个错误吗？孟良崮被困的张灵甫，如果坐在旁边的“猪八戒”们肯努力搭救，或许可以转变战局；彭大将军进军大西北，胡宗南总是让地方杂牌军顶在前面，最后坐在旁边的“猪八戒”都死了。“士不可不弘毅，任重而道远”，只有在危难时候，互相支持，才能共济时艰，取得好的结果。</p>
                        <div class="go-to readmore no-margin-bottom"> 
                            <a href="blog-post.html">Read more</a>
                            <span></span>
                        </div><!-- .go-to -->
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #2 -->

            <!-- POST #2.5 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="video"><a href="blog-post.html" title="Video Post"></a></li>
                                <li class="tag"><a href="#" title="Category - Video">Video</a></li>
                                <li class="tag"><a href="#" title="Category - After Effects">AE</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">Titles Clean Video Post</a></h4>
                        <div class="meta">
                            <span class="date" title="20 March 2012 ">1 个月前</span>
                            <span class="author">by <a href="#">﻿ATIKO</a></span>
                            <a href="#" class="comments" title="Comments">14</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <div class="thumb">
                        <iframe src="http://player.vimeo.com/video/38424073?title=0&amp;byline=0&amp;portrait=0&amp;color=bf252f" width="635" height="357"></iframe>
                    </div><!-- .thumb -->
                    <div class="text">
                        <div class="one_half">
                            <p>Titles Clean:</p>
                            <ul class="list check padding25">
                                <li>AE CS4 or Higher</li>
                                <li>Easy to Customized</li>
                                <li>Full HD (1920×1080)</li>
                                <li>8 Text Placeholder</li>
                                <li>Help file and Videotutorial included</li>
                                <li>Original and PreRender Versions</li>
                            </ul><br/>
                            <p><a href="http://videohive.net/item/titles-clean/1711280?ref=zerge">Source</a></p>
                        </div>
                        <div class="one_half column-last">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur erat orci, consectetur quis pretium nec, vehicula a justo. 
                        Aliquam erat volutpat. Vestibulum lacinia suscipit urna, ac tincidunt ante interdum vel. Suspendisse porttitor dictum metus sed posuere. 
                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse vel tincidunt leo. 
                        Morbi id vulputate eros. Sed scelerisque sodales lobortis. Donec ut dui enim, sed bibendum ipsum. Integer fringilla nisi eget mauris 
                        vulputate consequat.</p>
                        </div>
                        <div class="clear"></div>
                        <div class="go-to readmore no-margin-bottom"> 
                            <a href="blog-post.html">Read more</a>
                            <span></span>
                        </div><!-- .go-to -->
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #2.5 -->

            <!-- POST #3 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="gallery"><a href="blog-post.html" title="Gallery Post"></a></li>
                                <li class="tag"><a href="#" title="Category - Envato">Envato</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">相册</a></h4>
                        <div class="meta">
                            <span class="date" title="02 March 2012 ">1 小时前</span>
                            <span class="author">by <a href="#">用户</a></span>
                            <a href="#" class="comments" title="Comments">14</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <div class="thumb">
                        <div class="slides-items clearfix">
                            <!-- Slideshow -->
                            <div id="container">
                                <div id="slides">
                                    <div class="slides_container">
                                        <img src="/user/images/index/blog/1/img03.jpg" alt="Slide 1">
                                        <img src="/user/images/index/blog/1/img02.jpg" alt="Slide 2">
                                        <img src="/user/images/index/blog/1/img01.jpg" alt="Slide 3">
                                        <img src="/user/images/index/blog/1/img04.jpg" alt="Slide 4">
                                    </div><!-- .slides_container -->
                                </div><!-- #slides -->
                            </div><!-- #container -->
                        </div><!-- .slides-items -->
                        <div class="clear"></div>
                        <div class="thumb-arrow-up"></div>
                    </div><!-- .thumb -->
                    <div class="text">
                        <p>Hi, we're Envato</p>
                        <p>Our mission is to help people to earn and to learn, online. We operate marketplaces where hundreds of 
                        thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn creative skills.</p>
                        <div class="go-to readmore no-margin-bottom"> 
                            <a href="blog-post.html">Read more</a>
                            <span></span>
                        </div><!-- .go-to -->
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #3 -->

            <!-- POST #4 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="aside"><a href="blog-post.html" title="Aside Post Format"></a></li>
                                <li class="tag"><a href="#" title="Category - Aside">Aside</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">心情日记</a></h4>
                        <div class="meta">
                            <span class="date" title="10 April 2012">2 个月前</span>
                            <span class="author">by <a href="#">ZERGE</a></span>
                            <a href="#" class="comments" title="Comments">7</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <div class="text">
                        <p class="last">今天心情不错</p>
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #4 -->

            <!-- POST #5 -->
            <div class="post-block-style2 post-bg">
                <div class="post-bg-white">
                    <div class="post-meta clearfix">
                        <div class="post-category">
                            <ul>
                                <li class="audio"><a href="blog-post.html" title="Audio Post Format"></a></li>
                                <li class="tag"><a href="#" title="Category - Audio">Audio</a></li> 
                                <li class="tag"><a href="#" title="Category - Freebie">Freebie</a></li>
                            </ul>
                        </div><!-- .post-category -->
                        <h4><a href="blog-post.html" class="title">音频文件</a></h4>
                        <div class="meta">
                            <span class="date" title="08 April 2012">2 个月前</span>
                            <span class="author">by <a href="#">张三</a></span>
                            <a href="#" class="comments" title="Comments">2</a>
                        </div><!-- .meta -->
                    </div><!-- .post-meta -->
                    <audio id="player2" src="http://color-theme.com/assets/audio/preview.mp3" controls="controls"></audio>
                    <div class="text">
                        <p>动人的音乐</p>
                        <p class="last"><a href="#">下载链接</a></p>
                    </div><!-- .text -->
                </div><!-- .post-bg-white -->
            </div><!-- .post-block-style2 -->
            <!-- END POST #5 -->

            <!-- START PAGINATION-->
            <div id="nav-pagination">
                <ul class="nav-pagination clearfix">
                    <li class="first"><a href="#"></a></li>
                    <li><a href="#">1</a></li>
                    <li class="current"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="dots">...</li>
                    <li><a href="#">20</a></li>
                    <li><a href="#">21</a></li>
                    <li><a href="#">22</a></li>
                    <li class="last"><a href="#"></a></li>
                 </ul>
            </div>
            <!-- END PAGINATION-->  
        </div><!-- .left-content -->



        <div class="right-sidebar">
            <!-- SEARCH -->
            <div class="widget">
                <h5>搜索</h5>
                <form method="get" id="searchform" action="http://html.color-theme.com/linkup">
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
                <li>zerge on <a href="#" >Post With Gallery</a></li>
                <li>dimetrio on <a href="#">Quote Post</a></li>
                <li>ikea on <a href="#">Audio Post</a></li>
                <li>kseniya on <a href="#">Post With Link</a></li>
                <li>kolyan on <a href="#">Post With Featured Image</a></li>
                </ul>
            </div><!-- end .widget -->

            <!-- 最近帖子 -->
            <div class="widget">
                <h5>最近帖子</h5>
                <ul class="list text">
                <li><a href="#">Getting Good with Git</a></li>
                <li><a href="#">Theme Tumblr Like a Pro</a></li>
                <li><a href="#">Post with Slideshow</a></li>
                <li><a href="#">Simple Text Post</a></li>
                <li><a href="#">Corporate Motivation Audio Theme</a></li>
                </ul>
            </div><!-- end .widget -->
        
            <!-- TWITTER -->
            <div class="widget">
                <h5>推荐软件</h5>
                <div id="twitter-widget">
                    <div class="tweet-sb"><ul class="tweet_list"><li class="tweet_first tweet_odd"> <span class="tweet_text">Your Say: How many emails are in your inbox? <a href="http://t.co/fOiQRKwz">http://t.co/fOiQRKwz</a></span><span class="tweet_time"><a href="http://twitter.com/envato/status/187682527522197504" title="view tweet on twitter"> about 17 hours ago</a></span></li><li class="tweet_even"> <span class="tweet_text">How Long Does It Take to Make a Quality Item? <a href="http://t.co/vZ0yABEI">http://t.co/vZ0yABEI</a></span><span class="tweet_time"><a href="http://twitter.com/envato/status/187456041913556992" title="view tweet on twitter"> about a day ago</a></span></li><li class="tweet_odd"> <span class="tweet_text">@<a href="http://twitter.com/flexihood">flexihood</a> Thanks! we love you too! :D</span><span class="tweet_time"><a href="http://twitter.com/envato/status/187389650955022338" title="view tweet on twitter"> about a day ago</a></span></li></ul></div>  
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
                <iframe src="http://player.vimeo.com/video/32802400?title=0&amp;byline=0&amp;portrait=0&amp;color=ffe55a" width="213" height="120"></iframe>
                <p>My latest video, watch it!</p>
            </div><!-- end .widget -->

            <!-- ADVERTISING -->
            <div class="widget advertising">
                <h5>广告</h5>
                <div class="ads">
                    <a href="http://www.cssmoban.com/?books/get-going-with-google-adwords" class="advertising-link"><img src="/user/images/index/ads/google.jpg" alt=""></a>
                    <a href="http://www.cssmoban.com/?books/rockstar-freelancer" class="advertising-link"><img src="/user/images/index/ads/freelance.jpg" alt=""></a>
                    <a href="http://www.cssmoban.com/?books/successful-facebook-marketing" class="advertising-link"><img src="/user/images/index/ads/facebook.jpg" class="left margin-right-5px no-margin-bottom" alt=""></a>                           
                    <a href="http://www.cssmoban.com/?books/how-to-be-a-rockstar-wordpress-designer-2" class="advertising-link"><img src="/user/images/index/ads/wordpress.jpg" class="no-margin-bottom" alt=""></a>                                                        
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
                <span class="email"><a href="mailto:support@color-theme.com">support@color-theme.com</a></span>
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
            <img src="/user/images/index/logo-mini.png" alt="Logo Mini" class="logo" />
            <p>We are a group of designers combining our skills to create traditional 
            and new creative websites for your communicational issues.</p>
            <ul id="footer-social">
                <li class="twitter"><a href="http://twitter.com/"></a></li>
                <li class="dribbble"><a href="http://dribbble.com/"></a></li>
                <li class="facebook"><a href="http://facebook.com/"></a></li>
                <li class="google"><a href="http://plus.google.com/"></a></li>
                <li class="linkedin"><a href="http://linkedin.com/"></a></li>
                <li class="behance"><a href="http://behance.net/"></a></li>
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
        <div class="copyright">&copy; Copyright &copy; 2013.Company name All rights reserved.<a target="_blank" href="http://www.cssmoban.com/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></div>
        <div class="clear"></div>
    </div><!-- .center-block -->
    <div class="clear"></div>   
</div><!-- #footer-menu -->
<!-- END FOOTER MENU  -->

</body>
</html>
