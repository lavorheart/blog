/******** Sales dept. begin ********/
/**ȫ����� begin**/
function FullScreenOpenWin(fstType,ckeU){

   var pthis = this;//����ָ��
   var o = new SinaDotAdJs();//����ͨ����
   var d = FullScreenData;//��������
   if(o.$("FullScreenWrap")){var w = o.$("FullScreenWrap");}else{var w = false;}//������������

   var th = 0;
   var tw = 0;
   this.ftimer = null;
   this.ftimer_del = null;

   //ȫ�����캯��
   this.initAdFS = function(u,l,u2,r2,ip,rp){

	 //�ж�ѡ���ز�
	 if(fstType==false && ckeU==2 && u2!=""){u = u2;}

	 //����ȫ������
	 eval(o.initWrap(0x02,"FullScreenWrap","fmWrap","950","","relative","","","","","","0 auto","0","","block"));
	 fmWrap.style.zIndex = 9999;
	 fmWrap.innerHTML = "";

	 //�����ز�
	 eval(o.initWrap(0x01,"div","fiWrap","950","0","relative","","","","","","0","0","","none"));
	 fiWrap.style.overflow = "hidden";
	 fmWrap.appendChild(fiWrap);
	 eval(o.initWrap(0x01,"div","fiCls","77","31","absolute","","0","450","","","0","0","url(http://d1.sina.com.cn/d1images/fullscreen/cls_77x31.gif) no-repeat","block"));
	 fiCls.style.cursor = "pointer";

     //�����ز�
	 eval(o.initWrap(0x01,"div","frWrap","0","117","absolute","950","","0","","","0","0","",""));
	 frWrap.style.overflow = "hidden";
	 fmWrap.appendChild(frWrap);
	 eval(o.initWrap(0x01,"div","frCls","25","17","absolute","","0","100","","","0","0","url(http://d3.sina.com.cn/d1images/fullscreen/close.gif) no-repeat right","block"));
	 frCls.style.cursor = "pointer";
	 frWrap.appendChild(frCls);

	 //����ȫ��
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

	 //�ر�ȫ��
	 this.hideFS = function(){
	   clearTimeout(pthis.ftimer_del);
	   if(th>0){
	     th-=eval(rp==""?90:98);
	     fiWrap.style.height = th + "px";
	     pthis.ftimer = setTimeout(function(){pthis.hideFS();},1);
	   }else{
		 fiWrap.style.display = "none";
	     clearTimeout(pthis.ftimer);
		 if(fstType==true){try{nextAD();}catch(e){}}//���غ������
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

	 //�ز�ȫ��
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

     //��ǩ����
	 this.showRpt = function(){
	   if(tw<25){
	     tw+=1;
	     frWrap.style.width = tw + "px";
	     pthis.ftimer = setTimeout(function(){pthis.showRpt();},10);
	   }else{
	     clearTimeout(pthis.ftimer);
	   }
	 };

	 //��ǩ�ر�
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

   //ʱ�����
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
/**ȫ����� end**/

/****************************************************/

/**��ý���� begin**/

function SteamMediaOpenWin(){

  var pthis = this;//����ָ��
  var o = new SinaDotAdJs();//����ͨ����
  var d = SteamMediaData;//��������
  var tmpLeft = 0;
  window.SteamMediaFlag = false;
  if(o.$("SteamMediaWrap")){var w = o.$("SteamMediaWrap");}else{var w = false;}//������������
  this.stimer = null;
  this.stimer_pos = null;

   //��ý�幹�캯��
   this.initAdSM = function(u,t,l,w,h,tp,ol,om){

     //��������
     //������
     eval(o.initWrap(0x02,"SteamMediaWrap","smWrap",w,"0","","","","","","","0 auto","0","","block"));
     //��������
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
	 //��ǩ����
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

     //��ȡλ��
	 this.getSMPos = function(){
       if(ol<0){tmpLeft = smWrap.offsetLeft=="undefined"?((o.bdy.offsetWidth - w)/2-(o.isIE6?16:0)):(smWrap.offsetLeft!=0?smWrap.offsetLeft:smWrap.parentNode.offsetLeft);}
       if(tmpLeft>=0){seWrap.style.left = tmpLeft+"px";}
       if(o.isIE6 || !o.isXHTML){seWrap.style.top = o.bdy.scrollTop + tp + "px";}
	   if(o.isIE6 || !o.isXHTML){stWrap.style.top=o.bdy.scrollTop+o.bdy.offsetHeight-219+"px";}
	   pthis.stimer_pos = setTimeout("getSMPos()",50);
	 };

	 //������ý��
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

	 //�ر���ý��
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

	 //�رձ�ǩ
	 this.closeSM = function(){
	   clearTimeout(pthis.stimer);
	   clearTimeout(pthis.stimer_pos);
	   smWrap.style.display = "none";
	   smWrap.innerHTML = "";
	 };

	 //��ť�¼�ע��
	 o.addEvent(seCls,"click",this.hideSM);//�ر���ý��
	 o.addEvent(srBtn,"click",this.showSM);//�ز���ý��
	 o.addEvent(scBtn,"click",this.closeSM);//�رձ�ǩ

	 //IP����
	 window.SteamMediaFlag = true;
	 this.cookie = o.getAdCookie("SteamMedia"+document.URL);
     this.cookie = this.cookie==""?0:++this.cookie;
	 if(this.cookie<2){this.showSM(true);}else{this.hideSM(true);}
	 o.setAdCookie("SteamMedia"+document.URL,this.cookie,1440);
	 this.getSMPos();

   };

   //ʱ�����
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
/**��ý���� end**/

/****************************************************/

/**������� begin**/
function CoupletMediaOpenWin(){
  var pthis = this;//����ָ��
  var o = new SinaDotAdJs();//����ͨ����
  var d = CoupletMediaData;//��������
  var rn = 2;//�ֲ���
  if(o.$("SteamMediaWrap")){var w = o.$("SteamMediaWrap");}else{var w = false;}//������������
  this.cd = new Array();
  this.ctimer = null;
  this.ctimer_ext = null;
  this.ctimer_lft = null;
  this.tmpWidth = 0;
  this.isext = false;
  this.ishide = false;

   //�������캯��
   this.initAdCM = function(ul,ur,ue,l,tk,tp){

	//�߶ȹ̶�
	tp = 2;

     //��������
     //������
     eval(o.initWrap(0x02,"CoupletMediaWrap","cmWrap",950,0,"","","","","","","0 auto","0","none","block"));

     //��������
     eval(o.initWrap(0x01,"div","clWrap",120,288,"absolute","0","","0","","99","0","0","none","none"));
     clWrap.style.top = tp + "px";
	 clWrap.style.background = "#fff";
     cmWrap.appendChild(clWrap);
     eval(o.initWrap(0x01,"div","cliWrap",120,270,"absolute","0","","0","","","0","0","","block"));
     clWrap.appendChild(cliWrap);
     eval(o.initWrap(0x01,"div","clcBtn",120,18,"absolute","0","","270","","","0","0","url(http://d9.sina.com.cn/litong/zhitou/test/images/close-h.jpg) no-repeat right #EBEBEB","block"));
     clcBtn.style.cursor = "pointer";
     clWrap.appendChild(clcBtn);

     //��������
     eval(o.initWrap(0x01,"div","crWrap",120,288,"absolute","","0","0","","99","0","0","none","none"));
     crWrap.style.top = tp + "px";
	 crWrap.style.background = "#fff";
     cmWrap.appendChild(crWrap);
     eval(o.initWrap(0x01,"div","criWrap",120,270,"absolute","0","","0","","","0","0","","block"));
     crWrap.appendChild(criWrap);
     eval(o.initWrap(0x01,"div","crcBtn",120,18,"absolute","0","","270","","","0","0","url(http://d9.sina.com.cn/litong/zhitou/test/images/close-h.jpg) no-repeat left #EBEBEB","block"));
     crcBtn.style.cursor = "pointer";
     crWrap.appendChild(crcBtn);

     //��������
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

	 //���ؿ���
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
	 //�������
	 this.clcHideCM = function(){
	   pthis.ishide = true;
	   pthis.hideCM();
	 };
	 //��ʾ����
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
     //�رտ���
	 this.closeCM = function(){
	   clearTimeout(pthis.ctimer);
	   clearTimeout(pthis.ctimer_lft);
	   clearInterval(pthis.ctimer_ext);
	   cmWrap.innerHTML = "";
	 };

	 o.addEvent(cliWrap,"mouseover",pthis.showCM);//ע���󴥷��¼�
	 o.addEvent(criWrap,"mouseover",pthis.showCM);//ע���Ҵ����¼�
	 o.addEvent(clcBtn,"click",pthis.closeCM);//ע����ر��¼�
	 o.addEvent(crcBtn,"click",pthis.closeCM);//ע���ҹر��¼�
	 o.addEvent(cecBtn,"click",pthis.clcHideCM);////ע�ᴥ���ر��¼�

	 pthis.hideCM();//���ع��
	 try{nextAD();}catch(e){}//���غ������

   }

  //ʱ�����
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
/**������� end**/

/****************************************************/
/******** Sales dept. end ********/