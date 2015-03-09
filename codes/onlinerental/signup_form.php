<?php

$error_invalidusername='';

$error_email='';
$error_username='';

$error_invalidusername='';
$error_invalidfirstname='';
$error_invalidlastname='';
$error_invalidemail='';
$error_invalidpassword='';
$error_invalidpasscpass='';
$error_invalidemailaddress='';


$username="''";
$fname="''";
$lname="''";
$email="''";

if(isset($_GET['error']))
{
$username=$_GET['username'];
$fname=$_GET['firstname'];
$lname=$_GET['lastname'];
$email=$_GET['email'];
}








//$error_invalidcaptcha='';

if(isset($_GET['error']))
{
if($_GET['error']=="invalidusername")
{
$error_invalidusername='Invalid Username. Please use no spaces and special characters.';
}


if($_GET['error']=="userexists")
{
$error_username='Username has already been taken. Please try new one. Sorry for the inconvinience.';
}

if($_GET['error']=="emailexists")
{
$error_email="<img src=wrong.gif>This email Address has already been used for signup! <a href=\"forgot_password.php\">Forgot your password?</a>";
}

if($_GET['error']=="invalidemailaddress"){
$error_invalidemailaddress="The email addres you entered is not valid.";
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
$error_invalidpasscpass="Please type your confirmation password carefully. Password length must be at least 6 characters long.";
}

/*
if($_GET['error']=="invalidcaptcha")
{
$error_invalidcaptcha='Please type the Code carefully.';
}
*/

}

?>







<form action="signup_process.php" method="post">
<fieldset class="field_set_bg">
<legend class="signup_title">Sign up</legend>
  
  <div class="empty_fields">
  <?php
  if(isset($_GET['emptyfield'])){
  	echo "Please fill all the fields.";
  }
  ?>
  </div>
  
  <table class="signup_table" width="auto" height="263px" border="0" cellpadding="5" cellspacing="0">
    <tr>
      <td>Username</td>
      <td><input type="text" name="username" value=<?php echo $username; ?>></td>
	  <td>
	  <span class="error_message"><?php echo $error_invalidusername.$error_username   ?></span>
	  </td>
    </tr>
	
	<tr>
		<td>First-name</td>
		<td><input type="text" name="fname" value=<?php echo $fname; ?> /></td>
		<td><span class="error_message"><?php echo $error_invalidfirstname   ?></span></td>
	</tr>
	
	<tr>
		<td>Last-name</td>
		<td><input type="text" name="lname" value=<?php echo $lname; ?> /></td>
		<td><span class="error_message"><?php echo $error_invalidlastname   ?></span></td>
	</tr>
	
	<tr>
		<td>Password</td>
		<td><input type="password" name="password" /></td>
		<td><span class="error_message"><?php echo $error_invalidpasscpass   ?></span></td>
	</tr>
	
	<tr>
		<td>Confirm-Password</td>
		<td><input type="password" name="cpassword" /></td>
		<td><span class="error_message"></span></td>
	</tr>
	
	<tr>
		<td>E-mail</td>
		<td><input type="text" name="email" value=<?php echo $email; ?> /></td>
		<td><span class="error_message"><?php echo $error_invalidemailaddress.$error_email ?></span></td>
	</tr>
	
	
	<tr>
	<td>&nbsp;</td>
		<td><input type="submit" value="Create" name="submit"  class="bottons" /></td>
		<td><input type="button" value="Cancel" name="clear" onclick=""  class="bottons" /></td>
       
	</tr>
	
	

  </table>
</form>
</fieldset>
