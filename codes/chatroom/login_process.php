<?php
session_start();


include 'mysql_config.php';

echo $password=$_POST['password'];

echo $username=$_POST['username'];


$result=mysql_query(" SELECT * FROM `tbl_user_profile` WHERE `username`='$username' AND `password`='$password' LIMIT 1");
echo mysql_error();

			if(mysql_num_rows($result)==1){
					
					$row=mysql_fetch_array($result);
					$_SESSION['login']="yes";
					$_SESSION['username']=$row['username'];

					if(isset($_POST['stayloggedin'])) {	if($_POST['stayloggedin']=="yes"){

							//setcookie("chatlogin","yes",time()+(3600*24*30),"/");
							setcookie("chatpassword",$row['password'],time()+(3600*24*30),"/");						
							setcookie("chatloginusername",$row['username'],time()+(3600*24*30),"/");

						}
					}

					header("Location: index.php?display=latestfew");
					exit();

			}
			else{
					header("Location: troubleshoot.php?logout=true");			
			}					
?>