@extends('layout.layouts')
@section('content')
<div class="left-content">

    <!-- SINGLE POST BLOCK -->
    <div class="single-post-block post-bg">
        <div class="post-bg-white">
            <div class="thumb">
                <img src="/user/images/index/blog/1/img01.jpg" alt="" />
                <div class="thumb-arrow-up"></div>
            </div><!-- .thumb -->
            <div class="post-meta clearfix">
                :发布时间
                {{ $post['ctime_post'] }}
                <h4><a href="blog-post.html" class="title">{{ $post['title'] }}</a></h4>
                <span class="meta-info author">作者: {{ $userName }}</span>
                <span class="meta-info comments">回复量: <a href="#">{{ $num }}</a></span>
                <span class="meta-info category">所属分类: <a href="#">{{ $type['name'] }}</a></span>
            </div><!-- .post-meta -->
            <div class="text">
                
                <p>{!! $post['content_post'] !!}</p>
            </div><!-- .text -->
            <div class="post-meta-tag">
                
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
                    <a class="addthis_button_facebook"></a>
                    <a class="addthis_button_twitter"></a>
                    <a class="addthis_button_google_plusone"></a>    
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4d8f199d3537a1b7"></script>
                <!-- AddThis Button END -->
            </div><!-- .post-meta-tag -->
        </div><!-- .post-bg-white -->
    </div><!-- .single-post-block -->
    <!-- END SINGLE POST BLOCK -->  


    <!-- COMMENTS BLOCK -->
    <div class="comments-block post-bg">
        <div class="post-bg-white">
            <br>
            <h4>评论内容</h4>
            <br>
            @foreach($reply as $v)
            <!-- FIRST LEVEL COMMENT-->
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/photo/person/{{ $v['photo']}}" alt="加载失败" title="ZERGE"></a>
                    <br> <em>{{$v['nickName']}}</em>
                    
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">{{ $v['ctime_reply'] }}</span>
                    </span>
                    <p class="comment">
                        {{ $v['content_reply'] }}
                    </p>
                    <a href="#" class="replay">回复</a>
                </div><!-- end comment-text -->
            </div><!-- end comment-block -->                        
            @endforeach
            
        </div><!-- .post-bg-white -->
    </div><!-- .comments-block -->
    <!-- END COMMENTS BLOCK --> 

    <!-- COMMENTS FORM -->
    <div id="comments-form" class="post-bg">
        <div class="post-bg-white">
            <h4>评论</h4>              
            <form id="form-post-comment" action="{{url('/userBG')}}/{{ $userName }}/post/{{ $post['id']}}/edit" method="GET">
                <textarea id="comment-message" placeholder="请输入您的评论" name="content_reply" style="width: 624px; height: 164px;"></textarea>
                <input type="submit" value="递交数据:(Submit Comment)" class="submit">
                <span></span>
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
@endsection
