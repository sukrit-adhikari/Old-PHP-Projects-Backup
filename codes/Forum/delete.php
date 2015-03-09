<?php
session_start();
include 'function_store.php';
$loggedin=$_SESSION['loggedin'];
$replyid=$_GET['replyid'];
$questionid=$_GET['questionid'];
$type=$_GET['type']; // Type ma jun delete garne ho tei pathaune hya chai line

if($type=='question' && $loggedin=='sukrit')
{
connect2mysql('connect');
mysql_query("UPDATE tbl_qs SET `publish`='no' WHERE `id`='$questionid'");
mysql_query("UPDATE tbl_replies SET `publish`='no' WHERE `questionid`='$questionid'");
//echo mysql_error();
}

else if($type=='reply' && $loggedin=='sukrit')
{
connect2mysql('connect');
mysql_query("UPDATE tbl_replies SET `publish`='no' WHERE `id`='$replyid'");
mysql_query("UPDATE tbl_qs SET replies=replies-1 WHERE `id`='$questionid'");
//echo mysql_error();
}

else
{
echo "You need to be administrator to delete datas...!!!...NICE TRY...Hehe!!!";
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DELEting...WAIT A SEC...</title>
</head>
<body onload="javascript:window.history.back();">
</body>
</html>
