@extends('layout.layouts')
@section('content')
        <div class="left-content">
            
            <h3>:发布心情</h3>
        
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
