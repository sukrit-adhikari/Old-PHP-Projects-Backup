<?php
session_start();
include 'function_store.php';
connect2mysql('connect');
$code=$_GET['code'];
$email=explode('$$$',$code);
$email_2=$email[1];
//echo $email_2;
$result=mysql_query("SELECT * FROM tbl_userinfo WHERE `code`='$code' AND `status`='active'");
if(mysql_num_rows($result)==0)
{
	$query="UPDATE tbl_userinfo SET `status`='active' WHERE `code`='$code' AND `status`='new' AND `email`='$email_2'";
	mysql_query($query);
	echo mysql_error();
}
else
{
	$revalidate="yes";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email address validation</title>
</head>
<body>

<table width="100%" height="100%" border="0px" cellpadding="10px" cellspacing="10px">
<tr height="100%" valign="middle">
<td width="100%" align="center" valign="middle">
<?php
if($revalidate=="yes")
{
	echo "There has occured some problem. Please refereh the page to try again. Maybe the page has expired.";
}
else
{
	$result=mysql_query("SELECT username FROM tbl_userinfo WHERE `email`='$email_2'");
	$row=mysql_fetch_array($result);
	$_SESSION['loggedin']=$row["username"];
	echo "<h2>Hurraaay. You are the newest member of Nepali Physics Forum.</h2></br></br>";
	echo "<a href=\"index.php\">Get Started</a>";
}
?>
</td>
</tr>
</table>

</body>

</html>