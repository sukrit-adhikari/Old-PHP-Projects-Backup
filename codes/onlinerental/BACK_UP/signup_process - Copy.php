<?php
session_start();
include 'mysql_config';

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

if(($password!=$cpassword)  || strlen($password)<=6)
{
header("Location: signup.php?error=invalidpasscpass&$backpass");
exit();
}

/////////////////////////////////////////////////////////////////////////////////////////////////
// USER EXIST CHECK
$query_check_username="SELECT * FROM `tbl_user` WHERE `username`='$username'";
$result_check_username=mysql_query($query_check_username);

if(mysql_num_rows($result_check_username!=0)){
header("Location: signup.php?error=userexists&$backpass");
exit();
}
//////////////////////////////////////////////////////////////////////////////////////////////////


?>