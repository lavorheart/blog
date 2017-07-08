var Pin = function (opts) {
	this.init(opts);
}

Pin.prototype = {
	targetAd: null,
	blogRight:null,//右侧
	adOffsetTop: 0,//获取广告所在位置顶端
	main:null,
	init: function (opts) {
		var me = this;
		me.main = document.getElementById("blog_main01");
		me.blogRight = me.getElementsByClassName(me.main, "div", "blogRight")[0];
		var div = document.createElement("div");
		div.id = "add";
		div.style.cssText = "display: block; margin:0 auto; width: 250px; height: 250px; position: relative; overflow:hidden; zoom:1;";
		var divStr = '';
		var adSrcExt = INice.ext(opts.adSrc);
		if(adSrcExt == "jpg" || adSrcExt == "png" || adSrcExt == "gif"){
			divStr = '<img width="250" height="250" src="' + opts.adSrc + '" style="margin:0; width:250px; height:250px;">';
		}else if(adSrcExt == "swf"){
			divStr = '<embed src="' + opts.adSrc + '" width="250" height="250" wmode="opaque" allowscriptaccess="always" name="pinswf" id="pinswf" pluginspage="http://www.macromedia.com/go/getflashplayer">';
		}else {
			divStr = '<iframe width="250" height="250" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no" src="' + opts.adSrc + '"></iframe>';
		}
		if((opts.isActive == 0 && adSrcExt == "swf") || adSrcExt == "jpg" || adSrcExt == "png" || adSrcExt == "gif"){
			divStr += '<a style="position: absolute; top:0; left:0; margin: 0; padding: 0; display: block; width: 250px; height: 250px; background-image:url(about:blank);" href="' + opts.adLink + '" target="_blank"></a>';
		}
		div.innerHTML = divStr;
		me.blogRight.appendChild(div);
		me.targetAd = document.getElementById("add");
		me.targetAdLeft = me.targetAd.getBoundingClientRect().left;
		INice.attachEvent(window, "load", function(){
			me.adOffsetTop = me.getOffsetTop(me.targetAd);
			me.onScroll(me);
			INice.attachEvent(window, "scroll", function () {
				me.onScroll(me);
			});

			INice.attachEvent(window, "resize", function(){
				me.targetAd.style.top = 0;
				me.targetAd.style.left = "";
				me.targetAd.style.marginTop = 0;
				me.targetAd.style.position = "relative";
				me.targetAd.className = "";
				setTimeout(function(){
					me.targetAdLeft = me.targetAd.getBoundingClientRect().left;
					me.onScroll(me);
				}, 0);
			});
		});
	},
	onScroll: function (me) {
		var windowScrollTop = INice.getScrollTop();
		var absoluteBottom = me.getOffsetTop(me.main) + me.main.offsetHeight - 10 - parseInt(me.targetAd.style.height);
		if (windowScrollTop > absoluteBottom) {
			me.targetAd.className = "";
			me.targetAd.style.position = "absolute";
			me.targetAd.style.marginTop = 0;
			me.targetAd.style.top = absoluteBottom + "px";
			me.targetAd.style.left = me.targetAdLeft + "px";
		} else if (windowScrollTop > me.adOffsetTop) {
			if (iNiceBrowser.IE) {
				me.targetAd.style.position = "absolute";
				me.targetAd.style.top = (windowScrollTop + 10) + "px";
			} else {
				me.targetAd.style.top = "";
				me.targetAd.style.position = "";
			}
			me.targetAd.className = "fixed02";
			me.targetAd.style.left = me.targetAdLeft + "px";
		} else {
			me.targetAd.style.top = 0;
			me.targetAd.style.left = "";
			me.targetAd.style.position = "relative";
			me.targetAd.className = "";
		}
	},
	getOffsetTop: function (o) {
		var top = 0;
		var offsetParent = o;
		while (offsetParent != null && offsetParent != document.body) {
			top += offsetParent.offsetTop;
			offsetParent = offsetParent.offsetParent;
		}
		return top;
	},
	getElementsByClassName: function (parentElement, tagName, className) {
		var elements = parentElement.getElementsByTagName(tagName);
		var result = [];
		for (var i = 0; i < elements.length; i++)
			if ((" " + elements[i].className + " ").indexOf(" " + className + " ") != -1)
				result.push(elements[i]);
		return result;
	}
}

if(PinParams != "undefined" && PinParams != null){
	new Pin(PinParams);
}