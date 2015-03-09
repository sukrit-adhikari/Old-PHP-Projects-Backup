<?php
include 'mysql_config.php';

date_default_timezone_set("Asia/Katmandu");


function getDateTime(){
	return date("Y-m-d H:i:s");
}


function check_db_entry($visit_code){
	
	// Check Whether the visit_code is available in DAtaBase //

	$query="SELECT `id` FROM `tbl_ls_visitor_tracker` WHERE `visit_code`=$visit_code";
	$mysql_result= mysql_query($query);
	
	if(mysql_num_rows($mysql_result)==0){
		return false;
	}else{
		return true;
	}

	// Check Whether the visit_code is available in DAtaBase END//
}


function visits_increment($visit_code){
	$date=getDateTime();
	$query = "UPDATE `tbl_ls_visitor_tracker` SET `visits`=`visits`+1, `dat`='$date' WHERE `visit_code`=$visit_code";
	$mysql_result= mysql_query($query);
	//echo mysql_error();
}

function new_visitor(){
	
	
	// Generate Code for new Visitor //
		$visitCode=date("YmdHis").rand(111,999);
		setcookie("visitCode",$visitCode, time()+(3600*24*365));
		setcookie("visitTime",time(), time()+(3600*24*365));
	// Generate Code for new Visitor END//
	
	
	
	// PUT New Visitor Into DataBase and set Visit to 1 //
	
		$date=getDateTime();
		$mysql_query = "INSERT INTO `tbl_ls_visitor_tracker` (`visit_code`,`visits`,`dat`) VALUES('$visitCode','1','$date')";
		$mysql_result= mysql_query($mysql_query);
	
	//echo mysql_error();
	// PUT New Visitor Into DataBase END //
}


if(isset($_COOKIE["visitCode"]) && check_db_entry($_COOKIE["visitCode"]) ){
	
	iF(  (time()-$_COOKIE["visitTime"])>120  ){
		setcookie("visitTime",time(), time()+(3600*24*365));
		visits_increment($_COOKIE["visitCode"]);
	}
	
}else{
	new_visitor();

}

?>