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
                        <span class="italic" title="January 5, 2011 at 4:43 PM">{{ $UrlData['userdetail']['nickName'] }}</span>
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
            <h4>编辑你的个人信息</h4>
            @if(session('info'))
            <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                <h4>
                       提示!
                </h4>  {{ session('info')}}
             </div> 
            @endif         
            <form id="form-post-comment" action="{{ url('/userBG')}}/{{ $userName }}/Personal_Center" method="post" enctype="multipart/form-data">
                {{ csrf_field()}}
                
                <input type="hidden" value="{{ $userName }}" name="userName" ><br>
                <input type="text" class="form-control" value="{{ $data['nickName'] }}" name="nickName" ><br>
                <input type="text" class="form-control" value="{{ $data['qq'] }}" name="qq" ><br>
                <input type="mail" class="form-control" value="{{ $data['email'] }}" name="email"  class="last-item"><br> 
                <input type="radio"  name="sex" value="m"/> 男
                <input type="radio" name="sex" value="w" checked />女<br>
                <hr>
                修改头像:
                <hr>
                <img src="/user/images/photo/person/{{ $data['photo'] }}" width="500"> <br>
                <br>
                <input type="file"  name="photo" class="btn btn-info"/>
                <hr>                   
                        <a href="/userBG/{{  $userName }}/Personal_Center/{{ $data['id'] }}/edit" class="active">
                            <button class="btn btn-info" type="button">修改密码</button>
                        </a>          
                <hr>
                <button id="search-btn" class="btn btn-info" type="submit"> 递交</button>
                
            </form>
        </div><!-- .post-bg-white -->
    </div><!-- #comments-form -->
    <!-- END COMMENTS FORM -->
</div><!-- .left-content -->
    @endif
@endsection
