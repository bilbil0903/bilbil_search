<?php
  //error_reporting(0);
 $words=$_GET['word'];
  if($words!=""){
  include 'global.php';
  mysql_query('set names utf8');
  $myrs=mysql_query("SELECT title FROM ambar  WHERE title LIKE '$words%' ORDER BY CASE WHEN title LIKE '$words' THEN 1 WHEN title LIKE '$words%' THEN 2  ELSE 3  END limit 10");
  if($myrs)
  {
    while($row=mysql_fetch_array($myrs))
    {
      $temp[]=$row;
    }
  echo  json_encode($temp, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
  }
  }
?>