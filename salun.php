<?php
$vid=$_GET['vid'];
$url=$_GET['url'];
if($vid!=''&&strlen($vid)>15){
Header("Location:".post($vid));
}elseif($vid!=''){
	$ss=url($vid);
   Header("location:".$ss);
}elseif($url!=''){
	$mazmun=file_get_contents($url);
	$n1=strpos($mazmun,"window.__mpVideoTransInfo = [");
	$n2=strpos($mazmun,"video_quality_level");
	$mazmun=substr($mazmun,$n1,($n2-$n1)-11);
	$mazmun=str_replace('\x26amp;','&',$mazmun);
	$n3=strpos($mazmun,'url');
	$mazmun=substr($mazmun,$n3+6);
	Header("Location:".$mazmun);
}else{
	echo 'writed by stain on 2020/12/10';
}
function post($data){
	$opts = array(
    'http' => array(
        'method' => 'POST',
        'heade' => "Content-type:application/x-www-form-urlencoded Content-Length:".strlen ($data),
        'content' =>'vid='.$data
    )
);
$context = stream_context_create($opts);
$mazmun=file_get_contents('https://mp.weixin.qq.com/mp/videoplayer?action=get_mp_video_play_url',false,$context);
$mazmun=json_decode($mazmun,TRUE);
$mazmun=$mazmun['url_info'][0]['url'];
return $mazmun;
}
function url($id){
$url="http://vv.video.qq.com/getinfo?vid=".$id."&platform=101001&charge=0&otype=json&defn=shd";
 $ch = curl_init();
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest","Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
        $str= curl_exec($ch);
$json_data=str_replace(";","",$str);
$json_data=str_replace("QZOutputJson=","",$json_data);
  $json_data=json_decode($json_data,TRUE);
$fvkey= $json_data['vl']['vi'][0]['fvkey'];
$filename =$json_data['vl']['vi'][0]['fn'];
    $baseUrl = $json_data['vl']['vi'][0]['ul']['ui'][3]['url'];
    $result =$baseUrl.$filename.'?vkey=' . $fvkey;
return $result;
}
?>