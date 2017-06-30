<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册新浪通行证</title>
<link rel="stylesheet" href="css/register_1.css" type="text/css" />
</head>
<body class="B_reg">
  <div class="TX_reg">
      <div class="reg_hd">
          <h1 class="reg_logo">通行证</h1>
          <div class="top_lnk">             
            <a href="http://www.sina.com.cn">新浪首页</a>|<a href="/help.html" target="_blank">帮助</a>
            </div>
        </div>
        


        <div class="reg_main clearfix">
            <div class="showcolor"></div>
            <div class="main_title">
                <div class="main_tab">
                   <a href="javascript:void(0);" id="mail-register">邮箱注册</a>
                </div>
            </div>
            <div class="reg_info clearfix">
                <!--录入信息边栏-->
                <div class="reg_aside">
                    <p class="have_ac">已有帐号，<a href="/signup/signin.php?entry=blog&entry=blog">直接登录 >></a></p>
                </div>
                <!--/录入信息-->
                <!--录入信息-->
                <div class="reg_form reg_mail" id="mail">                   
                    <form id="mail-form" name="signup" >
                    <div class="title_note" node-type="title_note">
                    </div>
                    <input type="hidden" node-type="regtype" name="regtype" value="othermail" />
                    <div class="info_list clearfix" id="outer-email-container">
                        <div class="tit">
                            <i>*</i>邮箱地址：
                        </div>
                        <div class="ipt">
                            <input class="reg_ipt" type="text" name="othermail" maxlength="64" value="" node-type="field-outerMail" />
                            <div class="attachment">使用微博帐号直接<a href="/signup/signin.php?entry=blog&entry=blog">登录</a></div>
                        </div>
                        <div class="tips" node-type="field-outerMail-tip"><p class="suggest"><span class="icon_suggest"></span><a href="javascript:void(0);" action_type="showEmailField">我没有邮箱</a></p>
                        </div>
                    </div>
                    <div class="info_list clearfix" id="email-container" style="display:none;">
                        <div class="tit">
                            <i>*</i>邮箱地址：
                        </div>
                        <div class="ipt">
                            <input class="reg_ipt mail_addr" type="text" name="username" maxlength="16" value="" node-type="field-mail" />
                            <div class="mail_domain" name="mail_type">
                            <select name="mailType" node-type="mail-type">
                                <option value="sina.cn" >@sina.cn</option>
                                <option value="sina.com" >@sina.com</option>
                            </select>
                            </div>
                            <div class="attachment">使用微博帐号直接<a href="/signup/signin.php?entry=blog&entry=blog">登录</a></div>
                        </div>
                        <div class="tips" node-type="field-mail-tip"><p class="suggest"><span class="icon_suggest"></span><a href="javascript:void(0);" action_type="showOuterEmailField">常用邮箱注册</a></p>
                        </div>
                    </div>
                    <div class="info_list clearfix">
                        <div class="tit">
                            <i>*</i>设置密码：
                        </div>
                        <div class="ipt">
                            <input class="reg_ipt" type="password" name="password" maxlength="16" value="" node-type="field-password" />
                        </div>
                        <div class="tips" node-type="field-password-tip">
                        </div>
                    </div>
                    <!--<div class="info_list clearfix">
                        <div class="tit">
                            <i>*</i>昵称：
                        </div>
                        <div class="ipt">
                            <input class="reg_ipt" type="text" name="nick" maxlength="20" value="" node-type="field-nick" />
                        </div>
                        <div class="tips" node-type="field-nick-tip">
                        </div>
                    </div>-->
                    <div class="info_list clearfix fav_tags">
                        <div class="tit">
                            <i>*</i>兴趣标签：
                        </div>
                        <div class="ipt checklst">
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="23" node-type="field-like" />新闻</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="18" node-type="field-like" />娱乐</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="24" node-type="field-like" />文化</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="10" node-type="field-like" />体育</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="21" node-type="field-like" />IT</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="12" node-type="field-like" />财经</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="25" node-type="field-like" />时尚</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="14" node-type="field-like" />汽车</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="6" node-type="field-like" />房产</label>
                            <label><input class="chk_int" type="checkbox" name="hobbies[]" value="26" node-type="field-like" />生活</label>
                        </div>
                        <div class="tips" node-type="field-like-tip">
                        </div>
                    </div>
                    <div class="info_list clearfix">
                        <div class="tit">
                            <i>*</i>验证码：
                        </div>
                        <div class="ipt ver_code">
                            <input class="reg_ipt" type="text" autocomplete="off" name="door" maxlength="10" value="" node-type="field-door" /><span class="ver_pic"><img src="" node-type="door-img" refake-type="checkcode" /><a href="javascript:void(0);"></a></span><a href="javascript:void(0);" node-type="change-door" >看不清？</a>
                        </div>
                         
                    </div>
                    <div class="info_submit">
                        <div class="ipt">
                            <a href="javascript:void(0);" class="btn_sub" node-type="submit-trigger" refake-type="submit"><span>立即注册</span></a>
                        </div>
                    </div>
                    
                    </form>                    
                <!--/录入信息-->
                
                </div>



                <!--登录浮层-->
                <script type="text/tpl" id="secondcheck">
         <div class="tx_layer" style="display:none;" node-type="outer">
                <div class="txl_hd">
                    <div class="txl_tl" node-type="title">短信验证</div><a href="javascript:void(0);" class="tx_cls" title="关闭" node-type="close"></a>
                </div>
                <div class="txl_cnt" node-type="inner">
                    <div class="ndmsg">
                        <p class="toptp"><span class="icon_suggest"></span>本次注册需要短信验证，请按照以下提示操作</p>
                        <dl class="lay_tab clearfix">
                            <dt>所在地：</dt>
                            <dd><div class="country">
                    <select node-type="country" disabled="true">
                            <option value="86" selected="selected">中国</option>
                    </select>
                    </div>
                    </dd>
                        </dl>
                        <dl class="lay_tab clearfix">
                            <dt>手机号码：</dt>
                            <dd><div class="reg_ipt tel_location">
                                <span class="country_num" node-type="countryNum">0086</span>
                                <input class="tel_num reg_ipt" type="text" value="" node-type="phoneNum"/>
                            </div><div class="vrcd_tip"  node-type="doorTip" style="display:none;"></div></dd>
                        </dl>
                        <dl class="lay_tab clearfix">
                            <dt> </dt>
                            <dd class="active"><a href="javascript:void(0);" class="btn_active btn_active_dis" node-type="sendcode"><span>使用该手机发送短信</span></a></dd>
                        </dl>
                    </div>
                </div>

            <div class="txl_cnt" node-type="sendp" style="display:none;">
                   <div class="ndmsg">
                       <p class="toptp"><span class="icon_suggest"></span><span node-type="msg_tip">本次注册需要短信验证.请使用手机号11111111111发送yz到1069009010021完成验证</span></p>
                 <dt>您需要支付运营商收取的短信资费</dt><div class="send_msg" node-type="send_msg"></div>
                       <div class="btn_wrap">
                           <a href="javascript:void(0);" class="btn_s" node-type="ok"><span>我已发送短信</span></a>
                       </div>
                   </div>
               </div>

            </div>
          </script>
            </div>
 </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        
        <div class="reg_lang"></div>
        <div class="reg_foot">
          <p><a target="_blank" href="http://corp.sina.com.cn/chn/">新浪简介</a><a target="_blank" href="http://corp.sina.com.cn/eng/">About Sina</a><a target="_blank" href="http://ads.sina.com.cn/">广告服务</a><a target="_blank" href="http://www.sina.com.cn/contactus.html">联系我们</a><a target="_blank" href="http://corp.sina.com.cn/chn/sina_job.html">招聘信息</a><a target="_blank" href="http://www.sina.com.cn/intro/lawfirm.shtml">网站律师</a><a target="_blank" href="http://english.sina.com/">SINA English</a><a target="_blank" href="http://members.sina.com.cn/apply/">注册</a><a target="_blank" href="http://tech.sina.com.cn/focus/sinahelp.shtml">产品答疑</a></p>
            <p>客户服务电话 400-690-0000  欢迎批评指正</p>
            <p>Copyright &copy 1996 - <script language=javascript type="text/javascript">
                document.write(new Date().getFullYear());
            </script> SINA Corporation, All Rights Reserved 新浪公司 <a target="_blank" href="http://www.sina.com.cn/intro/copyright.shtml">版权所有</a></p>
        </div>


<script type="text/javascript" charset="utf-8" src="js/gaea_1_19_1.js" ></script>
<script type="text/javascript">
//在这里输出配置信息
var $CONFIG = {};
$CONFIG.type = "hollow";
$CONFIG.salt = {
  "entry":"blog",
  "referer":"980efe521296927968a67d0c98c2efa1",
  "src":"",
  "type":"hollow",
  "regtime":"1498746099",
  "7f74eec608e25eaaf94e872fae02214c":"16",  
    "6a740cf7c8ba3f723e267c62d55b89fb":"51deeed89e0409f3626a92841c67d20b" ,
    "357b404b2e0ddca540cb4f31e7cd1b27":"6c657df5206414614e7c56c9e657bc21" ,
    "79684a83b374e454859109992b0ec6f8":"75583e9271e8b541832d90f2e7507c47" ,
    "771e93923458725ade6468096c1e97aa":"eda3540f142272a9a5ea0643d62ac066" ,
    "3e88b39208d16a6dc4ee2447867df1aa":"a030afb87ee30bfe8799877153dc888e" ,
    "33888329884bb2694dca9a2c9e4c7ea9":"38775cdbc7d17659f07f60b501b60d8d" ,
    "b362fd7708fc2f5e2fa6a8d70cd2a965":"6a14d4bf57243c1dd12dc7fd5298afcf" ,
    "r":""
};
$CONFIG.js_files = [
  'v1/apps/register/js/signup.js?v=20140319'
];
</script>
<script type="text/javascript" charset="utf-8" src="js/boot_1.js"></script>


    </div>
</body>
</html>



