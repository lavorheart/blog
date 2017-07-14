@extends('layout.layouts')
@section('content')
        <div class="left-content">

            <h2 contenteditable="true">:编辑分区</h2>
            <br>
            <h5 style="color:red">{{ session('info')}}</h5>
        
                <!-- 判断用户登录后状态 -->
                @if(session('master'))
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">    

                            <div class="post-bg-white">

                                <form id="form-post-comment" action="{{url('/userBG')}}/{{ $userName }}/Type/{{ $data->id}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    分类名称: 
                                    <input type="hidden" name="userName" value="{{$userName}}">
                                    <input type="text"  btn-info" value="{{ $data->name }}" name="name" ><br> 
                                    分类blogo:

                                    <img src="/user/images/photo/{{ $data->blogo}}" width="500"> <br>
                                    <input type="file" class="btn btn-info" name="blogo"/> <br><br>
                                    <file>
                                     更改分区:
                                    <select name="pid">
                                        <option value="0" selected> 根分类 </option>
                                        @foreach($All_data as $key => $value)
                                        <option 
                                        
                                        @if($data->pid == $value->id)
                                        selected
                                        @endif

                                        value="{{ $value->id }}"> {{ $value->name }} </option>
                                        @endforeach
                                    </select> 
                                    <button id="search-btn" class="btn btn-info" type="submit"> 递交</button>
                                </form>
                            </div>
                        <hr>
                        <br>
                        
                    </div>
                </div>

               @endif
                <!-- 判断用户登录后状态判断结束 -->
        </div>
        <!-- left-content结束 -->
@endsection
