<?php
include 'function_store.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Recovery</title>
</head>
<body>
<div class="main_wrapper">
<?php
$email_send_by_user=$_POST['email'];

if(!isset($_SESSION['loggedin']))
{
connect2mysql('connect');
$email_send_by_user = mysql_real_escape_string($email_send_by_user);

$result=mysql_query("SELECT `email`,`password`,`username` FROM tbl_userinfo WHERE email='$email_send_by_user'");

$email='';
$username='';
$password='';

if($result)
{
$row=mysql_fetch_array($result);
$email=$row["email"];
$username=$row["username"];
$password=$row["password"];
}

if(!mail($email,'Password Recovery Nepali Physics Forum .',"Username=$username and Password=$password","From:please_do_not_reply@sukrit.com.np"))
{
echo "<br />Some error(s) occured while processing your request. Sorry for the inconvinience. Please try again.<a href=\"javascript:history.back();\"> Go Back</a>";
}
else
{
echo "An email has been sent to your mailbox.Please check your mail for username and password.<a href=index.php> Home</a>";
}

}
else
{
echo "<br />Some error occured while processing your request. Sorry for the inconvinience. Please try again.<a href=\"javascript:history.back();\"> Go Back</a>";
}

?>
</div>
</body>
</html>