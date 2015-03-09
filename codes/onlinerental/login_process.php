<?php
session_start();
include 'login_check.php';
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// ALL HEADER redirects in login_statu_monitor.php
// $Username is in thois page is USED extensively
// $wrong_password='no' at start of the PAGE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





include 'mysql_config.php';
include 'crypt.php';

$wrong_password='no';

$username=$_POST['username'];
$password=$_POST['password'];
$password=encrypt($password);

//////////////////////////////////USERNAME CHECK
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_username_check="SELECT * FROM `tbl_user` WHERE `username`='$username' LIMIT 1";
$result_username_check=mysql_query($query_username_check);

if( mysql_num_rows($result_username_check)==0 ){ // USER DOES NOT EXIST

	header("Location: index.php?loginerror=nousername");
	exit(); // NO USER NO END HERE

}else{
			/////////////////////////USER BLOCKED OR NOT CHECK////////////////////////////////////////////////////////
				$query_username_block_check="SELECT * FROM `tbl_user` WHERE `username`='$username' AND `status`='active' LIMIT 1";
				$result_username_block_check=mysql_query($query_username_block_check);
				if(mysql_num_rows($result_username_block_check)==0){
				
					header("Location: index.php?loginerror=notactive");
					exit(); // USER IS BLOCKED or NEW
				}
			//////////////////////////////////////////////////////////////////////////////////////////////////////////
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////PASSWORD CHECK
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$query_password_check="SELECT * FROM `tbl_user` WHERE `username`='$username' AND `password`='$password' LIMIT 1";
$result_password_check=mysql_query($query_password_check);

if( mysql_num_rows($result_password_check)==0 ){
	$wrong_password='yes';
}
else{
	$row=mysql_fetch_array($result_password_check);
	if($row['password']==$password){//RIGHT PASSWORD
			///////////////////////////SESSION INITIATION/////////////////////////////////////////////////////////////
					//$_SESSION['user_type']='';
					$_SESSION['username']=$_row['username'];
					$_SESSION['user_id']=$row['id'];
						if( isset($_POST['set_login_cookie']) ){
							setcookie("login_cookie", $row['code'],time()+(86400*30));						
						}
					// Do not EXIT HERE as login_status_monitor needs to be changed to 0 after successful Login...
					// After Session HEADER DIRECT GARNE
			//////////////////////////////////////////////////////////////////////////////////////////////////////////
	}else{
		$wrong_password='yes';
	}
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include 'login_process_attempt_monitor.php';

exit();

?>