@extends('layout.layouts')
@section('content')
        <div class="left-content">
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
                            <p>相册标题</p>
                            <p>对相册的描述</p>
                            <div class="go-to readmore no-margin-bottom"> 
                                <a href="blog-post.html">详情</a>
                                <span></span>
                            </div><!-- .go-to -->
                        </div><!-- .text -->
                    </div><!-- .post-bg-white -->
                </div><!-- .post-block-style2 -->
                <!-- END POST #3 -->

                <!-- 分页开始 -->
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
