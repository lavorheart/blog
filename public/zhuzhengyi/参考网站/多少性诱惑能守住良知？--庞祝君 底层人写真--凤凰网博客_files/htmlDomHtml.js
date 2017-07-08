//没有回复
var aloneHtml = "<div class='mod-articleCommentList' > \
                        <p class='w-articleTitle'><a href='{doc_url}' target='_blank'>{doc_name}</a></p> \
                        <div class='mod-articleCommentBlock'> \
                        <p class='w-username'> \
                            {user_href} \
                            <span class='w-location'>[{ip_from}网友]</span> \
                        </p> \
                        <p class='w-contentTxt'>{comment_contents}</p> \
                        <div class='w-bottomBar'> \
                        <span class='w-reply' style='display:{recommend};'> \
                                 <a class='w-rep-rec' href='javascript:void(0);' atr='{comment_id}'>推荐<em class='w-rep-num' id='up{comment_id}'>{uptimes}</em></a> \
                                <em class='w-rep-line'>/</em> \
                                <a class='w-rep-reply'  href='javascript:void(0);' atr='{comment_id}'>回复</a> \
                        </span> \
                        <span class='w-commentTime'>{comment_date}</span> \
                        </div> \
                        <div id='reply_{comment_id}'></div> \
                        </div> \
                        </div>";
 //有回复的主题                                           
var replyMasterHtml="<div class='mod-articleCommentList'> \
                                <div class='mod-articleCommentBlock mod-articleCommentParent'> \
                                    <p class='w-username'>  \
                                         {user_href} \
                                        <span class='w-location'>[{ip_from}网友]</span> \
                                     </p> \
                                     <div class='w-mid'></div> \
                                </div> \
                            </div>";
//我的评论页有回复
var myMasterHtml="<div class='mod-articleCommentList'> \
        <p class='w-articleTitle'><a href='{doc_url}' target='_blank'>{doc_name}</a></p> \
         <p class='w-username'> \
                            {user_href} \
                            <span class='w-location'>[{ip_from}网友]</span> \
                        </p> \
        <div class='mod-articleCommentBlock mod-articleCommentParent'><div class='w-mid'></div></div></div>"; 
                           
var lastReplyHtml ="<p class='w-contentTxt'>{comment_contents}</p> \
                    <div class='w-bottomBar'> \
                        <span class='w-reply'> \
                        <a href='javascript:void(0);' class='w-rep-rec' atr='{comment_id}' >推荐<em class='w-rep-num' id='up{comment_id}'>{uptimes}</em></a> \
                        <em class='w-rep-line'>/</em> \
                        <a href='javascript:void(0);' class='w-rep-reply'atr='{comment_id}' >回复</a> \
                        </span> \
                       <span class='w-commentTime'>{comment_date}</span></div>";                           
//回复
var replyHtml  = "<div class='mod-articleCommentBlock mod-articleReplyBlock' style='display:{display};'> \
                            <span class='w-order'>{floor}</span> \
                            <p class='w-username'> \
                                {user_href} \
                                <span class='w-location'>[{ip_from}网友]</span> \
                                <span class='w-oriUser'></span> \
                            </p> \
                        <p class='w-contentTxt'> \
                            {comment_contents} \
                        </p> \
                        <div class='w-bottomBar'> \
                            <span class='w-reply replyType' style='display:none;'> \
                                <a href='javascript:void(0);' class='w-rep-rec' atr='{comment_id}'> 推荐 <em class='w-rep-num' id='up{comment_id}'>{uptimes}</em></a>  \
                                <em class='w-rep-line'>/</em> \
                                <a href='javascript:void(0);' class='w-rep-reply' atr='{comment_id}'>回复</a> \
                            </span> \
                            <span class='w-commentTime'>{comment_date}</span> \
                        </div> \
                    </div>";
//回复表单DIV
var replyDivHtml ="<div class='mod-commentTextarea jsinput_commentTextarea' > \
    <span class='w-arr'></span> \
    <div class='mod-commentTextareaMiddle'> \
        <div class='plcg' style='display:none;'>评论成功</div> \
        <form action=''> \
            <div class='w-areaBox  w-areaBox-focus'> \
                <textarea name='' id='jsinput_text' placeholder='{textContent}' class='w-commentArea' alt={comment_id} cols='30' rows='10'></textarea> \
            </div> \
            <div class='w-submitBar'> \
                <a href='javascript:void(0);' class='w-submitBtn' id='commentSend'>发表评论</a> \
                <div class='i-commentFaceBox'> \
                    <div class='mod-comment-inputFaceBox clearfix' style=''> \
                        <a href='javascript:void(0);' class='w-face-trigger w-trigger-on'> \
                            <img src='http://y0.ifengimg.com/newcommentpage/images/face_1.png'  title='微笑' alt='微笑' class='mod-face-icon'> \
                            <span class='icon-faceTrigArr'></span> \
                        </a> \
                        <div class='mod-comment-nearlyFace'> \
                            <ul class='mod-facesImg-list'> \
                                <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_2.png'  title='大笑' alt='大笑' class='mod-face-icon'></li> \
                                <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_4.png'  title='可爱' alt='可爱' class='mod-face-icon'></li> \
                                <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_15.png'  title='冷汗' alt='冷汗' class='mod-face-icon'></li> \
                                <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_10.png'  title='雷到了' alt='雷到了' class='mod-face-icon'></li> \
                            </ul> \
                        </div> \
                        <div class='mod-comment-faceBox' style='position: absolute;left:-1px;top:40px;'> \
                            <link rel='stylesheet' href='./css/mod-face-pc.css'> \
                            <div class='mod-face'> \
                                <div class='arr'></div> \
                                <div class='mod-face-list' style='display:none;'> \
                                    <span class='w-arr' style='left:17px'></span> \
                                    <ul class='mod-facesImg-list clearfix'> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_1.png'  title='微笑' alt='微笑' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_2.png'  title='大笑' alt='大笑' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_3.png'  title='坏笑' alt='坏笑' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_4.png'  title='可爱' alt='可爱' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_5.png'  title='爱心' alt='爱心' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_6.png'  title='鬼脸' alt='鬼脸' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_7.png'  title='亲亲' alt='亲亲' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_8.png'  title='思考' alt='思考' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_9.png'  title='发怒' alt='发怒' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_10.png'  title='雷到了' alt='雷到了' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_11.png'  title='闭嘴' alt='闭嘴' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_12.png'  title='不高兴' alt='不高兴' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_13.png'  title='哭泣' alt='哭泣' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_14.png'  title='吃惊' alt='吃惊' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_15.png'  title='冷汗' alt='冷汗' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_16.png'  title='发呆' alt='发呆' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_17.png'  title='咒骂' alt='咒骂' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_18.png'  title='尴尬' alt='尴尬' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_19.png'  title='呕吐' alt='呕吐' class='mod-face-icon'></li> \
                                        <li><img src='http://y0.ifengimg.com/newcommentpage/images/face_20.png'  title='拜拜' alt='拜拜' class='mod-face-icon'></li> \
                                    </ul> \
                                </div> \
                            </div> \
                        </div> \
                    </div> \
                </div> \
            </div> \
        </form> \
    </div> \
    <div class='mod-commentTextareaUser'> \
    </div> \
</div>";

var replyloginHtml = "<div class='user'> \
        <a href='http://id.ifeng.com/my/info' class='w-name' target='_blank'>{uname}</a> \
        <span class='w-line'>/</span> \
        <a href='http://id.ifeng.com/logout?backurl={backUrl}'>退出</a></div>";

var replyUnloginHtml = " <div class='login'>一键登录： \
                        <a  href='javascript:void(0);' class='iefnglogin'>凤凰账号</a> \
                        <span class='w-line'>/</span> \
                        <a class='tengxun' target='_blank' href='javascript:void(0);'>新浪微博</a> \
                    </div>";

var hiddenReplyHtml="<div class='w-changeHideMore' style='display:none;'> \
                <a href='javascript:void(0);' class='hide hiddenReplyHtml'><span>收起以上回复</span></a> \
            </div>";

var showReplyHtml ="<div class='w-changeHideMore line_bottom'> \
                <a href='javascript:void(0);' class='show showReplyHtml'><span>点击展开隐藏楼层</span></a> \
            </div>";

var loginUser = "<a href='{user_url}' target='_blank'>{uname}</a>";
var unloginUser = "<span class='unuser' >{uname}</span>";