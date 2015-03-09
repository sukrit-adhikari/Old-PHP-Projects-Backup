<?php

include 'mysql_config.php';

$password=$_COOKIE['chatpassword'];

$username=$_COOKIE['chatloginusername'];


$result=mysql_query(" SELECT * FROM `tbl_user_profile` WHERE `username`='$username' AND `password`='$password'");

//echo mysql_error();

if(mysql_num_rows($result)!=1){

	header("Location: troubleshoot.php?logout=true");
	exit();

}
					
?>