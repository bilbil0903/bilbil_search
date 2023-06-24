<?php
//hatalikni yokitix 
error_reporting(0);
define("PATH",getdirname(__FILE__));
require PATH."data/db_config.php";
require PATH."embody/db_mysql.class.php";
date_default_timezone_set('PRC');
$db=new db_mysql;
$db->connect($dbhost,$dbuser,$dbpw,$dbname,$dbpconnect,$dbcharset);

function getdirname($path=null){

	if (!empty($path)) {

		if (strpos($path,'\\')!==false) {

			return substr($path,0,strrpos($path,'\\')).'/';

		} elseif (strpos($path,'/')!==false) {

			return substr($path,0,strrpos($path,'/')).'/';

		}

	}

	return './';

}
require PATH."embody/search.class.php";
?>