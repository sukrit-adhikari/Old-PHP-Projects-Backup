<?php
session_start();
if(!isset($_SESSION['loggedin']))
{
exit();
}
include 'function_store.php';
connect2mysql('connect');
$notifications=0;
$loggedin=$_SESSION['loggedin'];

$query="SELECT * FROM tbl_notfns WHERE `username`='$loggedin'";
$result=mysql_query($query);
echo mysql_error();

if(mysql_num_rows($result)==0)
{
exit();
}

$row=mysql_fetch_array($result);

//Beginning of calculation ofnotfns
if($row["question_got_replied"]=='yes')
{
$notifications++;
}
if($row["question_got_liked"]=='yes')
{
$notifications++;
}
if($row["reply_got_replied"]=='yes')
{
$notifications++;
}
if($row["reply_got_liked"]=='yes')
{
$notifications++;
}
if($row["messages"]=='yes')
{
$notifications++;
}

// End of calculation of Notfns

if($notifications>0)
{
echo "<a href=\"notifications.php\">";

echo "<table style=\"background-color:RED;\" onmouseout=\"javascript: show_notfns_table();\" onmouseover=\"javascript: show_notfns_table();\">";
echo "<tr>";
echo "<td>";

echo	"<span><font style=\"text-shadow:#F00;\">$notifications</span>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</a>";
}

//Beginning of table which display hidden/nothidden notfns 
echo "<table border=\"0px\" id=\"table_holding_notifications\" style=\"visibility:hidden;\">";
if($row["messages"]=='yes')
{
echo  "<tr>";
echo  "<td>You have unread message(s).</td>";
echo   "</tr>";
}

if($row["question_got_replied"]=='yes')
{
echo  "<tr>";
echo  "<td>Your Question(s) got replied.</td>";
echo   "</tr>";
}
if($row["question_got_liked"]=='yes')
{
echo  "<tr>";
echo  "<td>Your Question(s) got replied.</td>";
echo   "</tr>";
}
if($row["reply_got_replied"]=='yes')
{
echo  "<tr>";
echo  "<td>Someone else also replied to a question(s).</td>";
echo   "</tr>";
}
if($row["reply_got_liked"]=='yes')
{
echo  "<tr>";
echo  "<td>Your Reply(/ies) got liked.</td>";
echo   "</tr>";
}
echo "</table>";
//END of table which display hidden/nothidden notfns 

?>
<!--question_got_replied 	question_got_liked 	reply_got_replied 	reply_got_liked  -->

<script type="text/javascript">
function show_notfns_table()
{
document.getElementById('table_holding_notifications').style.visibility="inherit";
document.getElementById('table_holding_notifications').style.backgroundColor="BLACK";
}
</script>