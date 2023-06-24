<?php
error_reporting(0);
set_time_limit(0);
//header("Connection: close");
include 'global.php';
mysql_query('set names utf8');
  $myrs=mysql_query("SELECT url from ambar where url like '%www.nur.cn%' limit 50");
  if($myrs)
  {
    while($row=mysql_fetch_array($myrs))
    {
      $temp[]=$row;
    }
for($i=0;$i<count($temp);$i++){
$url=$temp[$i]["url"];
echo $url."<br>";
 }
  }
?>