@extends('layout.layouts')
@section('content')
<div class="left-content">

    <!-- COMMENTS BLOCK -->
    <div class="comments-block post-bg">
        <div class="post-bg-white">
            <h4>个人中心</h4>

            <!-- FIRST LEVEL COMMENT-->
            <div class="comment-block">
                <div class="gravatar">
                    <a href="#"><img src="{{ url('/user/images/index/blog/avatars/admin-gravatar.jpg')}}" alt="" title="ZERGE"></a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">博友路人甲</span>
                    </span>
                    
                    <p class="comment"> 
                        {{ session('master')->nickName }}签名
                    </p>
                  
                </div><!-- end comment-text -->
            </div><!-- end comment-block -->                        

            
        </div><!-- .post-bg-white -->
    </div><!-- .comments-block -->
    <!-- END COMMENTS BLOCK --> 

    <!-- COMMENTS FORM -->
    @if(session('master'))
    <div id="comments-form" class="post-bg">
        <div class="post-bg-white">
            <h4>编辑你的个人信息</h4>            
            <form id="form-post-comment" action="{{ url('/Personal_Center')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                <input type="text" value="{{ old('nickName')}}" name="nickName" placeholder="昵称"><br>
                <input type="text" value="{{ old('qq')}}" name="qq" placeholder="qq"><br>
                <input type="mail" value="{{ old('email')}}" name="email" placeholder="email" class="last-item"><br>
                <input type="radio"  name="usex" value="m"/> 男
                <input type="radio" name="usex" value="w" checked />女<br>
                修改头像:
                <input type="file" name="photo" />
                <input type="submit" value="递交" class="submit">
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
    @endif
@endsection
