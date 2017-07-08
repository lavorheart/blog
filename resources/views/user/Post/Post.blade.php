@extends('layout.layouts')
@section('content')
        <div class="left-content">

             <!-- 判断用户登录后状态 -->
            @if(session('master'))
            <h4>:添加分区</h4><br>
            <h5 style="color:red">{{ session('info')}}</h5> 
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">    

                            <div class="post-bg-white">

                                <form id="form-post-comment" action="{{ url('/post')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}

                                    分类名称:
                                    <input type="text" value="{{ old('name')}}" name="name" placeholder="分类名称"><br>
                                    父分类:
                                    <select name="pid">
                                    <option value="0"> 根分类 </option>
                                    @foreach($data as $key => $value)
                                        <option value="{{ $value->id}}"> {{ $value->name}} </option>
                                    @endforeach
                                    
                                    <input type="submit" value="递交" class="submit">
                                </form>
                            </div>
                        <hr>
                        <br>

                        <!-- 分类表单开始 -->
                            <table border="1" width="500" cellspacing="0" cellpadding="10">
                            <h4>编辑分区:</h4><br>
                                <td>
                                    <select name="pid">
                                        <option value="0" selected> 根分类 </option>
                                    @foreach($data as $key => $value)
                                        <option value="{{ $value->id}}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                    </select> 
                                </td>                
                                <td >
                                    <a id="edit" href="{{ url('/post')}}/0/edit">编辑</a>
                                </td> 
                                <td>     
                                    <a id="destroy">删除</a>      
                                </td>
                            </table>
                            <!-- 准备form表单为删除做准备 -->
                            <form  id="form-post-comment" action="{{ url('/post')}}/0" method="post" enctype="multipart/form-data">
                                    <!-- 伪造方法 -->
                                    {{ method_field('DELETE')}}
                                    {{ csrf_field()}}
                                    <button >删除</button>
                            </form>
                            <!-- 准备form表单结束 -->
                            <!-- 引入jquery -->
                            <script src="{{ asset('/abcd/js/jq.js') }}"></script>

                            <!-- 下框选中改变按钮值属性 按需加载-->
                            <script type="text/javascript">

                                alert($);
                                // <!-- 下框选中改变按钮值属性 按需加载-->
                                $("select[name='tid']").on('change', function(){
                                    var id = $(this).val();
                                    $('#edit').attr('href','/post/'+id+'/edit');
                                    $('#form-post-comment').attr('action','/post/'+id);
                                });
                                // 删除事件
                                $('#destroy').on('click'function(){
                                    $('#form-post-comment').submit();
                                });
                            </script>
                            

                         <hr>
                        <!-- 分类表单结束 -->
                        
                        <!-- 文章表单开始 -->
                        <h4>发布文章:</h4><br>
                        <form> 
                        选择分区:<br>
                            <td>  
                                    <select name="name">
                                        <option value="0" selected> 根分类 </option>
                                    @foreach($data as $key => $value)
                                        <option value="{{ $value->name}}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                    </select> 
                            </td>                
                            <br><br>
                            <input type="text" value="{{ old('title')}}" name="title" placeholder="标题"><br>
                            <input type="text" value="{{ old('abstract')}}" name="abstract" placeholder="简介"><br>
                            <!-- 加载百度编辑器的容器 -->
                            <script id="container" value="{{ old('content')}}" name="content" type="text/plain">
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
                            <input type="submit" value="递交" class="submit">
                        </form>
                        <!-- 文章表单结束 -->

                    </div>
                </div>

               @endif
                <!-- 判断用户登录后状态判断结束 -->

                <!-- POST #1 -->
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">
                        <div class="post-meta clearfix">
                            <div class="post-category">
                                <ul>
                                    <li class="standard"><a href="blog-post.html" title="Standard Post"></a></li>
                                    <li class="tag"><a href="#" title="Category - Development">Develop</a></li>
                                </ul>
                            </div><!-- .post-category -->
                            <h4><a href="blog-post.html" class="title">孙悟空生命中不会做的是哪件事？</a></h4>
                            <div class="meta">
                                <span class="date" title="20 April 2012 ">6 小时前</span>
                                <span class="author">by <a href="#">作者</a></span>
                                <a href="#" class="comments" title="Comments">17</a>
                            </div><!-- .meta -->
                        </div><!-- .post-meta -->
                        <div class="thumb">
                            <img src="/user/images/index/blog/1/img01.jpg" alt="" />
                            <div class="thumb-arrow-up"></div>
                        </div><!-- .thumb -->
                        <div class="text">
                            <p>In Getting Good With Git, Nettuts+ Associate Editor Andrew Burgess will guide 
                            you through the sometimes-scary waters of source code management with Git, the fast version control system.</p>
                            <p>Git's speed, efficiency, and ease-of-use have made it the popular choice in the world of source code managers. 
                            And with a service like GitHub available for sharing your code, there's no question about whether learning Git is worth your time!</p>
                            <div class="go-to readmore no-margin-bottom"> 
                                <a href="/user/detail">Read more</a>
                                <hr>
                                 @if(session('master'))
                                <a href="#" >修改</a>
                                <a href="#" >删除</a>
                                @endif
                                <span></span>
                            </div><!-- .go-to -->
                        </div><!-- .text -->
                    </div><!-- .post-bg-white -->
                </div><!-- .post-block-style2 -->
                <!-- END POST #1 -->
            
            <!-- POST #2 -->
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">
                        <div class="post-meta clearfix">
                            <div class="post-category">
                                <ul>
                                    <li class="image"><a href="blog-post.html" title="Image Post"></a></li>
                                    <li class="tag"><a href="#" title="Category - Development">Develop</a></li>
                                    <li class="tag"><a href="#" title="Category - Design">Design</a></li>
                                </ul>
                            </div><!-- .post-category -->
                            <h4><a href="blog-post.html" class="title">猪八戒做哪件事让人感动得热泪盈眶？</a></h4>
                            <div class="meta">
                                <span class="date" title="20 March 2012 ">1 个月前</span>
                                <span class="author">by <a href="#">Jeffrey Way</a></span>
                                <a href="#" class="comments" title="Comments">14</a>
                            </div><!-- .meta -->
                        </div><!-- .post-meta -->
                        <div class="thumb">
                            <img src="/user/images/index/blog/1/img02.jpg" alt="" />
                            <div class="thumb-arrow-up"></div>
                        </div><!-- .thumb -->
                        <div class="text">
                            <p>猪八戒做哪件事让人感动得热泪盈眶？（西游说禅之五十七：回向之心）</p>
                            <p>这个惯性思维极为害人，大家不觉得很熟悉吗？在看解放战争的影视片中，国军的高级将领经常犯下这个错误吗？孟良崮被困的张灵甫，如果坐在旁边的“猪八戒”们肯努力搭救，或许可以转变战局；彭大将军进军大西北，胡宗南总是让地方杂牌军顶在前面，最后坐在旁边的“猪八戒”都死了。“士不可不弘毅，任重而道远”，只有在危难时候，互相支持，才能共济时艰，取得好的结果。</p>
                            <div class="go-to readmore no-margin-bottom"> 
                                <a href="blog-post.html">Read more</a>
                                <hr>
                                @if(session('master'))
                                <a href="#" >修改</a>
                                <a href="#" >删除</a>
                                @endif
                                <span></span>
                            </div><!-- .go-to -->
                        </div><!-- .text -->
                    </div><!-- .post-bg-white -->
                </div><!-- .post-block-style2 -->
                <!-- END POST #2 -->
               
        </div><!-- .left-content -->
@endsection
