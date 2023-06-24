<?php 
//error_reporting(0);
$wd=$_GET["wd"];
if($wd==""){
	require "global.php";
	mysql_query('set names utf8');
	$wd= mysql_fetch_array(mysql_query("SELECT soz from dict order by  rand() limit 1"))["soz"];
	Header("Location:/dict.php?wd=".$wd);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BilBil-词典 (ئۇيغۇرتىلى ئىزاھلىق لوغىتى)</title>
<meta name="keywords" content="bilbil,bilbil.top,uyghur,词典，维吾尔语词典,لوغەت,ئۇيغۇرچە لوغەت" />
<meta name="description" content="ئۇيغۇرتىلى ئىزاھلىق لوغىتى-维语词典" />
<link rel="icon" sizes="any" mask href="./favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<script type="text/javascript" src="js/ug.js"></script>
<script src="./js/common.js"></script>
<script src="./js/dict.js"></script>
<script src="./js/jquery-3.6.1.min.js"></script>  
<style>
@font-face {  
	font-family: "ALKATIP Tor";  
	src: local("ALKATIP Tor"), url(img/ALKATIP-Tor.ttf) format("opentype"); /* non-IE */  
}
* {
	margin: 0;
	padding: 0;
	font-family: "ALKATIP Tor";
}
body{
	background:#fff;
	color:#333;
	min-height:100vh;
	position:relative;
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


.yexil button {
  position: absolute; 
  top: 0;
  right: 0px;
  width: 90px;
  height: 46px;
  border: none;
  color:#ffffff;
  background-color:#4007a2;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
}

#ramka{
  position: relative;
  margin: 0 auto;
}
.yexil input {
  width: 100%;
  height: 42px;
  padding-left: 10px;
  padding-right: 100px;
  padding-left: 5px;
  direction: rtl;
  border: 2px solid #4007a2;
  border-radius: 5px;
  outline: none;
  background: #ffffff;
  color: #000000;
}
.yexil{
	direction: rtl;
    position: absolute;
  right: 25%;
  margin-left:15px;
  left: 25%;
	margin-top:2%
}
.kur{
	list-style-type:none;
		margin-top:30px;
}
.ulanma{
	text-align:center;
	width:100%;
	padding-top: 5px;
	position: absolute;
	left: 0;
	bottom: 0;
}

.ulanma li{
	display:inline;
	weight:100%;
	
	list-style-type:none;
}
.ulanma a{
	color:#000;
	font-size:14px;
}
 /*下划线跟随*/
    ul{
        display: flex;
        position: initial;
    }
    li{
        position: relative;
        padding: 1em 1em;
        font-size: 12px;
        list-style: none;
        width:100%;
        text-align: right;
    }
    li.current_li{
        list-style-type:none;
        border-bottom:3px solid #4007a2;
        padding-bottom: 2px;
    }
    li::after{
        content: '';
        position: absolute;
        bottom: 0;
        width: 0;
        height: 4px;
        color: #ff231c;
        background-color: #4007a2;
        transition: .5s all linear;
    }
    li:hover::after{
        width: 100%;
    }
	#list li{width:60px; direction:rtl;}
    li::after{
        left: 100%;     /*选中项上一个下划线收回的方向，从左往右收线*/
    }
    li:hover::after{
        left: 0;      /*选中项下划线出线的方向，从左往右出线*/
    }
    li:hover ~ li::after {
        left: 0;    /*选中项下一个下划线出线的方向，从左往右收线*/
    }
</style>
<script type="text/javascript">
function browserRedirect() {
	var sUserAgent = navigator.userAgent.toLowerCase();
  	var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
  	var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
  	var bIsMidp = sUserAgent.match(/midp/i) == "midp";
  	var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
  	var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
  	var bIsAndroid = sUserAgent.match(/android/i) == "android";
  	var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
  	var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
  	if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM){
   	}else{
		window.location.href='/index.php';
	}
}
$(function(){
	browserRedirect();
});
   var UG_VK_OPTS = {
                all: true
            };
  </script>
</head>

<body id="c">
<div class="yexil" id="box"  >
<img id="logo" src="index.png" width="270" height="129"  >
<div id=ramka >
<input type="text"  name="wd" required="required" id="input" autocomplete="off"  maxlength="100"  value="<?php echo $wd;?>" oninput="OnInput (event)"/>
<button type="submit" >ئىزدەش</button>
<ul id="list">
        <li >
		<a href="/izda.php?wd=<?php echo $wd;?>" class="current" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">توربەت</a></li>
        <li class="current_li"><a href="/dict.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">لوغەت</a></li>
        <li><a href="/translate.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">تەرجىمان</a></li>
    </ul>
	<br>
<li id="ulanma" class="kur">
	   <h1 id="soz"></h1>
	   <p id="unsoz"></p>
	   <p id="unsoz2"></p>
	   </li>  
 </div>  
 
 </div>

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
     <a href="http://www.bilbil.top">@BilBil Search</a><a id="san" > </a>
    </div>

<script>
		$.get("./adam.php?type=see",function(data,status){
			$("#san").text(""+data+" :توردىكىلەر ");
			var word=$("input").val();
			$.get("./dict_api.php?word="+word,function(data,status){
			var json =JSON.parse(data);
			$("#soz").text(json.soz);
			$("#unsoz").text(json.unsoz);
			$("#unsoz2").text(json.unsoz2);
		});
	});
	$(document).ready(function(){
	$("button").click(function(){
		var word=$("input").val();
		$.get("./dict_api.php?word="+word,function(data,status){
			var json =JSON.parse(data);
			$("#soz").text(json.soz);
			$("#unsoz").text(json.unsoz);
			$("#unsoz2").text(json.unsoz2);
		});
	});
	
});
			function browserRedirect() {
	var sUserAgent = navigator.userAgent.toLowerCase();
  	var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
  	var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
  	var bIsMidp = sUserAgent.match(/midp/i) == "midp";
  	var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
  	var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
  	var bIsAndroid = sUserAgent.match(/android/i) == "android";
  	var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
  	var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
  	if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM){
    $("#box").css('left','15px'); 
	$("#box").css('right','15px'); 
	$("input").css('width','75%'); 
   }else{
		
	}
}
$(function(){
	browserRedirect();
});
	    var UG_VK_OPTS = {
                all: true
            };
</script>
</body>
</html>


