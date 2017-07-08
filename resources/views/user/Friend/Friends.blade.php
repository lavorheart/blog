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
                <div class="meta-arrow-up"></div>
                <div class="date">
                    <h4>23</h4>
                    <h6>Mar</h6>
                </div>
                <h4>博友</h4>
                <span class="meta-info author">Author: ZERGE</span>
                <span class="meta-info comments">Comments: <a href="#">25</a></span>
                <span class="meta-info category">Category: <a href="#">Development</a></span>
            </div><!-- .post-meta -->
            <div class="text">
                输入您的留言板简介
            </div><!-- .text -->
            <div class="post-meta-tag">
                <span class="tags">Tags: <a href="#">github</a>, <a href="#">ebook</a>, <a href="#">rockable</a></span>
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
            <h4>博友</h4>

            <!-- FIRST LEVEL COMMENT-->
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/admin-gravatar.jpg" alt="" title="ZERGE"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">博友路人甲</span>
                    </span>
                    <p class="comment">
                        路人甲的签名
                    </p>
                    <a href="#" class="replay">Replay</a>
                </div><!-- end comment-text -->
            </div><!-- end comment-block -->                        

            
        </div><!-- .post-bg-white -->
    </div><!-- .comments-block -->
    <!-- END COMMENTS BLOCK --> 

    <!-- COMMENTS FORM -->
    @if(session('master'))
    <div id="comments-form" class="post-bg">
        <div class="post-bg-white">
            <h4>编辑你博友版面主题</h4>              
            <form id="form-post-comment" action="javascript:alert('It Works!');">
                <input type="text" placeholder="主题">
                <input type="text" placeholder="简介" class="last-item">
                <textarea id="comment-message" placeholder="内容"></textarea>
                <input type="submit" value="递交" class="submit">
                <span></span>
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
    @endif
@endsection
