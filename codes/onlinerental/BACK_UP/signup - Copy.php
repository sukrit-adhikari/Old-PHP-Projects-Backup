<?php
$error_invalidemail='';
$error_invalidusername='';

$error_email='';
$error_username='';

$error_invalidusername='';
$error_invalidfirstname='';
$error_invalidlastname='';
$error_invalidemail='';
$error_invalidpassword='';
$error_invalidpasscpass='';



//$error_invalidcaptcha='';

if(isset($_GET['error']))
{
if($_GET['error']=="invalidusername")
{
$error_invalidusername='Invalid Username. Please use no spaces and special characters.';
}


if($_GET['error']=="usernameexists")
{
$error_username='Username has already been taken. Please try new one. Sorry for the inconvinience.';
}
if($_GET['error']=="emailexists")
{
$error_email="This email Address has already been used for signup! <a href=\"forgot_password.php\">Forgot your password?</a>";
}
if($_GET['error']=="invalidfirstname")
{
$error_invalidfirstname="This can't be your first name. Please don't enter middle name(s) and special characters.";
}
if($_GET['error']=="invalidlastname")
{
$error_invalidlastname="This can't be your last name. Please use no spaces.";
}
if($_GET['error']=="invalidpasscpass")
{
$error_invalidpasscpass="Please type your confirmation password carefully.";
}

/*
if($_GET['error']=="invalidcaptcha")
{
$error_invalidcaptcha='Please type the Code carefully.';
}
*/

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="signup_process.php" method="post">
  <table width="90%	" height="57" border="0" cellpadding="10" cellspacing="5">
    <tr>
      <td width="">Username</td>
      <td><input type="text" name="username"></td>
	  <td>
	  <span><?php echo $error_invalidusername   ?></span>
	  </td>
    </tr>
	
	<tr>
		<td>First-name</td>
		<td><input type="text" name="fname" /></td>
		<td><span><?php echo $error_invalidfirstname   ?></span></td>
	</tr>
	
	<tr>
		<td>Last-name</td>
		<td><input type="text" name="lname" /></td>
		<td><span><?php echo $error_invalidlastname   ?></span></td>
	</tr>
	
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" /></td>
		<td><span><?php echo $error_invalidpassword   ?></span></td>
	</tr>
	
	<tr>
		<td>Confirm-Password</td>
		<td><input type="password" name="cpassword" /></td>
		<td><span></span></td>
	</tr>
	
	<tr>
		<td>E-mail</td>
		<td><input type="text" name="email" /><span></td>
		<td><?php echo $error_invalidemail." ".$error_email ?></span></td>
	</tr>
	
	
	<tr>
		<td><input type="submit" value="Create" name="submit"</td>
		<td><input type="button" value="Cancel" name="clear" onclick="" /></td>
	</tr>
	
	
	
  </table>
</form>
</body>
</html>
