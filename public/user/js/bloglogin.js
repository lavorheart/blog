/*
1,654,19
2012-12-11 11:26:00
 */

function main() {}
//添加 loginReq的状态判断，请求中true，将不再继续下次请求。by jilong5
var __customLoginIsReq = false;
function msnrefreshWindow() {
	function d(a) {
		if (!a || a == "") {
			return null
		}
		try {
			return window.eval("(" + a + ")")
		} catch (b) {
			return null
		}
	}
	function c(a) {
		var b = new Date;
		b.setTime(b.getTime() - 1);
		document.cookie = a + "=_pass;path=/;domain=.blog.sina.com.cn;expires=" + b.toGMTString()
	}
	function b() {
		trace("noAccount");
		window.location.href = "http://blog.sina.com.cn/blog_rebuild/msn/interface/connect_user_confirm.php"
	}
	function a(a, b) {
		trace("has Account");
		if (a) {
			trace("alt:" + a);
			var c = $C("iframe");
			c.setAttribute("height", 0);
			c.setAttribute("width", 0);
			document.body.appendChild(c);
			c.src = "https://login.sina.com.cn/sso/login.php?entry=blogmsn&service=blogmsn&alt=" + encodeURIComponent(a) + "&savestate=7&returntype=TEXT";
			(function () {
				var a = arguments.callee;
				if (!a.count) {
					a.count = 0
				}
				if (a.count++ > 10) {
					trace("\u653E\u5F03\u83B7\u53D6SUP");
					c.parentNode.removeChild(c);
					return
				}
				trace("\u5C1D\u8BD5\u83B7\u53D6SUP, count:" + a.count);
				if (f("SUP")) {
					trace("\u83B7\u53D6\u5230 SUP" + f("SUP"));
					$blogIndexLoginStrip.showInfo();
					return
				}
				setTimeout(a, 1e3)
			})()
		} else {
			$blogIndexLoginStrip.showInfo()
		}
	}
	var e = Utils.Cookie.setCookie;
	var f = Utils.Cookie.getCookie;
	clearTimeout(msnRefreshTimer);
	var g = f("reg_token");
	if (g) {
		trace("token find out...");
		e("reg_token", "", "", "/", ".blog.sina.com.cn")
	} else {
		trace("no token...");
		msnRefreshTimer = setTimeout(msnrefreshWindow, 1e3);
		return
	}
	var h;
	var i;
	var j;
	var k = f("c_uid");
	var l = f("msnLinkCB");
	var m = f("AlT");
	e("msnLoginComeFrom", window.location.href, 1, "/", ".blog.sina.com.cn");
	if (l) {
		h = l.split("_");
		i = h[0];
		j = h[1]
	}
	if (k != i) {
		return
	}
	switch (j) {
	case "noCid":
		break;
	case "loginError":
		break;
	case "unlink":
		c("msnLinkCB");
		b(g);
		break;
	case "done":
		c("msnLinkCB");
		e("loginFromMsn", "msn", 24, "/", ".blog.sina.com.cn");
		a(m, g);
		break;
	case "pass":
		break
	}
}
function initDialog() {
	dialogBackShadow = new BackShadow(.4);
	_winDialog = new Sina.Ui.WindowDialog(dialogBackShadow, {
			alert : DialogTemplate.alert,
			confirm : DialogTemplate.confirm,
			iframe : DialogTemplate.iframe,
			customs : DialogTemplate.customs
		});
	_winDialog.iconSet = iconSet
}
function Jobs() {
	this._jobTable = [[], [], [], []]
}
function $T(a, b) {
	return a.getElementsByTagName(b)
}
function $N(a) {
	return document.getElementsByName(a)
}
function $C(a) {
	return document.createElement(a)
}
function $E(a) {
	var b = typeof a == "string" ? document.getElementById(a) : a;
	if (b != null) {
		return b
	} else {}

	return null
}
if (typeof Sina == "undefined") {
	Sina = {}

}
Sina.pkg = function (a) {
	if (!a || !a.length) {
		return null
	}
	var b = a.split(".");
	var c = Sina;
	for (var d = b[0] == "Sina" ? 1 : 0; d < b.length; ++d) {
		c[b[d]] = c[b[d]] || {};
		c = c[b[d]]
	}
	return c
};
try {
	document.execCommand("BackgroundImageCache", false, true)
} catch (e) {}

(function () {
	var a = function (a, b) {
		var c = a;
		return function () {
			return c.apply(b, arguments)
		}
	};
	var b = "Debug";
	if (window[b] == null || typeof window[b].log == "undefined") {
		window[b] = {
			cacheData : [],
			base_url : "http://sjs.sinajs.cn/bind2/",
			product : "blog7",
			baseColor : {
				1 : {
					color : "#FFF",
					bgcolor : "#E00"
				},
				2 : {
					color : "#F00"
				},
				3 : {
					color : "#FFF000"
				},
				4 : {
					color : "#0F0"
				},
				5 : {
					color : "#FFF"
				}
			},
			fatal : function (a) {
				this.addData(a, 1)
			},
			error : function (a) {
				this.addData(a, 2)
			},
			warning : function (a) {
				this.addData(a, 3)
			},
			info : function (a) {
				this.addData(a, 4)
			},
			log : function (a) {
				this.addData(a, 5)
			},
			dir : function (a) {
				this.addData(a, 5)
			},
			addData : function (a, b, c, d) {
				if (a == null) {
					return
				}
				if (typeof a != "object") {
					a = a.toString()
				}
				var e = {
					type : b || "5",
					color : c || this.baseColor[b].color,
					bgcolor : d || this.baseColor[b].bgcolor
				};
				this.cacheData.push([a, e]);
				if (this.initFinished == true) {
					this.showCurrentData([a, e])
				}
			}
		};
		window.trace = a(window[b].log, window[b]);
		window.traceError = a(window[b].error, window[b])
	}
})();
Sina.pkg("Core");
if (typeof Core == "undefined") {
	Core = Sina.Core
}
Sina.pkg("Core.Array");
Core.Array.foreach = function (a, b) {
	if (a == null && a.constructor != Array) {
		return []
	}
	var c = 0,
	d = a.length,
	e = [];
	while (c < d) {
		var f = b(a[c], c);
		if (f !== null) {
			e[e.length] = f
		}
		c++
	}
	return e
};
Sina.pkg("Core.Events");
Core.Events.addEvent = function (a, b, c, d) {
	var e = typeof a == "string" ? $E(a) : a;
	if (e == null) {
		trace("addEvent \u627E\u4E0D\u5230\u5BF9\u8C61\uFF1A" + a);
		return
	}
	if (typeof d == "undefined") {
		d = false
	}
	if (typeof c == "undefined") {
		c = "click"
	}
	if (e.addEventListener) {
		e.addEventListener(c, b, d);
		return true
	} else {
		if (e.attachEvent) {
			var f = e.attachEvent("on" + c, b);
			return true
		} else {
			e["on" + c] = b
		}
	}
};
Core.Events.removeEvent = function (a, b, c) {
	var d = $E(a);
	if (d == null) {
		trace("removeEvent \u627E\u4E0D\u5230\u5BF9\u8C61\uFF1A" + a);
		return
	}
	if (typeof b != "function") {
		return
	}
	if (typeof c == "undefined") {
		c = "click"
	}
	if (d.addEventListener) {
		d.removeEventListener(c, b, false)
	} else {
		if (d.attachEvent) {
			d.detachEvent("on" + c, b)
		}
	}
	b[c] = null
};
Sina.pkg("Core.Function");
Core.Function.bind3 = function (a, b, c) {
	c = c == null ? [] : c;
	var d = a;
	return function () {
		return d.apply(b, c)
	}
};
Core.Array.findit = function (a, b) {
	var c = -1;
	Core.Array.foreach(a, function (a, d) {
		if (b == a) {
			c = d
		}
	});
	return c
};
window.onerror = function (a, b, c) {
	trace("Error occured:" + a + "<br/>file:" + b + "<br/>line:" + c + "<br/>");
	return true
};
Jobs.prototype = {
	_registedJobTable : {},
	initialize : function () {},
	_registJob : function (a, b) {
		this._registedJobTable[a] = b
	},
	add : function (a, b) {
		var b = b || 1;
		if (Core.Array.findit(this._jobTable[b], a) == -1) {
			this._jobTable[b].push(a)
		} else {
			Debug.error("Error: Job <b>" + a + "</b> is existed now.")
		}
	},
	start : function (a) {
		var b = this._registedJobTable;
		var c = 0;
		this._jobTable[1] = this._jobTable[1].concat(this._jobTable[2]);
		var d = this._jobTable[1].length;
		var e = this._jobTable[1];
		var f = function () {
			return (new Date).valueOf()
		};
		var g = this;
		this.fe = Core.Function.bind3(g.focus, g, []);
		var h = window.setInterval(function () {
				if (c >= d) {
					clearInterval(h);
					Core.Events.addEvent(document.body, g.fe, "focus");
					Core.Events.addEvent(window, g.fe, "scroll");
					Core.Events.addEvent(document.body, g.fe, "mousemove");
					Core.Events.addEvent(document.body, g.fe, "mouseover");
					return
				}
				var a = e[c];
				var i = b[a];
				c++;
				if (typeof i == "undefined") {
					Debug.fatal("<b>Job[" + a + "] is undefiend!!!</b>");
					return
				}
				var j = true;
				var k = f();
				try {
					i.call()
				} catch (l) {
					Debug.fatal("<b>Job[" + a + "] failed!!!</b>");
					traceError(l);
					j = false;
					throw l
				}
				finally {
					if (j) {
						var m = f();
						Debug.info("<b>Job[" + a + "] done in " + (m - k) + "ms.</b>")
					}
				}
			}, 10)
	},
	focus : function () {
		if (this.focusdown) {
			var a = this;
			Core.Events.removeEvent(document.body, a.fe, "focus");
			Core.Events.removeEvent(window, a.fe, "scroll");
			Core.Events.removeEvent(document.body, a.fe, "mousemove");
			Core.Events.removeEvent(document.body, a.fe, "mouseover");
			a.fe = null;
			return
		}
		this.focusdown = true;
		var b = this._registedJobTable;
		var c = 0;
		var d = this._jobTable[3].length;
		var e = this._jobTable[3];
		var f = function () {
			return (new Date).valueOf()
		};
		var g = window.setInterval(function () {
				if (e.length == 0) {
					clearInterval(g);
					return
				}
				var a = e[0];
				e.shift();
				var d = b[a];
				c++;
				if (typeof d == "undefined") {
					Debug.fatal("<b>Job[" + a + "] is undefiend!!!</b>");
					return
				}
				var h = true;
				var i = f();
				try {
					d.call()
				} catch (j) {
					Debug.fatal("<b>Job[" + a + "] failed!!!</b>");
					traceError(j);
					h = false;
					throw j
				}
				finally {
					if (h) {
						var k = f();
						Debug.info("<b>Job[" + a + "] done in " + (k - i) + "ms.</b>")
					}
				}
			}, 10)
	},
	call : function (a, b) {
		if (typeof this._registedJobTable[a] != "undefined") {
			this._registedJobTable[a].apply(this, b)
		} else {
			trace("<b>Job[" + a + "] is undefined!!!</b>", {
				color : "#900",
				bgColor : "#FFF;"
			})
		}
	}
};
$registJob = function (a, b) {
	Jobs.prototype._registJob(a, b)
};
$callJob = function (a) {
	var b = [];
	if (arguments.length > 1) {
		Core.Array.foreach(arguments, function (a, c) {
			b[c] = a
		});
		b.shift()
	}
	Jobs.prototype.call(a, b)
};
Sina.pkg("Core.String");
Core.String.byteLength = function (a) {
	if (typeof a == "undefined") {
		return 0
	}
	var b = a.match(/[^\x00-\x80]/g);
	return a.length + (!b ? 0 : b.length)
};
Core.String.leftB = function (a, b) {
	var c = a.replace(/\*/g, " ").replace(/[^\x00-\xff]/g, "**");
	a = a.slice(0, c.slice(0, b).replace(/\*\*/g, " ").replace(/\*/g, "").length);
	if (Core.String.byteLength(a) > b) {
		a = a.slice(0, a.length - 1)
	}
	return a
};
Core.String.shorten = function (a, b, c) {
	if (Core.String.byteLength(a) <= b) {
		return a
	}
	if (c != "") {
		c = c || "..."
	} else {
		c = ""
	}
	return Core.String.leftB(a, b) + c
};
Core.String.trimHead = function (a) {
	return a.replace(/^(\u3000|\s|\t)*/gi, "")
};
Core.String.trimTail = function (a) {
	return a.replace(/(\u3000|\s|\t)*$/gi, "")
};
Core.String.trim = function (a) {
	return Core.String.trimHead(Core.String.trimTail(a))
};
Sina.pkg("Utils");
if (typeof Utils == "undefined") {
	Utils = Sina.Utils
}
Utils.Url = function (a) {
	a = a || "";
	this.url = a;
	this.query = {};
	this.parse()
};
Utils.Url.prototype = {
	parse : function (a) {
		if (a) {
			this.url = a
		}
		this.parseAnchor();
		this.parseParam()
	},
	parseAnchor : function () {
		var a = this.url.match(/\#(.*)/);
		a = a ? a[1] : null;
		this._anchor = a;
		if (a != null) {
			this.anchor = this.getNameValuePair(a);
			this.url = this.url.replace(/\#.*/, "")
		}
	},
	parseParam : function () {
		var a = this.url.match(/\?([^\?]*)/);
		a = a ? a[1] : null;
		if (a != null) {
			this.url = this.url.replace(/\?([^\?]*)/, "");
			this.query = this.getNameValuePair(a)
		}
	},
	getNameValuePair : function (a) {
		var b = {};
		a.replace(/([^&=]*)(?:\=([^&]*))?/gim, function (a, c, d) {
			if (c == "") {
				return
			}
			b[c] = d || ""
		});
		return b
	},
	getParam : function (a) {
		return this.query[a] || ""
	},
	clearParam : function () {
		this.query = {}

	},
	setParam : function (a, b) {
		if (a == null || a == "" || typeof a != "string") {
			throw new Error("no param name set")
		}
		this.query = this.query || {};
		this.query[a] = b
	},
	setParams : function (a) {
		this.query = a
	},
	serialize : function (a) {
		var b = [];
		for (var c in a) {
			if (a[c] == null || a[c] == "") {
				b.push(c + "=")
			} else {
				b.push(c + "=" + a[c])
			}
		}
		return b.join("&")
	},
	toString : function () {
		var a = this.serialize(this.query);
		return this.url + (a.length > 0 ? "?" + a : "") + (this.anchor ? "#" + this.serialize(this.anchor) : "")
	},
	getHashStr : function (a) {
		return this.anchor ? "#" + this.serialize(this.anchor) : a ? "#" : ""
	}
};
Core.String.j2o = function (a) {
	if (!a || a == "") {
		return null
	}
	try {
		var b = window.eval("(" + a + ")");
		return b
	} catch (c) {
		trace("j2o : \u6570\u636E\u5206\u6790\u51FA\u9519");
		traceError(c);
		return null
	}
};
Sina.pkg("Utils.Io");
Sina.pkg("Core.System");
(function () {
	var a = function (a, b) {
		var c;
		try {
			if (typeof b != "undefined") {
				for (c in a) {
					if (b[c] != null) {
						a[c] = b[c]
					}
				}
			}
		}
		finally {
			c = null;
			return a
		}
	};
	Core.System.parseParam = a
})();
(function (a) {
	var b = navigator.userAgent.toLowerCase();
	a.$IE = /msie/.test(b);
	a.$OPERA = /opera/.test(b);
	a.$MOZ = /gecko/.test(b);
	a.$IE5 = /msie 5 /.test(b);
	a.$IE55 = /msie 5.5/.test(b);
	a.$IE6 = /msie 6/.test(b);
	a.$IE7 = /msie 7/.test(b);
	a.$IE8 = /msie 8/.test(b);
	a.$SAFARI = /safari/.test(b);
	a.$winXP = /windows nt 5.1/.test(b);
	a.$winVista = /windows nt 6.0/.test(b);
	a.$FF2 = /Firefox\/2/i.test(b);
	a.$FF = /firefox/i.test(b);
	a.$CHROME = /chrome/i.test(b)
})(window);
Core.String.encodeDoubleByte = function (a) {
	if (typeof a != "string") {
		return a
	}
	return encodeURIComponent(a)
};
Utils.Io.JsLoad = {};
(function () {
	function c(b, c) {
		var d = {
			urls : [],
			charset : "utf-8",
			noreturn : false,
			noencode : false,
			timeout : -1,
			POST : {},
			GET : {},
			onComplete : null,
			onException : null
		};
		var e = {
			script_loaded_num : 0,
			is_timeout : false,
			is_loadcomplete : false,
			script_var_arr : []
		};
		d.urls = typeof b == "string" ? [{
					url : b
				}
			] : b;
		Core.System.parseParam(d, c);
		a(d, e);
		(function () {
			if (d.noreturn == true && d.onComplete == null) {
				return
			}
			var a,
			b = [];
			if (e.script_loaded_num == d.urls.length) {
				e.is_loadcomplete = true;
				if (d.onComplete != null) {
					for (a = 0; a < e.script_var_arr.length; a++) {
						b.push(window[e.script_var_arr[a]])
					}
					if (e.script_var_arr.length < 2) {
						d.onComplete(b[0])
					} else {
						d.onComplete(b)
					}
				}
				return
			}
			if (e.is_timeout == true) {
				return
			}
			setTimeout(arguments.callee, 50)
		})();
		if (d.timeout > 0) {
			setTimeout(function () {
				if (e.is_loadcomplete != true) {
					if (d.onException != null) {
						d.onException()
					}
					e.is_timeout = true
				}
			}, d.timeout)
		}
	}
	function b(a, b) {
		var c = a.urls;
		var d = a.GET;
		var e,
		f = c.length;
		var g,
		h,
		i,
		j;
		for (e = 0; e < f; e++) {
			j = window.parseInt(Math.random() * 1e8);
			h = new Utils.Url(c[e].url);
			for (g in d) {
				if (a.noencode == true) {
					h.setParam(g, d[g])
				} else {
					h.setParam(g, Core.String.encodeDoubleByte(d[g]))
				}
			}
			i = h.getParam("varname") || "requestId_" + j;
			if (a.noreturn != true) {
				h.setParam("varname", i)
			}
			b.script_var_arr.push(i);
			c[e].url = h.toString();
			c[e].charset = c[e].charset || a.charset
		}
	}
	function a(a, c) {
		b(a, c);
		var d = a.urls;
		var e,
		f = d.length;
		for (e = 0; e < f; e++) {
			var g = $C("script");
			g.src = d[e].url;
			g.charset = d[e].charset;
			g.onload = g.onerror = g.onreadystatechange = function () {
				if (g && g.readyState && g.readyState != "loaded" && g.readyState != "complete") {
					return
				}
				c.script_loaded_num++;
				g.onload = g.onreadystatechange = g.onerror = null;
				g.src = "";
				g.parentNode.removeChild(g);
				g = null
			};
			document.getElementsByTagName("head")[0].appendChild(g)
		}
	}
	Utils.Io.JsLoad.request = function (a, b) {
		new c(a, b)
	}
})();
Core.Function.bind2 = function (a, b) {
	var c = a;
	return function () {
		return c.apply(b, arguments)
	}
};
Function.prototype.bind2 = function (a) {
	var b = this;
	return function () {
		return b.apply(a, arguments)
	}
};
Sina.pkg("Core.Dom");
Core.Dom.insertHTML = function (a, b, c) {
	a = $E(a) || document.body;
	c = c.toLowerCase() || "beforeend";
	if (a.insertAdjacentHTML) {
		switch (c) {
		case "beforebegin":
			a.insertAdjacentHTML("BeforeBegin", b);
			return a.previousSibling;
		case "afterbegin":
			a.insertAdjacentHTML("AfterBegin", b);
			return a.firstChild;
		case "beforeend":
			a.insertAdjacentHTML("BeforeEnd", b);
			return a.lastChild;
		case "afterend":
			a.insertAdjacentHTML("AfterEnd", b);
			return a.nextSibling
		}
		throw 'Illegal insertion point -> "' + c + '"'
	}
	var d = a.ownerDocument.createRange();
	var e;
	switch (c) {
	case "beforebegin":
		d.setStartBefore(a);
		e = d.createContextualFragment(b);
		a.parentNode.insertBefore(e, a);
		return a.previousSibling;
	case "afterbegin":
		if (a.firstChild) {
			d.setStartBefore(a.firstChild);
			e = d.createContextualFragment(b);
			a.insertBefore(e, a.firstChild);
			return a.firstChild
		} else {
			a.innerHTML = b;
			return a.firstChild
		}
		break;
	case "beforeend":
		if (a.lastChild) {
			d.setStartAfter(a.lastChild);
			e = d.createContextualFragment(b);
			a.appendChild(e);
			return a.lastChild
		} else {
			a.innerHTML = b;
			return a.lastChild
		}
		break;
	case "afterend":
		d.setStartAfter(a);
		e = d.createContextualFragment(b);
		a.parentNode.insertBefore(e, a.nextSibling);
		return a.nextSibling
	}
	throw 'Illegal insertion point -> "' + c + '"'
};
Core.Dom.getElementsByClass = function (a, b, c) {
	a = a || document;
	var d = [];
	c = " " + c + " ";
	var e = a.getElementsByTagName(b),
	f = e.length;
	for (var g = 0; g < f; ++g) {
		var h = e[g];
		if (h.nodeType == 1) {
			var i = " " + h.className + " ";
			if (i.indexOf(c) != -1) {
				d[d.length] = h
			}
		}
	}
	return d
};
Core.Dom.byClz = Core.Dom.getElementsByClass;
Utils.Io.Ijax = {
	arrTaskLists : [],
	createLoadingIframe : function () {
		if (this.loadFrames != null) {
			return false
		}
		var a = "loadingIframe_thread" + Math.ceil(Math.random() * 1e4);
		var b = "loadingIframe_thread" + Math.ceil((Math.random() + 1) * 1e4);
		this.loadFrames = [a, b];
		var c = '<iframe id="' + a + '" name="' + a + '" class="invisible"\t              scrolling="no" src=""\t              allowTransparency="true" style="display:none;" frameborder="0"\t              ></iframe>\t\t\t\t  <iframe id="' + b + '" name="' + b + '" class="invisible"\t              scrolling="no" src=""\t              allowTransparency="true" style="display:none;" frameborder="0"\t              ></iframe>';
		var d = $C("div");
		d.id = "ijax_iframes";
		d.innerHTML = c;
		trace("\u521B\u5EFA Ijax \u9700\u8981\u7684 iframe");
		document.body.appendChild(d);
		var e = setInterval(Core.Function.bind2(function () {
					if ($E(this.loadFrames[0]) != null && $E(this.loadFrames[1]) != null) {
						clearInterval(e);
						e = null;
						this.loadingIframe = {
							thread1 : {
								container : $E(this.loadFrames[0]),
								isBusy : false
							},
							thread2 : {
								container : $E(this.loadFrames[1]),
								isBusy : false
							}
						};
						this.loadByList()
					}
				}, this), 10)
	},
	isIjaxReady : function () {
		if (typeof this.loadingIframe == "undefined") {
			return false
		}
		for (var a in this.loadingIframe) {
			if (this.loadingIframe[a].isBusy == false) {
				this.loadingIframe[a].isBusy = true;
				return this.loadingIframe[a]
			}
		}
		return false
	},
	request : function (a, b) {
		var c = {};
		c.url = a;
		c.option = b || {};
		this.arrTaskLists.push(c);
		if (this.loadFrames == null) {
			this.createLoadingIframe()
		} else {
			this.loadByList()
		}
	},
	loadByList : function () {
		if (this.arrTaskLists.length == 0) {
			return false
		}
		var a = this.isIjaxReady();
		if (a == false) {
			return false
		}
		var b = this.arrTaskLists[0];
		this.loadData(b.url, b.option, a);
		this.arrTaskLists.shift()
	},
	loadData : function (a, b, c) {
		var d = new Utils.Url(a);
		if (b.GET) {
			for (var e in b.GET) {
				d.setParam(e, Core.String.encodeDoubleByte(b.GET[e]))
			}
		}
		d.setParam("domain", "1");
		d = d.toString();
		var f = c.container;
		f.listener = Core.Function.bind2(function () {
				try {
					var a = f.contentWindow.document,
					e;
					var g = Core.Dom.byClz(a, "textarea", "")[0];
					if (typeof g != "undefined") {
						e = g.value
					} else {
						e = a.body.innerHTML
					}
					if (b.onComplete) {
						b.onComplete(e)
					} else {
						b.onException()
					}
				} catch (h) {
					traceError(h);
					if (b.onException) {
						b.onException(h.message, d.toString())
					}
				}
				c.isBusy = false;
				Core.Events.removeEvent(f, f.listener, "load");
				this.loadByList()
			}, this);
		Core.Events.addEvent(f, f.listener, "load");
		if (b.POST) {
			var g = $C("form");
			g.id = "IjaxForm";
			g.action = d;
			g.method = "post";
			g.target = f.id;
			for (var h in b.POST) {
				var i = $C("input");
				i.type = "hidden";
				i.name = h;
				i.value = Core.String.encodeDoubleByte(b.POST[h]);
				g.appendChild(i)
			}
			document.body.appendChild(g);
			g.submit()
		} else {
			try {
				window.frames(f.id).location.href = d
			} catch (j) {
				f.src = d
			}
		}
	}
};
Utils.Io.Ajax = {
	createRequest : function () {
		var a = null;
		try {
			a = new XMLHttpRequest
		} catch (b) {
			try {
				a = new ActiveXObject("Msxml2.XMLHTTP")
			} catch (c) {
				try {
					a = ActiveXObject("Microsoft.XMLHTTP")
				} catch (d) {}

			}
		}
		if (a == null) {
			trace("create request failed")
		} else {
			return a
		}
	},
	request : function (a, b) {
		b = b || {};
		b.onComplete = b.onComplete || function () {};
		b.onException = b.onException || function () {};
		b.returnType = b.returnType || "txt";
		b.method = b.method || "get";
		b.data = b.data || {};
		if (typeof b.GET != "undefined" && typeof b.GET.url_random != "undefined" && b.GET.url_random == 0) {
			this.rand = false;
			b.GET.url_random = null
		}
		this.loadData(a, b)
	},
	loadData : function (url, option) {
		var request = this.createRequest(),
		tmpArr = [];
		var _url = new Utils.Url(url);
		if (option.POST) {
			for (var postkey in option.POST) {
				var postvalue = option.POST[postkey];
				if (postvalue != null) {
					tmpArr.push(postkey + "=" + Core.String.encodeDoubleByte(postvalue))
				}
			}
		}
		var sParameter = tmpArr.join("&") || "";
		if (option.GET) {
			for (var key in option.GET) {
				if (key != "url_random") {
					_url.setParam(key, Core.String.encodeDoubleByte(option.GET[key]))
				}
			}
		}
		if (this.rand != false) {}

		request.onreadystatechange = function () {
			if (request.readyState == 4) {
				var response,
				type = option.returnType;
				try {
					switch (type) {
					case "txt":
						response = request.responseText;
						break;
					case "xml":
						if ($IE) {
							response = request.responseXML
						} else {
							var Dparser = new DOMParser;
							response = Dparser.parseFromString(request.responseText, "text/xml")
						}
						break;
					case "json":
						response = eval("(" + request.responseText + ")");
						break
					}
					option.onComplete(response)
				} catch (e) {
					option.onException(e.message, _url);
					return false
				}
			}
		};
		try {
			if (option.POST) {
				request.open("POST", _url, true);
				request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				trace(sParameter);
				request.send(sParameter)
			} else {
				request.open("GET", _url, true);
				request.send(null)
			}
		} catch (e) {
			option.onException(e.message, _url);
			return false
		}
	}
};
Sina.pkg("Core.Class");
Core.Class.AsPrototype = {};
Core.Class.create = function () {
	return function (a) {
		if (a != Core.Class.AsPrototype) {
			this.initialize.apply(this, arguments)
		}
	}
};
var Interface = function (a, b) {
	this.url = new Utils.Url(a);
	this.type = b.toLowerCase()
};
Interface.prototype = {
	url : null,
	type : "",
	request : function (a) {
		var b = a.onError;
		var c = a.onSuccess;
		a.onComplete = a.onSuccess = function (a) {
			try {
				if (typeof a == "string") {
					a = a.replace(/;$/, "")
				}
				a = typeof a == "string" && /\s*{/.test(a) ? Core.String.j2o(a) : a;
				if (a != null && typeof a.code == "undefined") {
					trace("\u63A5\u53E3\u6570\u636E\u5F02\u5E38\uFF1A" + this.url, "#F00");
					return
				}
				if (a != null) {
					if (a.code == "A00006") {
						c(a.data)
					} else {
						b(a)
					}
				} else {
					b(a)
				}
			} catch (d) {
				traceError(d)
			}
		}
		.bind2(this);
		a.onException = a.onError = a.onFail || function () {
			trace("\u63A5\u53E3\u5931\u8D25\uFF1A" + this.url, "#F00");
			if (arguments.length > 0) {
				for (var a = 0, b = arguments.length; a < b; a++) {
					if (arguments[a] && typeof arguments[a] != "undefined") {
						trace("\u9519\u8BEF\u4FE1\u606F\uFF1A" + arguments[a].toString())
					}
				}
			}
		}
		.bind2(this);
		var d = this.url.toString();
		switch (this.type) {
		case "ijax":
			Utils.Io.Ijax.request(d, a);
			break;
		case "ajax":
			Utils.Io.Ajax.request(d, a);
			break;
		case "script":
		case "jsload":
			Utils.Io.JsLoad.request(d, a);
			break;
		default:
			throw new Error("\u672A\u6307\u5B9A\u6709\u6548\u7684\u6570\u636E\u4F20\u8F93\u7C7B\u578B")
		}
	}
};
Core.Array.uniq = function (a) {
	var b = [];
	for (var c = 0; c < a.length; c++) {
		var d = a[c];
		if (Core.Array.findit(b, d) == -1) {
			b.push(d)
		}
	}
	return b
};
if (typeof Lib == "undefined") {
	Lib = {}

}
Lib.pkg = function (a) {
	if (!a || !a.length) {
		return null
	}
	var b = a.split(".");
	var c = Lib;
	for (var d = b[0] == "Lib" ? 1 : 0; d < b.length; ++d) {
		c[b[d]] = c[b[d]] || {};
		c = c[b[d]]
	}
	return c
};
Lib.Uic = {
	_interface : "http://uic.sinajs.cn/uic?type=nick",
	cacheNickName : {},
	getNickName : function (a, b, c) {
		a = Core.Array.uniq(a) || [];
		c = c || 10;
		var d = this.cacheNickName,
		e = [];
		var f = {};
		for (var g = 0, h = a.length; g < h; g++) {
			if (typeof d[a[g]] == "undefined" && d[a[g]] == null) {
				e.push(a[g])
			} else {
				f[a[g]] = d[a[g]] || a[g]
			}
		}
		if (e.length == 0) {
			b(f);
			f = null
		} else {
			var i = [];
			while (e.length > 0) {
				i.push({
					url : this._interface + "&uids=" + e.splice(0, c).join(",")
				})
			}
			var j = function (a) {
				Utils.Io.JsLoad.request(a[0].url, {
					onComplete : function (a) {
						if (typeof a.length == "undefined") {
							for (var c in a) {
								f[c] = a[c] || c;
								Lib.Uic.cacheNickName[c] = f[c]
							}
							b(f)
						} else {
							for (var d = 0; d < a.length; d++) {
								for (var e in a[d]) {
									f[e] = a[d][e] || e;
									Lib.Uic.cacheNickName[c] = f[e]
								}
							}
							b(f)
						}
					}
				});
				if (i.length > 0) {
					setTimeout(function () {
						j(i.splice(0, 1))
					}, 10)
				}
			};
			if (i.length > 0) {
				setTimeout(function () {
					j(i.splice(0, 1))
				}, 10)
			}
		}
	}
};
Core.Events.getEvent = function () {
	return window.event
};
if (!$IE) {
	Core.Events.getEvent = function () {
		if (window.event) {
			return window.event
		}
		var a = arguments.callee.caller;
		var b;
		var c = 0;
		while (a != null && c < 40) {
			b = a.arguments[0];
			if (b && (b.constructor == Event || b.constructor == MouseEvent)) {
				return b
			}
			c++;
			a = a.caller
		}
		return b
	}
}
Sina.pkg("Utils.Cookie");
Utils.Cookie.setCookie = function (a, b, c, d, e, f) {
	var g = [];
	g.push(a + "=" + escape(b));
	if (c) {
		var h = new Date;
		var i = h.getTime() + c * 36e5;
		h.setTime(i);
		g.push("expires=" + h.toGMTString())
	}
	if (d) {
		g.push("path=" + d)
	}
	if (e) {
		g.push("domain=" + e)
	}
	if (f) {
		g.push(f)
	}
	document.cookie = g.join(";")
};
Utils.Cookie.getCookie = function (a) {
	a = a.replace(/([\.\[\]\$])/g, "\\$1");
	var b = new RegExp(a + "=([^;]*)?;", "i");
	var c = document.cookie + ";";
	var d = c.match(b);
	if (d) {
		return d[1] || ""
	} else {
		return ""
	}
};
Core.System.winSize = function (a) {
	var b,
	c;
	if (a) {
		target = a.document
	} else {
		target = document
	}
	if (self.innerHeight) {
		if (a) {
			target = a.self
		} else {
			target = self
		}
		b = target.innerWidth;
		c = target.innerHeight
	} else {
		if (target.documentElement && target.documentElement.clientHeight) {
			b = target.documentElement.clientWidth;
			c = target.documentElement.clientHeight
		} else {
			if (target.body) {
				b = target.body.clientWidth;
				c = target.body.clientHeight
			}
		}
	}
	return {
		width : b,
		height : c
	}
};
Core.Events.stopEvent = function (a) {
	var b = a ? a : Core.Events.getEvent();
	if (b != null) {
		b.cancelBubble = true;
		b.returnValue = false
	}
};
Core.Events.fireEvent = function (a, b) {
	a = $E(a);
	if ($IE) {
		a.fireEvent("on" + b)
	} else {
		var c = document.createEvent("HTMLEvents");
		c.initEvent(b, true, true);
		a.dispatchEvent(c)
	}
};
if (!$IE) {
	Core.Events.stopEvent = function (a) {
		var b = a ? a : Core.Events.getEvent();
		if (b != null) {
			b.preventDefault();
			b.stopPropagation()
		}
	}
}
Core.Dom.setStyle = function (a, b, c) {
	switch (b) {
	case "opacity":
		a.style.filter = "alpha(opacity=" + c * 100 + ")";
		if (!a.currentStyle || !a.currentStyle.hasLayout) {
			a.style.zoom = 1
		}
		break;
	case "float":
		b = "styleFloat";
	default:
		a.style[b] = c
	}
};
if (!$IE) {
	Core.Dom.setStyle = function (a, b, c) {
		if (b == "float") {
			b = "cssFloat"
		}
		a.style[b] = c
	}
}
Sina.pkg("Ui");
if (typeof Ui == "undefined") {
	Ui = Sina.Ui
}
Ui.Template = function (a) {
	this.tmpl = a;
	this.pattern = /(#\{(.*?)\})/g
};
Ui.Template.prototype = {
	evaluate : function (a) {
		return this.tmpl.replace(this.pattern, function () {
			return a[arguments[2]] || ""
		})
	},
	evaluateMulti : function (a, b) {
		var c = [];
		Core.Array.foreach(a, Core.Function.bind2(function (d, e) {
				e = b ? a.length - e : e;
				c[e] = this.evaluate(d)
			}, this));
		return c.join("")
	}
};
var Layer = function (a) {
	this.entity = null;
	this.ifm = null;
	var b = this;
	var c = {
		width : 0,
		height : 0,
		x : 0,
		y : 0,
		isFixed : false,
		uniqueID : "",
		entityID : "",
		contentID : "",
		template : a,
		templateString : "",
		nodes : {}

	};
	this.getProperty = function () {
		return c
	};
	(function d() {
		var a = b.getProperty();
		a.uniqueID = "_" + b.getUniqueID();
		a.entityID = a.uniqueID + "_entity";
		a.contentID = a.uniqueID + "_content";
		b.setTemplate(a.template);
		a.width = parseInt(b.entity.style.width);
		if ($IE6) {
			b.addIframe()
		}
		document.body.insertBefore(b.entity, document.body.firstChild);
		b.hidden()
	})();
	this._ie6Fixed = function () {
		var a = document.compatMode == "CSS1Compat" ? document.documentElement : document.body;
		b.entity.style.left = a.scrollLeft + b.getProperty().x + "px";
		b.entity.style.top = a.scrollTop + b.getProperty().y + "px";
		if (b.ifm) {
			b.ifm.style.left = a.scrollLeft + b.getProperty().x + "px";
			b.ifm.style.top = a.scrollTop + b.getProperty().y + "px"
		}
	}
};
Layer.prototype = {
	setTemplate : function (a) {
		var b = this.getProperty();
		var c = /[^\{\}]+(?=\})/g;
		b.template = a;
		b.templateString = b.template.match(c);
		if (this.entity) {
			this.entity.parentNode.removeChild(this.entity);
			this.entity = null
		}
		this.entity = $C("div");
		var d = $C("div");
		var e = new Ui.Template(b.template);
		d.innerHTML = e.evaluate(this.getNodes("i"));
		document.body.insertBefore(d, document.body.firstChild);
		if (!$E(b.entityID) || !$E(b.contentID)) {
			throw new Error("[Error from layer.js] there missing #{entityID} or #{contentID} in layer template")
		} else {
			this.entity = $E(b.entityID);
			this.entity.style.position = "absolute";
			this.entity.style.zIndex = "1024";
			this.entity.style.left = b.x + "px";
			this.entity.style.top = b.y + "px";
			document.body.replaceChild(this.entity, d);
			d = null
		}
		b.nodes = this.getNodes()
	},
	setSize : function (a) {
		var b = this.getProperty();
		Core.System.parseParam(b, a);
		if (a.width) {
			b.nodes.content.style.width = b.width + "px"
		}
		if (a.height) {
			b.nodes.content.style.height = b.height + "px"
		}
		this.updateIfmSize()
	},
	setPosition : function (a) {
		var b = this.getProperty();
		Core.System.parseParam(b, a);
		this.entity.style.left = b.x + "px";
		this.entity.style.top = b.y + "px";
		if ($IE6 && b.isFixed) {
			this.entity.style.left = b.x + document.documentElement.scrollLeft + "px";
			this.entity.style.top = b.y + document.documentElement.scrollTop + "px"
		}
		if (this.ifm) {
			this.ifm.style.left = this.entity.style.left;
			this.ifm.style.top = this.entity.style.top
		}
	},
	getWidth : function () {
		var a = this.entity.style.display;
		var b = this.entity.style.visibility;
		this.entity.style.visibility = "hidden";
		this.entity.style.display = "";
		w = this.entity.offsetWidth;
		this.entity.style.display = a;
		this.entity.style.visibility = b;
		return w
	},
	getHeight : function () {
		var a = this.entity.style.display;
		var b = this.entity.style.visibility;
		this.entity.style.visibility = "hidden";
		this.entity.style.display = "";
		h = this.entity.offsetHeight;
		this.entity.style.display = a;
		this.entity.style.visibility = b;
		return h
	},
	getX : function () {
		return parseInt(this.entity.style.left)
	},
	getY : function () {
		return parseInt(this.entity.style.top)
	},
	updateIfmSize : function () {
		if (this.ifm) {
			var a = this;
			a.ifm.style.width = a.entity.offsetWidth + "px";
			a.ifm.style.height = a.entity.offsetHeight + "px"
		}
	},
	setFixed : function (a) {
		var b = this.getProperty();
		b.isFixed = a;
		var c = this;
		if ($IE) {
			c.entity.style.position = "absolute";
			c._ie6Fixed();
			Core.Events.addEvent(window, c._ie6Fixed, "scroll");
			return
		} else {
			this.entity.style.position = b.isFixed ? "fixed" : "absolute";
			Core.Events.removeEvent(window, c._ie6Fixed, "scroll")
		}
		if (b.isFixed && $FF2) {
			c.updateFixed();
			return
		}
	},
	updateFixed : function () {
		var a = this.getProperty();
		if (a.isFixed && $FF2) {
			var b = this;
			var c = a.x,
			d = a.y;
			b.entity.style.position = "absolute";
			b.setPosition({
				x : a.x + document.documentElement.scrollLeft,
				y : a.y + document.documentElement.scrollTop
			});
			b.entity.style.position = "fixed";
			b.setPosition({
				x : c,
				y : d
			})
		}
	},
	show : function () {
		this.entity.style.display = "";
		if (this.ifm) {
			this.ifm.style.display = "";
			this.updateIfmSize()
		}
	},
	hidden : function () {
		this.entity.style.display = "none";
		if (this.ifm) {
			this.ifm.style.display = "none"
		}
	},
	addIframe : function () {
		this.ifm = $C("iframe");
		this.ifm.style.position = "absolute";
		this.ifm.style.zIndex = "1024";
		this.ifm.style.left = this.entity.style.left;
		this.ifm.style.top = this.entity.style.top;
		document.body.insertBefore(this.ifm, document.body.firstChild);
		Core.Dom.setStyle(this.ifm, "opacity", 0)
	},
	getNodes : function (a) {
		var b = this.getProperty();
		var c = a || "o";
		var d;
		var e = {};
		var f = b.templateString;
		if (f) {
			for (d = 0; d < f.length; d++) {
				var g = f[d];
				switch (c) {
				case "o":
					e[g] = $E(b.uniqueID + "_" + g);
					break;
				case "i":
					e[g] = b.uniqueID + "_" + g;
					break
				}
			}
		}
		return e
	},
	getUniqueID : function () {
		return parseInt(Math.random() * 1e4).toString() + (new Date).getTime().toString()
	},
	setContent : function (a) {
		var b = this.getProperty();
		if (a) {
			b.nodes.content.innerHTML = a
		}
	}
};
Core.Dom.getStyle = function (a, b) {
	switch (b) {
	case "opacity":
		var c = 100;
		try {
			c = a.filters["DXImageTransform.Microsoft.Alpha"].opacity
		} catch (d) {
			try {
				c = a.filters("alpha").opacity
			} catch (d) {}

		}
		return c / 100;
	case "float":
		b = "styleFloat";
	default:
		var e = a.currentStyle ? a.currentStyle[b] : null;
		return a.style[b] || e
	}
};
if (!$IE) {
	Core.Dom.getStyle = function (a, b) {
		if (b == "float") {
			b = "cssFloat"
		}
		try {
			var c = document.defaultView.getComputedStyle(a, "")
		} catch (d) {
			traceError(d)
		}
		return a.style[b] || c ? c[b] : null
	}
}
(function () {
	function h(a, b, c, d, e, g) {
		var h = f(a);
		h.start.apply(h, arguments)
	}
	function g() {
		this._timer = null
	}
	function f(a) {
		try {
			var b = j(a);
			var c;
			if (k[b] != true) {
				c = new g;
				l[b] = {
					node : a,
					func : c
				};
				k[b] = true;
				return c
			} else {
				return l[b].func
			}
		}
		finally {
			b = c = null
		}
	}
	function e(a) {
		try {
			var b = /(-?\d.?\d*)([a-z%]*)/i.exec(a);
			return [b[1], b[2] ? b[2] : "px"]
		}
		finally {
			b = null
		}
	}
	function d(b, c) {
		try {
			var d = a(b);
			var f = [],
			g = [],
			h,
			i,
			j;
			if (d != "array") {
				j = e(b);
				j[1] = c == "opacity" ? "" : j[1];
				f = [j[0]];
				g = [j[1]]
			} else {
				i = b.length;
				for (h = 0; h < i; h++) {
					j = e(b[h]);
					j[1] = c[h] == "opacity" ? "" : j[1];
					f[f.length] = j[0];
					g[g.length] = j[1]
				}
			}
			return [f, g]
		}
		finally {
			d = f = g = h = i = j = null
		}
	}
	function c(b) {
		return a(b) != "array" ? [b] : b
	}
	function b(a, b) {
		var c,
		d,
		e = [];
		d = b.length;
		for (c = 0; c < d; c++) {
			e[e.length] = parseFloat(Core.Dom.getStyle(a, b[c]))
		}
		return e
	}
	function a(a) {
		try {
			var b = a.constructor.toString().toLowerCase();
			return b.slice(b.indexOf("function") + 9, b.indexOf("()"))
		}
		finally {
			b = null
		}
	}
	var i = {
		simple : function (a, b, c, d) {
			return c * a / d + b
		},
		backEaseIn : function (a, b, c, d) {
			var e = 1.70158;
			return c * (a /= d) * a * ((e + 1) * a - e) + b
		},
		backEaseOut : function (a, b, c, d, e, f) {
			var g = 1.70158;
			return c * ((a = a / d - 1) * a * ((g + 1) * a + g) + 1) + b
		},
		backEaseInOut : function (a, b, c, d, e, f) {
			var g = 1.70158;
			if ((a /= d / 2) < 1) {
				return c / 2 * a * a * (((g *= 1.525) + 1) * a - g) + b
			}
			return c / 2 * ((a -= 2) * a * (((g *= 1.525) + 1) * a + g) + 2) + b
		},
		bounceEaseOut : function (a, b, c, d) {
			if ((a /= d) < 1 / 2.75) {
				return c * 7.5625 * a * a + b
			} else {
				if (a < 2 / 2.75) {
					return c * (7.5625 * (a -= 1.5 / 2.75) * a + .75) + b
				} else {
					if (a < 2.5 / 2.75) {
						return c * (7.5625 * (a -= 2.25 / 2.75) * a + .9375) + b
					} else {
						return c * (7.5625 * (a -= 2.625 / 2.75) * a + .984375) + b
					}
				}
			}
		},
		bounceEaseIn : function (a, b, c, d) {
			return c - i.bounceEaseOut(d - a, 0, c, d) + b
		},
		bounceEaseInOut : function (a, b, c, d) {
			if (a < d / 2) {
				return i.bounceEaseIn(a * 2, 0, c, d) * .5 + b
			} else {
				return i.bounceEaseOut(a * 2 - d, 0, c, d) * .5 + c * .5 + b
			}
		},
		strongEaseInOut : function (a, b, c, d) {
			return c * (a /= d) * a * a * a * a + b
		},
		regularEaseIn : function (a, b, c, d) {
			return c * (a /= d) * a + b
		},
		regularEaseOut : function (a, b, c, d) {
			return -c * (a /= d) * (a - 2) + b
		},
		regularEaseInOut : function (a, b, c, d) {
			if ((a /= d / 2) < 1) {
				return c / 2 * a * a + b
			}
			return -c / 2 * (--a * (a - 2) - 1) + b
		},
		strongEaseIn : function (a, b, c, d) {
			return c * (a /= d) * a * a * a * a + b
		},
		strongEaseOut : function (a, b, c, d) {
			return c * ((a = a / d - 1) * a * a * a * a + 1) + b
		},
		strongEaseInOut : function (a, b, c, d) {
			if ((a /= d / 2) < 1) {
				return c / 2 * a * a * a * a * a + b
			}
			return c / 2 * ((a -= 2) * a * a * a * a + 2) + b
		},
		elasticEaseIn : function (a, b, c, d, e, f) {
			if (a == 0) {
				return b
			}
			if ((a /= d) == 1) {
				return b + c
			}
			if (!f) {
				f = d * .3
			}
			if (!e || e < Math.abs(c)) {
				e = c;
				var g = f / 4
			} else {
				var g = f / (2 * Math.PI) * Math.asin(c / e)
			}
			return  - (e * Math.pow(2, 10 * (a -= 1)) * Math.sin((a * d - g) * 2 * Math.PI / f)) + b
		},
		elasticEaseOut : function (a, b, c, d, e, f) {
			if (a == 0) {
				return b
			}
			if ((a /= d) == 1) {
				return b + c
			}
			if (!f) {
				f = d * .3
			}
			if (!e || e < Math.abs(c)) {
				e = c;
				var g = f / 4
			} else {
				var g = f / (2 * Math.PI) * Math.asin(c / e)
			}
			return e * Math.pow(2, -10 * a) * Math.sin((a * d - g) * 2 * Math.PI / f) + c + b
		},
		elasticEaseInOut : function (a, b, c, d, e, f) {
			if (a == 0) {
				return b
			}
			if ((a /= d / 2) == 2) {
				return b + c
			}
			if (!f) {
				var f = d * .3 * 1.5
			}
			if (!e || e < Math.abs(c)) {
				var e = c;
				var g = f / 4
			} else {
				var g = f / (2 * Math.PI) * Math.asin(c / e)
			}
			if (a < 1) {
				return  - .5 * e * Math.pow(2, 10 * (a -= 1)) * Math.sin((a * d - g) * 2 * Math.PI / f) + b
			}
			return e * Math.pow(2, -10 * (a -= 1)) * Math.sin((a * d - g) * 2 * Math.PI / f) * .5 + c + b
		}
	};
	var j = function (a) {
		return a.uniqueID
	};
	if (!$IE) {
		j = function (a) {
			try {
				var b;
				if (a.getAttribute("uniqueID") == null) {
					b = "moz__id" + parseInt(Math.random() * 100) + "_" + (new Date).getTime();
					a.setAttribute("uniqueID", b);
					return b
				}
				return a.getAttribute("uniqueID")
			}
			finally {
				b = null
			}
		}
	}
	var k = {};
	var l = {};
	g.prototype.start = function (a, e, f, g, h, j) {
		this.reset();
		j = j || {};
		if (j.end) {
			this._func.end = j.end
		}
		if (j.tween) {
			this._func.tween = j.tween
		}
		var k = c(e);
		var l = b(a, k);
		var m = d(f, k);
		this._node = a;
		this._property = k;
		this._endingvalue = m[0];
		this._suffixvalue = m[1];
		this._startvalue = l;
		this._end = false;
		this._fps = 0;
		if (g != null) {
			this._seconds = g
		}
		if (i[h] != null) {
			this._animation = i[h]
		}
		this._starttime = (new Date).getTime();
		this._timer = setInterval(Core.Function.bind3(this.play, this), 10)
	};
	g.prototype.play = function () {
		var a = ((new Date).getTime() - this._starttime) / 1e3;
		var b,
		c,
		d = this._property.length;
		if (a > this._seconds) {
			a = this._seconds
		}
		for (b = 0; b < d; b++) {
			c = this._animation(a, this._startvalue[b], this._endingvalue[b] - this._startvalue[b], this._seconds);
			Core.Dom.setStyle(this._node, this._property[b], c + this._suffixvalue[b])
		}
		this._fps++;
		this._func.tween();
		if (a == this._seconds) {
			this.stop()
		}
	};
	g.prototype.stop = function () {
		clearInterval(this._timer);
		this._end = true;
		this._func.end()
	};
	g.prototype.reset = function () {
		clearInterval(this._timer);
		this._end = false;
		this._node = null;
		this._property = [];
		this._startvalue = [];
		this._endingvalue = [];
		this._suffixvalue = [];
		this._fps = 0;
		this._seconds = .5;
		this._animation = i.simple;
		this._func = {
			end : function () {},
			tween : function () {}

		}
	};
	h.stop = function (a) {
		f(a).stop()
	};
	h.isTween = function (a) {
		return !f(a)._end
	};
	Ui.tween = h
})();
var DialogDisplaySet = {
	alpha1 : {
		show : function (a, b, c) {
			var d = 0,
			e = 0,
			f = parseInt(a.style.top) - b;
			a.style.top = f;
			Core.Dom.setStyle(a, "opacity", d);
			a.style.display = "";
			var g = window.setInterval(function () {
					if (d <= 1) {
						Core.Dom.setStyle(a, "opacity", d)
					}
					if (e <= f + b) {
						a.style.top = f + e + "px"
					}
					e += 1.5;
					d += .05;
					if (d > .9 && parseInt(a.style.top) >= f + b) {
						window.clearInterval(g);
						if (c) {
							c()
						}
					}
				}, 10)
		},
		hidden : function (a, b, c) {
			var d = 1;
			var e = parseInt(a.style.top);
			var f = e - b;
			var g = e;
			var h = window.setInterval(function () {
					if (d >= 0) {
						Core.Dom.setStyle(a, "opacity", d)
					}
					if (g >= f) {
						a.style.top = g + "px"
					}
					g -= 1.5;
					d -= .05;
					if (d <= 0 && g < f) {
						window.clearInterval(h);
						if (c) {
							c()
						}
					}
				}, 10)
		}
	},
	alpha : {
		show : function (a, b, c) {
			Core.Dom.setStyle(a, "opacity", .3);
			a.style.display = "";
			a.style.top = parseInt(a.style.top) - b + "px";
			var d = parseInt(a.style.top) + b;
			Ui.tween(a, ["top", "opacity"], [d, .9], .4, "simple", {
				end : c
			})
		},
		hidden : function (a, b, c) {
			var d = parseInt(a.style.top) - b;
			Ui.tween(a, ["top", "opacity"], [d, 0], .2, "simple", {
				end : c
			})
		}
	},
	fallDown : {
		show : function (a, b, c, d) {
			a.style.display = "";
			a.style.top = b + "px";
			Ui.tween(a, "top", c, .6, "bounceEaseOut", {
				end : d
			})
		},
		hidden : function (a, b, c, d) {
			a.style.display = "";
			a.style.top = b + "px";
			Ui.tween(a, "top", c, .6, "strongEaseIn", {
				end : d
			})
		}
	}
};
Core.Events.fixEvent = function (a) {
	if (typeof a == "undefined") {
		a = window.event
	}
	if (!a.target) {
		a.target = a.srcElement;
		a.pageX = a.x;
		a.pageY = a.y
	}
	if (typeof a.layerX == "undefined") {
		a.layerX = a.offsetX
	}
	if (typeof a.layerY == "undefined") {
		a.layerY = a.offsetY
	}
	return a
};
var Drag3 = function (a, b, c) {
	var d = this;
	this.beDragObj = a;
	this.movedObjs = b || this.beDragObj;
	this.dragMode = c || "normal";
	this.canDrag = true;
	this.isLock = false;
	this.lockArea = {
		left : 0,
		right : 0,
		top : 0,
		bottom : 0
	};
	this.dragSet = {
		normal : function () {
			d.normalDrag()
		},
		border : function () {
			d.borderDrag()
		},
		opacity : function () {
			d.opacityDrag()
		}
	};
	this.dragObjsFunc = function () {
		d.onDrag();
		d.dragObjs()
	};
	(function e() {
		d.beDragObj.style.MozUserSelect = "none";
		Core.Events.addEvent(d.beDragObj, function () {
			return false
		}, "selectstart");
		Core.Events.addEvent(d.beDragObj, function () {
			return false
		}, "drag");
		for (var a = 0; a < d.movedObjs.length; a++) {
			if (d.movedObjs[a] != d.beDragObj) {
				d.movedObjs[a].style.position = "absolute";
				if (!d.movedObjs[a].style.left) {
					d.movedObjs[a].style.left = d.movedObjs[a].offsetLeft + "px"
				}
				if (!d.movedObjs[a].style.top) {
					d.movedObjs[a].style.top = d.movedObjs[a].offsetTop + "px"
				}
			}
		}
		Core.Events.addEvent(d.beDragObj, d.dragSet[d.dragMode], "mousedown");
		if ($IE) {
			Core.Events.addEvent(d.beDragObj, function () {
				Core.Events.removeEvent(d.beDragObj, d.dragObjsFunc, "mousemove");
				d.beDragObj.releaseCapture();
				d.onDragEnd()
			}, "mouseup")
		} else {
			Core.Events.addEvent(document, function () {
				Core.Events.removeEvent(document, d.dragObjsFunc, "mousemove");
				d.onDragEnd()
			}, "mouseup")
		}
	})()
};
Drag3.prototype = {
	capture : function () {
		this.canDrag = true
	},
	release : function () {
		this.canDrag = false
	},
	onDragStart : function () {},
	onDrag : function () {},
	onDragEnd : function () {},
	dragObjs : function () {
		e = Core.Events.getEvent();
		for (var a = 0; a < this.movedObjs.length; a++) {
			if (this.isLock) {
				if (e.clientX - this.movedObjs[a].deltaX < this.lockArea.left) {
					this.movedObjs[a].style.left = this.lockArea.left + "px"
				} else {
					if (e.clientX - this.movedObjs[a].deltaX > this.lockArea.right - this.movedObjs[a].offsetWidth) {
						this.movedObjs[a].style.left = this.lockArea.right - this.movedObjs[a].offsetWidth + "px"
					} else {
						this.movedObjs[a].style.left = e.clientX - this.movedObjs[a].deltaX + "px"
					}
				}
				if (e.clientY - this.movedObjs[a].deltaY < this.lockArea.top) {
					this.movedObjs[a].style.top = this.lockArea.top + "px"
				} else {
					if (e.clientY - this.movedObjs[a].deltaY > this.lockArea.bottom - this.movedObjs[a].offsetHeight) {
						this.movedObjs[a].style.top = this.lockArea.bottom - this.movedObjs[a].offsetHeight + "px"
					} else {
						this.movedObjs[a].style.top = e.clientY - this.movedObjs[a].deltaY + "px"
					}
				}
			} else {
				this.movedObjs[a].style.left = e.clientX - this.movedObjs[a].deltaX + "px";
				this.movedObjs[a].style.top = e.clientY - this.movedObjs[a].deltaY + "px"
			}
		}
	},
	normalDrag : function () {
		var a = this;
		e = Core.Events.getEvent();
		for (var b = 0; b < a.movedObjs.length; b++) {
			a.movedObjs[b].deltaX = e.clientX - parseInt(a.movedObjs[b].style.left);
			a.movedObjs[b].deltaY = e.clientY - parseInt(a.movedObjs[b].style.top)
		}
		if (a.canDrag) {
			if ($IE) {
				a.beDragObj.setCapture();
				Core.Events.addEvent(a.beDragObj, a.dragObjsFunc, "mousemove")
			} else {
				Core.Events.addEvent(document, a.dragObjsFunc, "mousemove")
			}
		}
		a.onDragStart()
	},
	borderDrag : function (a, b) {},
	opacityDrag : function (a, b) {}

};
Ui.Drag3 = Drag3;
var Dialog = function (a) {
	var b = this;
	b.entity = null;
	b.ifm = null;
	var c = {
		id : "",
		x : 0,
		y : 0,
		width : 0,
		height : 0,
		isFixed : false,
		layer : new Layer(a),
		template : a,
		canDrag : false,
		dragEntity : null,
		name : "",
		uniqueID : "",
		isShow : false,
		nodes : {},
		focusNode : null,
		displayMode : "normal",
		_modeDisplayRuning : false,
		enabled : true
	};
	this.getProperty = function () {
		return c
	};
	(function d() {
		var a = b.getProperty();
		var c;
		a.uniqueID = a.layer.getProperty().uniqueID;
		a.id = a.uniqueID + "_dialog";
		a.nodes = b.getNodes();
		b.entity = a.layer.entity;
		b.ifm = a.layer.ifm;
		a.width = parseInt(b.entity.style.width);
		if (a.nodes.titleBar) {
			a.dragEntity = new Ui.Drag3(a.nodes.titleBar, b.ifm ? [b.ifm, b.entity] : [b.entity]);
			a.nodes.titleBar.style.cursor = "move";
			Core.Events.addEvent(a.nodes.titleBar, function () {
				return false
			}, "selectstart");
			a.dragEntity.onDrag = function () {
				b.onDrag()
			}
		}
		Core.Events.addEvent(window, function () {
			if (a.isShow && a.isFixed) {
				var c = Core.System.winSize();
				var d = c.width / 2 - b.getWidth() / 2;
				var e = c.height / 2 - b.getHeight() / 2;
				d = d < 0 ? 0 : d;
				e = e < 0 ? 0 : e;
				b.setPosition({
					x : d,
					y : e
				})
			}
		}, "resize")
	})()
};
Dialog.prototype = {
	setPosition : function (a) {
		var b = this.getProperty();
		Core.System.parseParam(b, a);
		this.getProperty().layer.setPosition(a)
	},
	setSize : function (a) {
		var b = this.getProperty();
		Core.System.parseParam(b, a);
		b.layer.setSize(a)
	},
	setFixed : function (a) {
		var b = this.getProperty();
		b.isFixed = a;
		this.getProperty().layer.setFixed(b.isFixed)
	},
	setContent : function (a) {
		var b = this.getProperty();
		this.getProperty().layer.setContent(a)
	},
	setTemplate : function (a) {
		var b = this.getProperty();
		b.template = a;
		b.layer.setTemplate(b.template)
	},
	setDrag : function (a) {
		var b = this.getProperty();
		b.canDrag = a;
		if (b.canDrag) {
			b.dragEntity.capture()
		} else {
			b.dragEntity.release()
		}
	},
	getWidth : function () {
		return this.getProperty().layer.getWidth()
	},
	getHeight : function () {
		return this.getProperty().layer.getHeight()
	},
	getX : function () {
		return this.getProperty().layer.getX()
	},
	getY : function () {
		return this.getProperty().layer.getY()
	},
	show : function (a) {
		var b = this.getProperty();
		var c = this;
		b.isShow = true;
		if (this.ifm) {
			this.ifm.style.display = ""
		}
		this.onShow();
		if (b.displayMode == "normal" || a == "normal") {
			this.entity.style.display = ""
		} else {
			b._modeDisplayRuning = true;
			b.enabled = false;
			this._showWithMode(function () {
				b._modeDisplayRuning = false;
				b.enabled = true;
				if (c.onDisplaied) {
					c.onDisplaied()
				}
			})
		}
	},
	close : function (a) {
		var b = this;
		var c = this.getProperty();
		if (c.displayMode == "normal" || a == "normal") {
			c.isShow = false;
			c.layer.hidden();
			this.destroy();
			this.onClose();
			if (b.onDisplayFinished) {
				b.onDisplayFinished()
			}
		} else {
			if (!c._modeDisplayRuning) {
				c._modeDisplayRuning = true;
				c.enabled = false;
				this._hiddenWithMode(function () {
					c.isShow = false;
					c.layer.hidden();
					c._modeDisplayRuning = false;
					c.enabled = true;
					b.destroy();
					b.onClose();
					if (b.onDisplayFinished) {
						b.onDisplayFinished()
					}
				})
			}
		}
	},
	hidden : function (a) {
		var b = this;
		var c = this.getProperty();
		if (c.displayMode == "normal" || a == "normal") {
			c.isShow = false;
			c.layer.hidden();
			this.onHidden();
			if (b.onDisplayFinished) {
				b.onDisplayFinished()
			}
		} else {
			if (!c._modeDisplayRuning) {
				c._modeDisplayRuning = true;
				c.enabled = false;
				this._hiddenWithMode(function () {
					c.isShow = false;
					c.layer.hidden();
					b.onHidden();
					c._modeDisplayRuning = false;
					c.enabled = true;
					if (b.onDisplayFinished) {
						b.onDisplayFinished()
					}
				})
			}
		}
	},
	_showWithMode : function (a) {
		var b = this.getProperty();
		var c = Core.System.winSize();
		var d = this;
		switch (b.displayMode) {
		case "alpha":
			DialogDisplaySet.alpha.show(this.entity, 20, a);
			break
		}
	},
	_hiddenWithMode : function (a) {
		var b = this.getProperty();
		var c = this;
		var d = Core.System.winSize();
		switch (b.displayMode) {
		case "alpha":
			DialogDisplaySet.alpha.hidden(this.entity, 20, a);
			break
		}
	},
	destroy : function () {
		try {
			if (this.getProperty().nodes.iframe) {
				this.getProperty().nodes.iframe.src = ""
			}
		} catch (a) {}

		this.entity && this.entity.parentNode.removeChild(this.entity);
		this.entity = null;
		if (this.ifm) {
			this.ifm.parentNode.removeChild(this.ifm);
			this.ifm = null
		}
	},
	onShow : function () {},
	onClose : function () {},
	onHidden : function () {},
	onDrag : function () {},
	onDisplaied : function () {},
	onDisplayFinished : function () {},
	setAreaLocked : function (a) {
		var b = this.getProperty();
		b.dragEntity.isLock = a;
		var c = this;
		if (a) {
			c._updateLockArea();
			Core.Events.addEvent(window, function () {
				c._updateLockArea()
			}, "resize")
		}
	},
	_updateLockArea : function () {
		var a = this.getProperty();
		var b = Core.System.winSize();
		if (a.isFixed) {
			if ($IE6) {
				a.dragEntity.lockArea = {
					left : document.documentElement.scrollLeft,
					right : document.documentElement.scrollLeft + b.width,
					top : document.documentElement.scrollTop,
					bottom : document.documentElement.scrollTop + b.height
				};
				Core.Events.addEvent(window, function () {
					a.dragEntity.lockArea = {
						left : document.documentElement.scrollLeft,
						right : document.documentElement.scrollLeft + b.width,
						top : document.documentElement.scrollTop,
						bottom : document.documentElement.scrollTop + b.height
					}
				}, "scroll");
				Core.Events.addEvent(window, function () {
					a.dragEntity.lockArea = {
						left : document.documentElement.scrollLeft,
						right : document.documentElement.scrollLeft + b.width,
						top : document.documentElement.scrollTop,
						bottom : document.documentElement.scrollTop + b.height
					}
				}, "resize")
			} else {
				a.dragEntity.lockArea = {
					left : 0,
					right : b.width,
					top : 0,
					bottom : b.height
				}
			}
		} else {
			a.dragEntity.lockArea = {
				left : 0,
				right : document.documentElement.scrollWidth,
				top : 0,
				bottom : document.documentElement.scrollHeight
			}
		}
	},
	updateFixed : function () {
		this.getProperty().layer.updateFixed()
	},
	getNodes : function (a) {
		return this.getProperty().layer.getNodes(a)
	},
	setFocus : function () {
		var a = this.getProperty();
		if (a.focusNode && a.focusNode.style.display != "none") {
			try {
				a.focusNode.focus()
			} catch (b) {}

		} else {
			if (this.entity.style.display != "none") {
				this.entity.focus()
			}
		}
	},
	getUniqueID : function () {
		return this.getProperty().layer.getUniqueID()
	}
};
var DialogManager = {
	dialogs : [],
	activeDialog : {},
	backShadow : null,
	create : function (a, b) {
		var c = this;
		var d = new Dialog(a);
		this.dialogs.push(d);
		this.activeDialog = d;
		d.name = b || d.getUniqueID();
		d.entity.style.zIndex = 20001;
		d.onDrag = function () {
			if ($IE6) {
				if (this.getProperty().isFixed) {
					this.setPosition({
						x : parseInt(this.entity.style.left) - document.documentElement.scrollLeft,
						y : parseInt(this.entity.style.top) - document.documentElement.scrollTop
					})
				}
			} else {
				if (this.getProperty().isFixed) {
					this.setPosition({
						x : parseInt(this.entity.style.left),
						y : parseInt(this.entity.style.top)
					})
				}
			}
		};
		d.onClose = function () {
			c.removeDialog(this.name);
			c.updateActiveDialog();
			c.updateShadow();
			if (c.activeDialog) {
				c.activeDialog.setFocus()
			}
		};
		d.onHidden = function () {
			this.isHidden = true;
			if (this == c.activeDialog) {
				c.activeDialog = null
			}
			c.updateActiveDialog();
			c.updateShadow();
			if (c.activeDialog) {
				c.activeDialog.setFocus()
			}
		};
		d.onShow = function () {
			if (this.isHidden) {
				this.isHidden = false;
				var a,
				b = c.dialogs.length;
				for (a = 0; a < b; a++) {
					if (c.dialogs[a] == this) {
						document.body.insertBefore(c.dialogs[a].entity, document.body.firstChild);
						c.dialogs.push(c.dialogs[a]);
						c.dialogs.splice(a, 1)
					}
				}
				c.activeDialog = this;
				c.backShadow.show();
				c.updateShadow()
			}
		};
		if (this.backShadow.isShow) {
			this.updateShadow()
		} else {
			this.backShadow.show()
		}
		d.hidden();
		return d
	},
	getDialog : function (a) {
		var b = 0,
		c = this.dialogs.length;
		for (b = 0; b < c; b++) {
			if (this.dialogs[b].name == a) {
				return this.dialogs[b]
			}
		}
	},
	removeDialog : function (a) {
		var b = 0,
		c = this.dialogs.length;
		for (b = c - 1; b >= 0; b--) {
			if (this.dialogs[b].name == a) {
				this.dialogs.splice(b, 1);
				this.activeDialog = this.dialogs[this.dialogs.length - 1];
				break
			}
		}
	},
	updateActiveDialog : function () {
		var a,
		b = this.dialogs.length;
		for (a = b - 1; a >= 0; a--) {
			if (!this.dialogs[a].isHidden) {
				this.activeDialog = this.dialogs[a];
				break
			}
		}
	},
	updateShadow : function () {
		if (this.activeDialog && !this.activeDialog.isHidden) {
			this.backShadow.insertBefore(this.activeDialog.entity);
			this.activeDialog.updateFixed()
		} else {
			this.backShadow.hidden()
		}
	},
	close : function (a) {
		if (!a) {
			if (this.activeDialog) {
				this.activeDialog.close()
			}
			return
		}
		var b,
		c = this.dialogs.length;
		for (b = c - 1; b >= 0; b--) {
			if (this.dialogs[b].name == a) {
				this.dialogs[b].close();
				break
			}
		}
	}
};
Core.System.pageSize = function (a) {
	if (a) {
		target = a.document
	} else {
		target = document
	}
	var b = target.compatMode == "CSS1Compat" ? target.documentElement : target.body;
	var c,
	d;
	if (window.innerHeight && window.scrollMaxY) {
		c = b.scrollWidth;
		d = window.innerHeight + window.scrollMaxY
	} else {
		if (b.scrollHeight > b.offsetHeight) {
			c = b.scrollWidth;
			d = b.scrollHeight
		} else {
			c = b.offsetWidth;
			d = b.offsetHeight
		}
	}
	var e = Core.System.winSize(a);
	if (d < e.height) {
		pageHeight = e.height
	} else {
		pageHeight = d
	}
	if (c < e.width) {
		pageWidth = e.width
	} else {
		pageWidth = c
	}
	return [pageWidth, pageHeight, e.width, e.height]
};
var BackShadow = function (a) {
	this.entity = null;
	this.isShow = false;
	this._ie6Fixed = function () {
		if (b.entity) {
			b.entity.style.top = document.documentElement.scrollTop + "px";
			b.entity.style.left = document.documentElement.scrollLeft + "px";
			if (b.ifm) {
				b.ifm.style.top = b.entity.style.top;
				b.ifm.style.left = b.entity.style.left
			}
			b.updateSize()
		}
	};
	var b = this;
	(function c() {
		b.entity = $C("div");
		b.entity.style.position = "absolute";
		b.entity.style.width = getWidth() + "px";
		b.entity.style.height = getHeight() + "px";
		b.entity.style.left = "0px";
		b.entity.style.top = "0px";
		b.entity.style.zIndex = 2e4;
		b.entity.style.backgroundColor = "black";
		document.body.insertBefore(b.entity, document.body.firstChild);
		b._setOpacity(b.entity, isNaN(a) ? .5 : a);
		if ($IE6) {
			b.entity.style.top = document.documentElement.scrollTop + "px";
			b.addIframe()
		}
		Core.Events.addEvent(window, function () {
			if (b.entity) {
				if ($IE6 && b.isShow) {
					document.documentElement.scrollLeft = 0;
					b._ie6Fixed()
				}
				setTimeout(function () {
					b.updateSize()
				}, 1)
			}
		}, "resize");
		b.hidden()
	})()
};
BackShadow.prototype = {
	show : function () {
		this.entity.style.display = "";
		if (this.ifm) {
			this.ifm.style.display = ""
		}
		this.isShow = true;
		this.onShow()
	},
	hidden : function () {
		this.entity.style.display = "none";
		if (this.ifm) {
			this.ifm.style.display = "none"
		}
		this.isShow = false;
		this.onHidden()
	},
	close : function () {
		this.hidden();
		this.destroy()
	},
	destroy : function () {
		Core.Events.removeEvent(window, this._ie6Fixed, "scroll");
		this.entity.parentNode.removeChild(this.entity);
		this.entity = null;
		if (this.ifm) {
			this.ifm.parentNode.removeChild(this.ifm);
			this.ifm = null
		}
	},
	addIframe : function () {
		this.ifm = $C("iframe");
		this._setOpacity(this.ifm, 0);
		this.ifm.style.position = "absolute";
		this.ifm.style.zIndex = this.entity.style.zIndex;
		this.ifm.style.left = this.entity.style.left;
		this.ifm.style.top = this.entity.style.top;
		this.ifm.style.width = this.entity.style.width;
		this.ifm.style.height = this.entity.style.height;
		document.body.insertBefore(this.ifm, this.entity)
	},
	insertBefore : function (a) {
		document.body.insertBefore(this.entity, a);
		if (this.ifm) {
			document.body.insertBefore(this.ifm, this.entity)
		}
	},
	updateSize : function () {
		this.entity.style.width = this.getAreaWidth() + "px";
		this.entity.style.height = this.getAreaHeight() + "px";
		if (this.ifm) {
			this.ifm.style.width = this.getAreaWidth() + "px";
			this.ifm.style.height = this.getAreaHeight() + "px"
		}
	},
	getAreaHeight : function () {
		return Core.System.pageSize()[1]
	},
	getAreaWidth : function () {
		return Core.System.pageSize()[0]
	},
	setFixed : function (a) {
		if ($IE6) {
			var b = this;
			if (a) {
				b._ie6Fixed();
				Core.Events.addEvent(window, b._ie6Fixed, "scroll")
			} else {
				Core.Events.removeEvent(window, b._ie6Fixed, "scroll")
			}
		} else {
			this.entity.style.position = a ? "fixed" : "absolute"
		}
	},
	_setOpacity : function (a, b) {
		if ($IE) {
			a.style.filter = "alpha(opacity=" + b * 100 + ")"
		} else {
			a.style.opacity = b
		}
	},
	onShow : function () {},
	onHidden : function () {}

};
(function () {
	var a = function (a, b) {
		this.template = b || {};
		DialogManager.backShadow = a
	};
	a.prototype = {
		iconSet : {
			"01" : {
				"class" : "SG_icon SG_icon201",
				alt : "\u8B66\u544A"
			},
			"02" : {
				"class" : "SG_icon SG_icon202",
				alt : "\u5931\u8D25"
			},
			"03" : {
				"class" : "SG_icon SG_icon203",
				alt : "\u6210\u529F"
			},
			"04" : {
				"class" : "SG_icon SG_icon204",
				alt : "\u8BE2\u95EE"
			}
		},
		alert : function (a, b, c) {
			b = b || {};
			var d = DialogManager.create(this.template.alert || LayerTemplate.alert, c);
			var e = Core.System.winSize();
			var f = d.getNodes();
			d.onDisplaied = b.funcDisplaied;
			d.onDisplayFinished = b.funcDisplayFinished;
			d.setSize({
				width : b.width,
				height : b.height
			});
			d.setFixed(true);
			this._setDialogMiddle(d);
			d.show();
			d.setAreaLocked(true);
			f.linkOk.focus();
			f.text.innerHTML = a;
			if (f.titleName) {
				f.titleName.innerHTML = b.title || "\u63D0\u793A"
			}
			if (f.icon) {
				f.icon.className = b.icon ? this.iconSet[b.icon]["class"] : this.iconSet["01"]["class"];
				f.icon.alt = b.icon ? this.iconSet[b.icon]["alt"] : this.iconSet["01"]["alt"]
			}
			f.ok.innerHTML = b.textOk || "\u786E\u5B9A";
			if (f.subText) {
				f.subText.innerHTML = b.subText || ""
			}
			d.getProperty().focusNode = f.linkOk;
			Core.Events.addEvent(f.btnOk, function () {
				if (b.funcOk && d.getProperty().enabled) {
					b.funcOk();
					Core.Events.stopEvent()
				}
				d.close();
				return false
			}, "click");
			Core.Events.addEvent(f.linkOk, function () {
				var a = Core.Events.getEvent();
				if (a.keyCode == "13") {
					if (b.funcOk && d.getProperty().enabled) {
						b.funcOk()
					}
					d.close()
				}
			}, "keydown");
			Core.Events.addEvent(f.btnClose, function () {
				if (b.funcClose && d.getProperty().enabled) {
					b.funcClose()
				}
				d.close()
			}, "click");
			Core.Events.addEvent(f.btnClose, function () {
				var a = Core.Events.getEvent();
				a.cancelBubble = true
			}, "mousedown")
		},
		getDialog : function (a) {
			return DialogManager.getDialog(a)
		},
		close : function (a) {
			DialogManager.close(a)
		},
		_setDialogMiddle : function (a) {
			var b = Core.System.winSize();
			var c = a.getNodes();
			var d,
			e;
			var f = a.entity.style.display;
			a.setPosition({
				x : -1e4
			});
			a.entity.style.display = "";
			var g = c.titleBar ? c.titleBar.offsetHeight : 0;
			var h = b.height - c.content.offsetHeight - g;
			var i = (Math.sqrt(5) - 1) / 2;
			var j = 1;
			var k = h * i / (i + j);
			d = b.width / 2 - c.content.offsetWidth / 2;
			d = d < 0 ? 0 : d;
			e = k < 0 ? 0 : k;
			if (!a.getProperty().isFixed) {
				d = d + document.documentElement.scrollLeft;
				e = e + document.documentElement.scrollTop
			}
			a.entity.style.display = f;
			a.setPosition({
				x : d,
				y : e
			})
		}
	};
	Sina.Ui.WindowDialog = a
})();
var DialogTemplate = {};
DialogTemplate.alert = ['<table id="#{entity}" class="CP_w" style="position: absolute; left: 362px; top: 140px;">', '<thead style="cursor: move;" id="#{titleBar}">', "<tr>", "<th>", '<strong id="#{titleName}">\u63D0\u793A</strong>', "<cite>", '<a target="_blank" class="CP_w_help" href="javascript:;" style="display: none;">\u5E2E\u52A9</a>', '<a title="\u5173\u95ED" id="#{btnClose}" class="CP_w_shut" href="javascript:;" style="display: block;">\u5173\u95ED</a>', "</cite>", "</th>", "</tr>", "</thead>", "<tbody>", "<tr>", '<td style="vertical-align: top;">', '<div id="#{content}" class="CP_layercon1">', '<div class="CP_prompt">', '<img id="#{icon}" align="absmiddle" title="" alt="" src="http://simg.sinajs.cn/common/images/CP_ib.gif" class="CP_ib CP_ib_fail" />', '<table class="CP_w_ttl">', "<tbody>", "<tr>", '<td id="#{text}"></td>', "</tr>", "</tbody>", "</table>", '<div id="#{subText}" class="CP_w_cnt"></div>', '<p class="CP_w_btns">', '<a id="#{linkOk}" class="CP_a_btn2" href="javascript:void(0)"><cite id="#{btnOk}"><span id="#{ok}"></span></cite></a>', "</p>", "</div>", "</div>", "</td>", "</tr>", "</tbody>", "</table>"].join("");
DialogTemplate.confirm = "";
DialogTemplate.iframe = "";
DialogTemplate.customs = "";
var iconSet = {
	"01" : {
		"class" : "CP_ib CP_ib_fail",
		alt : "\u8B66\u544A"
	},
	"02" : {
		"class" : "SG_icon SG_icon202",
		alt : "\u5931\u8D25"
	},
	"03" : {
		"class" : "SG_icon SG_icon203",
		alt : "\u6210\u529F"
	},
	"04" : {
		"class" : "SG_icon SG_icon204",
		alt : "\u8BE2\u95EE"
	}
};
var dialogBackShadow;
var winDialog = {}, _winDialog;
winDialog.alert = function (a, b, c) {
	if (!_winDialog) {
		initDialog();
		_winDialog.alert(a, b, c)
	} else {
		_winDialog.alert(a, b, c)
	}
};
Core.System.getScrollPos = function (a) {
	a = a || document;
	var b = a.documentElement;
	var c = a.body;
	return [Math.max(b.scrollTop, c.scrollTop), Math.max(b.scrollLeft, c.scrollLeft), Math.max(b.scrollWidth, c.scrollWidth), Math.max(b.scrollHeight, c.scrollHeight)]
};
Core.Dom.getXY = function (a) {
	if ((a.parentNode == null || a.offsetParent == null || Core.Dom.getStyle(a, "display") == "none") && a != document.body) {
		return false
	}
	var b = null;
	var c = [];
	var d;
	var e = a.ownerDocument;
	d = a.getBoundingClientRect();
	var f = Core.System.getScrollPos(a.ownerDocument);
	return [d.left + f[1], d.top + f[0]];
	b = a.parentNode;
	while (b.tagName && !/^body|html$/i.test(b.tagName)) {
		if (Core.Dom.getStyle(b, "display").search(/^inline|table-row.*$/i)) {
			c[0] -= b.scrollLeft;
			c[1] -= b.scrollTop
		}
		b = b.parentNode
	}
	return c
};
if (!$IE) {
	Core.Dom.getXY = function (a) {
		if ((a.parentNode == null || a.offsetParent == null || Core.Dom.getStyle(a, "display") == "none") && a != document.body) {
			return false
		}
		var b = null;
		var c = [];
		var d;
		var e = a.ownerDocument;
		c = [a.offsetLeft, a.offsetTop];
		b = a.offsetParent;
		var f = Core.Dom.getStyle(a, "position") == "absolute";
		if (b != a) {
			while (b) {
				c[0] += b.offsetLeft;
				c[1] += b.offsetTop;
				if ($SAFARI && !f && Core.Dom.getStyle(b, "position") == "absolute") {
					f = true
				}
				b = b.offsetParent
			}
		}
		if ($SAFARI && f) {
			c[0] -= a.ownerDocument.body.offsetLeft;
			c[1] -= a.ownerDocument.body.offsetTop
		}
		b = a.parentNode;
		while (b.tagName && !/^body|html$/i.test(b.tagName)) {
			if (Core.Dom.getStyle(b, "display").search(/^inline|table-row.*$/i)) {
				c[0] -= b.scrollLeft;
				c[1] -= b.scrollTop
			}
			b = b.parentNode
		}
		return c
	}
}
(function () {
	var a;
	var b = parseInt(Math.random() * 100);
	var c = [];
	var d = -1;
	var e = "";
	var f = "#userPosition {padding: 0;margin: 0;border: 0;position: absolute;z-index: 999;}\t\t\t\t#sinaNote {position: absolute;z-index: 999999;width: auto;overflow: hidden;padding: 0;margin: 0;\t\t\t\tborder: 1px solid #FFA13B; background: #ffffff;text-align:left;   filter:alpha(opacity=85);opacity:0.85;}\t\t\t\t#sinaNote li {font-size: 12px;list-style: none;margin: 0 1px;height: 20px;padding: 0 5px;clear: both;\t\t\t\tline-height: 20px;cursor: pointer;color: #999999;}\t\t\t\t#sinaNote li.note {text-align: left;color: #999999;}";
	var g = window;
	var h = {
		overfcolor : "#999",
		overbgcolor : "#e8f4fc",
		outfcolor : "#000000",
		outbgcolor : "",
		menuStatus : {
			"sina.com" : true,
			"sina.cn" : true,
			"vip.sina.com" : true,
			"qq.com" : true,
			"163.com" : true,
			"126.com" : true,
			"hotmail.com" : true,
			"yahoo.com.cn" : true,
			"gmail.com" : true
		}
	};
	h.createNode = function () {
		var a = g.document;
		var b = a.createElement("div");
		b.innerHTML = '<ul id="sinaNote" style="display:none;"></ul>';
		var c = a.createElement("style");
		c.setAttribute("type", "text/css");
		try {
			if ($IE) {
				c.styleSheet.cssText = f
			} else {
				if (/chrome|safari/.test(navigator.userAgent.toLowerCase())) {
					c.textContent = f
				} else {
					c.innerHTML = f
				}
			}
		} catch (d) {}

		var e = a.createElement("div");
		e.appendChild(b);
		e.appendChild(c);
		a.body.insertBefore(e, document.body.firstChild)
	};
	h.arrowKey = function (a) {
		if (a == 38) {
			if (d <= 0) {
				d = c.length
			}
			d--;
			h.selectLi(d)
		}
		if (a == 40) {
			if (d >= c.length - 1) {
				d = -1
			}
			d++;
			h.selectLi(d)
		}
	};
	h.showList = function (a) {
		e = "";
		var f = Core.Events.getEvent().keyCode;
		if (f == 38 || f == 40) {
			h.arrowKey(f);
			return false
		}
		if (f == 13) {
			this.hideList();
			h.afterSelect();
			return false
		}
		if (!$E("sinaNote")) {
			h.createNode()
		}
		var i = $E(a).value;
		var j = {};
		var k = i.indexOf("@");
		var l = "";
		var m = "";
		if (k > -1) {
			l = i.substr(k + 1);
			m = i.substr(0, k)
		}
		c = [];
		d = 0;
		c[c.length] = "sinaNote_MenuItem_Title_" + b;
		for (var n in this.menuStatus) {
			this.menuStatus[n] = true;
			if (l != "" && l != n.substr(0, l.length)) {
				this.menuStatus[n] = false
			} else {
				c[c.length] = "sinaNote_MenuItem_" + n + "_" + b
			}
		}
		var o = '<li class="note">\u8BF7\u9009\u62E9\u767B\u5F55\u7C7B\u578B</li>';
		o += '<li id="sinaNote_MenuItem_Title_' + b + '">' + i + "</li>";
		var p;
		for (var q in this.menuStatus) {
			if (this.menuStatus[q] == true) {
				if (m == "") {
					p = i + "@" + q
				} else {
					p = m + "@" + q
				}
				o += '<li id="sinaNote_MenuItem_' + q + "_" + b + '" title="' + p + '">' + p + "</li>"
			}
		}
		$E("sinaNote").innerHTML = o;
		for (var r = 0; r < i.length; r++) {
			if (i.charCodeAt(r) < 160) {
				$E("sinaNote").style.display = "";
				this.selectList(a)
			} else {
				this.hideList()
			}
		}
		var s = $E(a);
		var t = $E("sinaNote");
		var u = 0;
		var v = 0;
		var w;
		if (g != window) {
			w = Core.Dom.getXY(window.frameElement);
			u = w[0];
			v = w[1]
		}
		var x = s.offsetWidth;
		if (x < 185) {
			x = 185
		}
		t.style.width = x - 2 + "px";
		var y = Core.Dom.getXY(s);
		t.style.left = y[0] + ($IE && document.compatMode == "CSS1Compat" ? -2 : 0) + u + "px";
		t.style.top = y[1] + s.offsetHeight + ($IE && document.compatMode == "CSS1Compat" ? -3 : -1) + v + "px"
	};
	h.selectList = function (a) {
		var b = $E("sinaNote").getElementsByTagName("li");
		for (var c = 1; c < b.length; c++) {
			b[1].style.backgroundColor = h.overbgcolor;
			b[1].style.color = h.outfcolor;
			b[c].onmousedown = function () {
				var b = this.innerHTML;
				if (b.indexOf("\u975E\u65B0\u6D6A\u90AE\u7BB1") > -1) {
					var c = b.split("@");
					$E(a).value = c[0]
				} else {
					$E(a).value = this.innerHTML
				}
				if (Core.Events.getEvent() != null) {
					Core.Events.stopEvent()
				}
				h.afterSelect()
			};
			b[c].onmouseover = function () {
				if (c != 1) {
					b[1].style.backgroundColor = h.outbgcolor;
					b[1].style.color = h.overfcolor
				}
				this.style.backgroundColor = h.overbgcolor;
				this.style.color = h.outfcolor
			};
			b[c].onmouseout = function () {
				this.style.backgroundColor = h.outbgcolor;
				this.style.color = h.overfcolor;
				b[1].style.backgroundColor = h.overbgcolor;
				b[1].style.color = h.outfcolor
			}
		}
	};
	h.selectLi = function (a) {
		var d;
		$E("sinaNote_MenuItem_Title_" + b).style.backgroundColor = h.outbgcolor;
		$E("sinaNote_MenuItem_Title_" + b).style.color = h.overfcolor;
		for (var f = 0; f < c.length; f++) {
			d = $E(c[f]);
			d.style.backgroundColor = h.outbgcolor;
			d.style.color = h.overfcolor
		}
		$E(c[a]).style.backgroundColor = h.overbgcolor;
		$E(c[a]).style.color = h.outfcolor;
		e = $E(c[a]).innerHTML
	};
	h.hideList = function () {
		if (!$E("sinaNote")) {
			h.createNode()
		}
		$E("sinaNote").style.display = "none"
	};
	h.init = function (a, b, c, d, f) {
		d = d || window;
		this.afterSelect = f || function () {};
		if (d.document.body == null) {
			setTimeout(Core.Function.bind3(function () {
					this.init(a, b, c, d)
				}, this), 100)
		}
		for (var i in b) {
			this[i] = b[i]
		}
		Core.Events.addEvent(document, h.hideList, "click");
		Core.Events.addEvent(a, h.hideList, "blur");
		Core.Events.addEvent(a, Core.Function.bind3(h.showList, this, [a]), "keyup");
		Core.Events.addEvent(a, function (b) {
			var d = Core.Events.getEvent().keyCode;
			var f;
			if (d == 13 || d == 9) {
				if (e != "") {
					var g = e;
					if (g.indexOf("\u975E\u65B0\u6D6A\u90AE\u7BB1") > -1) {
						var h = g.split("@");
						a.value = h[0] + "@";
						f = false
					} else {
						a.value = e;
						f = true
					}
				}
				if (f) {
					if (c != null) {
						c.focus()
					}
				} else {
					if (a) {
						a.focus()
					}
				}
			}
		}, "keydown");
		if (d) {
			g = d
		}
	};
	Lib.passcardOBJ = h
})();

var msnRefreshTimer = 0;
var getHeight = function () {
	var a = document,
	b = a.body,
	c = a.documentElement,
	d = a.compatMode == "BackCompat" ? b : a.documentElement;
	return Math.max(c.scrollHeight, b.scrollHeight, d.clientHeight)
};
var getWidth = function () {
	var a = document,
	b = a.body,
	c = a.documentElement,
	d = a.compatMode == "BackCompat" ? b : a.documentElement;
	return Math.max(c.scrollWidth, b.scrollWidth, d.clientWidth)
};
var setPos = function (a) {
	var b = parseInt(a.offsetWidth, 10),
	c = parseInt(a.offsetHeight, 10);
	a.style.marginLeft = b / 2 * -1 + "px";
	a.style.marginTop = c / 2 * -1 + "px";
	if ($IE6) {
		Core.Dom.setStyle(a, "position", "absolute");
		a.style.marginTop = "0px";
		a.style.top = (document.documentElement.clientHeight || document.body.clientHeight) / 2 - c / 2 + "px"
	}
};
var $blogIndexLoginStrip = function (a) {
	function r() {
		Utils.Io.JsLoad.request("http://i.sso.sina.com.cn/js/ssologin.js", {
			onComplete : function () {
				q();
				sinaSSOController.autoLogin(function (b) {
					if (b) {
						//g(b.uid);
						a.autoCallback(b);
					} else {
						e();
						i()
					}
				})
			},
			onException : function () {
				while (s != 0) {
					r();
					s--
				}
			}
		})
	}
	function q() {
		f();
		C.onclick = j;
		C.onkeydown = S.onkeydown = o;
		v.onclick = function () {
			c();
			(new Interface("http://control.blog.sina.com.cn/blog_rebuild/msn/api/msnLoginOut.php", "ijax")).request({
				onSuccess : function (a) {
					sinaSSOController.logout()
				},
				onError : function (a) {
					sinaSSOController.logout()
				},
				onFail : function (a) {
					sinaSSOController.logout()
				}
			});
			return false
		};
		R.onfocus = function () {
			R.select();
			k(y, "selected")
		};
		S.onfocus = function () {
			S.select();
			k(z, "selected")
		};
		R.onblur = function () {
			l(y, "selected")
		};
		S.onblur = function () {
			l(z, "selected")
		};
		if (/webkit/.test(navigator.userAgent.toLowerCase())) {
			p()
		}
	}
	function p() {
		S.onmouseup = R.onmouseup = function () {
			return false
		}
	}
	function o(a) {
		var b;
		a = a || window.event;
		b = a.keyCode || a.which;
		if (b == 13) {
			j()
		}
	}
	function n(a) {
		var b;
		var c = $C("div");
		c.innerHTML = a;
		b = c.childNodes;
		if (b.length > 1) {
			return c
		} else {
			return b[0]
		}
	}
	function m(a, b) {
		if (!a) {
			return false
		}
		var c = new RegExp("(?: +|^)" + b + "(?=( |$))", "ig");
		return c.test(a.className)
	}
	function l(a, b) {
		if (!a) {
			return false
		}
		var c = new RegExp("(?: +|^)" + b + "(?=( |$))", "ig");
		a.className = Core.String.trim(a.className.replace(c, ""))
	}
	function k(a, b) {
		if (!a) {
			return false
		}
		if (!m(a, b)) {
			a.className = Core.String.trim(a.className.concat(" " + b))
		}
	}
	function j() {
		var a = 0;
		//添加 loginReq的状态判断，请求中true，将不再继续下次请求。by jilong5
		if(__customLoginIsReq){
			return ;
		}
		__customLoginIsReq = true;
		
		F = G = false;
		if (!R.value) {
			h("\u8BF7\u8F93\u5165\u767B\u5F55\u540D");
			return false
		}
		if (!S.value) {
			h("\u8BF7\u8F93\u5165\u5BC6\u7801");
			return false
		}
		c();
		if (typeof sinaSSOController != "undefined" && typeof sinaSSOController.loginExtraQuery != "undefined") {
			if (typeof sinaSSOController.loginExtraQuery.door != "undefined") {
				var b = $E("vcodeInput").value;
				sinaSSOController.loginExtraQuery.door = b || 1
			}
		}
		if (B.checked) {
			a = 30
		}
		sinaSSOController.login(R.value, S.value, a);
		return false
	}
	function i() {}

	function h(a) {
		A.innerHTML = a;
		A.style.display = ""
	}
	function g(c) {
		G = true;
		var d;
		var e;
		var f = document.cookie.match(/SUP=[^;]+/);
		if (f != null) {
			f = decodeURIComponent(f[0])
		}
		e = f.match(/uid=([^&]+)/)[1];
		d = f.match(/nick=([^&]+)/);
		if (d != null) {
			d = decodeURIComponent(d[1]);
			if (Core.String.byteLength(d) > a.nickLen) {
				d = Core.String.shorten(d, a.nickLen - 2)
			}
			u.innerHTML = d;
			u.href = D + e + "";
			F = true;
			b()
		}
		w.href = D + e + ""
	}
	function f() {}

	function e() {
		t.style.display = "none";
		x.style.display = ""
	}
	function d() {
		t.style.display = "";
		x.style.display = "none"
	}
	function c() {}

	function b() {
		if (F && G) {
			d()
		}
	}
	var s = 3;
	a = a || {};
	a.suggestColor = a.suggestColor || {};
	a = {
		nickLen : a.nickLen || 16,
		sucCallback : a.sucCallback || function () {},
		autoCallback : a.autoCallback || function () {},
		logoutCallback : a.logoutCallback || function () {},
		customFunc : a.customFunc || "",
		suggestColor : {
			border : a.suggestColor.border || "#CCCCCC",
			msover : a.suggestColor.msover || "#E8F4FC"
		}
	};
	window.sinaSSOConfig = window.sinaSSOConfig || {};
	window.sinaSSOConfig.from = "referer:" + location.hostname + location.pathname;
	window.sinaSSOConfig.entry = "boke";
	window.sinaSSOConfig.setDomain = true;
	window.sinaSSOConfig.customLoginCallBack = function (A) {
		//添加 loginReq的状态判断，请求中true，将不再继续下次请求。by jilong5
		__customLoginIsReq = false;
		
		if (A.result) {
			sinaSSOController.loginExtraQuery = {};
			if ($E("vcodeMask"))
				$E("vcodeMask").style.display = "none";
			if ($E("vcodeLayer"))
				$E("vcodeLayer").style.display = "none";
			if ($E("lockLayer"))
				$E("lockLayer").style.display = "none";
			var b = A.userinfo.uniqueid;
			//g(b);
			a.sucCallback(A.userinfo);
		} else {
			var c = '<div id="vcodeMask" style="position: absolute; width: 100% height: 100%; left: 0px; top: 0px; z-index: 20000; background-color: black; filter:alpha(opacity=40); opacity: 0.4;"></div>';
			e();
			var d = "";
			switch (A.errno) {
			case "5":
				d = A.reason;
				h(d);
				S.value = "";
				break;
			case "2089":
				// 因微博客户端开启登录保护而导致的登录失败的提示
				d = A.reason;
				h(d);
				S.value = "";
				break;
			case "2091":
				d = A.reason;
				h(d);
				S.value = "";
				break;
			case "80":
				d = A.reason;
				h(d);
				S.value = "";
				break;
			case "101":
				d = "\u767B\u5F55\u540D\u548C\u5BC6\u7801\u4E0D\u5339\u914D\uFF0C\u8BF7\u91CD\u8BD5\u3002";
				h(d);
				S.value = "";
				break;
			case "4010":
				d = "\u8D26\u6237\u5C1A\u672A\u786E\u8BA4\uFF0C\u8BF7\u5148\u5728\u90AE\u7BB1\u786E\u8BA4";
				h(d);
				S.value = "";
				break;
			case "4057":
				d = A.reason;
				h(d);
				S.value = "";
				break;
			case "4049":
				sinaSSOController.loginExtraQuery = {
					door : 0
				};
				var f = '<table class="CP_w" id="vcodeLayer" style="position:fixed;left:50%;top:50%;z-index:20001">' + "<thead>" + "<tr>" + '<th><strong>\u63D0\u793A</strong><cite><a style="display:none;" target="_blank" class="CP_w_help" href="#">\u5E2E\u52A9</a><a title="\u5173\u95ED" class="CP_w_shut" href="#" id="vcodeClose">\u5173\u95ED</a></cite></th>' + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + '<td style="vertical-align:top;">' + '<div class="CP_layercon1">' + '<div class="verifyPrompt">' + "<p>\u4E3A\u4E86\u4FDD\u62A4\u4F60\u7684\u8D26\u53F7\u5B89\u5168\uFF0C\u8BF7\u8F93\u5165\u9A8C\u8BC1\u7801\u8FDB\u884C\u767B\u5F55</p>" + '<div class="row1"><strong>\u9A8C\u8BC1\u7801\uFF1A</strong><input type="text" class="fm1" id="vcodeInput" maxlength="5" /> <img id="vcodeImg" width="100" maxlength="5" align="absmiddle" src="http://login.sina.com.cn/cgi/pin.php?r=' + parseInt(Math.random() * 1e4).toString() + (new Date).getTime().toString() + '&s=0" /> <a href="#" id="vcodeReload">\u6362\u4E00\u6362</a></div>' + '<p class="CP_w_btns"><a class="CP_a_btn2" href="#" id="vcodeLogin"><cite><span>\u767B\u5F55</span></cite></a><span class="ErrTips" id="vcodeErrTips" style="display:none"></span></p>' + "</div>" + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>";
				if (!$E("vcodeMask"))
					Core.Dom.insertHTML(document.body, c, "beforeEnd");
				else
					$E("vcodeMask").style.display = "";
				if ($E("lockLayer"))
					$E("lockLayer").style.display = "none";
				if (!$E("vcodeLayer"))
					Core.Dom.insertHTML(document.body, f, "beforeEnd");
				else
					$E("vcodeLayer").style.display = "";
				$E("vcodeErrTips").innerHTML = "";
				$E("vcodeInput").focus();
				$E("vcodeInput").value = "";
				$E("vcodeImg").src = "http://login.sina.com.cn/cgi/pin.php?r=" + parseInt(Math.random() * 1e4).toString() + (new Date).getTime().toString() + "&s=0";
				$E("vcodeMask").style.height = getHeight() + "px";
				$E("vcodeMask").style.width = getWidth() + "px";
				setPos($E("vcodeLayer"));
				$E("vcodeClose").onclick = function () {
					$E("vcodeMask").style.display = "none";
					$E("vcodeLayer").style.display = "none";
					sinaSSOController.loginExtraQuery = {};
					return false
				};
				$E("vcodeInput").onkeyup = function (a) {
					var a = a || window.event;
					if (a.keyCode === 13) {
						if ($E("vcodeInput").value !== "") {
							Core.Events.fireEvent($E("loginButton"), "click")
						}
					}
					return false
				};
				$E("vcodeReload").onclick = function () {
					$E("vcodeImg").src = "http://login.sina.com.cn/cgi/pin.php?r=" + parseInt(Math.random() * 1e4).toString() + (new Date).getTime().toString() + "&s=0";
					$E("vcodeErrTips").innerHTML = "";
					$E("vcodeInput").value = "";
					return false
				};
				$E("vcodeLogin").onclick = function () {
					Core.Events.fireEvent($E("loginButton"), "click");
					return false
				};
				break;
			case "2070":
				$E("vcodeImg").src = "http://login.sina.com.cn/cgi/pin.php?r=" + parseInt(Math.random() * 1e4).toString() + (new Date).getTime().toString() + "&s=0";
				$E("vcodeErrTips").style.display = "";
				$E("vcodeErrTips").innerHTML = A.reason;
				break;
			case "4047":
				var f = '<table class="CP_w" id="lockLayer" style="position:fixed;left:50%;top:50%;z-index:20001">' + "<thead>" + "<tr>" + '<th><strong>\u63D0\u793A</strong><cite><a style="display:none;" target="_blank" class="CP_w_help" href="#">\u5E2E\u52A9</a><a title="\u5173\u95ED" class="CP_w_shut" href="#" id="lockClose">\u5173\u95ED</a></cite></th>' + "</tr>" + "</thead>" + "<tbody>" + "<tr>" + '<td style="vertical-align:top;">' + '<div class="CP_layercon1">' + '<div class="verifyPrompt">' + '<div class="lockedTips" id="lockErrTips">' + a.reason + "</div>" + '<p class="CP_w_btns"><a class="CP_a_btn2" href="#" id="lockBtn"><cite><span>\u786E\u5B9A</span></cite></a></p>' + "</div>" + "</div>" + "</td>" + "</tr>" + "</tbody>" + "</table>";
				if (!$E("vcodeMask"))
					Core.Dom.insertHTML(document.body, c, "beforeEnd");
				else
					$E("vcodeMask").style.display = "";
				if ($E("vcodeLayer"))
					$E("vcodeLayer").style.display = "none";
				if (!$E("lockLayer"))
					Core.Dom.insertHTML(document.body, f, "beforeEnd");
				else
					$E("lockLayer").style.display = "";
				$E("vcodeMask").style.height = getHeight() + "px";
				$E("vcodeMask").style.width = getWidth() + "px";
				setPos($E("lockLayer"));
				$E("lockClose").onclick = function () {
					$E("vcodeMask").style.display = "none";
					$E("lockLayer").style.display = "none";
					return false
				};
				$E("lockBtn").onclick = function () {
					$E("vcodeMask").style.display = "none";
					$E("lockLayer").style.display = "none";
					return false
				};
				break;
			default:
				d = "\u767B\u5F55\u5931\u8D25\uFF0C\u8BF7\u91CD\u8BD5\u3002";
				h(d);
				S.value = "";
				break
			}
		}
	};
	window.sinaSSOConfig.customLogoutCallBack = function (b) {
		e();
		S.value = "";
		i();
		//R.focus();
		a.logoutCallback(b);
	};
	var t = $E("loginDone");
	var u = $E("userNickName");
	var v = $E("logout");
	var w = $E("blogEntrance");
	var x = $E("notLogin");
	var y = $E("loginName");
	var z = $E("loginPass");
	var A = $E("loginError");
	var B = $E("loginSave");
	var C = $E("loginButton");
	var D = "http://blog.sina.com.cn/u/";
	var E = "http://control.blog.sina.com.cn/riaapi/profile/unread.php";
	var F,
	G;
	if (a.customFunc.indexOf("suggest") > -1) {
		var H = false;
		var i = function () {
			if (!H) {
				Lib.passcardOBJ.init(R, {
					overfcolor : "#999",
					overbgcolor : a.suggestColor.msover,
					outfcolor : "#000000",
					outbgcolor : ""
				}, null, null, function () {
					S.focus()
				});
				H = true
			}
		};
		var I = $C("style");
		I.setAttribute("type", "text/css");
		var J = "#sinaNote{border-color:" + a.suggestColor.border + "}";
		if ($IE) {
			I.styleSheet.cssText = J
		} else {
			if (/webkit/.test(navigator.userAgent.toLowerCase())) {
				I.textContent = J
			} else {
				I.innerHTML = J
			}
		}
		document.body.insertBefore(I, document.body.firstChild)
	}
	if (a.customFunc.indexOf("loading") > -1) {
		var K = $E("loginLoad");
		var e = function () {
			K.style.display = "none";
			t.style.display = "none";
			x.style.display = ""
		};
		var d = function () {
			K.style.display = "none";
			t.style.display = "";
			x.style.display = "none"
		};
		var c = function () {
			K.style.display = "";
			t.style.display = "none";
			x.style.display = "none"
		}
	}
	if (a.customFunc.indexOf("userData") > -1) {
		var L = $E("scrips");
		var M = $E("notices");
		var N = $E("comments");
		var O = $E("userHead");
		var P = $T(O, "img")[0];
		var g = function (c) {
			var d = new Interface(E, "jsload");
			var e = a.nickLen;
			w.href = D + c + "";
			O.href = D + c + "";
			P.src = "http://portrait" + (1 * c % 8 + 1) + ".sinaimg.cn/" + c + "/blog/180";
			Lib.Uic.getNickName([c], function (a) {
				if (Core.String.byteLength(a[c]) > e) {
					a[c] = Core.String.shorten(a[c], e - 2)
				}
				u.innerHTML = a[c];
				F = true;
				b()
			});
			d.request({
				GET : {
					product : "blog",
					version : 7,
					uid : c
				},
				onSuccess : function (a) {
					if (typeof a.gbook === "undefined") {
						a.gbook = 0
					}
					if (typeof a.notice === "undefined") {
						a.notice = 0
					}
					if (typeof a.blogcomment === "undefined") {
						a.blogcomment = 0
					}
					M.innerHTML = a.notice;
					L.innerHTML = a.message;
					N.innerHTML = a.blogcomment;
					G = true;
					b()
				},
				onError : function (a) {}

			})
		}
	}
	if (a.customFunc.indexOf("tabkey") > -1) {
		var Q = {
			init : function (a) {
				var b;
				a = a || {};
				a.form = $E(a.form) || document.forms[a.form];
				if (a.form == null || isNaN(a.max)) {
					return false
				}
				Core.Events.addEvent(a.form, Core.Function.bind3(this.resetCursor, this, [a.form, a.max]), "keydown");
				if (typeof a.focusNode == "string") {
					b = $E(a.focusNode)
				} else {
					b = a.focusNode
				}
				if (b) {
					b.focus()
				}
			},
			resetCursor : function (a, b) {
				evt = Core.Events.getEvent();
				var c = evt.srcElement || evt.target;
				var d = evt.which || evt.keyCode;
				if (d == 9 && c.tabIndex >= b) {
					($E(a) || document.forms[a]).focus()
				}
			}
		};
		var f = function () {
			Q.init({
				form : $E("loginFormTab") || $E("notLogin"),
				max : 10
			})
		}
	}
	if (a.customFunc.indexOf("dialogErr") > -1) {
		var h = function (a) {
			winDialog.alert(a)
		}
	}
	if (a.customFunc.indexOf("highlight") > -1) {
		var R = $T(y, "input")[0];
		var S = $T(z, "input")[0]
	} else {
		R = y;
		S = z
	}
	r();
	B.checked = true;
	//var T = "<a href=\"#\" onclick=\"window.open('https://login.live.com/oauth20_authorize.srf?client_id=0000000040046F08&redirect_uri=http%3A%2F%2Fcontrol.blog.sina.com.cn%2Fblog_rebuild%2Fmsn%2FmsnLoginCallBack.php&response_type=code&scope=wl.basic%20wl.signin%20wl.offline_access%20wl.share%20wl.emails','neww','left=" + (screen.width - 440) / 2 + ",top=" + (screen.height - 400) / 2 + ',height=400,width=440\');msnrefreshWindow();" style="background:transparent url(http://simg.sinajs.cn/blog7style/images/msn_login01.gif) no-repeat left top; width:70px; height:22px; line-height:22px; display:inline-block; text-align:left; text-indent:2em; text-decoration:none; color:white; font-weight:bold; font-size:14px;">\u767B\u5F55</a>';
	//x.appendChild(n(T));
	return {
		showInfo : g,
		showDone : d,
		showNot : e,
		suggestInit : i,
		initLoginAction : q
	}
}
(window.$loginOpt || {})