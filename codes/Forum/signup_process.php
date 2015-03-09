<?php
session_start();
include 'function_store.php';
if(isset($_SESSION['loggedin']))
{
header("Location: index.php");
exit();
}

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];	
$cpassword=$_POST['cpassword'];
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$backpass="username=$username&email=$email&firstname=$firstname&lastname=$lastname";

	if(isset($_GET['confirm'])){
		
		//ENTRY INTO DATABASE BELOW LINE 105

				mysql_query("INSERT INTO tbl_userinfo (`firstname`, `lastname`, `email`,`username`,`password`,`status`,`signupdateandtime`,`code`)
VALUES ('$firstname', '$lastname', '$email','$username','$password','new','$dateandtime','$code')");


				mysql_query("INSERT INTO tbl_notfns (`username`)
VALUES ('$username')");
		//END OF ENTRY INTO DATABASE

	}


if(strlen($username)*strlen($email)*strlen($password)*strlen($firstname)*strlen($lastname)==0)
{
$backpass="username=$username&email=$email&firstname=$firstname&lastname=$lastname";
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

if(($password!=$cpassword)  || strlen($password)<=5)
{
header("Location: signup.php?error=invalidpasscpass&$backpass");
exit();
}

//Captcha Validation Start
/*
  require_once('recaptchalib.php');
  $privatekey = "6LdztcwSAAAAAPaFODhzWQSqQtLiuT1UVW4wu7QH";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    header("Location: signup.php?error=invalidcaptcha&$backpass");
    exit();
		//die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
     	// "(reCAPTCHA said: " . $resp->error . ")");
  }
*/
//Captcha Validation End







/*
$code=rand(1000,9999);
$code.= ( ($year*37)*rand(5, 9) ) + ($month*442*rand(2, 9)) + ($day*$minute) + (($hour/$minute+$seconds)*rand(0.2, 0.9));
*/


connect2mysql('connect');

$result = mysql_query("SELECT * FROM tbl_userinfo WHERE `username`='$username'");
$numofrows=mysql_num_rows($result);
if($numofrows>0)
{
header("Location: signup.php?error=usernameexists&$backpass");
exit();
}

$result = mysql_query("SELECT * FROM tbl_userinfo WHERE `email`='$email'");
$numofrows=mysql_num_rows($result);
if($numofrows>0)
{
header("Location: signup.php?error=emailexists&$backpass");
exit();
}


//Encrypt Password

include 'encrypt.php';

$year=date("Y");
$month=date("m");
$day=date("d");
$hour=date("g");
$minute=date("i");
$seconds=date("s");
$dateandtime=$year."-".$month."-".$day." ".$hour.":".$minute.":".$seconds;

$code_1=rand(129,986);

$code_2=rand(206,930);

$code=$code_1.$code_2;

$password= encrypt($password,$code_1,$code_2,$dateandtime);



$confirmaddress="http://sukrit.com.np/email_validation.php?code=".$code;



//ENTRY INTO DATABSE

mysql_query("INSERT INTO tbl_userinfo (`firstname`, `lastname`, `email`,`username`,`password`,`status`,`signupdateandtime`,`code`)
VALUES ('$firstname', '$lastname', '$email','$username','$password','active','$dateandtime','$code')");


mysql_query("INSERT INTO tbl_notfns (`username`)
VALUES ('$username')");

//END OF ENTRY INTO DATABASE


//mail($email,'Nepali Physics Forum email account verification.',"Please click here $confirmaddress to confirm that you are the owner of the email address $email","From:please_do_not_reply@sukrit.com.np");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up Successful</title>
</head>
<body>
<table width="100%" height="100%" border="0px" cellpadding="10px" cellspacing="10px">
<tr height="100%" valign="middle">
<td width="100%" align="center" valign="middle">

<?php

/*		Sent Email Confirmation Display
$getemailsite=explode('@',$email);
if(!mysql_error())
{
echo "An email has been sent to $email to verify that you are the owner of the email address. Please check the email and follow the instruction. Takes 2 minutes.<br/><br/>";
echo "<a href=\"http://www.$getemailsite[1]\" target=\"_blank\">http://www.$getemailsite[1]</a><br/><br/>";
echo "<a href=\"index.php\">Done email verification? Start Here</a>";
}
*/
if(!mysql_error())
echo "<br><br><br><strong>";
echo "SUCCESSFUL SIGN UP<br />";
echo "<a href=index.php>Get Started</a>";
echo "</strong>";
?>
</td>
</tr>
</table>
</body>
</html>