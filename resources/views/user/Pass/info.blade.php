<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>提示信息</title>

  <!-- bootstrap引入  -->
  <link href="\bootstrap\css/bootstrap-combined.min.css" rel="stylesheet">
  <link href="\bootstrap\css/layoutit.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
      <script src="\bootstrap\js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="\bootstrap\img/favicon.png">
    
    <script type="text/javascript" src="\bootstrap\js/jquery-2.0.0.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="\bootstrap\http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="\bootstrap\js/bootstrap.min.js"></script>
    <script type="text/javascript" src="\bootstrap\js/jquery-ui.js"></script>
    <script type="text/javascript" src="\bootstrap\js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="\bootstrap\js/jquery.htmlClean.js"></script>
    <script type="text/javascript" src="\bootstrap\ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="\bootstrap\ckeditor/config.js"></script>
    <script type="text/javascript" src="\bootstrap\js/scripts.js"></script>
    <!-- bootstrap引入结束  -->

</head>

<body>
	 
     @if(session('info'))
        <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>
                提示!
            </h4>  {{ session('info')}}
        </div> 
     @endif  
         
</body>
</html>
