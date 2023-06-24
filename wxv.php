<!DOCTYPE html>
<html>
<head>
<?php require("adam.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BilBil-wxv工具</title>
<link rel="icon" sizes="any" mask href="./favicon.ico">
<meta name="keywords" content="bilbil,bilbil.top,uyghur,izda，维搜,搜索引擎,ئىزدەش,كىنو" />
<meta name="description" content="BilBil-获取微信公众号视频wxv地址，并且支持在线播放" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
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
  height:25px;
  padding:10px;
  background-size:100px;
  border-radius:2px;
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
  color: #ffffff;
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
  .uqur{
  background-color:#4007a2;
  color:#ffffff;
  padding:5px;
  margin-top:10px;
  height:auto;
  margin-left: 6%;
  margin-right: 5%;
  display:none;
  width:85%;
  text-align:center;
  border-radius:8px;
  font-size:15px;
  }
</style>
</head>
<body>
<div class="top">
 سالون ياردەمچىسى
 
 </div>
 <br>
<div class="izdax_ramka" >
       <input required="required"   placeholder="سالۇن ئادىرىسىنى كىرگۈزۈڭ"   name="url" autocomplete="off"  id="url">
       <button type="submit"  onclick="submits()">ئىرىشىش</button>
	  <script src="./js/jquery-3.6.1.min.js"></script>  
	  <script src="https://cdn.bootcss.com/layer/2.3/layer.js"></script>
		<script>
			function submits(){
		layer.msg(' ...قوشىلىۋاتىدۇ،سەل ساقلاڭ',{time:9999999});
			    var url = $("#url").val();
			      if(url == ""){
			        alert("不能为空");
					 layer.close(layer.index);	
			        return false;
			      }
				  
			      $.ajax({
			        type : "POST",
			        url : "./all.php",
			        data: {url:window.btoa(url)},
			        dataType : "json",
			        success:function(data){
						 layer.close(layer.index);	
					   document.getElementById("name").innerHTML=data.name;
					   document.getElementById("wxv").innerHTML=data.wxv;
					   document.getElementById("rasimUrl").innerHTML=data.img;	
					   document.getElementById("uqur").style.display="block";	
                       document.getElementById("img").innerHTML="<img style='width:120px;height:120px' src='"+data.img+"' />";		
                       document.getElementById("play").innerHTML="<a href='http://bilbil.top/salun.php?vid="+data.wxv.split("<br>")[0]+"' target='view_frame'>قويۇش</a>";						   
			        },error:function(data){
						 layer.close(layer.index);	
			          alert("ئادرىس توغىرا ئەمەس ياكى نامەلۇم خاتالىق كۈرۈلدى!");
					  
			          return false;
			        }
			      });    
			  }
		</script>
		 <div class="uqur" id="uqur">
<p  id="name"/>
<hr style="height:1px;border:none;border-top:1px solid #ffffff;"/>
<p  id="wxv" />
<hr style="height:1px;border:none;border-top:1px solid #ffffff;"/>
<p  id="rasimUrl" />
<hr style="height:1px;border:none;border-top:1px solid #ffffff;"/>
<p  id="img"/>
<hr style="height:1px;border:none;border-top:1px solid #ffffff;"/>
<p  id="play" />
</div>
</div>
</body>
</html>


