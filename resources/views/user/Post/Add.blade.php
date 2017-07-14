@extends('layout.layouts')
@section('content')
<div class="left-content">               
                <!-- 判断用户登录后状态 -->
                @if(session('master'))
                <h2 contenteditable="true">发布博文</h2>
                    <p contenteditable="true">世界因你而精彩.</p>
        
                     @if(session('info'))
                        <div class="alert alert-success">
                             <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>
                                提示!
                            </h4>  {{ session('info')}}
                        </div> 
                     @endif  

                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">

                            <form action="{{ url('/userBG')}}/{{ $userName }}/post" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <fieldset>
                                    <!-- 标题 -->
                                    <select name="tid">
                                    <option value="0"> 选择父分类 </option>
                                    @foreach($data as $key => $value)
                                        <option value="{{ $value->id}}"> {{ $value->name}} </option>
                                    @endforeach
                                    </select>

                                    <hr>

                                    <!-- 标题 -->
                                    <label>标题:</label>
                                        <input type="text" name="title" value="请输入标题" />
                                    <hr>

                                    <!-- 简介 -->
                                    <label>简介:</label>
                                        <input type="text" name="readme_post" value="简介" />
                                    <hr>

                                    <!-- 上传logo -->
                                    <label>上传LoGo:</label>
                                        <input type="file" name="logo_post" class="btn btn-info" />
                                    <hr>

                                        <!-- 加载百度编辑器的容器 -->
                                        <label>文章内容区:</label>
                                        <script id="container" name="content_post" type="text/plain">
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
                                    <hr>
                                    <button class="btn btn-info" type="submit">递交</button>
                                    
                                </fieldset>
                            </form>

                    </div>
                </div>
                @endif
                <!-- 判断用户登录后状态判断结束 -->

</div>
            
    
@endsection
