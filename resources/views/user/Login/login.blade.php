<<<<<<< HEAD
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>新浪通行证登录</title>
<link href="css/frame_2.css" type="text/css" rel="stylesheet">
<link href="css/signin_index_2.css" type="text/css" rel="stylesheet">
<link href="css/skin_2.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/common_2.js"></script>
<script type="text/javascript" src="js/vconf_2.js"></script>
<script type="text/javascript" src="js/validator_login_2.js"></script>
<script language="javascript" type="text/javascript" src="js/cardtips_2.js"></script>
<script language="javascript" type="text/javascript" defer>
	//避免ie中后退时沿用前页的utf8编码，如果是则刷新，刷新后就是gb2312了,为了兼容某些浏览器，如ie6，这段话放在第一个script标签里
	try{
		if(document.charset == 'utf-8'){
				window.location.href = window.location.href; //only for refreshing when charset is utf-8
		}
	}catch(e){}
</script>
<script language="javascript" type="text/javascript" src="js/cardtips_2.js"></script>
<script language="javascript" type="text/javascript" defer>
	//只要复制过去改下下面参数就可以了 :)
	passcardOBJ.overfcolor = '#999999';//鼠标经过字体颜色
	passcardOBJ.overbgcolor = '#E8F4FC';//鼠标经过背景颜色
	passcardOBJ.outfcolor = '#000000';//鼠标离开字体颜色
	passcardOBJ.outbgcolor = '';//鼠标离开背景颜色
</script>
<style type="text/css">
#newDiv {filter:alpha(opacity=100); /* IE */-moz-opacity:100; /* Moz + FF */opacity:100; /* 支持CSS3的浏览器（FF 1.5也支持）*/}
.popdiv {position:absolute;zindex:9999;height:70px;background:#fff;border:1px solid #ccc;color:#999;padding:5px;}
.popdiv input {vertical-align:middle;height:20px;}
label {cursor: pointer !important;vertical-align: middle;}
.passCard{position:absolute;background:#fff;border:1px solid #dddddd;margin:0px 0px 0px -1px;font-size: 12px;color:#999999;}
.note{padding:0!important;margin:4px!important; }
.passCard li{padding:0!important;margin:4px!important;}
</style>
</head>
<body>
<div class="WB_miniblog" id="wrap">
	<div class="iforgot_bd">
		<div class="iforgot_header clearfix">
			<img class="logo_mod1 W_fl" src="picture/logo_2.png"/>
			<div class="logotxt">- 登录</div>
			<div class="name_mod W_fr">
				<a href="http://www.sina.com.cn/" class="S_txt1">新浪首页</a>
				<a href="http://help.weibo.com/" class="S_txt1 last">帮助</a>
			</div>
		</div>
		<div class="iforgot_cont">
			<div class="i_top" style="padding:0 0;" >
			</div>
			<div class="i_mod" style="padding-top:82px;">
				<form method="post" id="vForm" name="vForm">
					<input type="hidden" id="r" name="reference" value="http://i.blog.sina.com.cn" />
					<input type="hidden" id="e" name="entry" value="blog" />
					<input type="hidden"  name="reg_entry" value="blog" />
					<div class="logoicon"></div>
					<div class="main_cen">
																														<br><br>
						<p class="title1"></p>
						<div class="form_mod">
							<ul class="form_list">
								<li class="item">
									<span class="tit">登录名：</span>
									<input type="hidden" id="ag" name="ag" value="">
									<input autocomplete="off" id="username" name="username" tabindex="0" type="text" value="" maxlength="64" class="fInput w200" alt="登录名:无内容/长度{1-64}/errArea{usernameErr}" placeholder="微博/邮箱/博客帐号"/>
																		<a href="http://pokk.com/user/zhuce" class="form_prompt">注册</a>
																		<span class="form_prompt errorShow" id="usernameErr"></span>
								</li>
								<script language=javascript type="text/javascript">
									<!--//
									//检查是否记住登录名
									function GetCookie(_Name)
									{
										var Res = eval('/'+_Name+'=([^;]+)/').exec(document.cookie);
										return Res == null ? false : Res[1];
									}

									//设置占位文案
									function setPlaceHolder(node){
										var that = {};

										that.init = function(){
											var prop = 'placeholder';
											that.content = node.getAttribute(prop);
											var enable = "placeholder" in document.createElement('input');
											if(!enable){
												that.build();
												setTimeout(that.show);
												$addEvent2(node, that.hide, 'focus');
												$addEvent2(node, that.hide, 'propertychange');
												$addEvent2(node, that.show, 'blur');
												$addEvent2(that.label, function(){

													that.hide();
													setTimeout(function(){
														node.focus();
													});
												}, 'mousedown');
											}
										};

										that.build = function(){
											if(that.label){return;}
											var label = that.label = $C('div');
											label.innerHTML = that.content;
											label.style.color = '#999';
											label.style.fontSize = node.style.fontSize;
											label.style.lineHeight = node.style.lineHeight;
											label.style.position = 'absolute';
											that.setPos(324,-35);

											node.parentNode.insertBefore(label, node);
										};

										that.setPos = function(x, y){
											x = x || 0;
											y = y || 0;
											that.label.style.marginLeft = x + 'px';
											that.label.style.marginTop = y + 'px';
										};

										that.show = function(){
											if(node.value == ''){
												that.label.style.display  = 'block';
											}
										};

										that.hide = function(){
											if(that.label.style.display != 'none'){
												that.label.style.display  = 'none';
											}
										};

										that.init();
										return that;
									}

									function initUserName(){
										var loginname = GetCookie('cREMloginname');
										if(loginname != false){
											if ($('username').value == '') {
												$('username').value = decodeURIComponent(loginname);
											}
											try {  // 该元素可能没有
												$('username2').innerHTML = decodeURIComponent(loginname);
											} catch (e) {}
											$('remLoginName').checked = "checked";
										}
										setPlaceHolder($('username'));
										passcardOBJ.init(
												// FlashSoft 注意,最好这个input的autocomplete设定为off
												// 需要有下拉框的input对象
												document.getElementById("username"),
												{
													// 鼠标经过字体颜色
													overfcolor: "#999",
													// 鼠标经过背景颜色
													overbgcolor: "#e8f4fc",
													// 鼠标离开字体颜色
													outfcolor: "#000000",
													// 鼠标离开背景颜色
													outbgcolor: ""
												},
												// 输入完成后,自动需要跳到的input对象[备选]
												document.getElementById("password")
										);
									}
									window.onload = initUserName;
									//-->
								</script>
								<li class="item">
									<span class="tit">密码：</span>
									<input id="password" name="password" type="password" tabindex="1" maxlength="32" alt="密码:无内容/errArea{passwordErr}" class="fInput w200" value="" />
									<a href="https://login.sina.com.cn/getpass.html" class="form_prompt">忘记密码</a></span>
									<span class="form_prompt errorShow" id="passwordErr"></span>
								</li>

								<!-- 动态码 -->
								<li class="item" style='display:none'  id='vsn_content'>
									<span class="tit">微盾动态码：</span>
									<input type="text" value="" class="fInput w200" alt="微盾动态码:无内容/errArea{vsncodeErr}" autocomplete='off' disabled='disabled' maxlength="6" tabindex="1" name="vsncode" id="vsncode">
									<a href="http://account.weibo.com/forgot/vdun" target="_blank" class="form_prompt">挂失微盾</a></span>
									<span id="vsncodeErr" class="form_prompt errorShow"></span>
								</li>
								<!-- /动态码 -->

								<!-- 验证码 -->
								<li class="item" id='door_content' style='display:none'>
									<span class="tit">验证码：</span>
									<span class="code_mod" id="door_img">
                                    <input autocomplete="off" class="fInput w93" id="door" disabled="disabled" name="door" type="text" autocomplete="off" maxlength="10" alt="验证码:无内容/有空格/errArea{doortip}" value="" />
                                    <img id="check_img" class="code_img" width="100" height="35" src=""/>
                                    <a href="javascript:con_code();" class="form_prompt">换一换</a>
                                </span>
									<span id="doortip"  class="form_prompt errorShow"></span>
								</li>
								<!-- /验证码 -->
								<li class="loginError">
									<div id="login_err" style="margin-left:320px;"></div>
								</li>
								<li class="item">
									<div class="btn_mod" style="margin-left:320px;">
										<input id="remLoginName" checked="checked" tabindex="3" name="remLoginName" type="checkbox" class="checkboxInput"/>
										<label for="remLoginName">下次自动登录</label>
									</div>
								</li>
								<li class="item">
									<div class="btn_mod">
										<input style="width:202px;" type="submit" tabindex="5" class="W_btn_a btn_34px" value="登 录" />
									</div>
									<div class="clearit"></div>
								</li>
							</ul>

						</div>
					</div>
					<div class="main_bottom"></div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="WB_footer S_bg2">
	<div class="other_link S_bg1 clearfix T_add_ser">
		<p class="copy"><a href="http://corp.sina.com.cn/chn/" class="footBg">新浪简介</a>　<a class="footBg" href="http://corp.sina.com.cn/eng/">About Sina</a>　<a class="footBg" href="http://emarketing.sina.com.cn/">广告服务</a>　<a class="footBg" href="http://www.sina.com.cn/contactus.html">联系我们</a>　<a class="footBg" href="http://corp.sina.com.cn/chn/sina_job.html">招聘信息</a>　<a class="footBg" href="http://www.sina.com.cn/intro/lawfirm.shtml">网站律师</a>　<a class="footBg" href="http://english.sina.com" target="__blank">SINA English</a>　<a class="footBg" href="http://members.sina.com.cn/apply/" target="__blank">注册</a>　<a class="footBg" href="http://tech.sina.com.cn/focus/sinahelp.shtml" target="__blank">产品答疑</a></p>
		<div class="copy"><a href="javascript:;" class="S_txt2">客户服务电话：400 690 0000 欢迎批评指正</a></div>
		<p class="company"><span class="copy S_txt2">Copyright ? 1996-2016 SINA Corporation, All Rights Reserved 新浪公司 版权所有</span></p>
	</div>
</div>
<script src="js/signinconfig_2.js"></script>
<script charset="utf-8" type="text/javascript" src="js/ssologin_2.js"></script>
<script type="text/javascript">
	function login() {
		var f = $('vForm'),
				door_content = $('door_content'),
				door = $('door');
		var vsncode = document.getElementById('vsncode');
		if( door_content.style.display === 'none' ) {
			door.value = '1234';
		}
		if (location.protocol == "https:") {
			sinaSSOController.crossDomain = false;
		}
		if( !!door && !!door.value && door.value != '1234' ) {
			sinaSSOController.loginExtraQuery.door = door.value;
		}
		sinaSSOController.loginExtraQuery.vsnf = 1;
		if( !!vsncode && !!vsncode.value  ) {
			sinaSSOController.loginExtraQuery.vsnval = vsncode.value;
		}
		var queryString = function(val){
			var uri = window.location.search;
			var re = new RegExp("" +val+ "=([^&?]*)", "ig");
			return ((uri.match(re))?(uri.match(re)[0].substr(val.length+1)):null);
		};
		var username = document.getElementById('username').value;
		var password = document.getElementById('password').value;
		if(username == ""){
			document.getElementById("usernameErr").innerHTML = '<span class= "form_prompt" style="margin-left:0"><i class="W_icon icon_rederrorS"></i>'+'<i>请输入登录名</i></span>';
			document.getElementById("login_err").innerHTML = "";
			return false;
		}
		if(password == ""){
			document.getElementById("passwordErr").innerHTML = '<span class= "form_prompt" style="margin-left:0"><i class="W_icon icon_rederrorS"></i>'+'<i>请输入密码</i></span>';
			document.getElementById("login_err").innerHTML = "";
			return false;
		}
		if( document.getElementById("remLoginName").checked ){
			sinaSSOController.login(username, password, 30 );
		}else{
			sinaSSOController.login(username, password);
		}
		return false;
	}

	//add for check mail user
	(function() {
		var submitFlag = false;

		function bind(node, type, handler) {
			if (node.attachEvent) {
				node.attachEvent("on" + type, handler);
			} else {
				node.addEventListener(type, handler, false);
			}
		}

		function ajaxCheck(url, data, callBack) {
			var XHR;
			var date = new Date();
			try {
				try {
					XHR = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {
					try {
						XHR = new XMLHttpRequest();
					} catch (e) {
					}
				}
				XHR.open("POST", url + "?_r=" + date.getTime());
				XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				XHR.onreadystatechange = function () {
					if (XHR.readyState == 4) {
						if (XHR.status == 200) {
							if (callBack) callBack(XHR.responseText);
						}
					}
				}
				XHR.send(data);
			} catch (e) {
				alert(e.message);
			}
		}

		var nameInput = document.getElementById("username");
		var nameTip = document.getElementById("usernameErr");
		bind(nameInput, "blur", function () {
			if (/^\s*$/.test(nameInput.value)) {
				return;
			}
			if (/^\s*\d{1,9}\s*$/.test(nameInput.value)) {
				return;
			} else {
				request();
			}
		});
		function request() {
			var ag = $('ag').value;
			var url = "http://login.sina.com.cn/bindmail/checkmailuser.php";
			ajaxCheck(location.protocol == "https:" ? url.replace(/^http:/, "https:") : url, "name=" + encodeURIComponent(nameInput.value) + "&type=json&ag=" + ag, function (res) {
				var data = eval('(' + res + ')');
				if (data.ret == "y") {
					document.getElementById("login_err").innerHTML = '<span class="form_prompt" style="margin-left:0"><i class="W_icon icon_rederrorS"></i>'+'<i>为了您的帐号安全,请<a class="form_prompt" style="margin-left:0px;" href="/bindmail/signin.php?username=' + nameInput.value + '">绑定邮箱</a></i></span>';
				} else if (data.ret == "n" && data.mail) {
					if (data.errcode == 'not_verify') {
						document.getElementById("login_err").innerHTML = '<span class="form_prompt" style="margin-left:0"><i class="W_icon icon_rederrorS"></i>'+'<i>您的邮箱: ' + data.mail + '未验证,点此<a class="form_prompt" style="margin-left:0px;" href="/bindmail/bindmail1.php?entry=sso&user=' +data.mail +'">重发验证邮件</a></i></span>';
					} else {
						document.getElementById("login_err").innerHTML = '<span class="form_prompt" style="margin-left:0"><i class="W_icon icon_rederrorS"></i>'+'<i>用您的邮箱: ' + data.mail + '也可以登录</i></span>';
					}
				}
			});
		}
		<!--弹出层 开始-->
		var show=false; //弹出层是否已经显示:true显示/false没显示

		function close(_id){
			show=false;
			var newdiv = $(_id);
			if (newdiv) document.body.removeChild(newdiv);
		}

		bind(window,'resize',function(){
			var elUserName = $("username"),
					elNewDiv = $('newDiv'),
					elNote = $('sinaNote'),
					nameState = false,
					newdivState = false;
			nameState = elNote ? elNote.style.display!='none' : false;
			newdivState = elNewDiv ? elNewDiv.style.display!='none' : false;

			if(nameState){
				var index = 0, lis = elNote.getElementsByTagName('li'), len = lis.length, color = '';
				for(;index<len;index++){
					color = lis[index].style.color;
					if(color=='rgb(0, 0, 0)' || color=='#000000'){ break; }
				}
				index = index - 1;
				passcardOBJ.hideList();
				passcardOBJ.showList(elUserName);
				for(;index>0;index--){
					passcardOBJ.arrowKey(40);
				}
			}

		});

	})();

	var login_err_is_init = true;
	onReady(function(){
		var username = $("username");
		if (username.value != '' && !/^\s+$/.test(username.value)) {username.focus();username.blur();};
		var conf = (typeof $vconf == 'undefined') ? {} : $vconf;
		var v = new Validator(conf);
		v.init("vForm");
		$("vForm").onsubmit = function(){return login();};
		$("username").onfocus = function(){
			if(login_err_is_init){
				login_err_is_init = false;
				return;
			}
			$("login_err").innerHTML = "";
		};
	});
	function con_code() {
		var random = Math.floor( Math.random()*100000000 ) ;
		document.getElementById("check_img").src = window.location.protocol + "//login.sina.com.cn/cgi/pin.php?r=" + random + "&s=0";
	}
		var userinfo = sinaSSOController.getLoginInfo();
	if( userinfo && userinfo['ln'] ) {
		document.getElementById("username").value = userinfo['ln'];
	}
</script>
</body>
</html>
=======
<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>BLOG Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="{{ url('/user/css/login/reset.css')}}">
        <link rel="stylesheet" href="{{ url('/user/css/login/supersized.css')}}">
        <link rel="stylesheet" href="{{ url('/user/css/login/style.css')}}">

     

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="" method="post">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>Or connect with:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <div align="center">去注册 <a href="#">注册</a></div>

        <!-- Javascript -->
        <script src="{{ asset('/user/js/login/jquery-1.8.2.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized.3.2.7.min.js')}}"></script>
        <script src="{{ asset('/user/js/login/supersized-init.js')}}"></script>
        <script src="{{ asset('/user/js/login/scripts.js')}}"></script>

    </body>

</html>

>>>>>>> 15049180e44f98c036e91600f443db97c9e34ee2
