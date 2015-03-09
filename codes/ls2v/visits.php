<?php


include 'mysql_config.php';

function unique_visits(){
	$query = "SELECT count(*) unique_visits FROM `tbl_ls_visitor_tracker` WHERE 1";
	$result= mysql_query($query);
	$row = mysql_fetch_array($result);
	return $row['unique_visits'];
}

function total_visits(){
	$query = "SELECT sum(visits) total_visits FROM `tbl_ls_visitor_tracker` WHERE 1";
	$result= mysql_query($query);
	$row = mysql_fetch_array($result);
	return $row['total_visits'];
}

echo "Unique :: ".unique_visits();
	echo "<br>";
echo "Total :: ".total_visits();



?>