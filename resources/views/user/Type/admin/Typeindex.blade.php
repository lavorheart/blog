@extends('layout.layouts')
@section('content')
        <div class="left-content">

             <!-- 判断用户登录后状态 -->
            @if(session('master'))
                @if(session('info'))
                <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                      <h4>
                        提示!
                      </h4>  {{ session('info')}}
                 </div> 
                @endif        
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
                                    <a id="edit" href="/userBG/{{ $userName }}/Type/0/edit?userName={{ $userName }}">
                                        <button id="search-btn" class="btn btn-info" type="button">编辑</button>
                                    </a>
                                </td> 
                                <td>     
                                    <a id="destroy">
                                    <button id="search-btn" class="btn btn-info" type="button"> 删除</button>
                                    </a>      
                                </td>
                            </table>


                            <!-- 准备form表单为删除做准备 -->
                            <form  id="form-post-comment" style="display:none"  action="{{ url('/userBG')}}/{{ $userName }}/Type/0?userName={{ $userName }}" method="post" enctype="multipart/form-data">
                                    <!-- 伪造方法 -->
                                   
                                    {{ method_field('DELETE')}}
                                    
                                    {{ csrf_field()}}
                                    <button >删除</button>
                            </form>
                            <!-- 准备form表单结束 -->
                            <!-- 引入jquery -->
                            <script src="{{ asset('/user/jquery/jq.js') }}"></script>

                            <!-- 下框选中改变按钮值属性 按需加载-->
                            <script type="text/javascript">
                                // console.log('1111');
                                // alert($);
                                // <!-- 下框选中改变按钮值属性 按需加载-->
                                $("select[name='pid']").on('change', function(){
                                    var id = $(this).val();
                                    $('#edit').attr('href','/userBG/{{ $userName }}/Type/'+id+'/edit?userName={{ $userName }}');
                                    $('#form-post-comment').attr('action','/userBG/{{ $userName }}/Type/'+id+'?userName={{ $userName }}');
                                    var res = $('#form-post-comment').attr('action');
                                    console.log(res);
                                });
                                // // // 删除事件
                                $('#destroy').on('click',function(){
                                    $('#form-post-comment').submit();
                                    
                                });

                            </script>
                            

                         <hr>
                        <!-- 分类表单结束 -->
                       

               @endif
                <!-- 判断用户登录后状态判断结束 -->

                
               
        </div><!-- .left-content -->
@endsection
