<?php 
error_reporting(0);
$wd=$_GET["wd"]; 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BilBil-机器翻译 (ئۇيغۇرچە تەرجىمان)</title>
<meta name="keywords" content="bilbil,bilbil.top,人工翻译,机器翻译,تەرجىمان,维语翻译" />
<meta name="description" content="维吾尔语-国语-英语-日语-韩语相互翻译 كۆپ خىل تىللىق تەرجىمان" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="icon" sizes="any" mask href="./favicon.ico">
<script type="text/javascript" src="js/ug.js"></script>
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
	background:#dee5ef;
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
  width: 100%;
  height: 46px;
  margin-top:10px;
  border: none;
  color:#ffffff;
  background-color:#4007a2;
  border-radius: 5px;
  cursor: pointer;
}

form{
  position: relative;
  margin: 0 auto;
}
.yexil textarea {
  width: 100%;
  height:150px;
  padding-left: 10px;
  padding-right: 10px;
  padding-top:10px;
  padding-bottom:10px
  padding-left: 3px;
  direction: rtl;
  border: none;
  border-radius: 5px;
  outline: none;
  background: #ffffff;
  color: #000000;
}
#tarjiman{
	width:100%;
}
.yexil select{  
    line-height:28px;   
    -moz-border-radius:2px;  
    -webkit-border-radius:2px;  
    border-radius:6px;  
	border:none;
     height: 34px;
	  background: #ffffff;
	 margin-top:5px;
	 width:260px;
	 margin-bottom:10px;
	color:#000;
         
}  

.yexil{
	direction: rtl;
  position: absolute;
  right: 25%;
  margin-left:15px;
  left: 25%;
  top: 10%;
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
	.asti {
    text-align: center;
    width: 100%;
    position: absolute;
    left: 0;
bottom: -30%;}
</style>
<script type="text/javascript">
   var UG_VK_OPTS = {
                all: true
            };
  </script>
</head>
<body id="c">
<!--
<div class="top">
 <a href="./add.php">توربەت قوشۇش</a>     <a href="./wxv.php">سالۇن ياردەمچىسى</a>
 </div>
 -->
 
<div class="yexil" id="box" >
<img id="logo" src="index.png" width="270" height="129"  >
<div id=ramka >
<ul id="list">
        <li >
		<a href="/izda.php?wd=<?php echo $wd;?>" class="current" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">توربەت</a></li>
        <li ><a href="/dict.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">لوغەت</a></li>
        <li class="current_li"><a href="/translate.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">تەرجىمان</a></li>
    </ul>
	<br>
 </div>  
       <textarea placeholder="تەرجىمە مەزمۇنىكى كىرگۈزۈڭ..." ><?php echo $wd;?></textarea>

<select id="tarjiman" >
		 <option value="bing">Bing</option> 
        <option value="google">Google</option>
	 </select>

	 <br>
    <select id="tur1" >
		 <option value="ug">ئۇيغۇرتىلى</option> 
        <option value="zh-CN">دۆلەت تىلى</option>
		  <option value="en">ئېنگىلىز تىلى</option>
        <option value="ru">روس تىلى</option>
		<option value="ja">ياپونىيە تىلى</option>
        <option value="ko">كورىيە تىلى</option>
       <option value="kk">قازاقچە</option>
	 </select>
		 <select id="tur2" >
		 <option value="zh-CN">دۆلەت تىلى</option>
		  <option value="ug">ئۇيغۇرتىلى</option> 
		  <option value="en">ئېنگىلىز تىلى</option>
        <option value="ru">روس تىلى</option>
		<option value="ja">ياپونىيە تىلى</option>
        <option value="ko">كورىيە تىلى</option>
         <option value="kk">قازاقچە</option>
    </select>
	   <textarea  id="natija" ></textarea>
	  <br>
       <button type="submit" onclick="tarjiman()">تەرجىمە قىلىش</button>
</div>
  <div class="asti">
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
<script src="./js/jquery-3.6.1.min.js"></script>  
<script>
		$.get("./adam.php?type=see",function(data,status){
			$("#san").text("("+data+") :توردىكىلەر ");
	});
	$(document).ready(function() {
        tarjiman = function ()  {
          var til1=$("#tur1 option:selected").val();
		  var til2=$("#tur2 option:selected").val();
		 var tarjiman=$("#tarjiman option:selected").val();
             var mazmun=$("textarea").val();
          $.ajax({
            url: "server.php",
            type: "POST",
            data: {
              text: mazmun,
              from: til1,
              to: til2,
              tur: tarjiman
            },
            success: function(data) {
              $("textarea#natija").val(data);
            }
          });
        };
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
   }else{
		
	}
}
$(function(){
	browserRedirect();
});
            
	    var UG_VK_OPTS = {
                all: true
            };
			// 支持 IE9+均支持、Google
function xml2String(xmlObject) {
	//所有浏览器统一用这种方式处理(因为高版本的浏览器都支持)
	return (new XMLSerializer()).serializeToString(xmlObject);
}
</script>
</body>
</html>


