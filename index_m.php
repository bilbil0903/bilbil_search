<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BilBil-维搜 (ئۇيغۇرچە ئىزدەش ماتورى)</title>
<meta charset="utf-8" />
<link rel="icon" sizes="any" mask href="./favicon.ico">
<meta name="keywords" content="bilbil,bilbil.top,uyghur,izda，维搜,搜索引擎,ئىزدەش,كىنو" />
<meta name="description" content="BilBil-维语全文搜索引擎，提供高质量搜索结果" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<script type="text/javascript" src="js/ug.js"></script>
<script src="./js/common.js"></script>
<script src="./js/tawsiya.js"></script>
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

form{
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
    margin-left: 100px;
	padding-left:20px;
    margin-right:20px;
	margin-top:2%
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
.awat{
	direction: rtl;
	margin-top:1%;
	margin-left: 5%;
    margin-right: 5%;
	background: #fff;
	weight:500px;
	float :right;
	width: 90%;
}
#logo{
	position:relative;
	left: 50%;
	margin-left: 35%;
    margin-right: 65%;
	margin-left: -185px;
	
	
}
.top{
  text-align:right;
  color:#1070bd;
  width:auto;
  height:25px;
  font-size:13px;
  padding:10px;
  padding-left:10px;
  background-size:100px;
  border-radius:2px;
  }
.awat li {
			
			width: 100%;
			border-bottom: 1px solid #b8c2cc;
			line-height: 46px;
			height: 46px;
			overflow: hidden;
			color: #525C66;
			font-size: 14px;

		}
		.awat li:before {
			counter-increment: section;
			content: counter(section);
			display: inline-block;
			padding: 0 12px;
			margin-right: 10px;
			height: 18px;
			line-height: 18px;
			background: #b8c2cc;
			color: #fff;
			border-radius: 3px;
			font-size: 9px
		}
		.rang :nth-child(-n+3):before {
			background: #4007a2;
		}

.awat ul {
			counter-reset: section;
			
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

<div class="top">
 <a href="./dict.php">لوغەت</a>    
 <a href="./translate.php">تەرجىمان</a>      
 <a href="./add.php">بىكەت باشلىقى</a> 
 <a href="./wxv.php">سالۇن ياردەمچىسى</a>
 </div>
<div class="yexil" id="box" >
<img id="logo" src="index.png" width="270" height="129"  >
     <form method="get"  name="f" action="izda_m.php"  class="form" accept-charset="utf-8" >
       <input required="required"  id="input" placeholder="سىز ئىزدەڭ مەن تاپاي..."   name="wd"  autocomplete="off"  maxlength="100"  oninput="OnInput (event)"/>
       <button type="submit" name="" value="" class="s_buttom">ئىزدەش</button>
     </form>
</div>
<?php
require "global.php";
require "adam.php";
mysql_query('set names utf8');
$sql="select title,url,click,id from ambar order by rand() desc limit 6";
$result=mysql_query($sql);
//var_dump($data);
echo '<div class="awat" id="ulanma"><ul class="rang">';
 do{
	 if($link["url"]!=""){
	echo '<li><a id="hat" href="#" >'.$link["title"].'<a/></li>';
	 }
   }while($link=mysql_fetch_array($result));  
   echo "</ul></div>"
?>
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
      </ul>-->
     <a href="http://www.bilbil.top">@BilBil Search</a><a id="san" > </a>
    </div>

<script>
 $(document).ready(function () {
        $("[id=hat]").click(function () {
           var txt=$(this).text()
		 $(location).attr("href","./izda_m.php?wd="+encodeURIComponent(txt))
        })
    });
	
		$.get("./adam.php?type=see",function(data,status){
			$("#san").text("("+data+") :توردىكىلەر ");
	});
</script>
</body>
</html>


