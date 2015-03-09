<?php
session_start();

if(!isset($_SESSION['login']) ){
	exit();
}



include '../mysql_config.php';

$message=$_GET['message'];

//$message=mysql_escape_string($message); 

$sender=$_SESSION['username'];

$dat=date("Y-m-d H:i:s");

if(mysql_query("INSERT INTO chats (`sender`,`message`,`dat`) VALUES('$sender','$message','$dat')")){
	
//	echo ucfirst($sender)."<br>";
//	echo $message;

	}
	
else {

echo "<br><font color=RED> was not sent :( Sorry !</font>";	
	
	}


?>