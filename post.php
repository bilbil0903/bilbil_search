<?php
echo getUrlContent();
 function getUrlContent()
    {

        $origin = 'https://api-b2b.backenster.com'; //目标网址
        $referer = "https://lingvanex.com/";
        $apiUrl = $origin . "/b1/api/v3/translate/";//请求的api地址
        $data = array(
  'from' => 'zh-Hans_CN',
  'to' => 'ug_UG',
  'text'=>'你好',
  'platform'=>'dp'
);//此处填写的是银行卡或者信用卡的卡号
		
	
        $header = [
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Accept-Language: zh-CN,zh;q=0.9',
          ///  'Connection: keep-alive',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'Origin: ' . $origin,
            'Referer:' . $referer,
			'Authorization : Bearer a_25rccaCYcBC9ARqMODx2BV2M0wNZgDCEl3jryYSgYZtF1a702PVi4sxqi2AmZWyCcw4x209VXnCYwesx',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36 Edg/108.0.1462.46',
           // 'X-Requested-With: XMLHttpRequest',
        ];
        // 初始化一个curl会话
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
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

?>