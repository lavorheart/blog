<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie ie6" lang="zh"> <![endif]-->
<!--[if IE 7]><html class="ie ie7" lang="zh"> <![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="zh"> <![endif]-->
<!--[if IE 9]><html class="ie ie9" lang="zh"> <![endif]-->
<!--[if IE]><html class="ie" lang="zh"><![endif]-->
<html lang="zh">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>用户中心-密码找回</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="ifeng.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script>
    if(window.top !== window.self){ window.top.location = window.location;}
/*
  if (top != self) {
    top.location.href = window.location.href;
  } 
*/
</script>
<link href="https://id.ifeng.com/static/css/style.css" rel="stylesheet" type="text/css" />

<script src="https://id.ifeng.com/static/js/jquery-1.8.3.min.js"></script>
<script src="https://id.ifeng.com/static/js/jquery.cookie.js"></script>
<script>var url = {"api":"https:\/\/id.ifeng.com","web":"http:\/\/id.ifeng.com","res":"https:\/\/id.ifeng.com\/static"};

</script>
</head>
<body>

<!--header-->
<div class="header">
   <div class="w1000"><img src="https://id.ifeng.com/static/images/logo.gif" width="125" height="50" title="凤凰网" alt="凤凰网" /></div>
</div>
<!--通用频道页头代码结束-->
<div class="w1000 logo_bg clearfix p_relative">
  <div class="">
    <div class="form_area">
     <h2 class="title">找回凤凰通行证密码</h2>
     <div class="box">
       <div class="bd form_list">
        <div class="f_14 mb_30" style="margin-left:16px;">请填写您需要找回的账号:</div>
        <div class="item clearfix">
          <label class="txt_label">账号</label>
          <input id="findUserId" type="text" class="txt_input txt_270" />
          <div id="findUserIdHint" class="input_txt_tips">用户名\邮箱\手机号</div>
          <div id="findUserIdTips" class="txt_tips" style="display:block">请输入您的账号</div>
          <div id="findUserIdError" class="txt_tips txt_tips_error" style="display:none"></div>
          <!--<div id="findUserIdOK" class="txt_tips txt_tips_ok" style="display:none"></div>-->
        </div>

        <div class="item clearfix code">
          <label class="txt_label">验证码</label>
          <input id="findCodeInput" name="" type="text" class="txt_input txt_124"/>
          <img id="findCodePic" src="https://id.ifeng.com/public/authcode" width="62" height="30" class="code_img" />
          <a id="findCodeRefresh" href="javascript:void(0);" class="code_change">换一个</a>
          <div id="findCodeTips" class="txt_tips" style="display:block">请输入验证码</div>
          <div id="findCodeError" class="txt_tips txt_tips_error" style="display:none"></div>
          <div id="findCodeOk" class="txt_tips txt_tips_ok" style="display:none"></div>
        </div>
        <div class="item clearfix btn_area pt_20">
          <input id="findPasswordSubmit" name="" type="button" class="btn btn01" value="下一步" />
        </div>
        <div class="warn_text"></div>

       </div>
       <div class="bot"></div>
     </div>
</div>
  </div>
</div>
<!--通用频道页尾代码开始-->
<style type="text/css"> 
.clear{ clear:both;}
.chaFotNav ul, .chaFotNav li{ margin:0px; padding:0px;}/*100318*/
.chaFotNav li{ list-style:none;}/*100318*/
.chaFotNav { width:998px; border:1px #d9d9d9 solid; margin:0 auto; font-family:simsun, Arial; font-size:12px; clear:both;background:#fff;}
.chaFotNav .endNList { width:772px; float:left; padding:8px 0px;}/*100325*/
.chaFotNav .endNList li { padding:0px 4px 0px 5px; background:url(https://id.ifeng.com/static/images/common/zxicon_26.gif) right center no-repeat; float:left;}
.chaFotNav .endNList li a { color:#2b2b2b; text-decoration:none;}
.chaFotNav .endNList li a:hover{ text-decoration:underline;}
.chaFotNav .navFocus { width:200px; padding:5px 0 0 0px; margin:0 0px 0 0; color:#ba2636; line-height:18px; float:right;}/*100325*/
.chaFotNav .navFocus a { line-height:18px; text-decoration:none;}
.chaFotNav .navFocus a:hover { text-decoration:underline;}
.chaFotNav .navV a, .chaFotNav .navVIP a, .chaFotNav .ifengPlay a, .chaFotNav .tvPlay a, .chaFotNav .navWap a, .chaFotNav .navTmp a { color:#ba2636; }
.chaFotNav .navV { width:37px; background:url(https://id.ifeng.com/static/images/common/nav0416_14.gif) no-repeat 1px 4px; padding:0 0 0 17px; float:left }
.chaFotNav .navTmp { width:37px; float: left; }/*100325*/
/*.chaFotNav .navVIP { width:42px; background:url(http://img.ifeng.com/tres/TemplateRes/26110/26110/images/news_v5/nav0416_09.gif) no-repeat 24px 3px; float:left }*/
.chaFotNav .ifengPlay { width: 37px; float: left; }/*100325*/
.chaFotNav .tvPlay { width:55px; background:url(https://id.ifeng.com/static/images/common/nav0416_17.gif) no-repeat 0px 3px; padding:0 0 0 15px; float:left }
.chaFotNav .navWap { width:30px; background:url(https://id.ifeng.com/static/images/common/nav0416_06.gif) no-repeat 0px 2px; padding:0 0 0 11px; float:left }
.chaFotNav .nextTop { width:40px; height:20px; padding:7px 0 0 3px; border-left:1px #d9d9d9 solid; float:left }
.chaFotNav02 { width:1000px; height:21px; margin:0 auto; background:#fff url(https://id.ifeng.com/static/images/common/icon02_04.gif) repeat-x bottom;  font-size:0px; line-height:0px; clear:both }
.chaFooter{ color:#000; width:1000px; height:72px; margin:0 auto; clear:both; text-align:center; line-height:24px; font-family:Arial, simsun; font-size:12px;background:#fff; padding-top:8px;}
.chaFooter a{ color:#000; text-decoration:none;}
.chaFooter a:hover{ color:#000; text-decoration:underline;}
.chaFooter .footLink{ line-height:22px;}/*100318*/
.chaFooter .footLink a{ padding:0px 8px;}
.chaFooter .copyright{ color:#000; line-height:22px;}/*100318*/
</style>
<div class="chaFotNav">
    <!--100325 begin-->
    <ul class="endNList">
        <li><a href="http://www.ifeng.com/" target="_blank">首页</a></li>
                <li><a href="http://news.ifeng.com/" target="_blank">资讯</a></li>
                <li><a href="http://news.ifeng.com/taiwan/" target="_blank">台湾</a></li>
                <li><a href="http://opinion.ifeng.com/" target="_blank">评论</a></li>
                <li><a href="http://finance.ifeng.com/" target="_blank">财经</a></li>
                <li><a href="http://auto.ifeng.com/" target="_blank">汽车</a></li>
                <li><a href="http://tech.ifeng.com/" target="_blank">科技</a></li>
                <li><a href="http://house.ifeng.com/" target="_blank">房产</a></li>
                                <li><a href="http://home.ifeng.com/" target="_blank">家居</a></li>
                <li><a href="http://fashion.ifeng.com/travel/" target="_blank">旅游</a></li>
                <li><a href="http://ent.ifeng.com/" target="_blank">娱乐</a></li>
                <li><a href="http://fashion.ifeng.com/" target="_blank">时尚</a></li>
                <li><a href="http://news.ifeng.com/sports/" target="_blank">体育</a></li>
                <li><a href="http://news.ifeng.com/mil/" target="_blank">军事</a></li>
                <li><a href="http://news.ifeng.com/history/" target="_blank">历史</a></li>
                <li><a href="http://book.ifeng.com/" target="_blank">读书</a></li>
                <li><a href="http://edu.ifeng.com/" target="_blank">教育</a></li>
                <li><a href="http://fashion.ifeng.com/health/" target="_blank">健康</a></li>
                <li><a href="http://fashion.ifeng.com/baby/" target="_blank">亲子</a></li>
                <li><a href="http://games.ifeng.com/" target="_blank">游戏</a></li>
                <li><a href="http://city.ifeng.com/" target="_blank">城市</a></li>            
                <li><a href="http://bbs.ifeng.com/" target="_blank">论坛</a></li>
                <li class="end"><a href="http://blog.ifeng.com/" target="_blank">博报</a></li>
    </ul>
    <div class="navFocus">
        <div class="navV"><a href="http://v.ifeng.com/" target="_blank">视频</a>·</div>
        <div class="navTmp"><a href="http://v.ifeng.com/documentary/index.shtml" target="_blank">纪实</a>·</div>
        <div class="ifengPlay"><a href="http://v.ifeng.com/live/" target="_blank">直播</a></div>
        <div class="tvPlay"><a href="http://phtv.ifeng.com/" target="_blank">凤凰卫视</a></div>
    </div>
    <!--100325 end-->
    <div class="clear"></div>
</div>
<div class="chaFotNav02"></div>
<div class="chaFooter">
    <div class="footLink"> <a href="http://www.ifeng.com/corp/about/intro/" target="_blank">凤凰新媒体介绍</a>|<a href="http://ir.ifeng.com/" target="_blank">投资者关系 Investor Relations</a>|<a href="http://www.ifeng.com/corp/ad/" target="_blank">广告服务</a>|<a href="http://career.ifeng.com/" target="_blank">诚征英才</a>|<a href="http://www.ifeng.com/corp/privacy/" target="_blank">保护隐私权</a>|<a href="http://www.ifeng.com/corp/exemption/" target="_blank">免责条款</a>|<a href="http://www.ifeng.com/corp/counselor/" target="_blank">法律顾问</a>|<a href="http://help.ifeng.com/" target="_blank">意见反馈</a>|<a href="http://phtv.ifeng.com/intro/" target="_blank">凤凰卫视介绍</a> </div>
    <div class="copyright"> 凤凰新媒体 版权所有<br>
        Copyright © 2011 Phoenix New Media Limited All Rights Reserved. </div>
</div>
<script>
  var sta_collection_time = new Date().getTime();
</script>
<!-- <script src="http://y3.ifengimg.com/sta_collection_3.3.9x.min.js" id="sta_collection_new"></script> -->
<!--通用频道页尾代码结束-->

<script type="text/javascript" src="https://id.ifeng.com/static/js/public.js"></script>
<script type="text/javascript" src="https://id.ifeng.com/static/js/mmzh.js"></script>
</body>
</html>
