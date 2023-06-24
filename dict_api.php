<?php
$wd=$_GET["word"];
if($wd!=""){
include 'global.php';
mysql_query('set names utf8');
$dict= mysql_fetch_array(mysql_query("SELECT soz,unsoz from dict where soz='$wd' and type='ug-cn'"));
$unsoz2= mysql_fetch_array(mysql_query("SELECT soz,unsoz from dict where soz='$wd' and type='ug-cn'"))["unsoz"];
$soz=$dict["soz"];
$unsoz= $dict["unsoz"];
if($unsoz2!=""){
	//$unsoz2=$unsoz2." (维汉词典)";
}
echo json_encode(array("soz"=>$soz,"unsoz"=>$unsoz,"unsoz2"=>""),JSON_UNESCAPED_UNICODE);
}
?>