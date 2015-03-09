<?php
session_start();
include 'mysql_config.php';
include 'check_valid_email_address.php';
include 'crypt.php';

///////////////////////////////////////////////////////////////////
/*
if(isset($_SESSION['loggedin']))
{
header("Location: index.php");
exit();
}
*/
//////////////////////////////////////////////////////////////////

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];	
$cpassword=$_POST['cpassword'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];

$backpass="username=$username&email=$email&firstname=$firstname&lastname=$lastname";

if(strlen($username)*strlen($email)*strlen($password)*strlen($firstname)*strlen($lastname)==0)
{
header("Location: signup.php?emptyfield=yes&$backpass");
exit();
}

if(!preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/',$username) || strlen($username)<3)
{
header("Location: signup.php?error=invalidusername&$backpass");
exit();
}

if(!ctype_alpha($firstname)  || strlen($firstname)<=2)
{
header("Location: signup.php?error=invalidfirstname&$backpass");
exit();
}

if(!ctype_alpha($lastname) || strlen($lastname)<=2)
{
header("Location: signup.php?error=invalidlastname&$backpass");
exit();
}

if(($password!=$cpassword)  || strlen($password)<6)
{
header("Location: signup.php?error=invalidpasscpass&$backpass");
exit();
}


if (!check_valid_email_address($email)){
header("Location: signup.php?error=invalidemailaddress&$backpass");
exit();
}


/////////////////////////////////////////////////////////////////////////////////////////////////
// USER EXIST CHECK
$query_check_username="SELECT * FROM `tbl_user` WHERE `username`='$username'";
$result_check_username=mysql_query($query_check_username);

if(mysql_num_rows($result_check_username)!=0){
header("Location: signup.php?error=userexists&$backpass");
exit();
}
//////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////
// USER EXIST CHECK
$query_check_email="SELECT * FROM `tbl_user` WHERE `email`='$email'";
$result_check_email=mysql_query($query_check_email);

if(mysql_num_rows($result_check_email)!=0){
header("Location: signup.php?error=emailexists&$backpass");
exit();
}
//////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////
// USER INSERTION
$code='7';
while(strlen($code)<=40){
	$code=$code.rand(1,9);
}

$code = substr($code,0,32).$username;



$dat=date("Y-m-d H:i:s");


$encrypted_password=encrypt($password);
$query_insert_user="INSERT INTO `tbl_user` (`username`,`fname`,`lname`,`password`,`email`,`code`,`dateandtime`,`status`) VALUES('$username','$firstname','$lastname','$encrypted_password','$email','$code','$dat','new')";

$query_insert_attempts="INSERT INTO `tbl_login_status_monitor` (`username`,`last_login_ip_address`,`dateandtime`,`no_of_attempts`) VALUES('$username','0.0.0.0','$dat','0')";

mysql_query($query_insert_user);
mysql_query($query_insert_attempts);



header("Location: signup_confirmation.php?email=$email&username=$username");


//////////////////////////////////////////////////////////////////////////////////////////////////

?>