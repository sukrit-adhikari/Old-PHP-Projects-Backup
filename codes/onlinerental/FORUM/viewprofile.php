<?php
session_start();
		if(isset($_SESSION['loggedin'])){
			
			if(isset($_GET['username'])){
	
				if($_GET['username']==$_SESSION['loggedin']){
	
					header("Location: myprofile.php");
					exit();
				}
	
			}

		}	

include 'function_store.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPF View Profile</title>
<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<!-- End of CSS Linking -->

</head>
<body alink="#8C8C8C" vlink="#8C8C8C" link="#8C8C8C">
<div class="main_wrapper">
<?php

display_heading_banner_or_text(); //Nepali Physics Forum

include 'div_container_notfns.php'; // Notifications number display...


// include 'top_part'; not DONE so below
	if(isset($_SESSION['loggedin'])){
		displaywelcomeandlogout();
	}
	else{
		display_login_msg_and_form();
	}
// END of include 'top_part'; not DONE so below

include 'top_menu.php';

	if(!isset($_SESSION['loggedin'])){
		echo "<br>";
		echo "You need to login to view profiles.";
		exit();
	}


$loggedin=$_SESSION['loggedin'];

connect2mysql('connect');
$whose=$_GET['username'];

$query="SELECT * FROM tbl_userinfo WHERE username='$whose' AND `profile`='public'";

$result=mysql_query($query);

	if(mysql_num_rows($result)==0){
		echo "<br/>".ucfirst($whose)." does not (exist or) share his/her personal information. Sorry!!!";
		exit();
	}


$row=mysql_fetch_array($result);
$firstname=$row["firstname"];
$lastname=$row["lastname"];
$email=$row["email"];

?>



<table width="100%" border="0px" cellpadding="5px" cellspacing="5px">
<tr>
<td width="20%">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ucfirst($whose);?><br /><br />

<img src="images/unavailable.jpg"/>
</td>

<td width="40%">
<table border="0px" cellpadding="5px" cellspacing="5px">

<tr>
	<td>First Name:</td>
	<td><?php echo ucfirst($firstname); ?></td>
</tr>

<tr>
	<td>Last Name:</td>
	<td><?php echo ucfirst($lastname); ?></td>
</tr>

<tr>
	<td>Email:</td>
	<td><?php echo $email; ?></td>
</tr>
  
<tr>
	<td>Fb Profile:</td>
	<td>BLANK</td>
</tr>

</table>
</td>

<td width="40%" align="right" valign="top">
<!--editprofile.php-->
<?php
	if($loggedin==$whose){
		echo "&nbsp;&nbsp;&nbsp;<a href=\"#\">EDIT</a>";
	}
	else{
		echo "<a href=\"message.php?who=$whose\">Message ".ucfirst($whose)."</a>";
	}
?>
</td>
</tr>
</table>
</div>
</body>
</html>