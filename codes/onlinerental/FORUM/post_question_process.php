<?php
session_start();
include 'function_store.php';
$username=$_SESSION['loggedin'];
$question=$_POST['question'];
$dateandtime=date("Y-m-d H:i:s");
$category=$_POST['category'];
$topic=$_POST['topic'];





	if($topic=="Choose your topic" || $topic=="Unspecified"){
	$topic="Unspecified";
	}


connect2mysql('connect');
$question = mysql_real_escape_string($question);



mysql_query("INSERT INTO tbl_qs (`question`, `asker`, `category`,`topic`,`dateandtime`)
VALUES ('$question', '$username', '$category','$topic','$dateandtime')");

if(!mysql_error())
{
header("Location: index.php?status=posted");
}
else
{
echo "ERROR";
}
mysql_close();
?>