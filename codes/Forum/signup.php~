<?php
session_start();
include 'function_store.php';
//echo "<br/>";
display_heading_banner_or_text();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
<script src="java/java.js"></script>
</head>
<?php
$error_email='';
$error_username='';

$error_invalidusername='';
$error_invalidfirstname='';
$error_invalidlastname='';
$error_invalidemail='';
$error_invalidpasscpass='';
$error_invalidcaptcha='';
if(isset($_GET['error']))
{

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
$error_invalidfirstname="This can't be your first name. Please don't enter middle name(s).";
}
if($_GET['error']=="invalidlastname")
{
$error_invalidlastname="This can't be your last name. Please no spaces.";
}
if($_GET['error']=="invalidpasscpass")
{
$error_invalidpasscpass="Please type your confirmation password carefully.";
}
if($_GET['error']=="invalidcaptcha")
{
$error_invalidcaptcha='Please type the Code carefully.';
}

}

if(isset($_GET['emptyfield']) || isset($_GET['error']) )
{
$username=$_GET['username'];
$email=$_GET['email'];
$firstname=$_GET['firstname'];
$lastname=$_GET['lastname'];
}
else
{
$username='';
$email='';
$firstname='';
$lastname='';
}

$emptyfielderrormessage='';
if(isset($_GET['emptyfield']))
{
$emptyfielderrormessage="<br/><br/><font color=RED>SIGN UP ERROR<br/>One or more of the fields were left empty.</font>";
}





?>
<body>
<br />
<div class="main_wrapper" style="border:none;"> <!--style ma border none garda sign up ramro dekcha and it overrides the css -->
<form action="signup_process.php" method="post" name="signupform">
<table width="100%" border="0px" cellpadding="5px" cellspacing="5px" class="signuptable">
 <tr>
 <td>
 <strong>
 New Member Registration Form
 </strong>
 <?php echo $emptyfielderrormessage;?>
 </td>
 </tr>
  <tr>
    <td width="543">First Name:</td>
  </tr>
   <tr>
   <td width="543">
   <input name="fname" type="text" class="signupform" id="fname" value="<?php echo $firstname ?>" maxlength="25"/>
    <span><b>
	<?php echo $error_invalidfirstname; ?>
    </b></span>
    
    </td>
  </tr>
  <tr>
    <td width="543">Last Name:</td>
  </tr>
    <tr>
      <td width="543"><input name="lname" type="text" class="signupform" id="lname" value="<?php echo $lastname ?>" maxlength="25"/><span><b>
	<?php echo $error_invalidlastname; ?>
    </b></span>
</td>
  </tr>
<tr>
    <td width="543">Email Address:</td>
  </tr>
    <tr>
      <td width="543"><input name="email" type="text" class="signupform" id="email" value="<?php echo $email ?>" maxlength="50"/>
    <span><b>
	<?php echo $error_email; ?>
    </b></span>
    </td>
  </tr>
<tr>
    <td width="543">Username:</td>
  </tr>
    <tr>
      <td width="543"><input name="username" type="text" class="signupform" id="username" value="<?php echo $username ?>" maxlength="25"/>
    <span>
	<?php echo "<b>".$error_username."</b>"; ?>
    </span>
    </td>
  </tr>
<tr>
    <td width="543">Password:</td>
  </tr>
    <tr>
      <td width="543"><input name="password" type="password" class="signupform" id="password" maxlength="25" /></td>
  </tr>
<tr>
    <td width="543">Confirm Password:</td>
  </tr>
    <tr>
      <td width="543"><input name="cpassword" type="password" class="signupform" id="cpassword" value="" maxlength="25"/>
    <span>
	<?php echo "<b>".$error_invalidpasscpass."</b>"; ?>
    </span>
    </td>
<tr>
<td>
<span id="termsandconditions"><a href="javascript: showtermsandcondtions();">Show terms and condtions</a></span>
</td>
</tr>

<tr>
<td>
<?php
require_once('recaptchalib.php');
  $publickey = "6LdztcwSAAAAAM914gqAKB7W-z-Gq5XAgJOgsqap"; // you got this from the signup page
  echo recaptcha_get_html($publickey);
?>

<?php
//display_captcha('signup_form');
?>
</td>
<td>
<span><b>	<?php echo $error_invalidcaptcha; ?>    </b></span>
</td>

</tr>
</tr>
<tr>
<td>
<input type="button" id="fakesignupbutton" value="I agree to the given terms and conditions. Sign me up." onclick="showrealsignup();" /> 
<br>
<span id="showconfirmationmessage"></span>
<br />
<input id="realsignupbutton" type="submit" value="I am Sure of the above filled datas..." style="visibility:hidden;" />
</td>
</tr> 
</table>

</form>
</div>

<script type="text/javascript" >
function showrealsignup(){
	document.getElementById('fakesignupbutton').disabled= true;
	document.getElementById('showconfirmationmessage').innerHTML="<strong>Please Confirm the above filled datas...</strong>";	
		
	document.getElementById('realsignupbutton').style.visibility="visible";
	}
</script>





</body>
</html>