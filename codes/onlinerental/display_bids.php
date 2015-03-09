<?php
//$pty_id above this line

require 'mysql_config.php';

$select_bids_query="SELECT * FROM `tbl_bid` WHERE `pty_id`='$pty_id'";

$result_bids_query=mysql_query($select_bids_query);
$no_of_bids=mysql_num_rows($result_bids_query);

for($i=0;$i<$no_of_bids;$i++){
$row=mysql_fetch_array($result_bids_query);	
	
	echo "Name:".$row['name']."<br>";
	echo "Contact:".$row['contact_details']."<br>";
	echo "Bidding Amount:".$row['bid_amount']."<br><br>";
	if($i==($no_of_bids-1)){
		echo "<br>";
	}
}



?>