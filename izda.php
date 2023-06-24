<?php
header('Content-Type:text/html; charset=UTF-8');
require "global.php";
require("adam.php");
require_once("embody/inc_page.php");
mysql_query('set names utf8');
$wd=$_GET["wd"];
if( $wd==""){
	Header("Location:/index.php");
}
    $search=new search();
	$data=$search->q($wd);
	// print_r($data);die();
	$total=$search->total;
	$wd_split=$search->wd_split;
	$wd_array=$search->wd_array;
	// print_r($wd_array);die();
	$wd_count=$search->wd_count;
	$totalpage=$search->totalpage;
     $result = mysql_query("SELECT word from keywords where word='$wd'");
           $row = mysql_fetch_row($result);
	       if($row[0]==""){
	        mysql_query("insert into keywords(word) values ('$wd')");		
}
?>
<!DOCTYPE html>
<html lang="ug">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" sizes="any" mask href="./favicon.ico">
<meta name="keywords" content="bilbil,bilbil.top,uyghur,izda，维搜,搜索引擎,ئىزدەش,كىنو" />
<meta name="description" content="BilBil-维语全文搜索引擎" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>BilBil-<?php echo $wd;?></title>
<script type="text/javascript" src="js/ug.js"></script>
<script type="text/javascript">
   var UG_VK_OPTS = {
                all: true
            };
  </script>
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
	width:70%;
	}
form{
 position: relative;
  margin: 0 auto;
}
.yexil{
	direction: rtl;
    margin-left: 30%;
    margin-right: 30%;
	margin-top:2%
}

.yexil input {
  width: 100%;
  height: 42px;
  min-width:220px;
  padding-left: 10px;
  padding-right:100px;
  border: 2px solid #4007a2;
  border-radius: 5px;
  outline: none;
  background: #ffffff;
  color: #9E9C9C;
}
.asti {
    text-align: center;
    width: 100%;
    position: absolute;
    left: 0;
bottom: -4%;}
.asti a{
	 text-decoration:none;
  direction: rtl;
  font-size: 15px;
  color: #000000;
}
.ulanma li{
	display:inline;
	weight:100%;
	padding-left:20px;
	list-style-type:none;
}
.ulanma a{
	font-size:15px;
	color:#000;
	text-decoration: none;
}
.yexil a {
  width: 100%;
  height: 42px;
  text-decoration:none;
  padding-left: 1%;
  padding-top: 1px;
  padding-bottom: 1px;
  padding-right:4px;
  direction: rtl;
  border: 1px solid #4007a2;
  border-radius: 4px;
  outline: none;
  background: #4007a2;
  color: #ffffff;
}
.bat a {
  width: 100%;
  height: 42px;
  text-decoration:none;
  padding-left: 1%;
  padding-top: 1px;
  padding-bottom: 1px;
  padding-right:4px;
  direction: rtl;
  border: 1px solid #4007a2;
  border-radius: 4px;
  outline: none;
  background: #4007a2;
  color: #ffffff;
}
.kur a {
  text-decoration:none;
  direction: rtl;
  font-size: 15px;
  color: #4007a2;
}
.kur p {
  text-decoration:none;
  direction: rtl;
  font-size: 15px;
  color: #006d21;
}
.natija span{
  font_size:10px;
  margin-right:85px;
}
.kur{
	padding: 16px 0;
	margin:0;
	padding:0;
}
.kur span{
	color: #006d21;
	font-size:13px
}
#logo{
	position:relative;
	left: 50%;
	margin-left: 35%;
    margin-right: 80%;
	margin-left: -185px;
	
	
}
.kur li{
    padding: 13px 0;
    border-top: 1px solid #e0e0e0;
    list-style: none;
	width:100%;
	max-width:80%;
	margin-right:50px;
	margin-left:100px;
}
.natija{
	  direction: rtl;
	  margin-top: 1%;
	  margin-right: 30%;
}
.bat{
	  direction: rtl;
	  margin-top:10px;
}
.natija span {
	 font-size:10px;
}
.yexil button {
  position: absolute; 
  top: 0;
  right: 0px;
  width: 90px;
  height: 42px;
  border: none;
  color:#ffffff;
  background-color:#4007a2;
  border-radius: 0 5px 5px 0;
}
.bat{
	top:0;
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
</head>
<body id="c">
<div class="yexil" id="box"  >
<img id="logo" src="index.png" width="270" height="129"  >
<form method="get" accept-charset="utf-8" >
<input type="text"  name="wd" required="required" id="input" autocomplete="off"  maxlength="100"  value="<?php echo $wd;?>" oninput="OnInput (event)"/>
<button type="submit" >ئىزدەش</button>
<ul id="list">
        <li class="current_li">
		<a href="/izda.php?wd=<?php echo $wd;?>" class="current" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">توربەت</a></li>
        <li><a href="/dict.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">لوغەت</a></li>
        <li><a href="/translate.php?wd=<?php echo $wd;?>" style="background-color:#ffffff;color:#000000; border:0px; font-size:15px;">تەرجىمان</a></li>
    </ul>
 </form>  
 
 </div>
 <br>
 <div id="ulanma">
<div class="natija" >
<?php
if(number_format($total)!=0){
	?>
<span >جەمئى <?php echo number_format($total);?> نەتىجە تېپىلدى.  </span>

<?php
}else{
	?>
	<a style="margin-left:20px; font-size:20px"><span style="color:red; font-size:20px"><?php echo $wd ?></span> كە مۇناسىۋەتلىك مەزمۇن تېپىلمىدى!</a><br>
	<img src="./404.png"/ style="width:360px;height:360px;  "><br>
	<p style="height:35vh"/>
<?php } ?>
</div>
<div id="natija_list">
<ul id="m-result" class="result">
<?php
$i=0;
$dict= mysql_fetch_array(mysql_query("SELECT soz,unsoz from dict where soz='$wd'"));
$soz=$dict["soz"];
$unsoz= $dict["unsoz"];
if($total>0){
  foreach($data as $link)
  { 

  $i++;
?>


<div class="kur">
<?php
if ($i==1&&$soz!=""){
	if($_GET["p"]==1||$_GET["p"]==""){
	echo "<li style='width:80%;'><h1>$soz</h1><a style='color:#000000;'>$unsoz</a>.</li>";
	}
}
?>
<li >
<?php
//if($link["type"]!=0){
?>

<h3 class="res-title mark-nowrap">
<?php
if(strstr($link["url"],"http")==""){
	$link["url"]="http://".$link["url"];
}
?>
<a href="<?php echo $link["url"];?>" target="_blank" >
<IMG border=0 class="favicon_img" onerror="javascript:this.style.display='none'" src="<?php echo parse_url($link["url"])["scheme"]."://".parse_url($link["url"])["host"];?>/favicon.ico" width=18 height=18>
<?php echo $link["title"];?></a></h3>
<?php
$url=$link["url"];
if(strlen($url)>60){
$url="...".substr($link["url"],0,60);
}
?>
<span><?php echo $url?></span><span class="sep1"></span>

<?php 
//}elseif($link["type"]==0){
?>
<!--
<div style="direction:ltr">
<script src="./js/jquery-3.6.1.min.js"></script>
<script src="js/fraudio.min.js"></script>
<link href="js/fraudio.min.css" rel="stylesheet" type="text/css" />
<audio preload="none" class="fraudio" src="<?php echo $link["url"]?>" data-title="<?php echo $link["title2"]?>"></audio>
</div>
-->
<?php 
//} 
?>
</li>

<?php
}}
?>
</div>
</ul>
<div class="bat">
<?php
   $page = new Page($totalpage,"?wd=".$wd."&p=");
   echo $page->show();
?>
</div>


</div>
</div>





<?php
if($total<10){
	echo '<p style="height:53vh"/>';
}
?>
<script src="./js/common.js"></script>
<script src="./js/tawsiya.js"></script>
<script src="./js/jquery-3.6.1.min.js"></script>  
<script>
$(document).ready(function(){
	$("a").click(function(){
		var url=$(this).attr('href')
		$.get("./click.php?url="+window.btoa(url),function(data,status){
		});
	});
});
	
		$.get("./adam.php?type=see",function(data,status){
			$("#san").text("("+data+") :توردىكىلەر  ");
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
    window.location.href='/index_m.php';
   }else{
		
	}
}
$(function(){
	browserRedirect();
});
</script>
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
     <a id="san" ></a><a href="http://www.bilbil.top"> @BilBil Search</a>
    </div>
</body>
</html>