<?php
header('Content-Type:text/html; charset=UTF-8');
include 'global.php';
mysql_query("set names utf8");
set_time_limit(0);
header("Connection: close");
 function getUrlContent($url)
    {
        $header = [
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
//            'Accept-Encoding: gzip, deflate, br',
            'Accept-Language: zh-CN,zh;q=0.9',
            'Connection: keep-alive',
            'Content-Type: application/json; charset=UTF-8',
			 'Origin: ' . $url,
            'Referer:' . "https://mp.weixin.qq.com/cgi-bin/appmsg?t=media/appmsg_edit_v2&action=edit&isNew=1&type=10&token=1892542393&lang=zh_CN",
//            'Cookie: PHPSESSID=340abf1a618653fef13589101044e994; ZDEDebuggerPresent=php,phtml,php3; CNZZDATA1583751=cnzz_eid%3D572091052-1569547668-%26ntime%3D1569553068',
//            'Host: localhost_mlf.com',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36',
            'X-Requested-With: XMLHttpRequest',
        ];
        // 初始化一个curl会话
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt ($ch, CURLOPT_COOKIE , "rand_info=CAESIG0tu5oM8Kp3bzucpmTPZfcieVBuGO9mPZuSkidbkYln; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;slave_bizuin=3868568713; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;data_ticket=AaR5pdHAysBP9UjNk4o+ZQEDB4t8aNeTVr7E1frCWsdpwrTvXQ02VRIIe+F/jKyb; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;data_bizuin=3868568713; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;bizuin=3868568713; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;slave_sid=eUI0UHBQUVVRN1NrMjU0cks4VVU1eTZ6M1lBSHJsUTF0ZzZEME9PdVRmVjhTUDUzT1pMbVJraTE3V0liaUFxZzBXOF9FdzB3VzZ1cnkwWVNrYUhjbndpQXZoMThXZU9DTmV6U3FvRGhRbFJCbHBvMG42NVFnNmo0Z2RVNzN5ZFEySDdxQkdYV1phOWJ3SFlv; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly;slave_user=gh_edc65cf098b4; Path=/; Expires=Tue, 27-Dec-2022 09:50:46 GMT; Secure; HttpOnly");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1); //设置为POST方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); //数据传输
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //解决重定向问题

        // 执行一个curl会话
        $contents = curl_exec($ch);
        // 返回一个保护当前会话最近一次错误的字符串
        $error = curl_error($ch);
        if ($error) {
            echo 'Error: ' . $error;
        }
        // 关闭一个curl会话
        curl_close($ch);
        return $contents;
    }
for($i=0;$i<=9;$i++){
 $mazmun=json_decode(getUrlContent("https://mp.weixin.qq.com/cgi-bin/appmsg?action=list_ex&begin=0&count=500&fakeid=MzIyMDU5MzU1Ng==&type=9&query=$i&token=1892542393&lang=zh_CN&f=json&ajax=1"),true);
 for($i2=0;$i2<count($mazmun["app_msg_list"]);$i2++){
	 $title=$mazmun["app_msg_list"][$i2]["title"];
	 $img=$mazmun["app_msg_list"][$i2]["cover"];
	 $link=$mazmun["app_msg_list"][$i2]["link"];
	  $type=$mazmun["app_msg_list"][$i2]["digest"];
	  if($type!="广告"){
	 $is= mysql_fetch_array(mysql_query("SELECT title from ambar where url='$link' "))["title"];
	       if(is_null($is)){
	         mysql_query("insert into ambar(url,title,time,jieshao,click,type,img) values ('$link','$title','2023','not',0,'3','$img')");
			 
			}
	  }
 }
 echo $i."<br>";
 sleep(10);
 }

?>