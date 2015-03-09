<?php
@session_start();
if(isset($_COOKIE['login_cookie'])){
	include 'mysql_config.php';
	$code=$_COOKIE['login_cookie'];
	$query_code="SELECT * FROM `tbl_user` WHERE `code`='$code' LIMIT 1";
	$result_code=mysql_query($query_code);
		
		if(mysql_num_rows($result_code)!=0){
			$row=mysql_fetch_array($result_code);		
			$_SESSION['username']=$row['username'];
			$_SESSION['user_id']=$row['id'];
			header("Location: index.php");
			exit();			
		}
		else{
			
			header("Location: logout.php");
			exit();
			
		}
}

?>