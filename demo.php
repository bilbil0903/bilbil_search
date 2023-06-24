<?php
ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; 4399Box.560; .NET4.0C; .NET4.0E)');
header('Content-type: text/html; charset=utf-8');
require('phpQuery.php');
$url="https://mp.weixin.qq.com/s/kkBOCrQHvYWgi0tpTa0Rlw#rd";
$eg1=phpQuery::newDocumentFile($url);
$mazmun = pq("*")->html();      

// 替换meta keyword
preg_match("/<meta\s+property=[\"']og:image[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$image);
preg_match("/<meta\s+property=[\"']og:url[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$url);
preg_match("/<meta\s+property=[\"']og:title[\"'].*?content=[\"']([\S\s]*?)[\"'].*?[\/]?>/i", $mazmun,$title);
echo $url[1];

?>