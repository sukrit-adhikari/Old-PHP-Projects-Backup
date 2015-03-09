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
<?php
include 'div_container_notfns.php'; // Notifications number display...
?>

<div class="main_wrapper">

<?php
display_heading_banner_or_text();
displaywelcomeandlogout();
include 'top_menu.php';
?>

<?php
if(isset($_GET['who']))
{
	$who=$_GET['who'];
		if($who==$_SESSION['loggedin']) {
		echo "<br>You can't message yourself...!!!";	
		exit();	
		}
}
else 
{
	echo "An error has occured.Please try again...!!!";	
	exit();
}
?>
<?php
connect2mysql('connect');
$loggedin=$_SESSION['loggedin'];
$query="SELECT * FROM tbl_messages WHERE (`sender`='$who' AND `receiver`='$loggedin') OR  (`sender`='$loggedin' AND `receiver`='$who') ORDER BY dateandtime DESC LIMIT 5";
$result=mysql_query($query);
$numofrows=mysql_num_rows($result);
?>
<table border="0px" cellpadding="5px" cellspacing="5px" width="100%">
<?php
for($i_messages=$numofrows-1;$i_messages>=0;$i_messages--)
{
if(mysql_result($result,$i_messages,"sender")==$who)//changing color Combinatio for messages send by sender and receiver
{
echo "<tr bgcolor=#0B8BB3>";
}
else {
echo "<tr bgcolor=#036A8A>";

	}
echo  "<td>";
echo mysql_result($result,$i_messages,"dateandtime")."<br/>";
echo ucfirst(mysql_result($result,$i_messages,"sender")).":&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo mysql_result($result,$i_messages,"message")."<br/>";
echo "<hr width=\"50px\" align=left>";
echo "</td>";
echo  "</tr>";
echo mysql_error();
}
?>
</table>

<form action="message_action.php" method="post">
<table border="0px" > 
<tr>
<td>
<textarea rows="4" cols="100" name="message">Message...Press TAB then enter for fast reply</textarea>
</td>
</tr>

<tr>
<td>  
<input type="hidden" name="to" value=<?php echo $who?> />

<input type="submit" value="Send"/>
</td>
</tr>

</table>
</form>
</div>
</body>
</html>