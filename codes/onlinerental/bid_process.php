<?php
require 'mysql_config.php';

$pty_id=$_POST['pty_id'];
$name=$_POST['name'];
$contact_details=$_POST['contact_details'];
$bid_amount=$_POST['bid_amount'];
$dat=date("Y-m-d H:i:s");

$query_insert_bid="INSERT INTO `tbl_bid` (`pty_id`, `name`, `bid_amount`, `contact_details`, `dateandtime`) VALUES ('$pty_id', '$name', '$bid_amount','$contact_details', '$dat');";

$result_insert_bid=mysql_query($query_insert_bid);

if(!mysql_error()){
header("Location: details.php?pty_id=$pty_id");
exit();
}else{
header("Location: error.php");
exit();
}
?>