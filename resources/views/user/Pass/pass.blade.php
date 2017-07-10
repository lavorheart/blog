@extends('layout.layouts')
@section('content')
<div class="left-content">
    <form action="{{ url('/user/sendEmail')}}" method="post">
    {{csrf_field()}} 
   
     <h2 class="title">找回通行证密码</h2>
    
     
        @if(session('info'))
          <div class="f_14 mb_30" style="margin-left:16px;"> {{ session('info')}} </div>
        @endif
        <div>请填写您需要找回的账号:</div>
      
          <label>账号</label>

          <input  value="{{ old('EmailAddress')}}" name="EmailAddress" type="text" class="txt_input txt_270" />

          <div >用户名\邮箱\手机号</div>
          <div >请输入您的账号</div>
          <!--<div id="findUserIdOK" class="txt_tips txt_tips_ok" style="display:none"></div>-->
       

          <input id="findPasswordSubmit" name="" type="submit" class="btn btn01" value="下一步" />
    </form>
</div>
@endsection

