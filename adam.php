<?php
error_reporting(0);
$we=getenv('REMOTE_ADDR');
 $online_log='now.txt';
    $entries=file($online_log);
    $temp=array();
    for($i=0;$i<count($entries);$i++){
        $entry=explode(',',trim($entries[$i]));
        if(count($entry)>1){
            if(($entry[0]!=$we)&&($entry[1]>time())){
                array_push($temp,$entry[0].','.$entry[1]."\n");
            }
        }
    }
    array_push($temp,$we.','.(strtotime("+120second"))."\n");
    $users_online=count($temp);
    $entries=implode('',$temp);
    $fp=fopen($online_log,'w');
    flock($fp,LOCK_EX);
    fputs($fp,$entries);
    flock($fp,LOCK_UN);
    fclose($fp);
	if($_GET["type"]=="see"){
    echo $users_online;
	}
	?>
	