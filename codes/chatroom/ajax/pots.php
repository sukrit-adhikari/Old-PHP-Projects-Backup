<?php
@session_start();
include '../mysql_config.php';

$loggedin = $_SESSION['username'];


	$result=mysql_query("SELECT * FROM `tbl_ots` WHERE  `username`<>'$loggedin'");
	$result_rows=mysql_num_rows($result);
	$online_buddies="";
		
for($i=1;$i<=$result_rows;$i++){
	$comma="";

	$row=mysql_fetch_array($result);
	$ots=$row['ots'];
	$currtime=time();
	$diff=$currtime-$ots;

	if($i>1){
		$comma=",";	
	}

	if($diff<=6){
		$online_buddies=$online_buddies.$comma.$row['username'];
	}

}

if( strlen($online_buddies) > 2 ){

	echo "!%$)()^&online!%$)()^& "."<br>%^#$[]".$online_buddies."%^#$[]";	
	
}


else {
	
	echo "!%$)()^&offline!%$)()^&";

}

	
?>