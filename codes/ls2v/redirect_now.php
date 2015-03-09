<?php

if(isset($_GET['remove_default_samuha'])){
	
setcookie ("default_samuha","", time() - 3600); 	
	
	}

else if	( isset($_COOKIE["default_samuha"]) && $_GET["redirect"]!="no"){

$d_s=	$_COOKIE["default_samuha"];
	
	if($d_s>=1 && $d_s<=7){
		
		header("Location: now.php?samuha=".$d_s);
		exit();
		
		}
	
	}
?>