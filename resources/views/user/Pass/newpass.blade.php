@extends('layout.layouts')
@section('content')
<div class="left-content">
<form action="{{ url('/user/updatepass')}}" method="post">
    {{csrf_field()}} 
   
     <h2 class="title">请输入密码</h2>
     
        @if (count($errors) > 0)
          <div class="span" id="active">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li style="color:red">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        @if(session('info'))
          <div class="f_14 mb_30" style="margin-left:16px;"> {{ session('info')}} </div>
        @endif
        <div class="f_14 mb_30" style="margin-left:16px;">请填写您的新密码:</div>
       
          <label class="txt_label">新密码</label>
          <input id="findUserId" value="{{ $id }}" name="id" type="hidden" class="txt_input txt_270" />
          <input id="findUserId" value="{{ old('newpassword')}}" name="newpassword" type="password" class="txt_input txt_270" />
          <br>
          <label class="txt_label">确认密码</label>
          <input id="findUserId" value="{{ old('surepassword')}}" name="surepassword" type="password" class="txt_input txt_270" />
          <input id="findPasswordSubmit" name="" type="submit" class="btn btn01" value="递交" />
</form>
</div>
@endsection