@extends('layout.layouts')
@section('content')
        <div class="left-content">

                <!--   <<<<<<<<<<<<<<<<<<<<<<博文板块开始 >>>>>>>>>>>>>>>>>>>>>>  -->
               
                 <h2 contenteditable="true">博文</h2>
                    <p contenteditable="true">世界因你而精彩.</p>

              <!-- POST #2 -->
                <div class="post-block-style2 post-bg">
                @foreach($UrlData['post'] as $v) 
                <div class="container-fluid">
                    <div class="post-bg-white">
                        <div class="post-meta clearfix">
                            <div class="row-fluid">
                                <div class="span12">
                                    <ul class="thumbnails">
                                            <li class="span10" style="float:left">
                                            <div class="post-meta clearfix">
                                                <h4><a href="blog-post.html" class="title"> {{ $v['title'] }} </a></h4>
                                                <div class="meta">
                                                    <span class="date" title="20 March 2012 ">{{$v['ctime_post'] }}</span>
                                                    <span class="author">by <a href="#">{{ $UrlData['userdetail']['nickName']}}</a></span>
                                                    <a href="#" class="comments" title="Comments">14</a>
                                                </div><!-- .meta -->
                                            </div><!-- .post-meta -->
                                            <div class="thumbnail">
                                                <img alt="300x200" src="{{url('/user/images/post')}}/{{ $v['logo_post']}}" height="300px">
                                                <div class="thumb-arrow-up"></div>
                                            </div><!-- .thumb -->
                                            <div class="text">
                                                <p></p>
                                                <p>{{ $v['readme_post'] }}</p>
                                                <div class="go-to readmore no-margin-bottom"> 
                                                    <a href="{{url('/userBG')}}/{{ $userName }}/post/{{ $v['id'] }}">
                                                    @if(!session('master')) 
                                                    浏览博文详情 
                                                    @endif
                                                    @if(session('master')) 
                                                    修改博文内容
                                                    @endif
                                                    </a>
                                                    <hr>
                                                    @if(session('master'))
                                                    <a href="#" >删除博文信息</a>
                                                    @endif
                                                    <span></span>
                                                </div><!-- .go-to -->
                                            </div><!-- .text -->
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .post-bg-white -->
                @endforeach
                </div><!-- .post-block-style2 -->
                <!-- END POST #2 -->
                
                <!-- <<<<<<<<<<<<<<<<<<<<<<<<<<博文板块OVER>>>>>>>>>>>>>>>>>>>> -->



                <!-- <<<<<<<<<<<<<<<<<<<<<<<<<<相册板块BEGIN>>>>>>>>>>>>>>>>>>>> -->
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">
                        <div class="post-meta clearfix">
                            
                            <h4><a href="blog-post.html" class="title">相册</a></h4>
                            <div class="meta">
                                <span class="date" title="02 March 2012 ">1 小时前</span>
                                <span class="author">by <a href="#">用户</a></span>
                                <a href="#" class="comments" title="Comments">14</a>
                            </div><!-- .meta -->
                        </div><!-- .post-meta -->
                        
                        <div class="carousel slide" id="carousel-755748">
                          <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#carousel-755748"></li>
                            <li data-slide-to="1" data-target="#carousel-755748" class=""></li>
                            <li data-slide-to="2" data-target="#carousel-755748" class=""></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="item active"> <img alt="" src="/user/images/index/ads/facebook.jpg" width="650px">
                              <div class="carousel-caption" contenteditable="true">
                                <h4>棒球</h4>
                                <p>棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。</p>
                              </div>
                            </div>
                            <div class="item"> <img alt="" src="/user/images/index/ads/freelance.jpg" width="650px">
                              <div class="carousel-caption" contenteditable="true">
                                <h4>冲浪</h4>
                                <p>冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。</p>
                              </div>
                            </div>
                            <div class="item"> <img alt="" src="/user/images/index/ads/freelance.jpg" width="650px">
                              <div class="carousel-caption" contenteditable="true">
                                <h4>自行车</h4>
                                <p>以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。</p>
                              </div>
                            </div>
                          </div>
                          <a data-slide="prev" href="#carousel-755748" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-755748" class="right carousel-control">›</a> </div>
                      
                    </div><!-- .post-bg-white -->
                </div><!-- .post-block-style2 -->
                <!-- <<<<<<<<<<<<<<<<<<<<<<<<<<相册板块OVER>>>>>>>>>>>>>>>>>>>> -->

                <!-- POST #4 -->
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">
                        <div class="post-meta clearfix">
                            
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
               
        </div><!-- .left-content -->
@endsection
