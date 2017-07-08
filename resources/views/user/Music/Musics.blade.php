@extends('layout.layouts')
@section('content')
        <div class="left-content">
            
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
