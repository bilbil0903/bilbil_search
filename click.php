<?php
$url=base64_decode($_GET["url"]);
include 'global.php';
require("adam.php");
if($url!=""){
mysql_query("update ambar set click=click+1 where url='".$url."'");
}
?>