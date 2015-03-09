<?php
//$pty_id above this line

require 'mysql_config.php';

$select_comments_query="SELECT * FROM `tbl_comments` WHERE `pty_id`='$pty_id'";

$result_comments_query=mysql_query($select_comments_query);

$no_of_comments=mysql_num_rows($result_comments_query);


for($i=0;$i<$no_of_comments;$i++){
$row=mysql_fetch_array($result_comments_query);	
	
	echo $row['comment']."<br>";
	echo $row['dateandtime']."<br><br>";
	if($i==($no_of_comments-1)){
		echo "<br>";
	}
}



?>