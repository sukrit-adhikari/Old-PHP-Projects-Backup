<?php
@session_start();

include '../mysql_config.php';

$loggedin = $_SESSION['username'];


$result=mysql_query("SELECT * FROM `tbl_tts` WHERE  `username`<>'$loggedin' ORDER BY `tts` DESC LIMIT 1");

//$result_rows=mysql_num_rows($result);

//for($i=1;$i<=$result_rows;$i++){

	$row=mysql_fetch_array($result);

	$ots=$row['tts'];
	$currtime=time();

	$diff=$currtime-$ots;

	if( $diff <= 5 ){
		echo "#%#^%$^typing#%#^%$^";
//		break;	
	}


	else {
		echo "#%#^%$^nottyping#%#^%$^";	
	}
//}


?>