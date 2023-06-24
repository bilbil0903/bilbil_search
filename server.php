<?php
header('Content-Type: text/html; charset=utf-8');

// 获取POST数据并进行转义和编码
$from =$_POST['from'];
$to = $_POST['to'];
$text =base64_encode($_POST['text']);
$type = $_POST['tur'];
if($text!=""){
if($type=="bing"){
ob_start(); 
$output = system("/usr/bin/python3 api2.py $from $to $text");
ob_end_clean();
echo $output;
}elseif($type=="google"){
ob_start(); 
$output = system("/usr/bin/python3 api.py $from $to $text");
ob_end_clean();
echo $output;
}else{
  echo "none-_-";
}
}
?>