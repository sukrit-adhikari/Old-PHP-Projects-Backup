<?php
include 'mysql_config.php';

//////////////////////////////////////////////////
// $username above this 
/////////////////////////////////////////////////

$query_status_monitor="SELECT * FROM `tbl_login_status_monitor` WHERE `username`='$username' LIMIT 1";
$result_status_monitor=mysql_query($query_status_monitor);

$row=mysql_fetch_array($result_status_monitor);
$dat=date("Y-m-d H:i:s");
$ip_address=$_SERVER['REMOTE_ADDR'];


if($wrong_password=='yes' && $row['no_of_attempts']=='4' ){
	$reason="wrong_password";
	include 'account_block';
	header("Location: index.php?loginerror=notactive");
	exit();
}

if($wrong_password=='yes' && $row['no_of_attempts']<4 ){
	$query_increase_attempts="UPDATE `tbl_login_status_monitor` SET `no_of_attempts`=`no_of_attempts`+1,`last_login_ip_address`='$ip_address',`dateandtime`='$dat' WHERE `username`='$username'";
	mysql_query($query_increase_attempts);
	header("Location: index.php?loginerror=wrongpassword");
	exit();
}

if($wrong_password=='no'){
	$query_clear_attempts="UPDATE `tbl_login_status_monitor` SET `no_of_attempts`='0',`last_login_ip_address`='$ip_address',`dateandtime`='$dat' WHERE `username`='$username'";
	mysql_query($query_clear_attempts);
	header("Location: index.php?loginerror=NOERROR");
	exit();
}

?>