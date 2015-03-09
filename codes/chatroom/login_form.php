<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LOG IN</title>
</head>

<body bgcolor="#9C2A00" link="#D6BF86" alink="#D6BF86" vlink="#D6BF86" text="#D6BF86">

<h2>CHAT.SUKRIT.com.np</h2>

<form action="login_process.php" method="POST" >
<table summary="" >
<tr>
<td>
Username: 
</td>
<td>
<input type="text" name="username" >
</td>
</tr>
<tr>
<td>
Password:  
</td>
<td>
<input type="password" name="password" >
</td>
</tr>
<tr>
<td>
Stay Logged In:

</td>
<td>
 <input type="checkbox" value="yes" name="stayloggedin">
</td>
</tr>
<tr>
<td>

</td>
<td>
<input type="submit" value="Chat">
</td>
</tr>


</table>

</form>

<?php
//echo $_COOKIE['chatlogin'];

?>
</body>
</html>