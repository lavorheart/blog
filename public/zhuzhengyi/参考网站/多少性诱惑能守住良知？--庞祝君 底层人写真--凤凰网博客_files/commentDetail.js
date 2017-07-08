function getCookie(name) {
    var result = '';
    //对cookie信息进行相应的处理，方便搜索
    var myCookie = "" + document.cookie + ";";
    if (myCookie) {
        $.each(myCookie.split(';'), function (index, obj) {
            if (' ' + name == obj.split('=')[0]) {
                result = obj.split('=')[1];
                return false;
            }

        });
        return result;
    }
}

function setCookie(name, value, time) {
    var expireDate = new Date();
    expireDate.setDate(expireDate.getDate() + time);
    document.cookie = name + '=' + value + ';expires=' + expireDate.toGMTString() + ';path=/;domain=ifeng.com';
}


var guid = '';
var _userName = '';
var run;
var showCommentHtml = function () {
    this.init();
};
showCommentHtml.prototype = {
    init: function () {
        //获得页面url
        if (typeof (run) != "undfined") {
            clearInterval(run);
        }

        this.docUrl = blogDocUrl;
        this.docName = blogDocName;
        this.skey = blogSkey;

        this.page = 1;
        this.pagesize = 10;
        this.count = 0;
        this.getNewCommentUrl = "http://comment.ifeng.com/get?job=1&order=DESC&orderBy=create_time&format=js&pagesize=" + this.pagesize;
        this.commentApiUrl = "http://comment.ifeng.com/post/?format=js&sid=" + getCookie('sid');
        this.investigation = 'http://comment.ifeng.com/get?job=12&format=js';//调查
        this.recommendUrl = 'http://comment.ifeng.com/vote?format=js';
        this.commentCenterUrl = 'http://comment.ifeng.com/viewpersonal.html';
        this.faceUrl = "http://y0.ifengimg.com/newcommentpage/images/face_";
        this.xhrData = '';
        this.lastType = '';
        this.sendStats = false;
        this.aloneHtml = aloneHtml;//没有回复
        this.replyMasterHtml = replyMasterHtml;//有回复的主题                                           
        this.replyHtml = replyHtml;//回复内容
        this.replyDivHtml = replyDivHtml;//发评div
        this.replyloginHtml = replyloginHtml;//发评登陆状态
        this.replyUnloginHtml = replyUnloginHtml;//发评未登录状态
        this.hiddenReplyHtml = hiddenReplyHtml;
        this.showReplyHtml = showReplyHtml;
        this.hiddenReplyMax = 4;
        this.currentMasterId = '';
        this.facelist = new Array(19);
        this.afterLoginModify();
        this.createFace();
    },
    createFace: function () {
        this.facelist['微笑'] = this.faceUrl + '1.png';
        this.facelist['大笑'] = this.faceUrl + '2.png';
        this.facelist['坏笑'] = this.faceUrl + '3.png';
        this.facelist['可爱'] = this.faceUrl + '4.png';
        this.facelist['爱心'] = this.faceUrl + '5.png';
        this.facelist['鬼脸'] = this.faceUrl + '6.png';
        this.facelist['亲亲'] = this.faceUrl + '7.png';
        this.facelist['思考'] = this.faceUrl + '8.png';
        this.facelist['发怒'] = this.faceUrl + '9.png';
        this.facelist['雷到了'] = this.faceUrl + '10.png';
        this.facelist['闭嘴'] = this.faceUrl + '11.png';
        this.facelist['不高兴'] = this.faceUrl + '12.png';
        this.facelist['哭泣'] = this.faceUrl + '13.png';
        this.facelist['吃惊'] = this.faceUrl + '14.png';
        this.facelist['冷汗'] = this.faceUrl + '15.png';
        this.facelist['发呆'] = this.faceUrl + '16.png';
        this.facelist['咒骂'] = this.faceUrl + '17.png';
        this.facelist['尴尬'] = this.faceUrl + '18.png';
        this.facelist['呕吐'] = this.faceUrl + '19.png';
        this.facelist['拜拜'] = this.faceUrl + '20.png';
        ;
    },
    repaceFace: function (str) {
        for (var item in this.facelist) {
            while (str.indexOf('[' + item + ']') >= 0) {
                str = str.replace('[' + item + ']', "<img src='" + this.facelist[item] + "'>");
            }
        }
        return str;
    },
    // 展示评论 type = new 最新 ;type = hot最热
    showComment: function (type, inputIdName, page) {
        var _this = this;
        var url = _this.getNewCommentUrl;

        if (page) {
            _this.page = page;
        }
        $('.cmtloading').show();

        $.ajax({
            url: url,
            type: "GET",
            dataType: 'jsonp',
            jsonp: 'callback',
            jsonpCallback: 'newCommentListCallBack',
            data: {p: _this.page, docUrl: _this.docUrl, docName: _this.docName, skey: _this.skey},
            success: function (re) {
                xhrData = re;
                if (re == '' || !xhrData || xhrData.count <= 0 || xhrData.comments == '' || re == '[]') {
                    if (type == 'new') {
                        if ($('#' + inputIdName).html() == '') {
                            $('.w-com .w-num').text(xhrData.count);
                            $('.w-reply .w-num').text(xhrData.join_count);
                            $('#cmt_num').text("评论 " + xhrData.count + " 条");
                            $('#' + inputIdName).html("<div class='zanw'>暂无评论，欢迎发表您的观点</div>");
                        }
                    }

                    $('.cmtloading').hide();
                    _this.lastType = type;
                    return false;
                }

                if (xhrData.comments[0].hasOwnProperty('doc_name')) {
                    _this.docName = xhrData.comments[0].doc_name;
                }

                if (type == 'new') {
                    _this.count = xhrData.count;
                    $('.w-com .w-num').text(xhrData.count);
                    $('.w-reply .w-num').text(xhrData.join_count);
                    $('#cmt_num').text("评论 " + xhrData.count + " 条");
                    if (_this.lastType == 'new' && $('#' + inputIdName + ':eq(0) .mod-articleCommentList').length > 0) {
                        $('#' + inputIdName).html('');
                        setTimeout(function () {
                            _this.replyStyle();
                            _this.showReplyDiv();
                            _this.hiddenReply();
                            _this.showReply();
                            _this.recommend();
                            $('html,body').animate({scrollTop: $('.i-mainWrap').offset().top}); //点击下一页之后，浏览器滚动至评论首条位置
                        }, 500);
                    }
                }

                xhrData = xhrData.comments;
                _this.createReplyHtml(xhrData, inputIdName, type);
                _this.lastType = type;
            }
        });
    },
    getPar: function (par) {
        //获取当前URL
        var local_url = document.location.href;
        //获取要取得的get参数位置
        var get = local_url.indexOf(par + "=");
        if (get == -1) {
            return '';
        }
        //截取字符串
        var get_par = local_url.slice(par.length + get + 1);
        //判断截取后的字符串是否还有其他get参数
        var nextPar = get_par.indexOf("&");
        if (nextPar != -1) {
            get_par = get_par.slice(0, nextPar);
        }
        return get_par;
    },
    //页码
    getPage: function (p) {
        var page = this.getPar(p);
        if (!page) {
            page = 1;
        }
        return page;
    },
    //格式化模板
    formatTemplate: function (dta, tmpl) {
        var format = {
            name: function (x) {
                return x
            }
        };
        return tmpl.replace(/{(\w+)}/g, function (m1, m2) {
            if (!m2)
                return "";
            return (format && format[m2]) ? format[m2](dta[m2]) : dta[m2];
        });
    },
    //拼接评价及回复HTML
    createReplyHtml: function (data, inputIdName, type) {
        var _this = this;
        $.each(data, function (index, obj) {
            if (obj != "") {
                if (obj.parent && obj.parent.length > 0) {
                    obj.user_url = "";
                    if (obj.ext2) {
                        var ext2 = eval('(' + obj.ext2 + ')');
                        if (ext2.blog_uid) {
                            obj.user_url = "http://blog.ifeng.com/" + ext2.blog_uid + ".html";
                        }
                    }
                    obj.floor = 1;
                    obj.comment_contents = _this.repaceFace(obj.comment_contents);
                    if (obj.user_url) {
                        obj.user_href = _this.formatTemplate(obj, loginUser);
                    } else {
                        obj.user_href = _this.formatTemplate(obj, unloginUser);
                    }
                    if (obj.ip_from == '其它地区其它') {
                        obj.ip_from = '其他地区';
                    } else if (obj.ip_from == '') {
                        obj.ip_from = '凤凰';
                    }
                    $('#' + inputIdName).append(_this.formatTemplate(obj, _this.replyMasterHtml));
                    var replyCommnetObj = $('.w-mid:last');
                    obj.doc_name = '';
                    obj.doc_url = '';
                    obj.comment_date = obj.comment_date.substr(0, 16);
                    //replyCommnetObj.append(_this.formatTemplate(obj,_this.replyHtml));
                    var key = 1;
                    for (var i = obj.parent.length - 1; i >= 0; i--) {
                        var vobj = obj.parent[i];
                        vobj.user_url = "";
                        if (vobj.ext2) {
                            var ext2 = eval('(' + vobj.ext2 + ')');
                            if (ext2.blog_uid) {
                                vobj.user_url = "http://blog.ifeng.com/" + ext2.blog_uid + ".html";
                            }
                        }
                        vobj.masterName = obj.uname;
                        vobj.masterUrl = obj.user_url;
                        vobj.masterIp = obj.ip_from;
                        vobj.floor = key;
                        vobj.display = '';
                        vobj.comment_date = vobj.comment_date.substr(0, 16);
                        if (vobj.user_url) {
                            vobj.user_href = _this.formatTemplate(vobj, loginUser);
                        } else {
                            vobj.user_href = _this.formatTemplate(vobj, unloginUser);
                        }
                        if (vobj.ip_from == '其它地区其它') {
                            vobj.ip_from = '其他地区';
                        } else if (obj.ip_from == '') {
                            vobj.ip_from = '凤凰';
                        }
                        if (key > _this.hiddenReplyMax) {
                            vobj.display = 'none';
                        }
                        vobj.doc_name = '';
                        vobj.doc_url = '';
                        vobj.comment_contents = _this.repaceFace(vobj.comment_contents);
                        replyCommnetObj.append(_this.formatTemplate(vobj, _this.replyHtml));
                        key++;
                    }
                    ;
                    replyCommnetObj.append("<div class='line_bottom'> </div>");

                    if (obj.parent.length > _this.hiddenReplyMax) {
                        replyCommnetObj.append(_this.hiddenReplyHtml);
                        replyCommnetObj.append(_this.showReplyHtml);
                    }
                    if (type == 'user') {
                        $('.mod-articleCommentParent:last').append(_this.formatTemplate(obj, lastReplyHtml)).find('.w-reply:last').remove();
                    } else {
                        $('.mod-articleCommentParent:last').append(_this.formatTemplate(obj, lastReplyHtml));
                    }
                } else {
                    obj.user_url = "";
                    if (obj.ext2) {
                        var ext2 = eval('(' + obj.ext2 + ')');
                        if (ext2.blog_uid) {
                            obj.user_url = "http://blog.ifeng.com/" + ext2.blog_uid + ".html";
                        }
                    }

                    obj.comment_date = obj.comment_date.substr(0, 16);
                    obj.doc_name = '';
                    obj.doc_url = '';
                    obj.recommend = '';
                    if (type == 'user') {
                        obj.recommend = 'none';
                    }
                    if (obj.user_url) {
                        obj.user_href = _this.formatTemplate(obj, loginUser);
                    } else {
                        obj.user_href = _this.formatTemplate(obj, unloginUser);
                    }

                    if (obj.ip_from == '其它地区其它') {
                        obj.ip_from = '其他地区';
                    } else if (obj.ip_from == '') {
                        obj.ip_from = '凤凰';
                    }
                    obj.comment_contents = _this.repaceFace(obj.comment_contents);
                    $('#' + inputIdName).append(_this.formatTemplate(obj, _this.aloneHtml));

                }
            }
            if (index >= (data.length - 1)) {
                if (_this.lastType != 'new') {
                    setTimeout(function () {
                        _this.replyStyle();
                        _this.showReplyDiv();
                        _this.recommend();
                        _this.hiddenReply();
                        _this.showReply();
                        if (_this.count > 0) {
                            var pageObj = new page({pagesize: _this.pagesize, count: _this.count});
                            pageObj.createHtml();
                            pageObj.callbock(_this);
                        }
                    }, 300);
                }
            }
        });
        $('.cmtloading').hide();
    },
    //绑定回复按显示钮事件
    replyStyle: function () {
        $('.mod-articleReplyBlock,.mod-articleCommentBlock').hover(
                function () {
                    $(this).find('span.replyType').css('display', 'block');
                },
                function () {
                    $(this).find('span.replyType').css('display', 'none')
                }
        );
    },
    //绑定回复
    showReplyDiv: function () {
        var _this = this;
        $('.w-rep-reply').click(function () {
            var commentId = $(this).attr('atr');
            var thisText = $(this).text();
            if (_this.currentMasterId != commentId) {
                _this.currentMasterId = commentId;
                $('.jsinput_commentTextarea').remove();
                _this.addReplyHtml($(this).parent().parent().parent(), commentId);
                $('.w-rep-reply').text('回复');
                $(this).text('取消');
                return false;
            }
            if (thisText == '取消' || ($('.jsinput_commentTextarea').html() != undefined)) {
                $('.jsinput_commentTextarea').remove();
                $(this).text('回复');
                return false;
            }
            _this.currentMasterId = commentId;
            _this.addReplyHtml($(this).parent().parent().parent(), commentId);
            $(this).text('取消');
        });
    },
    //add reply html
    // newRepyObj 是新添加的回复框
    addReplyHtml: function (newRepyObj, commentId) {
        var _this = this;
        _this.showLoginStatus('.jsinput_commentTextarea', newRepyObj, commentId);
        //表情绑定
        _this.faceListDisplay('.jsinput_commentTextarea');
        _this.bindLoginMethods('.jsinput_commentTextarea');
        _this.bindFaceClick('.jsinput_commentTextarea ul.mod-facesImg-list li img.mod-face-icon', 'jsinput_text');
        _this.sendComment('#jsinput_text');
    },
    //tuijian
    recommend: function () {
        var _this = this;
        $('.w-rep-rec').click(function () {
            n = $(this).find("em");
            var commentId = $(this).attr('atr');
            if (!commentId) {
                return false;
            }

            var timeStamp = Math.round(new Date().getTime() / 1000);
            $.ajax({
                url: _this.recommendUrl,
                type: "GET",
                dataType: 'jsonp',
                jsonp: 'callback',
                jsonpCallback: 'recommendCallBack',
                data: {cmtId: commentId, docUrl: _this.docUrl, _: timeStamp},
                success: function (re) {
                    var t = n.html() / 1;
                    n.html(t + 1);
                }
            });
        });
    },
    hiddenReply: function () {
        var _this = this;
        $('.hiddenReplyHtml').click(function () {
            var hiddenReplyMax = _this.hiddenReplyMax - 1;
            $(this).parent().parent().find('.mod-articleCommentBlock:gt(' + hiddenReplyMax + ')').slideToggle();
            $(this).parent().slideToggle();
            $(this).parent().next().slideToggle();
        });
    },
    showReply: function () {
        var _this = this;
        $('.showReplyHtml').click(function () {
            var hiddenReplyMax = _this.hiddenReplyMax - 1;
            $(this).parent().parent().find('.mod-articleCommentBlock:gt(' + hiddenReplyMax + ')').slideToggle();
            $(this).parent().slideToggle();
            $(this).parent().prev().slideToggle();
        });
    },
    //登录状态显示
    showLoginStatus: function (commentTextId, newRepyObj, commentId) {
        var _this = this;
        var lognHmtl = '';
        var defaultMsg = {};
        if (!commentId) {
            commentId = '';
        }
        if (!window['IS_LOGIN']()) {
            lognHmtl = _this.replyUnloginHtml;
            defaultMsg.textContent = '文明上网，不传谣言，登录评论！';
        } else {
            var unameInfo = {uname: _userName, guid: guid, backUrl: encodeURIComponent(window.location.href)};
            lognHmtl = _this.formatTemplate(unameInfo, _this.replyloginHtml);
            defaultMsg.textContent = '文明上网，不传谣言！';
        }
        if (newRepyObj) {
            defaultMsg.comment_id = commentId;
            newRepyObj.append(_this.formatTemplate(defaultMsg, _this.replyDivHtml));
        } else {
            $(commentTextId).find('textarea').attr('placeholder', defaultMsg.textContent);
        }
        $(commentTextId).find('.mod-commentTextareaUser').html(lognHmtl);
    },
    //绑定登录方法
    bindLoginMethods: function (commentTextId) {
        $(commentTextId + ' .mod-commentTextareaUser .login a.iefnglogin').click(function () {
            if (!window['IS_LOGIN']()) {
                window['GLOBAL_LOGIN']();
            }
        });
        $(commentTextId + ' .mod-commentTextareaUser .login a.tengxun').click(function () {
            window['GLOBAL_LOGIN']();
            window.open('https://api.weibo.com/oauth2/authorize?client_id=1073104718&redirect_uri=http%3A%2F%2Fid.ifeng.com%2Fcallback%2Fsina&response_type=code', '', 'width=770, height=630');
        });
        $(commentTextId + ' .mod-commentTextareaUser .login a.qqlogin').click(function () {
            window['GLOBAL_LOGIN']();
            window.open('http://openapi.qzone.qq.com/oauth/show?which=ConfirmPage&display=pc&response_type=code&client_id=100514926&redirect_uri=http://id.ifeng.com/callback/qzone&state=8bc42edbdbd6e37dedd1cee53f009b7f&scope=get_user_info,add_share,list_album,add_album,upload_pic,add_topic,add_one_blog,add_weibo,check_page_fans,add_t,add_pic_t,del_t,get_repost_list,get_info,get_other_info,get_fanslist,get_idolist,add_idol,del_idol,get_tenpay_addr', '', 'width=770, height=630');
        });
    },
    //表情列表显示隐藏
    faceListDisplay: function (commentTextId) {
        $(commentTextId).find('.w-face-trigger').click(function () {
            var mod_face_list = $(this).parent().parent().find('.mod-face-list');
            if (mod_face_list.css('display') == 'none') {
                $(this).removeClass('w-trigger-on');
                mod_face_list.show();
            } else {
                $(this).addClass('w-trigger-on');
                mod_face_list.hide();
            }
        });
    },
    //绑定表情点击
    bindFaceClick: function (falseList, textareaId) {
        var _this = this;
        $(falseList).click(function () {
            var faceIndex = _this.facelist[$(this).attr('alt')];
            var facetag = '[' + $(this).attr('alt') + ']';
            //$uery dom对象里不包括selectionStart属性[雷到了]
            var textareaObj = document.getElementById(textareaId);
            if (faceIndex) {
                if (document.selection) {
                    textareaObj.focus();
                    sel = document.selection.createRange();
                    sel.text = facetag;
                    sel.select();
                } else if (textareaObj.selectionStart || textareaObj.selectionStart == '0') {
                    var startPos = textareaObj.selectionStart;
                    var endPos = textareaObj.selectionEnd;
                    var restoreTop = textareaObj.scrollTop;
                    textareaObj.value = textareaObj.value.substring(0, startPos) + facetag + textareaObj.value.substring(endPos, textareaObj.value.length);
                    if (restoreTop > 0)
                    {
                        textareaObj.scrollTop = restoreTop;
                    }
                    textareaObj.focus();
                    textareaObj.selectionStart = startPos + facetag.length;
                    textareaObj.selectionEnd = startPos + facetag.length;
                } else {
                    textareaObj.val(textareaObj.val() + facetag);
                    textareaObj.focus();
                }
            }

        });
    },
    sendComment: function (textareaId) {
        var _this = this;
        $(textareaId).parent().parent().parent().find('a.w-submitBtn').click(function () {
            if (_this.sendStats) {
                return false;
            }
            if (!window['IS_LOGIN']()) {
                window['GLOBAL_LOGIN']();
                return false;
            }
	    if (getCookie('IF_REAL') == '' || getCookie('IF_REAL') == '1') { // 非实名用户
                window['ReviewCheck']();
                return false;
            }
            var comment = $(textareaId).val().replace(/(^\s*)|(\s*$)/g, "");
            if (comment == '' || _this.docUrl == '' || !_this.docName || _this.docName == 'false') {
                return false;
            }
            var postdata = {
                content: comment,
                docName: _this.docName,
                docUrl: _this.docUrl,
                quoteId: $(textareaId).attr('alt'),
                skey: _this.skey,
                ext2: cmt_ext2
            };
            _this.sendStats = true;

            $.ajax({
                url: _this.commentApiUrl,
                type: "GET",
                dataType: 'jsonp',
                jsonp: 'callback',
                jsonpCallback: 'sendCommentCallBack',
                data: postdata,
                success: function (re) {
                    if (re.code != 1) {
                        alert(re.message);
                    } else {
                        $('.plcg').show();
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                    _this.sendStats = false;
                }
            });
        });
    },
    //登录后修改
    afterLoginModify: function () {
        window['REG_LOGIN_CALLBACK'](1, function (optionsORname) {
            window.location.reload();
        });
    },
    loginAction: function () {
        var _this = this;
        if (window['IS_LOGIN']()) {
            if (getCookie('bloguinfo_name') == getCookie('sid').substr(32)) {
                guid = getCookie('bloguinfo_guid');
                _userName = decodeURIComponent(getCookie('bloguinfo_nickname'));
            }

            if (!guid || !_userName) {
                $.ajax({
                    url: "https://id.ifeng.com/api/getuserinfo",
                    type: "GET",
                    dataType: 'jsonp',
                    jsonp: 'callback',
                    data: {'sid': getCookie('sid')},
                    success: function (re) {
                        if (re.code == 1) {
                            guid = re.data.guid;
                            if (re.data.nickname == '') {
                                _userName = decodeURIComponent(getCookie('sid').substr(32)).toLowerCase();
                            } else {
                                _userName = re.data.nickname.toLowerCase();
                            }
                            setCookie('bloguinfo_name', getCookie('sid').substr(32), 86400);
                            setCookie('bloguinfo_guid', guid, 86400);
                            setCookie('bloguinfo_nickname', encodeURIComponent(_userName), 86400);
                        }
                    }
                });
            }

            _this.showLoginStatus('.defaultCommentDiv');
        } else {
            $('a.w-out').click(function (e) {
                if (e.button === 0) {
                    window['GLOBAL_LOGIN']();
                }
            });
            _this.showLoginStatus('.defaultCommentDiv');
        }
    }
};
$(function () {
    run = setInterval(function () {
        if (typeof (aloneHtml) != 'undefined') {
            var showCommentObj = new showCommentHtml();

            showCommentObj.loginAction();
            //绑定默认的textarea的表情clikc
            showCommentObj.bindFaceClick('.defaultCommentDiv:eq(0) ul.mod-facesImg-list li img.mod-face-icon', 'defaultCommentText1');
            showCommentObj.bindFaceClick('.defaultCommentDiv:eq(1) ul.mod-facesImg-list li img.mod-face-icon', 'defaultCommentText2');
            //绑定默认的表情list clikc
            showCommentObj.faceListDisplay('.defaultCommentDiv');
            //绑定默认登录按钮
            showCommentObj.bindLoginMethods('.defaultCommentDiv');
            showCommentObj.sendComment('#defaultCommentText1');
            showCommentObj.sendComment('#defaultCommentText2');
            showCommentObj.showComment('new', 'commentNewDiv', 1);
        }
    }, 200);

});
