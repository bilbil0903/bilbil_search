<?php
header('Content-Type:text/html; charset=UTF-8');
error_reporting(0);
require('phpQuery.php');
include 'global.php';
require("adam.php");
$url = base64_decode($_GET["url"]);
$title=title($url,"/<title ([\S\s]*?)>(?<title>.*?)<\/title>/si","/<title>(?<title>.*?)<\/title>/si");
$title=str_replace("Nur.cn - Nur online----Sports|world News|IT News|china News|Local News Business-","",$title);
if($url!=""&&$title!=""&&strstr($title,"not found")==""&&strstr($title,"Bad request")==""&&strstr($title,"无法")==""&&strstr($title,"找回")==""&&strstr($title,"404")==""&&strstr($title,"未找到页面")==""&&strstr($title,"Denied")==""&&strstr($title,"Sina")==""&&strstr($title,"<")==""&&strstr($title,"403")==""&&strstr($title,"登录")==""&&strstr($title,"注册")==""&&strstr($title,"搜素")==""&&strstr($title,"专题")==""&&strstr($title,"كىنو ئامبىرى")==""){
 mysql_query("set names utf8");
     $is= mysql_fetch_array(mysql_query("SELECT title from ambar where url='$url' "))["title"];
	       if(is_null($is)){
	         mysql_query("insert into ambar(url,title,time,jieshao,click,type) values ('$url','$title','2023','not',0,'3')");
			 echo "غەلبىلىك قوشۇلدى!";
			}else{
				echo "توربەت ئادىرىسى قوشۇلۇپ بولغان!";
			}
}else{
echo "تور بەت ئادىرىسى خاتا!";
}

function title($url,$match,$match2){
		$mazmun="";
	if(strstr($url,"mp.weixin.qq.com")==""&&strstr($url,"filim.kinobigim.top")==""&&strstr($url,"xdowns.com")==""&&strstr($url,"dytt8.net")==""&&strstr($url,"uycnr.com")==""&&strstr($url,"axpaz.cn")==""&&strstr($url,"kino.bilimnur.cn")==""&&strstr($url,"tasawur.cn")==""&&strstr($url,"muhpul.com")==""&&strstr($url,"mp.weixin.qq.com")==""&&strstr($url,"dilkan.ulunix.cn")==""&&strstr($url,"taxna.com")==""&&strstr($url,"sitar.cn")==""&&strstr($url,"bilimnur.com")==""&&strstr($url,"otkax.com")==""&&strstr($url,"mubarak.cn")==""&&strstr($url,"filim.com.cn")==""&&strstr($url,"saglamlik.cn")==""){
		$f = get($url);
		preg_match($match, $f, $title); //获取title的正则表达式
		$encode = mb_detect_encoding($title['title'], array('GB2312','GBK','UTF-8', 'CP936')); //得到字符串编码
		$file_charset = iconv_get_encoding()['internal_encoding']; //当前文件编码
		$mazmun= $title['title'];
		if ( $encode != 'CP936' && $encode != $file_charset ) {
			$mazmun= iconv($encode, $file_charset, $title['title']);
		}
		if($mazmun==""){
		$f = get($url);
		preg_match($match2, $f, $title); //获取title的正则表达式
		$encode = mb_detect_encoding($title['title'], array('GB2312','GBK','UTF-8', 'CP936')); //得到字符串编码
		$file_charset = iconv_get_encoding()['internal_encoding']; //当前文件编码
		$mazmun= $title['title'];
		if ( $encode != 'CP936' && $encode != $file_charset ) {
			$mazmun= iconv($encode, $file_charset, $title['title']);
	}}
	}elseif(strstr($url,"mp.weixin.qq.com")!=""){
$eg1=phpQuery::newDocumentFile($url);
   $mazmun = pq("h1")->html();
	}elseif(strstr($url,"dilkan.ulunix.cn")!=""){
  $eg1=phpQuery::newDocumentFile($url);
   $mazmun = pq(".movie-title")->html();
	}elseif(strstr($url,"taxna.com")!=""){
 $eg1=phpQuery::newDocumentFile($url);
   $mazmun = pq("h1.entry-title")->html();
	}elseif(strstr($url,"sitar.cn")!=""||strstr($url,"filim.com.cn")!=""||strstr($url,"muhpul.com")!=""){
  $eg1=phpQuery::newDocumentFile($url);
$mazmun = pq(".uqur_top")->html();
	}elseif(strstr($url,"bilimnur.com")!=""){
  $eg1=phpQuery::newDocumentFile($url);
$mazmun = pq(".current")->html();
	}elseif(strstr($url,"otkax.com")!=""){
  $eg1=phpQuery::newDocumentFile($url);
 $a = pq(".mazmun_title")->html();
$mazmun= mb_convert_encoding($a,'ISO-8859-1','UTF-8');
	}elseif(strstr($url,"mubarak.cn")!=""){
 $eg1=phpQuery::newDocumentFile($url);
$mazmun = pq(" h2")->html();
	}elseif(strstr($url,"saglamlik.cn")!=""){
 $eg1=phpQuery::newDocumentFile($url);
$mazmun = str_replace("مۇناسىۋەتلىك يازمىلار","",pq(" .title")->html());
	}elseif(strstr($url,"tasawur.cn")!=""){
 $eg1=phpQuery::newDocumentFile($url);
  $mazmun = pq(".main_dec")->html();
	}elseif(strstr($url,"kino.bilimnur.cn")!=""){
 $eg1=phpQuery::newDocumentFile($url);
  $mazmun = pq("h1.page-title")->html();
	}elseif(strstr($url,"axpaz.cn")!=""){
 $eg1=phpQuery::newDocumentFile($url);
  $mazmun = pq("div.tt")->html();
	}elseif(strstr($url,"uycnr.com")!=""){
 $eg1=phpQuery::newDocumentFile($url);
  $mazmun = pq("h2")->html();
	}elseif(strstr($url,"dytt8.net")!=""){
  phpQuery::$defaultCharset="gb2312";
  $eg1=phpQuery::newDocumentFile($url);
  $mazmun = pq("h1")->text();       
	}elseif(strstr($url,"xdowns.com")!=""){
 $eg1=phpQuery::newDocumentFile($url);
$mazmun = pq(".s-head-l h1 ")->text(); 
	}elseif(strstr($url,"filim.kinobigim.top")!=""){
$eg1=phpQuery::newDocumentFile($url);
$mazmun = str_replace("详情>>","",pq(".text-green")->text());  
	}
	return $mazmun;
		}
/**
 * curl获取数据
 * @param $url
 * @return mixed
 */
function get($url)
{
    $ifpost = 0;
    $datafields = '';
    $cookiefile = '';
    $v = false;
    //构造随机ip
    $ip_long = array(
        array('607649792', '608174079'), //36.56.0.0-36.63.255.255
        array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
        array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
        array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
        array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
        array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
        array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
        array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
        array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
        array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
    );
    $rand_key = mt_rand(0, 9);
    $ip= long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
//模拟http请求header头
    $header = array("Connection: Keep-Alive","Accept: text/html, application/xhtml+xml, */*", "Pragma: no-cache", "Accept-Language: zh-Hans-CN,zh-Hans;q=0.8,en-US;q=0.5,en;q=0.3","User-Agent: Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; WOW64; Trident/6.0)",'CLIENT-IP:'.$ip,'X-FORWARDED-FOR:'.$ip);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, $v);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $ifpost && curl_setopt($ch, CURLOPT_POST, $ifpost);
    $ifpost && curl_setopt($ch, CURLOPT_POSTFIELDS, $datafields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $cookiefile && curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
    $cookiefile && curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($ch,CURLOPT_TIMEOUT,60); //允许执行的最长秒数
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $ok = curl_exec($ch);
    curl_close($ch);
    unset($ch);
    return $ok;
}
?>