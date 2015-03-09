<?php
session_start();
include 'function_store.php';
if(!isset($_SESSION['loggedin']))
{
echo "First login Bro...!!!";
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPF Messages</title>
</head>
<body>
<div class="main_wrapper">

<?php
include 'div_container_notfns.php'; // Notifications number display...
?>


<?php
display_heading_banner_or_text();
displaywelcomeandlogout();
include 'top_menu.php';
?>

<?php
connect2mysql('connect');
$loggedin=$_SESSION['loggedin'];
$query="SELECT * FROM tbl_messages WHERE `receiver`='$loggedin' ORDER BY dateandtime DESC";
$result=mysql_query($query);
$numofrows=mysql_num_rows($result);
if($numofrows==0){
	echo"<strong><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No unread messages.</strong>";
	exit();	
	}
?>

<table border="0px" cellpadding="5px" cellspacing="5px" width="100%">
<?php
for($i_messages=0;$i_messages<=$numofrows-1;$i_messages++)
{
if($i_messages%2==0)//changing color Combination ALTERNATION in messages.php
{
echo "<tr bgcolor=#0B8BB3>";
}
else {
echo "<tr bgcolor=#036A8A>";

	}
echo  "<td>";


echo "<br/>".mysql_result($result,$i_messages,"dateandtime")."<br/>";
echo "<a href=\"message.php?who=".mysql_result($result,$i_messages,"sender")."\">";
echo ucfirst(mysql_result($result,$i_messages,"sender")).":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo mysql_result($result,$i_messages,"message")."<br/>";
echo "</a>";
//echo mysql_result($result,$i_messages,"receiver");
echo "<hr width=\"50px\" align=left>";
echo "</td>";
echo  "</tr>";
echo mysql_error();

}
?>
</table>
</div>
<?php
mysql_query("UPDATE tbl_notfns SET `messages`='no' WHERE `username`='$loggedin'");
echo mysql_error();
?>
</body>
</html>