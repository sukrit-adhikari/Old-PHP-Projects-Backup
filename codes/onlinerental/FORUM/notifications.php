<?php
session_start();
if(!isset($_SESSION['loggedin']))
	{
	echo "ERROR!Please Login.";
	exit(); // Log in garya chaina bhane notifications ko k kaaam hehe
	}
$loggedin=$_SESSION['loggedin'];
include 'function_store.php';	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPF Notifications</title>

<!-- Tab and Addressbar icon code-->
<link rel=”icon” type=”image/x-ico” href=”http://www.sukrit.com.np/images/icons/siteicon.ico” />
<link rel=”shortcut icon” type=”image/x-icon” href=”http://www.sukrit.com.np/images/icons/siteicon.ico” />
<!-- End of icon code-->

<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<!-- End of CSS Linking -->

</head>
<body>
<div class="main_wrapper">
<?php
//echo $_SESSION['$captcha_6621034_question_form'];
include 'div_container_notfns.php'; // Notifications number display...
?>

<?php
echo "<center><strong>Nepali Physics Forum</strong></center><br />";
include 'top_menu.php';
connect2mysql('connect');
$query="SELECT * FROM tbl_qs WHERE `asker`='$loggedin' AND `notify_asker_replies`='yes'";
$result=mysql_query($query);
$numofrows=mysql_num_rows($result);

echo "<br><strong>Notifications about the questions you asked.</strong><br/>";
if($numofrows==0)
{
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No notifications.";
}
else
{//START of displaying notifications about reply.
for($i_notfn=1;$i_notfn<=$numofrows;$i_notfn++)
{
	$row=mysql_fetch_array($result);
	$replies=$row["replies"];
	$question=truncate($row["question"],50);
	$questionid=$row["id"];
	$net_replies_for_notify=$row["net_replies_for_notify"]; 	
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=reply2question.php?questionid=$questionid>$replies ($net_replies_for_notify New) people replied to your question \"$question\".</a><br/>";
}// END OF FOR LOOP for fetching and displayinf data
}//END of displaying notifications about reply.

?>

</div>
</body>
</html>