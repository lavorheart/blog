@extends('layout.layouts')
@section('content')
<div class="left-content">               
 
    <!--   <<<<<<<<<<<<<<<<<<<<<<博文板块开始 >>>>>>>>>>>>>>>>>>>>>>  -->
     @if(session('info'))
        <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>
                提示!
            </h4>  {{ session('info')}}
        </div> 
     @endif  
     <h2 contenteditable="true">博文</h2>
        <p contenteditable="true">世界因你而精彩.</p>
  <!-- POST #2 -->
  @foreach($post as $v)
    <div class="post-block-style2 post-bg">
    
    <div class="container-fluid">
    <div class="post-bg-white">
        <div class="row-fluid">
            <div class="span12">
                <ul class="thumbnails">
                        <li class="span10" style="float:left">
                        <div class="post-meta clearfix">
                            <h4><a href="blog-post.html" class="title"> {{ $v->title }} </a></h4>
                            <div class="meta">
                                <span class="date" title="20 March 2012 ">{{$v->ctime_post }}</span>
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
                            <p>{{ $v->readme_post }}</p>
                            <div class="go-to readmore no-margin-bottom"> 
                                <a href="{{url('/userBG')}}/{{ $userName }}/post/{{ $v->id }}">
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
    </div><!-- .post-bg-white -->

</div><!-- .post-block-style2 -->
<!-- END POST #2 -->
@endforeach
<!-- <<<<<<<<<<<<<<<<<<<<<<<<<<博文板块OVER>>>>>>>>>>>>>>>>>>>> -->

{{ $post->appends($request)->links() }}

    
</div>
            
    
@endsection
