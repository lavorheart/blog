@extends('layout.layouts')
@section('content')
<div class="left-content">
  <h1>发送成功</h1>
  <hr>
  <p>

    <a href="http://mail.{{ $mail}}">请前往邮箱</a>
  
  </p>
</div>
@endsection