	<?php
include 'function_store.php';
										$username=$_POST['username'];
										$password_by_user=$_POST['password'];


//decryption process starts
		connect2mysql('connect');
		
		$result=mysql_query("SELECT * FROM tbl_userinfo WHERE `username`='$username' AND `status`='active'");
			if(mysql_num_rows($result)==0){
					header("Location: index.php?loginerror=no_active_user");
					exit();
			}		

		$row=mysql_fetch_array($result);		
		$password=$row["password"];
		$dateandtime=$row["signupdateandtime"];
		$code=$row["code"];

echo mysql_error();

include 'decrypt.php';

$password_after_decrypt=decrypt($password,$dateandtime,$code);

//Decryption ENDS


		if($password_by_user!=$password_after_decrypt){
				header("Location: index.php?loginerror=password_wrong");
				exit();
		}
			else{
				session_start();
				$_SESSION['loggedin']=$username;
		}
		

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Home</title>
</head>

<body alink="#8C8C8C" vlink="#8C8C8C" link="#8C8C8C"> 
<br />
<br />
<br />
<center>
<strong>Login Successful</strong><br />
<strong>Please Wait a sec...</strong><br />
<a href="index.php">Home</a><br />
<strong>Please Enable Javascript if you haven't!!!</strong>
</center>

<script type="text/javascript" >
	history.back();
</script>
</body>

</html>