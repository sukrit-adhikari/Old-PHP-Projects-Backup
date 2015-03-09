<?php
require 'mysql_config.php';

$pty_id=$_POST['pty_id'];
$comment=$_POST['comment'];
$dat=date("Y-m-d H:i:s");

$query_insert_comment="INSERT INTO `tbl_comments` (`pty_id`, `comment`,`dateandtime`) VALUES ('$pty_id', '$comment','$dat');";

$result_insert_comment=mysql_query($query_insert_comment);

if(!mysql_error()){
header("Location: details.php?pty_id=$pty_id");
exit();
}else{
header("Location: error.php");
exit();
}
?>