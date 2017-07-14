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
                    <a href="#">
                        <img src="/user/images/photo/person/{{ $UrlData['userdetail']['photo'] }}" alt="" title="用户头像">
                    </a>
                </div><!-- .gravatar -->
                <div class="comment-text clearfix">
                    <span class="comment-info">
                        <span class="italic" title="January 5, 2011 at 4:43 PM">{{ $userName }}</span>
                    </span>
                    
                    <p class="comment"> 
                        等级:: {{ $UrlData['userdetail']['level'] }} 
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
            <h4>修改密码</h4>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" >{{ $error }}</div>
            @endforeach
             @if(session('info'))
                <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>
                        提示!
                    </h4>  {{ session('info')}}
                </div> 
             @endif   
            <form id="form-post-comment" action="{{ url('/userBG')}}/{{ $userName }}/Personal_Center/{{ $data['id']}}" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                {{ method_field('PUT') }}
                
                <input type="password" class="form-control" value="" name="oldpassword" placeholder="原密码"><br>
                <input type="password" class="form-control" value="" name="newpassword" placeholder="新密码" ><br>
                <input type="password" class="form-control" value="" name="surepassword" placeholder="确认新密码"><br> 
                <hr>
                
                <button id="search-btn" class="btn btn-info" type="submit"> 递交</button>
                
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
    @endif
@endsection
