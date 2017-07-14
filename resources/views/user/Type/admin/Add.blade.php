@extends('layout.layouts')
@section('content')
        <div class="left-content">

             <!-- 判断用户登录后状态 -->
            @if(session('master'))
            <h4>:添加分区</h4><br>
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
                           <div class="post-bg-white">

                                <form id="form-post-comment" action="{{ url('/userBG')}}/{{ $userName }}/Type" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field()}} 
                                    <input type="text" value="{{ old('name')}}" name="name" placeholder="新建分类"><br>
                                    <select name="pid">
                                    <option value="0"> 选择父分类 </option>
                                    @foreach($data as $key => $value)
                                        <option value="{{ $value->id}}"> {{ $value->name}} </option>
                                    @endforeach
                                    </select>
                                    <input type="submit" value="递交" class="btn btn-info">
                                </form>

                            </div>
                        <hr>
                        <br>

                    </div>
                </div>

               @endif
                <!-- 判断用户登录后状态判断结束 -->

               
        </div><!-- .left-content -->
@endsection
