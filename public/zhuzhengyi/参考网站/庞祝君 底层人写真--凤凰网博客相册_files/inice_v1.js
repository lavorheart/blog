if (typeof(INice) == "undefined") {
    var INice = {}
}
INice = {
    version: "1.1.2",
    attachEvent: function(o, e, f) {
        if (o.addEventListener) {
            return o.addEventListener(e, f, false)
        }
        if (o.attachEvent) {
            return o.attachEvent("on" + e, f)
        }
        return o["on" + e] = f
    },
    trim: function(s) {
        s = s.replace(/(^\s*)|(\s*$)/g, "");
        s = s.replace(/(^　*)|(　*$)/g, "");
        return s
    },
    ext: function(s) {
        var pairs;
        var file;
        var s = s.replace(/(\\+)/g, "#");
        pairs = s.split("#");
        file = pairs[pairs.length - 1];
        pairs = file.split(".");
        ext = pairs[pairs.length - 1];
        return ext.toLowerCase()
    },
    setCookie: function(name, value, expire) {
        var date = new Date();
        var eStr = "";
        if ("undefined" != typeof expire && expire != "") {
            expire = new Date(date.getTime() + expire * 60000);
            eStr = "expires=" + expire.toGMTString() + ";"
        }
        document.cookie = name + "=" + escape(value) + ";path=/;" + eStr
    },
    getCookie: function(name) {
        var value = "";
        var part;
        var pairs = document.cookie.split("; ");
        for (var i = 0; i < pairs.length; i++) {
            part = pairs[i].split("=");
            if (part[0] == name) {
                value = unescape(part[1])
            }
        }
        return value
    },
    getBrowser: function() {
        var browser = {};
        var userAgent = navigator.userAgent.toLowerCase();
        browser.IE = /msie/.test(userAgent);
        browser.OPERA = /opera/.test(userAgent);
        browser.MOZ = /gecko/.test(userAgent);
        browser.IE6 = /msie 6/.test(userAgent);
        browser.IE7 = /msie 7/.test(userAgent);
        browser.IE8 = /msie 8/.test(userAgent);
        browser.IE9 = browser.IE && !browser.IE6 && !browser.IE7 && !browser.IE8;
        browser.SAFARI = /safari/.test(userAgent);
        browser.CHROME = /chrome/.test(userAgent);
        browser.IPHONE = /iphone os/.test(userAgent);
        browser.MAXTHON = /maxthon/.test(userAgent);
        browser.IPAD = /ipad/.test(userAgent);
        browser.IPHONE = /iphone/.test(userAgent);
        browser.ANDROID = /android/.test(userAgent);
        if (browser.ANDROID || browser.IPHONE) {
            browser.IPAD = true
        }
        return browser
    },
    getScrollTop: function() {
        return document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop
    },
    getWindowWidth: function() {
        return document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body.clientWidth
    },
    getWindowHeight: function() {
        return document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.clientHeight
    },
    loadScript: function(source, callback, identifier) {
        var element = document.createElement("script");
        if (typeof(source) == "undefined" || source == "") {
            return false
        }
        element.setAttribute("src", source);
        if (typeof(identifier) != "undefined") {
            element.setAttribute("id", identifier)
        }
        element.onload = element.onreadystatechange = function() {
            if (!this.readyState || this.readyState === "loaded" || this.readyState === "complete") {
                if (typeof(callback) == "function") {
                    callback()
                }
                if (typeof(callback) == "string") {
                    eval(callback)()
                }
                element.onload = element.onreadystatechange = null
            }
        };
        document.getElementsByTagName("head")[0].appendChild(element);
        return true
    },
    merge: function(source, target) {
        if (!source) {
            return {}
        }
        if (!target) {
            return source
        }
        var o = {};
        for (var i in source) {
            o[i] = typeof(target[i]) == "undefined" ? source[i] : target[i]
        }
        return o
    }
};
var iNiceBrowser = INice.getBrowser();
if (typeof(AdRotator) == "undefined") {
    var AdRotator = function() {}
}
AdRotator = function(RotatorConfig) {
    (function() {
        if ("undefined" != typeof defaultAdRotatorConfig) {
            RotatorConfig.identifier = RotatorConfig.identifier || defaultAdRotatorConfig.identifier;
            RotatorConfig.maxTimes = RotatorConfig.maxTimes && RotatorConfig.maxTimes != 0 ? RotatorConfig.maxTimes : defaultAdRotatorConfig.maxTimes
        }
        var identifier = RotatorConfig.identifier;
        var maxTimes = RotatorConfig.maxTimes;
        var cookieFlag = "ifengRotator_" + RotatorConfig.identifier;
        var adContent = "";
        var wrapper = document.getElementById(identifier);
        var elements = wrapper.getElementsByTagName("code");
        var fixtures = wrapper.getElementsByTagName("cite");
        var current = INice.getCookie(cookieFlag);
        if (typeof(current) === "undefined" || current === "" || current == "NaN") {
            current = parseInt(Math.random() * 100000) % maxTimes
        }
        INice.setCookie(cookieFlag, ((parseInt(current) + 1) % maxTimes));
        var element;
        if (typeof(elements[current]) != "undefined") {
            element = elements[current];
            adContent = element.innerHTML
        }
        if (adContent == "") {
            if (typeof(fixtures[0]) != "undefined") {
                element = fixtures[0];
                adContent = element.innerHTML
            }
        }
        adContent = adContent.replace("<!--BOF", "");
        adContent = adContent.replace("EOF-->", "");
        document.write(adContent)
    })()
};
if (typeof(HourAdRotator) == "undefined") {
    var HourAdRotator = function(RotatorConfig) {
            var identifier = RotatorConfig.identifier;
            var adContent = "";
            var wrapper = document.getElementById(identifier);
            var elements = wrapper.getElementsByTagName("code");
            var fixtures = wrapper.getElementsByTagName("cite");
            var element;
            for (var i = 0, len = elements.length; i < len; i++) {
                if (typeof(elements[i]) != "undefined") {
                    element = elements[i];
                    adContent += element.innerHTML
                }
            }
            if (adContent == "") {
                if (typeof(fixtures[0]) != "undefined") {
                    element = fixtures[0];
                    adContent = element.innerHTML
                }
            }
            adContent = adContent.replace(/<!\-\-BOF/g, "");
            adContent = adContent.replace(/EOF\-\->/g, "");
            document.write(adContent)
        }
}
var adRotatorFactory = function(RotatorConfig) {
        var saleMode = "CPD";
        if (typeof(RotatorConfig.saleMode) != "undefined") {
            saleMode = RotatorConfig.saleMode
        } else {
            if (typeof(defaultAdRotatorConfig.saleMode) != "undefined") {
                saleMode = defaultAdRotatorConfig.saleMode
            }
        }
        if (saleMode == "CPD") {
            new AdRotator(RotatorConfig)
        } else {
            if (saleMode == "CPT") {
                new HourAdRotator(RotatorConfig)
            }
        }
    };
INice.Flash = function(settings) {
    this.settings = INice.merge({
        url: "",
        width: 300,
        height: 225,
        id: ""
    }, settings);
    this.params = {};
    this.variables = {};
    this.flashvars = "";
    this.addParam = function(name, value) {
        this.params[name] = value
    };
    this.addVariable = function(name, value) {
        this.variables[name] = value
    };
    this.getVariables = function() {
        var a = [],
            v = this.variables;
        for (var i in v) {
            a.push(i + "=" + v[i])
        }
        return a.join("&")
    };
    this.getParamString = function(isIE) {
        var a = [],
            p = this.params;
        if (isIE) {
            for (var i in p) {
                a.push('<param name="' + i + '" value="' + p[i] + '">')
            }
        } else {
            for (var i in p) {
                a.push(i + "=" + p[i] + " ")
            }
        }
        return a.join("")
    };
    this.addFlashVars = function(str) {
        this.flashvars = str
    };
    this.callExternal = function(movieName, method, param, mathodCallback) {
        var fo = navigator.appName.indexOf("Microsoft") != -1 ? window[movieName] : document[movieName];
        fo[method](param, mathodCallback)
    };
    this.play = function() {
        var flashVersion = this.getVersion();
        if (!(parseInt(flashVersion[0] + flashVersion[1] + flashVersion[2]) > 901)) {
            return '<a style="display:block;height:31px;width:165px;line-height:31px;font-size:12px;text-decoration:none;text-align:center;margin:10px auto;border:2px outset #999;" href="http://get.adobe.com/flashplayer/" target="_blank">请安装最新Flash播放器</a>'
        }
        var f = [];
        if ( !! window.ActiveXObject) {
            f.push('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"');
            f.push(' width="' + this.settings.width + '"');
            f.push(' height="' + this.settings.height + '"');
            f.push(' id="' + this.settings.id + '">');
            f.push('<param name="movie" value="' + this.settings.url + '">');
            f.push('<param name="flashvars" value="' + !this.flashvars ? this.getVariables() : this.flashvars + '">');
            f.push(this.getParamString(true));
            f.push("</object>")
        } else {
            f.push('<embed pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"');
            f.push(' src="' + this.settings.url + '"');
            f.push(' height="' + this.settings.height + '"');
            f.push(' width="' + this.settings.width + '"');
            f.push(' flashvars="' + !this.flashvars ? this.getVariables() : this.flashvars + '" ');
            f.push(this.getParamString(false));
            f.push(">")
        }
        return f.join("")
    };
    this.getVersion = function() {
        var flashVersion = [0, 0, 0];
        if (navigator.plugins && navigator.mimeTypes.length) {
            var plugins = navigator.plugins["Shockwave Flash"];
            if (plugins && plugins.description) {
                return plugins.description.replace(/^\D+/, "").replace(/\s*r/, ".").replace(/\s*[a-z]+\d*/, ".0").split(".")
            }
        }
        if (navigator.userAgent && navigator.userAgent.indexOf("Windows CE") != -1) {
            var o = 1,
                version = 3;
            while (o) {
                try {
                    o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + (++version));
                    return [version, 0, 0]
                } catch (d) {
                    o = null
                }
            }
        }
        try {
            var o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7")
        } catch (d) {
            try {
                var o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");
                flashVersion = [6, 0, 21];
                o.AllowScriptAccess = "always"
            } catch (d) {
                if (flashVersion.major == 6) {
                    return flashVersion
                }
            }
            try {
                o = new ActiveXObject("ShockwaveFlash.ShockwaveFlash")
            } catch (d) {}
        }
        if (o) {
            flashVersion = o.GetVariable("$version").split(" ")[1].split(",")
        }
        return flashVersion
    }
};
if (typeof(returnProvToAdPlayer) == "undefined") {
    var returnProvToAdPlayer, returnCityToAdPlayer, returnColumnToAdPlayer, returnLocationHref, clickToClient;
    returnColumnToAdPlayer = function() {
        var ret = "";
        var path = document.location.pathname;
        if (path.length > 1) {
            path = path.replace(/^\//, "");
            var position = path.indexOf("/");
            if (position > 0) {
                ret = path.substring(0, position)
            }
            try {
                if (document.location.href.indexOf("http://v.ifeng.com/ent/zongyi/") >= 0) {
                    ret = "zongyi"
                } else {
                    if (document.location.host == "biz.ifeng.com") {
                        ret = "biz"
                    } else {
                        if (location.search.substr(0, 9) == "?_ggb_yy_") {
                            ret = location.search.substr(1)
                        }
                    }
                }
            } catch (e) {}
        }
        return ret
    };
    returnProvToAdPlayer = function() {
        return typeof(regionOrientProv) != "undefined" ? regionOrientProv : ""
    };
    returnCityToAdPlayer = function() {
        return typeof(regionOrientCity) != "undefined" ? regionOrientCity : ""
    };
    returnLocationHref = function() {
        return window.location.href
    };
    clickToClient = function(url) {
        if (typeof(url) != "undefined" && url != "") {
            window.open(url)
        }
        return 1
    };
    apImpression = function(url) {
        var img = new Image(1, 1);
        img.onload = img.onerror = function() {};
        img.src = url;
        return 1
    }
}
document.write("<scr" + 'ipt type="text/javascript" src="http://blogfile.ifeng.com/uploadfiles/js/blog/region_v1.js"><' + "/script>");
(function() {
    var URL = "http://stadig.ifeng.com/apstat.js?";
    var adplacementIds = [];
    var VERSION = "3.3.15";

    function buildQuery() {
        var queryString = "",
            province = "",
            city = "",
            userId = "";
        try {
            province = INice.getCookie("prov");
            city = INice.getCookie("city");
            userId = INice.getCookie("userid")
        } catch (e) {}
        queryString += "url=" + encodeURIComponent(document.URL);
        queryString += "&ap=" + adplacementIds.join("|");
        queryString += "&ar=" + province;
        queryString += "&cu=" + userId;
        if (typeof window["getChannelInfo"] === "function") {
            queryString += "&ci=" + encodeURIComponent(window["getChannelInfo"]())
        }
        queryString += "&version=" + VERSION;
        return queryString
    }
    var aptracker = {
        add: function(adplacementId) {
            adplacementIds.push(adplacementId);
            return this
        },
        get: function() {
            return URL + buildQuery()
        },
        collection: function() {
            if (adplacementIds.length === 0) {
                return false
            }
            var queryString = buildQuery();
            var image = new Image();
            image.src = URL + queryString
        }
    };
    if ("undefined" == typeof(window.aptracker)) {
        window.aptracker = aptracker
    }
    return window.aptracker
})();
