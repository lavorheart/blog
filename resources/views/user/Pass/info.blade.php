@extends('layout.layouts')
@section('content')
<div class="left-content">
        <h2>提示信息:</h2>
        @if(session('info'))
          <div > {{ session('info')}} </div>
        @endif
</div>
@endsection