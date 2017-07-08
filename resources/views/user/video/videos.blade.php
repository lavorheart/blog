@extends('layout.layouts')
@section('content')
        <div class="left-content">
            
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
