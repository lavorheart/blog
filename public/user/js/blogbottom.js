/******** Sales dept. begin ********/
/**全屏广告 begin**/
function FullScreenOpenWin(fstType,ckeU){

   var pthis = this;//设置指针
   var o = new SinaDotAdJs();//加载通用类
   var d = FullScreenData;//加载数据
   if(o.$("FullScreenWrap")){var w = o.$("FullScreenWrap");}else{var w = false;}//加载容器对象

   var th = 0;
   var tw = 0;
   this.ftimer = null;
   this.ftimer_del = null;

   //全屏构造函数
   this.initAdFS = function(u,l,u2,r2,ip,rp){

	 //判断选择素材
	 if(fstType==false && ckeU==2 && u2!=""){u = u2;}

	 //构造全屏容器
	 eval(o.initWrap(0x02,"FullScreenWrap","fmWrap","950","","relative","","","","","","0 auto","0","","block"));
	 fmWrap.style.zIndex = 9999;
	 fmWrap.innerHTML = "";

	 //构造素材
	 eval(o.initWrap(0x01,"div","fiWrap","950","0","relative","","","","","","0","0","","none"));
	 fiWrap.style.overflow = "hidden";
	 fmWrap.appendChild(fiWrap);
	 eval(o.initWrap(0x01,"div","fiCls","77","31","absolute","","0","450","","","0","0","url(http://d1.sina.com.cn/d1images/fullscreen/cls_77x31.gif) no-repeat","block"));
	 fiCls.style.cursor = "pointer";

     //构造重播
	 eval(o.initWrap(0x01,"div","frWrap","0","117","absolute","950","","0","","","0","0","",""));
	 frWrap.style.overflow = "hidden";
	 fmWrap.appendChild(frWrap);
	 eval(o.initWrap(0x01,"div","frCls","25","17","absolute","","0","100","","","0","0","url(http://d3.sina.com.cn/d1images/fullscreen/close.gif) no-repeat right","block"));
	 frCls.style.cursor = "pointer";
	 frWrap.appendChild(frCls);

	 //播放全屏
	 this.showFS = function(type){
	  if (type==false){
	     clearTimeout(pthis.ftimer_del);
		 clearTimeout(pthis.ftimer);
		 pthis.hideFS();
	   }else{
	     fiWrap.innerHTML = "";
		 var iObj = o.initObj("FullScreenObj",u,l,"950","450");
         fiWrap.appendChild(iObj);
		 fiWrap.appendChild(fiCls);
	     fiWrap.style.display = "block";
		 clearTimeout(pthis.ftimer_del);
	     if(th<eval(rp==""?450:490)){
	       th+=eval(rp==""?90:98);
	       fiWrap.style.height = th + "px";
	       pthis.ftimer = setTimeout(function(){pthis.showFS(true);},1);
	     }else{
	       clearTimeout(pthis.ftimer);
		   pthis.ftimer_del = setTimeout(function(){pthis.hideFS();},eval(rp==""?5000:8000));
	     }
	   }
	 };

	 //关闭全屏
	 this.hideFS = function(){
	   clearTimeout(pthis.ftimer_del);
	   if(th>0){
	     th-=eval(rp==""?90:98);
	     fiWrap.style.height = th + "px";
	     pthis.ftimer = setTimeout(function(){pthis.hideFS();},1);
	   }else{
		 fiWrap.style.display = "none";
	     clearTimeout(pthis.ftimer);
		 if(fstType==true){try{nextAD();}catch(e){}}//加载后续广告
		 if(rp!=""){
		   frWrap.innerHTML = "";
		   var rObj =o.initObj("FullScreenRpt",r2==""?"http://d1.sina.com.cn/shh/tianyi/fs/rplBtn_25x100.swf":r2,"","25","100");
           frWrap.appendChild(rObj);
		   if(r2!="" && r2.substring(r2.length-3).toLowerCase()!="swf"){o.addEvent(rObj,"click",pthis.rptFS);}
		   frWrap.appendChild(frCls);
		   pthis.showRpt();
		 }
	   }
	 };  

	 //重播全屏
	 this.rptFS = function(){
	   clearTimeout(pthis.ftimer_del);
	   tw = 0;
	   frWrap.style.width = 0 + "px";
	   fiWrap.innerHTML = "";
	   var iObj = o.initObj("FullScreenObj",u,l,"950","450");
       fiWrap.appendChild(iObj);
	   fiWrap.appendChild(fiCls);
	   pthis.showFS(true);
	 };

     //标签进入
	 this.showRpt = function(){
	   if(tw<25){
	     tw+=1;
	     frWrap.style.width = tw + "px";
	     pthis.ftimer = setTimeout(function(){pthis.showRpt();},10);
	   }else{
	     clearTimeout(pthis.ftimer);
	   }
	 };

	 //标签关闭
	 this.clsRpt = function(){
	   clearTimeout(ftimer);
	   clearTimeout(pthis.ftimer_del);
	   w.innerHTML = "";
	   w.style.display = "none";
	 };

	 o.addEvent(fiCls,"click",pthis.hideFS);
	 o.addEvent(frCls,"click",pthis.clsRpt);

     if(ip!="" && fstType==true){
	   this.cookie = o.getAdCookie("FullScreen"+document.URL);
       this.cookie = this.cookie==""?0:++this.cookie;
	   if(this.cookie<2){pthis.showFS(true);}else{pthis.showFS(false);}
	   o.setAdCookie("FullScreen"+document.URL,this.cookie,1440);
	 }else{
	   pthis.showFS(true);
	 }
   };

   //时间过滤
   this.ifFSAD = false;
   if(w && d.length>0){
     for(var i=0;i<d.length;i++){
		 if(o.checkTime(d[i][0],d[i][1])){
		   this.ifFSAD = true;

o.$("FullScreenWrap").innerHTML += '<div id="loadingFSWrap">'+
'<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="loadingFsFlash" WIDTH="0" HEIGHT="0">'+
'<PARAM NAME=quality VALUE=high>'+
'<param name="Play" value="-1">'+
'<PARAM NAME=movie VALUE="'+d[i][2]+'">'+
'</OBJECT>'+
'</div>';

this.FSTmpId = i;
if(o.isIE){
this.FSLoadingTimer=setInterval(function(){
  if(o.$("loadingFsFlash").PercentLoaded()==100){
	clearInterval(pthis.FSLoadingTimer);
	pthis.initAdFS(d[pthis.FSTmpId][2],d[pthis.FSTmpId][3],d[pthis.FSTmpId][4],d[pthis.FSTmpId][5],d[pthis.FSTmpId][6],d[pthis.FSTmpId][7]);
	if(o.$("loadingFSWrap")){o.$("loadingFSWrap").innerHTML = "";}
  }
},1000);
}else{
  pthis.initAdFS(d[pthis.FSTmpId][2],d[pthis.FSTmpId][3],d[pthis.FSTmpId][4],d[pthis.FSTmpId][5],d[pthis.FSTmpId][6],d[pthis.FSTmpId][7]);
  if(o.$("loadingFSWrap")){o.$("loadingFSWrap").innerHTML = "";}
}

		 }
	 }
	 if(!this.ifFSAD){try{nextAD();}catch(e){}}
   }else{
     try{nextAD();}catch(e){}
   }

}
try{arryADSeq.push("FullScreenOpenWin(true,1)");}catch(e){FullScreenOpenWin(true,1);}
/**全屏广告 end**/

/****************************************************/

/**流媒体广告 begin**/

function SteamMediaOpenWin(){

  var pthis = this;//设置指针
  var o = new SinaDotAdJs();//加载通用类
  var d = SteamMediaData;//加载数据
  var tmpLeft = 0;
  window.SteamMediaFlag = false;
  if(o.$("SteamMediaWrap")){var w = o.$("SteamMediaWrap");}else{var w = false;}//加载容器对象
  this.stimer = null;
  this.stimer_pos = null;

   //流媒体构造函数
   this.initAdSM = function(u,t,l,w,h,tp,ol,om){

     //容器构造
     //主容器
     eval(o.initWrap(0x02,"SteamMediaWrap","smWrap",w,"0","","","","","","","0 auto","0","","block"));
     //触发部分
     eval(o.initWrap(0x01,"div","seWrap",w,h,"fixed","0","",tp,"","9999","0","0","none","none"));
     if(o.isIE6 || !o.isXHTML){seWrap.style.position = "absolute";}
     smWrap.appendChild(seWrap);
	 eval(o.initWrap(0x01,"div","seDiv",w,h,"","","","","","","0","0","none","block"));
	 seWrap.appendChild(seDiv);
     if(w>375){eval(o.initWrap(0x01,"div","seCls",77,31,"absolute","","0","","-31","9999","0","0","url(http://d4.sina.com.cn/d1images/lmt/cls_77x31.gif) no-repeat","block"));}
     else{eval(o.initWrap(0x01,"div","seCls",66,22,"absolute","","0","","-22","9999","0","0","url(http://d2.sina.com.cn/d1images/lmt/cls_66x22.gif) no-repeat","block"));}
     seCls.style.cursor = "pointer";
     seWrap.appendChild(seCls);
     if(om>=0){
       eval(o.initWrap(0x01,"iframe","seIfm",w,h,"absolute","0","","0","","-1","0","0","#fff",""));
       seIfm.frameBorder = 0;
       seWrap.appendChild(seIfm);
     }
	 //标签部分
     eval(o.initWrap(0x01,"div","stWrap",25,219,"fixed","","0","","0","9999","0","0","","none"));
     if(o.isIE6 || !o.isXHTML){stWrap.style.position = "absolute";}
     smWrap.appendChild(stWrap);
	 eval(o.initWrap(0x01,"div","stDiv",25,150,"","","","","","","0","0","none","block"));
	 stWrap.appendChild(stDiv);
     eval(o.initWrap(0x01,"div","srBtn",25,24,"absolute","0","","150","","","0","0","url(http://d5.sina.com.cn/d1images/lmt/play.gif) no-repeat center","block"));
     srBtn.style.cursor = "pointer";
     stWrap.appendChild(srBtn);
     eval(o.initWrap(0x01,"div","scBtn",25,45,"absolute","0","","174","","","0","0","url(http://d1.sina.com.cn/d1images/lmt/close1.jpg) no-repeat center","block"));
     scBtn.style.cursor = "pointer";
     stWrap.appendChild(scBtn);

     //获取位置
	 this.getSMPos = function(){
       if(ol<0){tmpLeft = smWrap.offsetLeft=="undefined"?((o.bdy.offsetWidth - w)/2-(o.isIE6?16:0)):(smWrap.offsetLeft!=0?smWrap.offsetLeft:smWrap.parentNode.offsetLeft);}
       if(tmpLeft>=0){seWrap.style.left = tmpLeft+"px";}
       if(o.isIE6 || !o.isXHTML){seWrap.style.top = o.bdy.scrollTop + tp + "px";}
	   if(o.isIE6 || !o.isXHTML){stWrap.style.top=o.bdy.scrollTop+o.bdy.offsetHeight-219+"px";}
	   pthis.stimer_pos = setTimeout("getSMPos()",50);
	 };

	 //播放流媒体
	 this.showSM = function(fst){
	   clearTimeout(pthis.stimer);
	   seDiv.innerHTML = "";
	   stDiv.innerHTML = "";
	   seWrap.style.display = "block";
	   stWrap.style.display = "none";
	   var eObj = o.initObj("SteamMediaObj",u,l,w,h);
       seDiv.appendChild(eObj);
		if(fst==true){
		 pthis.stimer = setTimeout("hideSM(true)",w>260?8000:5000);
		}else{
		 pthis.stimer = setTimeout("hideSM()",w>260?8000:5000);
		}
	 };

	 //关闭流媒体
	 this.hideSM = function(fst){
	   clearTimeout(pthis.stimer);
	   seDiv.innerHTML = "";
	   stDiv.innerHTML = "";
	   seWrap.style.display = "none";
	   stWrap.style.display = "block";
       var tObj = o.initObj("SteamMediaTag",t,l,25,150);
       stDiv.appendChild(tObj);
	   if(fst==true || window.SteamMediaFlag){try{window.SteamMediaFlag = false;nextAD();}catch(e){}}
	 };

	 //关闭标签
	 this.closeSM = function(){
	   clearTimeout(pthis.stimer);
	   clearTimeout(pthis.stimer_pos);
	   smWrap.style.display = "none";
	   smWrap.innerHTML = "";
	 };

	 //按钮事件注册
	 o.addEvent(seCls,"click",this.hideSM);//关闭流媒体
	 o.addEvent(srBtn,"click",this.showSM);//重播流媒体
	 o.addEvent(scBtn,"click",this.closeSM);//关闭标签

	 //IP控制
	 window.SteamMediaFlag = true;
	 this.cookie = o.getAdCookie("SteamMedia"+document.URL);
     this.cookie = this.cookie==""?0:++this.cookie;
	 if(this.cookie<2){this.showSM(true);}else{this.hideSM(true);}
	 o.setAdCookie("SteamMedia"+document.URL,this.cookie,1440);
	 this.getSMPos();

   };

   //时间过滤
   this.ifSMAD = false;
   if(w && d.length>0){
     for(var i=0;i<d.length;i++){
	   if(d[i][0]=="" || d[i][1]==""){
		   this.ifSMAD = true;

o.$("SteamMediaWrap").innerHTML += '<div id="loadingSmWrap" style="display:none;">'+
'<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="loadingSmFlash" WIDTH="0" HEIGHT="0">'+
'<PARAM NAME=quality VALUE=high>'+
'<param name="Play" value="-1">'+
'<PARAM NAME=movie VALUE="'+d[i][2]+'">'+
'</OBJECT>'+
'</div>';

this.SmTmpId = i;
if(o.isIE){
this.SmLoadingTimer=setInterval(function(){
  if(o.$("loadingSmFlash").PercentLoaded()==100){
	clearInterval(pthis.SmLoadingTimer);
	pthis.initAdSM(d[pthis.SmTmpId][2],d[pthis.SmTmpId][3],d[pthis.SmTmpId][4],d[pthis.SmTmpId][5],d[pthis.SmTmpId][6],d[pthis.SmTmpId][7],d[pthis.SmTmpId][8],d[pthis.SmTmpId][9]);
	if(o.$("loadingSmWrap")){o.$("loadingSmWrap").innerHTML = "";}
  }
},1000);
}else{
  pthis.initAdSM(d[pthis.SmTmpId][2],d[pthis.SmTmpId][3],d[pthis.SmTmpId][4],d[pthis.SmTmpId][5],d[pthis.SmTmpId][6],d[pthis.SmTmpId][7],d[pthis.SmTmpId][8],d[pthis.SmTmpId][9]);
  if(o.$("loadingSmWrap")){o.$("loadingSmWrap").innerHTML = "";}
}

	   }
	   else if(o.checkTime(d[i][0],d[i][1])){
		   this.ifSMAD = true;

o.$("SteamMediaWrap").innerHTML += '<div id="loadingSmWrap" style="display:none;">'+
'<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="loadingSmFlash" WIDTH="0" HEIGHT="0">'+
'<PARAM NAME=quality VALUE=high>'+
'<param name="Play" value="-1">'+
'<PARAM NAME=movie VALUE="'+d[i][2]+'">'+
'</OBJECT>'+
'</div>';
this.SmTmpId = i;
if(o.isIE){
this.SmLoadingTimer=setInterval(function(){
  if(o.$("loadingSmFlash").PercentLoaded()==100){
	clearInterval(pthis.SmLoadingTimer);
	pthis.initAdSM(d[pthis.SmTmpId][2],d[pthis.SmTmpId][3],d[pthis.SmTmpId][4],d[pthis.SmTmpId][5],d[pthis.SmTmpId][6],d[pthis.SmTmpId][7],d[pthis.SmTmpId][8],d[pthis.SmTmpId][9]);

	if(o.$("loadingSmWrap")){o.$("loadingSmWrap").innerHTML = "";}
  }
},1000);
}else{
  pthis.initAdSM(d[pthis.SmTmpId][2],d[pthis.SmTmpId][3],d[pthis.SmTmpId][4],d[pthis.SmTmpId][5],d[pthis.SmTmpId][6],d[pthis.SmTmpId][7],d[pthis.SmTmpId][8],d[pthis.SmTmpId][9]);
  if(o.$("loadingSmWrap")){o.$("loadingSmWrap").innerHTML = "";}
}
       }
	 }
	 if(!this.ifSMAD){try{nextAD();}catch(e){}}
   }else{
     try{nextAD();}catch(e){}
   }

}
try{arryADSeq.push("SteamMediaOpenWin()");}catch(e){SteamMediaOpenWin();}	
/**流媒体广告 end**/

/****************************************************/

/**跨栏广告 begin**/
function CoupletMediaOpenWin(){
  var pthis = this;//设置指针
  var o = new SinaDotAdJs();//加载通用类
  var d = CoupletMediaData;//加载数据
  var rn = 2;//轮播数
  if(o.$("SteamMediaWrap")){var w = o.$("SteamMediaWrap");}else{var w = false;}//加载容器对象
  this.cd = new Array();
  this.ctimer = null;
  this.ctimer_ext = null;
  this.ctimer_lft = null;
  this.tmpWidth = 0;
  this.isext = false;
  this.ishide = false;

   //跨栏构造函数
   this.initAdCM = function(ul,ur,ue,l,tk,tp){

	//高度固定
	tp = 2;

     //容器构造
     //主容器
     eval(o.initWrap(0x02,"CoupletMediaWrap","cmWrap",950,0,"","","","","","","0 auto","0","none","block"));

     //左栏部分
     eval(o.initWrap(0x01,"div","clWrap",120,288,"absolute","0","","0","","99","0","0","none","none"));
     clWrap.style.top = tp + "px";
	 clWrap.style.background = "#fff";
     cmWrap.appendChild(clWrap);
     eval(o.initWrap(0x01,"div","cliWrap",120,270,"absolute","0","","0","","","0","0","","block"));
     clWrap.appendChild(cliWrap);
     eval(o.initWrap(0x01,"div","clcBtn",120,18,"absolute","0","","270","","","0","0","url(http://d9.sina.com.cn/litong/zhitou/test/images/close-h.jpg) no-repeat right #EBEBEB","block"));
     clcBtn.style.cursor = "pointer";
     clWrap.appendChild(clcBtn);

     //右栏部分
     eval(o.initWrap(0x01,"div","crWrap",120,288,"absolute","","0","0","","99","0","0","none","none"));
     crWrap.style.top = tp + "px";
	 crWrap.style.background = "#fff";
     cmWrap.appendChild(crWrap);
     eval(o.initWrap(0x01,"div","criWrap",120,270,"absolute","0","","0","","","0","0","","block"));
     crWrap.appendChild(criWrap);
     eval(o.initWrap(0x01,"div","crcBtn",120,18,"absolute","0","","270","","","0","0","url(http://d9.sina.com.cn/litong/zhitou/test/images/close-h.jpg) no-repeat left #EBEBEB","block"));
     crcBtn.style.cursor = "pointer";
     crWrap.appendChild(crcBtn);

     //触发部分
     eval(o.initWrap(0x01,"div","ceWrap",950,90,"absolute","0","","0","","999","0","0","","none"));
     ceWrap.style.top = tp + "px";
	 cmWrap.appendChild(ceWrap);
	 eval(o.initWrap(0x01,"div","ceiWrap",0,90,"","0","","0","","","0 auto","0","","block"));
	 ceiWrap.style.overflow = "hidden";
	 ceWrap.appendChild(ceiWrap);
	 eval(o.initWrap(0x01,"div","cecBtn",66,22,"absolute","","0","","-22","999","0","0","url(http://d2.sina.com.cn/d1images/lmt/cls_66x22.gif) no-repeat","block"));
	 cecBtn.style.cursor = "pointer";
	 ceWrap.appendChild(cecBtn);

	 this.getCMPos = function(){
	   ceWrap.style.left = (cmWrap.offsetLeft=="undefined"?((o.bdy.offsetWidth - w)/2-(o.isIE6?16:0)):(cmWrap.offsetLeft!=0?cmWrap.offsetLeft:cmWrap.parentNode.offsetLeft))+"px";
	   pthis.ctimer_lft = setTimeout("getCMPos()",50);
	 }

	 //隐藏跨栏
	 this.hideCM = function(){
	   this.isext = false;
	   clearTimeout(pthis.ctimer);
	   clearTimeout(pthis.ctimer_lft);
	   clearInterval(pthis.ctimer_ext);
	   cliWrap.innerHTML = "";
	   criWrap.innerHTML = "";
	   ceiWrap.innerHTML = "";
	   var cliObj = o.initObj("CoupletMediaLeftObj",ul,l,120,270);
       cliWrap.appendChild(cliObj);
	   var criObj = o.initObj("CoupletMediaRightObsj",ur,l,120,270);
       criWrap.appendChild(criObj);
       clWrap.style.display = "block";
	   crWrap.style.display = "block";
	   ceWrap.style.display = "none";
	 };
	 //点击隐藏
	 this.clcHideCM = function(){
	   pthis.ishide = true;
	   pthis.hideCM();
	 };
	 //显示跨栏
	 this.showCM = function(){
       if(!pthis.isext && !pthis.ishide){
		 pthis.getCMPos();
		 this.isext = true;
	     clearTimeout(pthis.ctimer);
		 ceiWrap.style.width = 0;
         pthis.tmpWidth = 0;
	     var ceiObj = o.initObj("CoupletMediaExtObsj",ue,l,950,90);
	     ceiWrap.appendChild(ceiObj);
	     ceWrap.style.display = "block";
		 pthis.ctimer_ext = setInterval(function(){
		   if(pthis.tmpWidth<950){
		     pthis.tmpWidth+=50;
             ceiWrap.style.width = pthis.tmpWidth + "px";
		   }else{
		     clearInterval(pthis.ctimer_ext);
		   }
		 },1);
	     pthis.ctimer = setTimeout(function(){pthis.hideCM();},8000);
		 if(tk!=""){
		   var cTmpTracker = new Image();
           cTmpTracker.src=tk+"&"+Math.random();
		 }
	   }
	 };
     //关闭跨栏
	 this.closeCM = function(){
	   clearTimeout(pthis.ctimer);
	   clearTimeout(pthis.ctimer_lft);
	   clearInterval(pthis.ctimer_ext);
	   cmWrap.innerHTML = "";
	 };

	 o.addEvent(cliWrap,"mouseover",pthis.showCM);//注册左触发事件
	 o.addEvent(criWrap,"mouseover",pthis.showCM);//注册右触发事件
	 o.addEvent(clcBtn,"click",pthis.closeCM);//注册左关闭事件
	 o.addEvent(crcBtn,"click",pthis.closeCM);//注册右关闭事件
	 o.addEvent(cecBtn,"click",pthis.clcHideCM);////注册触发关闭事件

	 pthis.hideCM();//加载广告
	 try{nextAD();}catch(e){}//加载后续广告

   }

  //时间过滤
  this.ifCMAD = false;
  if(w && d.length>0){
    for(var i=0;i<d.length;i++){
	  if(o.checkTime(d[i][0],d[i][1])){this.ifCMAD = true;this.cd.push([d[i][2],d[i][3],d[i][4],d[i][5],d[i][6],d[i][7]]);}
	}
	if(!this.ifCMAD){try{nextAD();}catch(e){}}
  }else{
     try{nextAD();}catch(e){}
   }

   var genkey = function(prefix, s){
		var hash = 0, i = 0, w;
		for(; !isNaN(w = s.charCodeAt(i++));) {
			hash = ((hash << 5) - hash) + w;
			hash = hash & hash;
		}
		return prefix + hash;
	}
   var CoupletMediaCookieName = genkey('CoupletMedia',document.URL);
  this.cid = o.getAdCookie(CoupletMediaCookieName);
  this.cid = this.cid==""?Math.floor(Math.random()*rn):++this.cid;
  this.cid = this.cid>=rn?0:this.cid;
  if(typeof(this.cd[this.cid])!="undefined"){
	pthis.initAdCM(this.cd[this.cid][0],this.cd[this.cid][1],this.cd[this.cid][2],this.cd[this.cid][3],this.cd[this.cid][4],this.cd[this.cid][5]);
  }else{try{nextAD();}catch(e){}}
  o.setAdCookie(CoupletMediaCookieName,this.cid,1440);

}
try{arryADSeq.push("CoupletMediaOpenWin()");}catch(e){CoupletMediaOpenWin();}
/**跨栏广告 end**/

/****************************************************/
/******** Sales dept. end ********/