/**
 * @WARN 修改此脚本需与相关开发人员联系.
 * @description 登陆功能实现.
 * @path http://y0.ifengimg.com/p/login/20131227/
 *
 * @author 猫团儿
 * @date 2013-05-31
 * @version 1.4.5
 * @updateTime 2013-12-27
 * @update 1.1.0	修改被绑定方式及回调使用方法. 暂时有一个问题,各种绑定后的回调不能区分开来.
 *         1.2.0	修改掉IF_TK.
 *         1.3.0	增加了login_out方法,以及将登陆状态的判断牵回global中.
 *         1.3.1	修改SID和IF_USER的使用方法.
 *         1.3.2	更新关闭图标.
 *         1.3.3	增加一个初始化参数,以适应关闭窗口后的回调操作.
 *         1.3.4	修改隐藏窗口后,再次显示的逻辑方式.
 *         1.4.0	重新构建回调的追加方式,修正参数的不统一性.
 *         1.4.1	修复已有代码的重复部分.
 *         1.4.2	增加一个DIV的id,为移动端做兼容.
 *         1.4.3	增加从Cookie取出的用户名的反编译.
 *         1.4.4	修改关闭的方式.
 *         1.4.5	修复IE7登陆框不能浮动的问题.
 */

(function (win, doc) {

	"use strict";

	var LOGIN_URL = 'http://id.ifeng.com/allsite/login';
	var LOGIN_SID_INTERVAL = null;
	var LOGIN_TK_INTERVAL = null;
	var LOGIN_IF_REAL = null;

	var LOGIN_SUCCESS_CALLBACK = []; // 传入登陆成后的回调对象集合.
	var LOGIN_CLOSE_CALLBACK = []; // 传入关闭窗口的回调对象集合.
	var LOGIN_OUT_CALLBACK = []; // 传入退出的回调对象集合

	/**
	 * 此方法为登陆的全局变量初始化.
	 * @param callback 登陆成功能,执行的操作,回传给callback方法options参数,供调用.
	 */
	var login_init = function () {

		if (login_cookie.get('sid')) {

			if (LOGIN_SUCCESS_CALLBACK.length > 0) {
				for (var i = 0, l = LOGIN_SUCCESS_CALLBACK.length; i < l; i++) {
					LOGIN_SUCCESS_CALLBACK[i]({
						sid: login_cookie.get('sid'),
						uname: _processSidtoUname()
					});
				}
			}

		} else {
			_loginShow();
		}

	};

	/**
	 * 为第三方登陆,以及登陆后Cookie中的sid做监听.
	 * @private
	 */
	var _login_listening = function () {
		clearInterval(LOGIN_TK_INTERVAL); // 处理第三方登陆的监听.
		clearInterval(LOGIN_SID_INTERVAL); // 处理sid的cookie监听.
		clearInterval(LOGIN_IF_REAL);      //  处理实名认证cookie监听

		LOGIN_TK_INTERVAL = setInterval(_processTK, 100);
		LOGIN_SID_INTERVAL = setInterval(_processSID, 100);
		LOGIN_IF_REAL     = setInterval(_ifRealName, 100);
	};

	/**
	 *轮询Cookie 判断是否关闭弹出层
	 *@private
	*/
	var _ifRealName = function () {

		if(login_cookie.get('sid') && login_cookie.get('IF_REAL') == 0){
			// 已实名,关闭弹出层。
				
			doc.getElementById('login_index').parentNode.removeChild(doc.getElementById('login_index'));
			doc.getElementById('masker').parentNode.removeChild(doc.getElementById('masker'));
			clearInterval(LOGIN_IF_REAL);
		}
	}

	/**
	 * 轮询Cookie处理SID和TK.
	 * @private
	 */
	var _processSID = function () {
		var options = {};

		// 通过SID判断登陆状态.
		if (login_cookie.get('sid')) {			

			options.sid = login_cookie.get('sid');
			options.uname = _processSidtoUname();

			clearInterval(LOGIN_SID_INTERVAL);
			clearInterval(LOGIN_TK_INTERVAL);

			if(login_cookie.get('IF_REAL') == 0) {
				// 已实名,关闭弹出层。
				
				doc.getElementById('login_index').parentNode.removeChild(doc.getElementById('login_index'));
				doc.getElementById('masker').parentNode.removeChild(doc.getElementById('masker'));
			}
			

			// 判断登陆的回调集合中是否有回调方法.
			if (LOGIN_SUCCESS_CALLBACK.length > 0) {
				for (var i = 0, l = LOGIN_SUCCESS_CALLBACK.length; i < l; i++) {
					LOGIN_SUCCESS_CALLBACK[i](options);
				}
			}

		}
	};

	/**
	 * 轮询Cookie处理全站登陆TK.
	 * @private
	 */
	var _processTK = function () {
		var OTK = '';

		if ('' !== login_cookie.get('IF_OTK')) {
			// 只清除第三方登陆的IF_OTK,清除登陆SID和登陆TK的轮询事件.
			clearInterval(LOGIN_TK_INTERVAL);

			OTK = eval('(' + decodeURIComponent(login_cookie.get('IF_OTK')) + ')');

			if (1 === OTK.code) {
				login_cookie.del('IF_OTK', '.ifeng.com');
				doc.getElementById('login_iframe_out').innerHTML = '<iframe id="login_iframe" width="520" height="320" scrolling="no" frameborder="no" border="0" style="border:0px; margin:0px;padding:0px;" src="' + OTK.data.url + '"></iframe>';
			} else {
				login_cookie.del('IF_OTK', '.ifeng.com');
				doc.getElementById('login_iframe_out').innerHTML = '<iframe id="login_iframe" width="520" height="410" scrolling="no" frameborder="no" border="0" style="border:0px; margin:0px;padding:0px;" src="' + LOGIN_URL + '"></iframe>';
				alert(OTK.message);
			}

			_login_listening();
		}
	};

	/**
	 * 登陆窗口的事件处理函数,为防止出现内层错误,增加点击的时候依然拥有IF_TK的情况.
	 * @param e 点击事件的参数.
	 * @returns {Boolean}
	 * @private
	 */
	var _loginShow = function () {
		var _body = doc.body,
			loginIndex = doc.getElementById('login_index'),
			masker = null,
			_close = null;

		var currentDom = _getDom(_body.lastChild);

		// 动态生成登陆的iframe及登陆框,完成后调用监听.
		if ('undefined' !== typeof currentDom) {

			if ('undefined' === typeof loginIndex || null === loginIndex) {
				masker = doc.createElement('div');
				masker.id = 'masker';
				masker.style.cssText = 'background:#000; position:fixed; left:0; top:0; bottom:0px; width:100%; height:100%; opacity:.80; filter:alpha(opacity=80); z-index:9999; overflow:hidden; zoom: 1; display: block;';

				currentDom.parentNode.insertBefore(login_html(), currentDom);
				doc.getElementById('login_index').parentNode.insertBefore(masker, doc.getElementById('login_index'));
				doc.getElementById('login_iframe_contain').style.cssText = 'position:fixed; _position:absolute; top:50%; left:50%; margin-left:-260px; margin-top: -207px; z-index:99999;';
			} else {

				// 优先插入节点,后显示具体业务.
				if (doc.getElementById('login_iframe_out')) {
					doc.getElementById('login_iframe_out').innerHTML = '<iframe id="login_iframe" width="520" height="410" scrolling="no" frameborder="no" border="0" style="border:0px; margin:0px;padding:0px;" src="' + LOGIN_URL + '"></iframe>';
				}

				masker = doc.getElementById('masker');
				masker['style']['display'] = 'block';
				loginIndex['style']['display'] = 'block';
			}

			// 设置为内容后绑定事件
			_close = doc.getElementById('login_iframe_close_btn');
			_bindEvent.add(_close, 'click', _loginHide);

			// 开启监听
			_login_listening();
		}

	};

	/**
	 * 登陆窗口关闭.
	 * @private
	 */
	var _loginHide = function () {
		clearInterval(LOGIN_TK_INTERVAL); // 处理第三方登陆的监听.
		clearInterval(LOGIN_SID_INTERVAL); // 处理sid的cookie监听.

		doc.getElementById('login_index').parentNode.removeChild(doc.getElementById('login_index'));
		doc.getElementById('masker').parentNode.removeChild(doc.getElementById('masker'));

		if (LOGIN_CLOSE_CALLBACK.length > 0) {
			for (var i = 0, l = LOGIN_CLOSE_CALLBACK.length; i < l; i++) {
				LOGIN_CLOSE_CALLBACK[i]();
			}
		}

	};

	/**
	 * 登出功能.
	 * @param callback
	 */
	var login_out = function () {

		var _success = function (data) {
			var i = 0, str = '', arr = [],
				iframesDIV = null,
				currentDom = null,
				poll_cookie = null;

			if (1 === data.code) {

				for (; i < data.data.turl.length; i++) {
					str = '<iframe style="display: none;" id="logout_' + i + '_iframe" src="' + data.data.turl[i] + '"></iframe>';
					arr.push(str);
				}

				iframesDIV = document.createElement('div');
				iframesDIV.id = 'iframesDIV';
				iframesDIV.innerHTML = arr.join('');

				currentDom = _getDom(document.body.lastChild);
				currentDom.parentNode.insertBefore(iframesDIV, currentDom);

				// 设置时间轮询,查询IF_TK和SID的Cookie,发现两个都没有的时候证明是退出成功,发起reload();
				poll_cookie = setInterval(function () {

					if ('' === login_cookie.get('sid')) {
						clearInterval(poll_cookie);

						if (LOGIN_OUT_CALLBACK.length > 0) {
							for (var i = 0, l = LOGIN_OUT_CALLBACK.length; i < l; i++) {
								LOGIN_OUT_CALLBACK[i]();
							}
						}

					}

				}, 100);

			}

		};

		var options = {
			url: 'http://id.ifeng.com/index.php/api/logout',
			success: _success
		};

		ajax.jsonp(options);
	};

	/**
	 * 获取最终结点的上一个结点直到为dom结点.
	 * @param node
	 * @returns {*}
	 * @private
	 */
	var _getDom = function (node) {

		if (node.nodeType === 1) {
			return node;
		}

		if (node.previousSibling) {
			return _getDom(node.previousSibling);
		}

		return null;
	};

	/**
	 * 绑定事件工具函数.
	 * add 添加事件
	 * remove 删除事件
	 * @private
	 */
	var _bindEvent = {

		add: function (obj, type, fn) {
			if (obj.attachEvent) {
				obj['e' + type + fn] = fn;

				obj[type + fn] = function () {
					obj['e' + type + fn](window.event);
				};

				obj.attachEvent('on' + type, obj[type + fn]);
			} else {
				obj.addEventListener(type, fn, false);
			}
		},

		remove: function (obj, type, fn) {
			if (obj.detachEvent) {
				obj.detachEvent('on' + type, obj[type + fn]);
				obj[type + fn] = null;
			} else {
				obj.removeEventListener(type, fn, false);
			}
		}
	};

	/**
	 * 动态创建页面登陆结构
	 * @returns {HTMLElement}
	 */
	var login_html = function () {
		var _div = doc.createElement('div'),
			imgSrc = 'http://y0.ifengimg.com/a/2015/0827/close_small.png';

		_div.id = 'login_index';
		_div.style.cssText = 'width:1000px; margin:0 auto; display: block;';

		_div.innerHTML =
			'<div id="login_iframe_contain">' +
				'<i id="login_iframe_close_btn" style="cursor:pointer; position:absolute; right:-10px; top:-10px;">' +
					'<a href="javascript:;" style="cursor:pointer;width:26px;height:26px;overflow:hidden;background:url(' + imgSrc + ') no-repeat;display:block;text-indent:-9999px;_background:none;_filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled=true, sizingMethod=scale, src=\'' + imgSrc + '\');">关闭</a>' +
				'</i>' +
				'<div id="login_iframe_out">' +
					'<iframe id="login_iframe" width="520" height="410" scrolling="no" frameborder="no" border="0" style="border:0px; margin:0px;padding:0px;" src="' + LOGIN_URL + '"></iframe>' +
				'</div>' +
			'</div>';
		return _div;
	};

	/**
	 * 绑定事件工具函数.
	 * get 获取Cookie
	 * del 删除Cookie
	 */
	var login_cookie = {
		get: function (name) {
			var _ = login_cookie,
				cookie = document.cookie,
				str = _._removeBlanks(cookie),
				pairs = str.split(';');

			for (var i = 0; i < pairs.length; i++) {
				var pairSplit = pairs[i].split('=');
				if (pairSplit.length > 1 && pairSplit[0] === name) {
					return pairSplit[1];
				}
			}

			return '';
		},

		del: function (name, domain) {
			document.cookie = name + '=; path=/; domain=' + domain + '; expires=Thu, 01-Jan-70 00:00:01 GMT';
		},

		_removeBlanks: function (content) {
			var temp = '';

			for (var i = 0; i < content.length; i++) {
				var c = content.charAt(i);
				if (c !== ' ') {
					temp += c;
				}
			}

			return temp;
		}

	};

	/**
	 * 异步跨域请求.
	 * jsonp 跨域请求
	 */
	var ajax = {
		jsonp: function (options) {
			var url = options.url;
			var success = options.success;
			var data = [];
			var scope = options.scope || window;
			var callback;

			// 暂时只支持对象传入
			if (typeof options.data === "object") {
				for (var k in options.data) {
					data.push(k + "=" + encodeURIComponent(options.data[k]));
				}
			}

			if (typeof options.callback === "string" && options.callback !== "") {
				callback = options.callback;
			} else {
				callback = "f" + new Date().valueOf().toString(16);
			}

			data.push("callback=" + callback);
			data.push("_=" + (new Date().valueOf()));

			// 回头要不要对这地址进行更多特殊处理？
			if (url.indexOf("?") < 0) {
				url = url + "?" + data.join("&");
			} else {
				url = url + "&" + data.join("&");
			}

			var insertScript = document.createElement("script");
			insertScript.src = url;

			window[callback] = function () {
				success.apply(scope, [].slice.apply(arguments).concat("success", options));
			};

			var oScript = document.getElementsByTagName("script")[0];
			oScript.parentNode.insertBefore(insertScript, oScript);
		}
	};

	/**
	 * 处理sid变成uname的规则.
	 * @param sid
	 * @returns {string}
	 * @private
	 */
	var _processSidtoUname = function () {
		return login_cookie.get('sid') ? decodeURIComponent(login_cookie.get('sid').substring(32)) : decodeURIComponent(login_cookie.get('IF_USER'));
	};

	/**
	 * 判断是否登陆
	 * @returns {boolean}
	 */
	var isLogin = function () {
		return login_cookie.get('sid') ? true : false;
	};


	/**
	 * 注册回调
	 * @param type 参数1是成功,参数2是关闭,参数3是退出.
	 * @param callback
	 */
	var regLoginCallback = function (type, callback) {
		if ('undefined' === typeof type || 'undefined' === typeof callback) {
			return false;
		}

		switch (type) {

			case 1:
				if ('function' === typeof callback) {
					LOGIN_SUCCESS_CALLBACK.push(callback);
					break;
				}
			case 2:
				if ('function' === typeof callback) {
					LOGIN_CLOSE_CALLBACK.push(callback);
					break;
				}
			case 3:
				if ('function' === typeof callback) {
					LOGIN_OUT_CALLBACK.push(callback);
					break;
				}

		}

	};

	/**
	 * 发表评论时，检测是否登录，是否实名制
	 * @returns {boolean}
	*/
	var reviewCheck = function(){
		if(login_cookie.get('sid')){
			//已登录

			if(login_cookie.get('IF_REAL') == 0 ){
				//已实名
				return true;
			}else{
				//未实名
				_loginShow();
				document.getElementById("login_iframe").src = "http://id.ifeng.com/allsite/loginmob";
				return false;
			}

		}else{
			//未登录
			_loginShow();
			return false;
		}
	}


	win.IS_LOGIN = isLogin;
	win.GLOBAL_LOGIN = login_init;
	win.GLOBAL_LOGIN_OUT = login_out;
	win.REG_LOGIN_CALLBACK = regLoginCallback;
	win.ReviewCheck = reviewCheck;

})(window, document);