@extends('layout.layouts')
@section('content')
        <div class="left-content">
            
            <h3>:发布博文</h3>
        
                <!-- 判断用户登录后状态 -->
                @if(session('master'))
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">
                        <!-- 加载百度编辑器的容器 -->
                        <script id="container" name="content" type="text/plain">
                            请输入内容
                        </script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="/ue/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="/ue/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container');
                        </script>
                        <!-- 百度编辑器结束  -->
                    </div>
                </div>
                @endif
                <!-- 判断用户登录后状态判断结束 -->

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
                            <!--添加多个视频文件-->

                        <video width="500" src="{{ asset('/user/mp4/01.mp4')}}" controls >
                            <source src="{{ asset('/user/mp4/01.mp4')}}"/>
                            <source src="{{ asset('/user/mp4/01.mp4')}}"/>
                            你的浏览器欠费了，看不了视频~~
                        </video>

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
                        <audio id="player2" "{{asset('/user/mp3/薛之谦 - 绅士.mp3')}}" controls="controls">

                            <source src="{{asset('/user/mp3/薛之谦 - 绅士.mp3')}}" />
                            <source src="{{asset('/user/mp3/wukong1.mp3')}}" />
                            <source src="{{asset('/user/mp3/sxgn.mp3')}}" />
                            <source src="{{asset('/user/mp3/陈奕迅 - 爱情转移.mp3')}}" />
                            <source src="{{asset('/user/mp3/陈小春 - 友情岁月.mp3')}}" />
                            
                            你的浏览器太破了，可以扔掉了~~~
                        </audio>
                        <div class="text">
                            <p>动人的音乐</p>
                            <p class="last"><a href="#">下载链接</a></p>
                        </div><!-- .text -->
                    </div><!-- .post-bg-white -->
                </div><!-- .post-block-style2 -->
                <!-- END POST #5 -->
               <!--      <audio controls src="/user/mp3/wukong1.mp3" autoplay ></audio>
            
            <!--添加多个音频文件-->
                <!-- <audio controls > -->
                <!-- <source src="/user/mp3/wukong1.mp3" /> -->
                <!-- <source src="/user/mp3/sxgn.mp3" /> -->
                <!-- 你的浏览器太破了，可以扔掉了~~~ -->
               
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
@endsection
