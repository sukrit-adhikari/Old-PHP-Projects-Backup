<?php
session_start();

//echo $_COOKIE["chatloginusername"]."<br>";
//echo $_COOKIE["lastid"]."<br>";
//echo $_COOKIE["chatpassword"]."<br>";

//exit();



setcookie("chatlogin",NULL,time()-(3600*24*30),"/");
setcookie("chatpassword",NULL,time()-(3600*24*30),"/");						
setcookie("chatloginusername",NULL,time()-(3600*24*30),"/");
//setcookie("lastid",NULL,time()-(3600*24*30),"/");



unset($_COOKIE["chatlogin"]);
unset($_COOKIE["chatpassword"]);
unset($_COOKIE["chatloginusername"]);
//unset($_COOKIE["lastid"]);

unset($_SESSION["username"]);
unset($_SESSION["login"]);
unset($_SESSION["lastid"]);

session_destroy();


if(isset($_GET['logout'])){

	header("Location: index.php?ts");
	exit();	

}




include 'login_process.php';


?>