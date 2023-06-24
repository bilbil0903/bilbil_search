<?php
header("Content-Type:text/html; charset=utf-8");
error_reporting(0);
set_time_limit(0);
require("adam.php");
require "global.php";
require('phpQuery.php');
header("Connection: close");
$url=base64_decode($_POST["url"]);
if($url!=""){
$s= get($url,"https://baidu.com","");
$eg1=phpQuery::newDocumentFile($url);
$mazmun = pq("*")->html();      
preg_match("/<meta\s+property=[\"']og:image[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$image);
preg_match("/<meta\s+property=[\"']og:url[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$adiris);
preg_match("/<meta\s+property=[\"']og:title[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$title);
$panduan=strstr($url,"mp.weixin.qq.com");
$nj="";
$natija=g($mazmun)[0];
for($i=0;$i<count($natija);$i++){
	$n=$natija[$i-1];
	if($n!=$natija[$i]){
     $nj=$nj.$natija[$i]."<br>";
	}
}
$mazmun=array("name"=>$title[1],"img"=>$image[1],"wxv"=>$nj);
echo json_encode($mazmun,JSON_UNESCAPED_UNICODE);
if(!is_null($panduan)&&$image[1]!=""&&$title[1]!=""){
mysql_query("set names utf8");
$result = mysql_query("SELECT title from ambar where url='$url'");
$row = mysql_fetch_row($result);
	  if($row[0]==""){
	 mysql_query("insert into ambar(url,title,time,jieshao,click,type,img) values ('$url','$title[1]','2023','not',0,'3','$image[1]')");
}}
}else{
	echo "Do You WANNA BE HACKER?";
}
function g($str)
{
$match_str = "%wxv_.*?...................%";
preg_match_all ($match_str,$str,$out,PREG_PATTERN_ORDER);
return $out;
}
function get($url, $referer, $cookie) {
  $header = array();
  $header[] = 'Accept: image/gif, image/jpeg, image/pjpeg, image/pjpeg, application/x-ms-application, application/x-ms-xbap, application/vnd.ms-xpsdocument, application/xaml+xml, */*';
  $header[] = 'Connection: Keep-Alive';
  $header[] = 'Accept-Language: zh-cn';
  $header[] = 'Cache-Control: no-cache';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (iPhone; CPU iPhone OS 5_1 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Mobile/9B176 MicroMessenger/4.3.2');
  curl_setopt($ch, CURLOPT_REFERER, $referer);
  curl_setopt($ch, CURLOPT_COOKIE, $cookie);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
?>