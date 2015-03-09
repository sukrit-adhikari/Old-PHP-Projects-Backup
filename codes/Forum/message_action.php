<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
echo "First Login !!!";
exit();
}
include 'function_store.php';
connect2mysql('connect');
$from=$_SESSION['loggedin'];
$to=$_POST['to'];
$message=$_POST['message'];
$dateandtime=date("Y-m-d H:i:s");
mysql_query("INSERT INTO tbl_messages (`sender`,`receiver`,`message`,`dateandtime`)
VALUES ('$from', '$to', '$message','$dateandtime')");
if(mysql_error())
{
echo mysql_error();
exit();
}
else
{
mysql_query("UPDATE tbl_notfns SET `messages`='yes' WHERE `username`='$to'");
}
?>
<html>
<head>
<title>
Wait a Sec...!!!
</title>
</head>
<body onLoad="javascript: window.history.back();" bgcolor="BLACK">
Please enable Javascript...!!!
</body>
</html>