<!DOCTYPE html>
<?php
 error_reporting(0);
 require("adam.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>BilBil-站长联盟</title>
<link rel="icon" sizes="any" mask href="./favicon.ico">
<meta name="keywords" content="bilbil,bilbil.top,uyghur,izda，维搜,搜索引擎,ئىزدەش,كىنو" />
<meta name="description" content="BilBil-维语全文搜索引擎" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="referrer" content="never">
<link rel="shortcut icon" type="image/x-icon" href="http://bilbil.top/logo.png" /> 
<link rel="apple-touch-icon-precomposed" href="http://bilbil.top/logo.png" /> 
<style>
@font-face {  
	font-family: "ALKATIP-Tor";  
	src: local("ALKATIP-Tor"), url(img/ALKATIP-Tor.ttf) format("opentype"); /* non-IE */  
}
* {
	margin: 0;
	padding: 0;
	font-family: "ALKATIP-Tor";
}
body{
	background:#fff;
	color:#333;
	min-height:100vh;
	position:relative;
	}
	#natija_list{
	direction: rtl;
	margin-right:6%;
	}
.izdax_ramka p {
  width: 90%;
  height: auto;
  text-decoration:none;
  direction: rtl;
  font-size:10px;
  outline: none;
  color: #ffffff;
  word-wrap: break-word;
  word-break: break-all;
}

.top{
  text-align:center;
  background-color:#4007a2;
  color:white;
  width:auto;
  height:20px;
  padding:10px;
  background-size:100px;
  border-radius:2px;
  }
.izdax_ramka input{
  text-align:center;
  width: 90%;
 margin-left: 5%;
 margin-right: 5%;
  height:35px;
  border-radius:6px;
  border: 2px solid #4007a2;
  }
.izdax_ramka button{
 width: 90%;
 margin-left: 5%;
 margin-right: 5%;
  height:40px;
  text-align:center;
  background-color:#4007a2;
  margin-top:10px;
  color:#ffffff;
  border-style:none;
  border-radius:6px;
  }
 .ulanma{
	text-align:center;
	width:100%;
	padding-top: 5px;
	position: absolute;
	left: 0;
	bottom: 0;
}
 li{
	display:inline;
	weight:100%;
	list-style-type:none;
}
.ulanma a{
	color:#000000;
	font-size:14px;
}
a {
  width: 100%;
  height: 42px;
  text-decoration:none;
  padding-left: 1%;
  padding-top: 4px;
  padding-bottom: 4px;
  padding-right: 1%;
  direction: rtl;
  border-radius: 5px;
  outline: none;
  color: #000000;
}

</style>
</head>
<body>
<div class="top">
توربەت قوشۇش
 
 </div>
 <br>
<div class="izdax_ramka" >
       <input required="required"   placeholder="توربەت ئادىرىسىنى كىرگۈزۈڭ  (https://www.nur.cn)"   name="url" autocomplete="off"  id="url">
       <button type="submit" onclick="submits()" >قوشۇش</button> 
   <script src="./js/jquery-3.6.1.min.js"></script>  
	  <script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>
		<script>
			function submits(){
			layer.msg(' ...قوشىلىۋاتىدۇ،سەل ساقلاڭ',{time:9999999});
			    var url = $("#url").val();
			      if(url == ""){
			        alert("不能为空");
			        return false;
			      }
				  
			      $.ajax({
			        type : "GET",
			        url : "./web.php",
			        data: {url:window.btoa(url)},
			        dataType : "text",
			        success:function(data){
					  layer.close(layer.index);	
					  alert(data);	  
			        },error:function(data){
					  layer.close(layer.index);
			          alert("! ئادرىس توغىرا ئەمەس ياكى نامەلۇم خاتالىق كۈرۈلدى");
					 
			          return false;
			        }
			      });    
			  }
			  $.get("./adam.php?type=see",function(data,status){
			$("#san").text("("+data+") :توردىكىلەر ");
	});
		</script>
		
</div>
<ul style="direction:rtl;margin-left:55px;margin-right:55px;margin-top:20px;">
<li >
<p style="color:#4007a2;font-size:16px;">دىققەت قىلىشقا تېگىشلىك ئىشلار</p>
<p>1. ھەرقانداق قانۇنسىز توربەت قوشۇشقا بولمايدۇ.</p>
<p>2.title خەتكۈچى قالايمىقان توربەتلەر ئۆچىرىلىدۇ.</p>
<p>3.ئۇزۇن مۇددەت زىيارەت قىلغىلى بولمايدىغان توربەتلەر ئۆچۈرۈلىدۇ.</p>
</li>
</ul>
<div class="ulanma">
	<!--
      <ul>
        <li><a  href="https://www.bing.com"   class="on" >Bing</a></li>
        <li><a  href="https://www.baidu.com">Baidu</a></li>
		 <li><a href="https://www.sogou.com/" target="_blank" >Sougou</a></li>
		 <li><a href="https://www.so.com/"    target="_blank">So</a></li>
        <li><a href="http://www.izda.com" >Izda</a></li>
        <li><a href="https://www.seznam.cz/" >Seznam</a></li>
        <li><a href="https://www.ecosia.org/" >Ecosia</a></li>
        <li><a href="https://www.naver.com/" target="_blank" >Never</a></li>
	    <li><a href="http://www.yandex.eu"    target="_blank">Yandex</a></li>
      </ul>
	  -->
     <a href="http://www.bilbil.top">@BilBil Search</a><a id="san" ></a>
    </div>
</body>
</html>


