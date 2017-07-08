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
                <h4>留言板</h4>
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
            <h4>5 Comments</h4>

            <!-- FIRST LEVEL COMMENT-->
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/admin-gravatar.jpg" alt="" title="ZERGE"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">2 days ago</span>
                    </span>
                    <p class="comment">
                        Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. 
                        Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                    </p>
                    <a href="#" class="replay">Replay</a>
                </div><!-- end comment-text -->
            </div><!-- end comment-block -->                        

            <!-- SECOND LEVEL COMMENT-->
            <div class="replay-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/orangeidea.jpg" alt="" title="Orangeidea"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info" title="January 6, 2011 at 9:14 PM">
                        <span class="italic">1 days ago</span>
                    </span>
                    <p class="comment">
                        Love the look of this template, going to purchase it now!
                    </p>
                    <a href="#" class="replay">Replay</a>
                </div><!-- end comment-text -->
            </div><!-- .replay-block -->

            <!-- SECOND LEVEL COMMENT-->
            <div class="replay-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/rockgirl.jpg" alt="" title="RockGirl"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info" title="January 6, 2011 at 9:14 PM">
                        <span class="italic">1 days ago</span>
                    </span>
                    <p class="comment">
                        Hey, wow i like that theme, very excellent work, looks fantastic. Really delicate. Good job, wish you a lot of clients!
                    </p>
                    <a href="#" class="replay">Replay</a>
                </div><!-- end comment-text -->
            </div><!-- .replay-block -->

            <!-- FIRST LEVEL COMMENT-->
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="/user/images/index/blog/avatars/intern.jpg" alt="" title="Intern"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">30 minutes ago</span>
                    </span>
                    <p class="comment">
                        Three simple words from a non-web geek: This theme rocks!!!
                        I would highly recommend this theme to anybody that wants to build a powerful but yet flexible website!
                        In addition, the customer service is truly provides top notch!!!lacinia odio sem nec elit.
                    </p>
                    <a href="#" class="replay">Replay</a>
                </div><!-- end comment-text -->
            </div><!-- end comment-block -->
            
        </div><!-- .post-bg-white -->
    </div><!-- .comments-block -->
    <!-- END COMMENTS BLOCK --> 

    <!-- COMMENTS FORM -->
    <div id="comments-form" class="post-bg">
        <div class="post-bg-white">
            <h4>Post Your Comment</h4>              
            <form id="form-post-comment" action="javascript:alert('It Works!');">
                <input type="text" placeholder="Name">
                <input type="text" placeholder="Email" class="last-item">
                <textarea id="comment-message" placeholder="Post your comment here!"></textarea>
                <input type="submit" value="Submit Comment" class="submit">
                <span></span>
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
@endsection
