jQuery.noConflict();
(function(win, doc, $) {
  var __findPasswordUrl = url.api + '/findpass/type';

  var findPassword = {
    init: function(){
      var _this = findPassword,
          inputChange = getInputChangeType($('input.txt_input'));

      // 输入用户名
      $('#findUserId').on('focus', _this.__uIdTipsProcess)
                      .on(inputChange, _this.__uIdHintProcess)
                      .on('blur', _this.__userIdProcess);

      // 用户名提示
      $('#findUserIdHint').on('click', function(){
        $('#findUserId').focus();
      });

      // 刷新验证码
      $('#findCodeRefresh').on('click', function(){refreshCode($('#findCodePic'));});

      // 输入验证码
      $('#findCodeInput').on('focus', function(){$('#findCodeTips').removeClass('red').html(__msgCodeEmpty);});
      $('#findCodeInput').on('blur', _this.__codeProcess);

      // 提交
      $('#findPasswordSubmit').on('click', _this.process);

      clearInput($);
    },

    param: function() {
      var _uId, _uCode, _uType, isEmail;

      _uId = $('#findUserId');
      if ('' === _uId.val()) {
        if (!_uId.hasClass(__errorClass270)) {
          _uId.addClass(__errorClass270);
        }
        $('#findUserIdError').html(__msgUnameEmpty).show();
        $('#findUserIdTips').hide();
        return false;
      }else{
        _uId.removeClass(__errorClass270);
      }

      _uCode = $('#findCodeInput');
      if ('' === _uCode.val()) {
        _uCode.addClass(__errorClass124);
        $('#findCodeTips').addClass('red').html(__msgCodeEmpty);
        return false;
      }else if (!(checkAuthCode(_uCode.val()))) {
        if (!_uCode.hasClass(__errorClass124)) {
          _uCode.addClass(__errorClass124);
        }
        $('#findCodeTips').addClass('red').html(__msgCodeFormatWrong);
        return false;
      }else{
        _uCode.removeClass(__errorClass124);
      }

      _uType = userType(_uId.val());

      return {
        u: _uId.val(),
        auth: _uCode.val(),
        type: _uType
      };
    },

    _disabled: false,

    process: function(){
      var _this = findPassword,
          _data,
          _href,
          _subBtn = $('#findPasswordSubmit');

      _data = _this.param();

      if((!_subBtn.hasClass(__disabledBtn01)) && _data){
        _href = __findPasswordUrl + '?u=' + encodeURIComponent(_data.u) + '&auth=' + encodeURIComponent(_data.auth) + '&type=' + encodeURIComponent(_data.type);
        _subBtn.removeClass(__disabledBtn01);
        clearTimeout(_this._disabled);
        window.location.href = _href;
      }
      _subBtn.addClass(__disabledBtn01);

      _this._disabled = setTimeout(function(){
        _subBtn.removeClass(__disabledBtn01);
      }, 3000);
    },

    __uIdTipsProcess: function(){
      $('#findUserIdTips').show();
      $('#findUserIdError').hide();
      $('#findUserIdOK').hide();
    },

    __uIdHintProcess:function(){
      if($('#findUserId').val()){
        $('#findUserIdHint').hide();
      }else{
        $('#findUserIdHint').show();
      }
    },

    __userIdProcess: function(){
      var _this = findPassword,
          _value = $('#findUserId').val();

      $('#findUserIdHint').hide();

      $('#findUserIdTips').hide();
      if('' === _value){
        $('#findUserIdError').html(__msgUnameEmpty).show();
      }else{
        $('#findUserIdOK').show();
        $('#findUserId').removeClass(__errorClass270);
      }

    },

    __codeProcess: function(){
      var _val = $(this).val()
          _tips = $('#findCodeTips');
      if('' === _val) {
        _tips.addClass('red').html(__msgCodeEmpty);
      }else if(checkAuthCode(_val)){
        _tips.removeClass('red').html(__msgCodeEmpty);
        $(this).removeClass(__errorClass124);
      }else{
        _tips.addClass('red').html(__msgCodeFormatWrong);
      }

    }

  }
  win.findPassword = findPassword.init;
})(window, document, jQuery);

findPassword();