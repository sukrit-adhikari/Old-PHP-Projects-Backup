<?php
session_start();
if(isset($_SESSION['loggedin']))
{
include 'function_store.php';
$questionid=$_POST['questionid'];
$reply=$_POST['reply'];
$replier=$_SESSION['loggedin'];
$questionid=$_POST['questionid'];
$asker=$_POST['asker'];
$dateandtime=date("Y-m-d H:i:s");

connect2mysql('connect');
$reply = mysql_real_escape_string($reply);


mysql_query("INSERT INTO tbl_replies (`reply`, `replier`, `dateandtime`,`questionid`)
VALUES ('$reply', '$replier', '$dateandtime','$questionid')");
mysql_query("UPDATE tbl_qs SET replies = replies + 1 WHERE id = '$questionid'");
echo mysql_error();

//Start of Notifications Procedure
if($asker!=$_SESSION['loggedin'])
{
mysql_query("UPDATE tbl_qs SET notify_asker_replies ='yes', `net_replies_for_notify`=net_replies_for_notify+1 WHERE id = '$questionid'");
echo mysql_error();
notify_user($asker,'question_got_replied','yes');
}
// End of Notificstions Procedure

header("Location: reply2question.php?questionid=$questionid");
}
else
{
echo "First <a href=\"index.php\">Login</a>";
}
?>