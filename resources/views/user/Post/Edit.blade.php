@extends('layout.layouts')
@section('content')
        <div class="left-content">
            
            <h3>:编辑分区</h3><br>
            <h5 style="color:red">{{ session('info')}}</h5>
        
                <!-- 判断用户登录后状态 -->
                @if(session('master'))
                <div class="post-block-style2 post-bg">
                    <div class="post-bg-white">    

                            <div class="post-bg-white">

                                <form id="form-post-comment" action="{{ url('/post')}}/{{ $data->id}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field()}}
                                    {{ method_field('PATCH') }}
                                    分类名称:
                                    <input type="text" value="{{ $data->name }}" name="name" ><br> 
                                    分类blogo:

                                    <img src="/user/images/photo/{{ $data->blogo}}" width="500"> <br>
                                    <input type="file" name="blogo"/> <br>
                                    <file>
                                     更改分区:
                                    <select name="pid">
                                    @foreach($All_data as $key => $value)
                                    <option 
                                    
                                    @if($data->pid == $value->id)
                                    selected
                                    @endif

                                    value="{{ $value->id }}"> {{ $value->name }} </option>
                                    @endforeach
                                    </select> 
                                    <input type="submit" value="递交" class="submit">
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
