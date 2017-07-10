jQuery(function(){
      if(window.location.pathname.indexOf("my/") !== -1){
        jQuery('#nav_set').removeClass('cur');
        jQuery('#nav_safe').addClass('cur');
              if(window.location.pathname.indexOf("my/avatar") !== -1){
                jQuery('#info').removeClass('cur').addClass('noBorder');
                jQuery('#avatar').addClass('cur').removeClass('noBorder');
              }else{
                jQuery('#avatar').removeClass('cur').addClass('noBorder');
                jQuery('#info').addClass('cur').removeClass('noBorder');        
              }
      }else{
        jQuery('#nav_safe').removeClass('cur');
        jQuery('#nav_set').addClass('cur');        
      }
});
function isEmail (str) {
  if(/^[a-z0-9][a-z0-9_\-\.]*[a-z0-9]*\@[a-z0-9_\-]+(\.[a-z0-9]{2,}){1,}$/i.test(str)){
    return true;
  }else{
    return false;
  }
}

function checkEmailHint (str) {
  if(/^[a-z0-9][a-z0-9_\-\.]*[a-z0-9]*\@/.test(str)){
    return true;
  }else{
    return false;
  }
}

function isMobile (str){
  if(/^1\d{10}$/.test(str)){
    return true;
  }else{
    return false;
  }
}

function userType (str){
  if (isEmail(str)) {
    return 2;
  } else if (isMobile(str)) {
    return 3;
  } else {
    return 1;
  }
}

function checkPwd (str) {
  if (!/^\S{6,20}$/.test(str)) {
    return false;
  }

  for (var i=0; i<str.length; i++) {
    if ((str.charCodeAt(i)>125) || (str.charCodeAt(i)<33)) {
      return false;
    }
  }
  return true;
}

function checkMobileCode (str){
  if(/^[0-9]{6}$/.test(str)){
    return true;
  }else{
    return false;
  }
}

function checkAuthCode (str){
  if(/^[0-9a-zA-Z]{4}$/.test(str)){
    return true;
  }else{
    return false;
  }
}

function clearInput ($) {
  setTimeout(function () {
    $('input[type="text"]').val('');
  }, 13);
}

function checkStrong (v) {
  var hasNum = false,
      hasLower = false,
      hasUpper = false,
      hasSpecial = false,
      sum = 0;

  hasNum = /\d+/.test(v) ? true : false;
  hasLower = /[a-z]+/.test(v) ? true : false;
  hasUpper = /[A-Z]+/.test(v) ? true : false;
  hasSpecial = /[^\s\da-zA-Z]+/.test(v) ? true : false;
  sum = hasNum + hasLower + hasUpper + hasSpecial;

  if (sum === 1) {
    return 0;
  } else if (sum === 2) {
    return 1;
  } else if (sum >= 3) {
    return 2;
  }
}

function showPwdStrong (level, dom, url) {
  if (0 === level) {
    dom.show().html('密码强度：<span class="safe_red">低</span><br />' +
      '<img src="' + url + '/images/b01.gif" width="44" height="4" />');
  } else if (1 === level) {
    dom.show().html('密码强度：<span class="safe_orange">中</span><br />' +
      '<img src="' + url + '/images/b01.gif" width="44" height="4" />' +
      '<img src="' + url + '/images/b02.gif" width="44" height="4" class="ml05" />');
  } else if (2 === level) {
    dom.show().html('密码强度：<span class="safe_green">高</span><br />' +
      '<img src="' + url + '/images/b01.gif" width="44" height="4" />' +
      '<img src="' + url + '/images/b02.gif" width="44" height="4" class="ml05" />' +
      '<img src="' + url + '/images/b03.gif" width="44" height="4" class="ml05" />');
  }

}

function insertIframe (result, __msg) {
  var i = 0, sArr = [], _iframeDIV = null, _iframes = [], _iframeStr = '';
  for (; i < result.data.turl.length; i++) {

    _iframeStr = '<iframe id="iframe_' + i + '" src="' +
      result.data.turl[i] + '?sid=' + result.data.token + '&uname=' + encodeURIComponent(result.data['uname']) +
      '" style="display: none;"></iframe>';

    _iframes.push(_iframeStr);
  }

  __msg.append(_iframes.join(''));

  setTimeout(function(){
    window.location.href = result.data.url;
  }, 300);
}

function hasUserName($, input, tips, ok, error, errorClass, sended, resendBtn, btnErrorClass, warn, codeBox){
  var _uType, _url, uName = input.val();

  if (resendBtn) {
    resendBtn.addClass(btnErrorClass);
  }

  if (isEmail(uName)) {
    _uType = 2;
    _url = url.api + '/api/checkmail';
  } else if (isMobile(uName)) {
    _uType = 3;
    _url = url.api + '/api/checkMobile';
  } else {
    // _uType = 1;
    // _url = 'https://id.ifeng.com/api/checkUname';
    return false;
  }
  $.ajax({
    url: _url,
    data: 'u=' + uName,
    type: "POST",
    dataType: 'jsonp',
    async:false,
    success: function(result){
      if(tips.length > 0){
        tips.hide();
      }
      
      if ('102' === result.data.res || '112' === result.data.res || '122' === result.data.res){// 账号已存在
        ok.hide();
        changeInputColor(input,0,result.message);
        if(resendBtn){
          resendBtn.addClass(btnErrorClass);
        }
        return true;
      }
      
      ok.show();
      input.removeClass(errorClass);
      if(!sended && resendBtn){
      // if(resendBtn){
        resendBtn.removeClass(btnErrorClass);
      }
      if (warn) {
        warn.hide();
      }
      if (codeBox) {
        codeBox.show();
      }
      return false;
    }
  });
}

function refreshCode(elem) {
  var _codeImgUrl = elem.attr('src').split('?')[0];
  elem.attr('src', _codeImgUrl + '?_=' + new Date().getTime());
}

function getInputChangeType(e){
  if (typeof e[0].oninput !== 'undefined') {
    return 'input';
  } else {
    return 'propertychange';
  }
}

function resendCountDown(send, count, input, iID, warn, sendTips, disabledClass, obj){
  var cnt = 180;
  var val;
  if(typeof input !=="string") {
    //input[0].readOnly = true;
    input[0].disabled = true;
    val = input.val();
  } else {
    val = "";
  }
  send.hide();
  count.show();

  iID = setInterval(function () {
    if (0 <= cnt) {
      count.html(cnt + '秒后重新发送');
    } else if (-1 === cnt) {
      count.html('180秒后重新发送').hide();
      send.removeClass(disabledClass).show();

      if ((val.length > 0) && !((isMobile(val)) || (isEmail(val)))) {
        send.addClass(disabledClass);
      }
      clearInterval(iID);
      warn.html('');
      sendTips.hide();
      obj.sended = false;
      if (typeof input !== "string") {
        // input[0].readOnly = false;
        input[0].disabled = false;
      }
    }
    cnt--;
  }, 1000);

}

function mobileCodeAjax ($, url, data, msg, success, callbackfn, obj, send, disabledClass){
  callbackfn = callbackfn || function () {};
  $.ajax({
    url: url,
    type: "POST",
    data: data,
    dataType: 'jsonp',
    success: function (result) {
      if (result.code === 1) {
        if(msg.length>0){msg.hide();}
        success.show();
        callbackfn();
      } else if(result.code === -999) {
      	// 说明是手机注册情况
      	success.hide();
      	$('#js-reg-tab-con-1').hide();
      	var __quickRegist = $('#js-reg-tab-con-3').html();
        $('#js-reg-tab-con-2').html(__quickRegist);
      }else if(result.msgcode == 4009){
        setTimeout(function(){
         changeInputColor($('#authcode'),0,result.message);   
        send.removeClass(disabledClass);         
      },300);
      }else if(result.msgcode == 3005){
        changeInputColor($('#newMobileNum'),0,result.message);   
        send.removeClass(disabledClass);
      }else{
        success.hide();
        if (obj) {
          obj.sended = false;
        }
        if (send && disabledClass) {
          send.addClass(disabledClass);
        }
        if(msg.length>0){msg.html(result.message);msg.show();}
      }
      if (result.code != 1) {
          refreshCode($('#mobile-authcode-pic'));
      }
    }
  });
}

function mailLink (val, link) {
  var _url = val.split('@')[1];
  _url = 'http://mail.' + _url;

  link.attr('href', _url);
}
function passwordCheck($){
  var func = {
    __pwdTipsProcess:function(){
      changeInputColor($('#passwordInput'),2);
    },__pwdHintProcess:function(){
      if($('#passwordInput').val()){
        $('#passwordHint').hide();
      }else{
        $('#passwordHint').show();
      }
    },__passwordProcess:function(){
      if('' === $('#passwordInput').val()){
        changeInputColor($('#passwordInput'),0,__msgPwdEmpty);
      }else if(!(checkPwd($('#passwordInput').val()))){
        changeInputColor($('#passwordInput'),0,__msgPwdFormatWrong);
      }else{
        $('#passwordInput').removeClass(__errorClass210);
        changeInputColor($('#passwordInput'),2);
        $("#sendEmailBtn").removeClass("btn01_disable");
      }
    }
  },timeId  = 0;
  inputChange = getInputChangeType($('input.txt_input'));
  $('#passwordInput').on('focus',func.__pwdTipsProcess).on(inputChange,func.__pwdHintProcess).on('blur',function(){timeId = setTimeout(func.__passwordProcess,300)});
  $('#passwordHint').on('click', function(){clearTimeout(timeId);$('#passwordInput').focus();});
}
function codeCheck($){
  var func = {
    __codeTipsProcess:function(){
      changeInputColor($('#authcode'),2);
    },__codeHintProcess:function(){
      if($('#authcode').val()){
        $('#authCodeHint').hide();
      }else{
        $('#authCodeHint').show();
      }
    },__codeProcess:function(){
      if('' === $('#authcode').val()){
        changeInputColor($('#authcode'),0,__msgCodeEmpty);
      }else if(checkAuthCode($('#authcode').val())) {
        $('#authcode').removeClass(__errorClass210);
        changeInputColor($('#authcode'),2);
      }else{
        changeInputColor($('#authcode'),0,__msgCodeFormatWrong);
      }
    }
  },timeId  = 0;
  inputChange = getInputChangeType($('input.txt_input'));
  $('#authcode').on('focus',func.__codeTipsProcess).on(inputChange,func.__codeHintProcess).on('blur',function(){timeId = setTimeout(func.__codeProcess,300)});
  $('#authCodeHint').on('click', function(){clearTimeout(timeId);$('#authcode').focus();});
}

function mobilecodeCheck($){
  var func = {
    __codeTipsProcess:function(){
        changeInputColor($('#mobileCode'), 2);
    },__codeHintProcess:function(){
        if ('' !== $('#mobileCode').val()) {
          if ($('#mobileCode').hasClass(__errorClass210)) {
            $('#mobileCode').removeClass(__errorClass210);
          }
          $('#mobileCodeHint').hide();
        } else {
          $('#mobileCodeHint').show();
        }
    },__codeProcess:function(){
          var _uCode = $('#mobileCode');
          if (_uCode.val() === "") {
            changeInputColor($('#mobileCode'), 0,__msgCodeEmpty);
          } else if (!checkMobileCode(_uCode.val())) {
            changeInputColor($('#mobileCode'), 0,__msgCodeFormatWrong);
          } else {
            _uCode.removeClass(__errorClass210);
            changeInputColor($('#mobileCode'), 2);
          }
    }
  },timeId  = 0;
  inputChange = getInputChangeType($('input.txt_input'));
  $('#mobileCode').on('focus',func.__codeTipsProcess).on(inputChange,func.__codeHintProcess).on('blur',function(){timeId = setTimeout(func.__codeProcess,300)});
  $('#mobileCodeHint').on('click', function(){clearTimeout(timeId);$('#mobileCode').focus();});
}

function emailCheck($){
  var func = {
    __emailTipsProcess: function(){
      if (!sendEmail.sended) {
        $('.phone_code').hide();
      }
      $('#emailOk').hide();
      changeInputColor($('#emailInput'),2);
    },
    __emailHintProcess: function(){
      if($('#emailInput').val()){
        $('#emailHint').hide();
      }else{
        $('#emailHint').show();
      }
    },
    __emailProcess: function(){
      var _this = sendEmail,
          _value = $('#emailInput').val();
      if('' === _value){
        changeInputColor($('#emailInput'),0,__msgEmailEmpty);
        $('#emailOk').hide();
      }else if (isEmail(_value)) {
        // hasUserName($, $('#emailInput'), [], $('#emailOk'), $('#emailError'), __errorClass210, _this.sended, $('#sendEmailBtn'), __disabledBtn01);
        $('#sendEmailBtn').removeClass(__disabledBtn01);
        $('#emailOk').show();
        changeInputColor($('#emailInput'),1);
      }else{
        changeInputColor($('#emailInput'),0,__msgEmailFormatWrong);
        $('#emailOk').hide();
      }

    }
  },timeId  = 0;
  inputChange = getInputChangeType($('input.txt_input'));
  $('#emailInput').on('focus', func.__emailTipsProcess)
                .on(inputChange, func.__emailHintProcess)
                .on('blur', function(){timeId = setTimeout(func.__emailProcess,300)});
  $('#emailHint').on('click', function(){
        clearTimeout(timeId);
        $('#emailInput').focus();
      });
}

function newpassCheck($){
  var func = {
        __passwordProcess: function(){
      var strongLevel = 0;
      if('' === $('#newPassword').val()){
        changeInputColor($('#newPassword'),0,__msgNewPwdEmpty);
      }else if($('#newPassword').val() == $.cookie('IF_USER')){
        changeInputColor($('#newPassword'),0,__msgNewPwdRepeat);
      }else if(checkPwd($('#newPassword').val())){
        $('#newPasswordTips-2').show();
        $('#newPassword').removeClass(__errorClass210);
        strongLevel = checkStrong($('#newPassword').val());
        showPwdStrong(strongLevel, $('#newPasswordTips-2'), url.res);
        changeInputColor($('#newPassword'),2);
      }else{
        changeInputColor($('#newPassword'),0,__msgPwdFormatWrong);
      }

      if($('#newPasswordConfirm').val()){
        $('#newPasswordConfirmTips').hide();
        if($('#newPasswordConfirm').val() === $('#newPassword').val()){
          $('#newPasswordConfirmOk').show();
          changeInputColor($('#newPasswordConfirm'),2);
        }else{
          $('#newPasswordConfirmOk').hide();
          changeInputColor($('#newPasswordConfirm'),0,__msgPwdConfirmWrong);
        }
      }
    },

    __cPasswordProcess: function(){
      //$('#newPasswordConfirmTips').hide();
      if('' === $('#newPasswordConfirm').val()){
        changeInputColor($('#newPasswordConfirm'),0,__msgPwdConfirmEmpty);
      }else if($('#newPasswordConfirm').val() && ($('#newPassword').val() === $('#newPasswordConfirm').val())){
        $('#newPasswordConfirmOk').show();
        $('#newPasswordConfirm').removeClass(__errorClass210);
        changeInputColor($('#newPasswordConfirm'),1);
      }else{
        changeInputColor($('#newPasswordConfirm'),0,__msgPwdConfirmWrong);
      }
    },
  },timeId  = 0,timeId2=0;
  inputChange = getInputChangeType($('input.txt_input'));
      // 新密码
    $('#newPassword').on('focus', function(){
      //$('#newPasswordTips-1').show();
      $('#newPasswordTips-2').hide();
      changeInputColor($('#newPassword'),2);
    }).on(inputChange,function(){
    if($('#newPassword').val()){
      $('#newPasswordTips-1').hide();
    }else{
      $('#newPasswordTips-1').show();
    }
    }).on('blur', function(){timeId = setTimeout(func.__passwordProcess,300);
    });

    // 重复密码
    $('#newPasswordConfirm').on('blur', function(){timeId2 = setTimeout(func.__cPasswordProcess,300)})
                            .on('focus', function(){
      $('#newPasswordConfirmOk').hide();
      changeInputColor($('#newPasswordConfirm'),2);
    }).on(inputChange,function(){
    if($('#newPasswordConfirm').val()){
      $('#newPasswordConfirmTips').hide();
    }else{
      $('#newPasswordConfirmTips').show();
    }
    });
    $('#newPasswordTips-1').on('click', function(){
      clearTimeout(timeId);
      $('#newPassword').focus();});
    $('#newPasswordConfirmTips').on('click', function(){
      clearTimeout(timeId2);
      $('#newPasswordConfirm').focus();});
}

function nickCheck($){
      // 密码
  var func = {
    __codeTipsProcess:function(){
        changeInputColor($('#mobileCode'), 2);
    },__codeHintProcess:function(){
        if ('' !== $('#mobileCode').val()) {
          if ($('#mobileCode').hasClass(__errorClass210)) {
            $('#mobileCode').removeClass(__errorClass210);
          }
          $('#mobileCodeHint').hide();
        } else {
          $('#mobileCodeHint').show();
        }
    },__codeProcess:function(){
          var _uCode = $('#mobileCode');
          if (_uCode.val() === "") {
            changeInputColor($('#mobileCode'), 0,__msgCodeEmpty);
            ////////////////////////////////////////////////
          } else {
            _uCode.removeClass(__errorClass210);
            changeInputColor($('#mobileCode'), 1);
          }
    }
  },timeId  = 0;
  inputChange = getInputChangeType($('input.txt_input'));
  $('#mobileCode').on('focus',func.__codeTipsProcess).on(inputChange,func.__codeHintProcess).on('blur',function(){timeId = setTimeout(func.__codeProcess,300)});
  $('#mobileCodeHint').on('click', function(){clearTimeout(timeId);$('#mobileCode').focus();});
}

function checkUname(uname){
    var pattern = /^[a-z0-9\-_\u4E00-\u9FA5]{2,24}$/i;
    if(uname.match(/^\d/) || uname.length < 3||!pattern.test(uname)){      
      return false;
    }
    return true;
  }

function changeInputColor(obj,success,message){
  var w = obj.parents('tr').find('.tips .i_icon_form_wrong'),r = obj.parents('tr').find('.tips .i_icon_form_right'),t = obj.parents('tr').find('.tips .wrong_txt');
  if(success === 0){
    obj.removeClass('input_dft').addClass('input_wrg');
    w.show();
    t.show();
    t.html(message);
    r.hide();
    //document.getElementById('warn_text').style.display="none";
  }else{
    obj.removeClass('input_wrg').addClass('input_dft');
    if(success == 1){
      r.show();     
    }
      t.hide();
     w.hide();

  }
}
var __msgUnameEmpty = '请输入账号',
    __msgEmailEmpty = '请输入邮箱',
    __msgEmailFormatWrong = '邮箱格式不正确',
    __msgCannotEquel = '密码不能与注册账号重复',
    __msgPwdEmpty = '请输入密码',
    __msgNewPwdEmpty = '请输入新密码',
    __msgPwdFormatWrong = '密码格式不正确',
    __msgPwdConfirmEmpty = '请确认密码',
    __msgPwdConfirmWrong = '前后密码不一致',
    __msgCodeEmpty = '请输入验证码',
    __msgCodeFormatWrong = '验证码格式不正确',
    __msgMobileEmpty = '请输入手机号',
    __msgMobileFormatEmpty = '手机号格式不正确',
    __msgNickEmpty = '请输入昵称',
    __msgNickFormatWrong = '昵称格式不正确',
    __msgUserXieyiUncheck = '请阅读并同意《凤凰使用协议》',
    __msgNewPwdRepeat = '密码不能与用户名相同';

var __errorClass124 = 'txt_124_error',
    __errorClass210 = 'txt_210_error',
    __errorClass220 = 'txt_220_error',
    __errorClass270 = 'txt_270_error',
    __disabledBtn01 = 'btn01_disable',
    __disabledBtn02 = 'btn02_disable';
