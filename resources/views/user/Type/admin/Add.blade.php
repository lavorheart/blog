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

                                <form id="form-post-comment" action="{{ url('/userBG/Type')}}" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    <input type="hidden" name='userName' value="{{ $userName }}">
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

                    </div>
                </div>

               @endif
                <!-- 判断用户登录后状态判断结束 -->

               
        </div><!-- .left-content -->
@endsection
