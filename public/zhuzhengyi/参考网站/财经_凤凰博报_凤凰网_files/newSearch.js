var userCurrentKeyword="";
V.addListener($("keyword"),"keyup",function(){
	userCurrentKeyword=$("keyword").value;
});
var header_search={
  default_keyword:"",
  option_timeout:null,
  get_obj:function(id){
	  if(!id){
		  return null;
	  }else if(typeof id=='string'){
		  return document.getElementById(id);
	  }else if(typeof id=='object'){
		  return id;
	  }
  },
  show_option:function(){
      this.get_obj("loginUl").className="a_cl";
	  this.get_obj("loginFldselectop").style.display="block";
  },
  hide_option:function(){
	  this.get_obj("loginFldselectop").style.display="none";
  },
  over_option:function(){
	  if(this.option_timeout){
		  clearTimeout(this.option_timeout);
	  }
  },
  out_option:function(){
	  if(this.option_timeout){
		  clearTimeout(this.option_timeout);
	  }
	  this.option_timeout=setTimeout("header_search.hide_option()",500);
  },
  select_option:function(type){
	  this.get_obj("loginUl").innerHTML=type;
	  this.hide_option();
	  if(type=="站内"){
		  this.default_keyword=PH_HOTWORDS[1];
		  this.get_obj("search_form").action="http://search.ifeng.com/sofeng/search.action";
		  this.get_obj("keyword").name="q";
		  this.get_obj("keyword").value=userCurrentKeyword==""?this.default_keyword:userCurrentKeyword;
		  this.get_obj("keyword").onkeyup="";
		  this.get_obj("keyword").onkeydown="";
		  this.get_obj("param1").disabled=false;
		  this.get_obj("param1").name="c";
		  this.get_obj("param1").value="1";
		  this.get_obj("param2").disabled=true;
	  }else if(type=="站外"){
		  this.default_keyword=PH_HOTWORDS[1];
		  this.get_obj("search_form").action="http://sou.ifeng.com/bsearch/bsearch.do";
		  this.get_obj("keyword").name="q";
		  this.get_obj("keyword").value=userCurrentKeyword==""?this.default_keyword:userCurrentKeyword;
		  this.get_obj("keyword").onkeyup="";
		  this.get_obj("keyword").onkeydown="";
		  this.get_obj("param1").disabled=true;
		  this.get_obj("param2").disabled=true;
	  }else if(type=="证券"){
		  this.default_keyword=PH_HOTWORDS[0];
		  this.get_obj("search_form").action="http://app.finance.ifeng.com/hq/search.php";
		  this.get_obj("keyword").name="keyword";
		  this.get_obj("keyword").value=userCurrentKeyword==""?this.default_keyword:userCurrentKeyword
		  this.get_obj("param1").disabled=true;
		  this.get_obj("param2").disabled=true;
	  }else if(type=="汽车"){
		  this.default_keyword="输入品牌或车系";
		  this.get_obj("search_form").action="http://data.auto.ifeng.com/search/search.do";
		  this.get_obj("keyword").name="keywords";
		  this.get_obj("keyword").value=userCurrentKeyword==""?this.default_keyword:userCurrentKeyword;
		  this.get_obj("param1").disabled=true;
		  this.get_obj("param1").name="bname";
		  this.get_obj("param1").value="";
		  this.get_obj("param2").disabled=true;
		  this.get_obj("param2").name="sname";
		  this.get_obj("param2").value="";
	  }else if(type=="视频"){
		  this.default_keyword=PH_HOTWORDS[1];
		  this.get_obj("search_form").action="http://so.v.ifeng.com/video";
		  this.get_obj("keyword").name="q";
		  this.get_obj("keyword").value=userCurrentKeyword==""?this.default_keyword:userCurrentKeyword;
		  this.get_obj("keyword").onkeyup="";
		  this.get_obj("keyword").onkeydown="";
		  this.get_obj("param1").disabled=false;
		  this.get_obj("param1").name="c";
		  this.get_obj("param1").value="5";
		  this.get_obj("param2").disabled=true;
	  }
	  this.get_obj("loginUl").className="";
  },
  clean_default:function(value){
	  if(value==this.default_keyword){
		  this.get_obj("keyword").value="";
	  }
  },
  set_default:function(value){
	  if(value==""){
		  this.get_obj("keyword").value=this.default_keyword;
	  }
  }
}
header_search.select_option('站内');