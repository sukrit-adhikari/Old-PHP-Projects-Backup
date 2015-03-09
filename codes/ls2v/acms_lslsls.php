<center><h1>LOG</h1></center>
<?php
include 'mysql_config.php';


	$query_remove_others="DELETE FROM `tbl_main` WHERE `samuha`<>'1';";
	$result_remove_others=mysql_query($query_remove_others);
	

	
	if(!mysql_error()){
		echo "Group 2 to 7 DATA DELETED !!!<br><br><hr>";
	}else{
		echo "Error encountered while deleting Group 2 - Group 7 DATA...<br> Error :: ".mysql_error()."<br><br><hr>";
	}
	

	
	$query="SELECT * FROM `tbl_main` WHERE `samuha`='1' ORDER BY day";
	$result=mysql_query($query);




	echo "For JAVASCRIPT...!!!<br><br>";
	for($i=1;$i<=7;$i++){
	
	$row=mysql_fetch_array($result);	
											//$i is 'day' HERE

		$array[$i]['fll']=$row['fll'];
		$array[$i]['ful']=$row['ful'];
		$array[$i]['sll']=$row['sll'];
		$array[$i]['sul']=$row['sul'];
	
		echo "ls[".$i."][0]=".$row['fll'].";<br>";
		echo "ls[".$i."][1]=".$row['ful'].";<br>";
		echo "ls[".$i."][2]=".$row['sll'].";<br>";
		echo "ls[".$i."][3]=".$row['sul'].";<br>";

	}
	echo "<br><br><hr>";

for($i=2;$i<=7;$i++){//SAMUHA

	for($j=1;$j<=7;$j++){//DIN 
		
							$samuha=$i;
							$day=$j;	

		if($j==1){
		
		$array2[$j]['fll']=$array[7]['fll'];
		$array2[$j]['ful']=$array[7]['ful'];
		$array2[$j]['sll']=$array[7]['sll'];
		$array2[$j]['sul']=$array[7]['sul'];
		
		}//IF DAY is 1st
		
		else {
							
		$array2[$j]['fll']=$array[$j-1]['fll'];
		$array2[$j]['ful']=$array[$j-1]['ful'];
		$array2[$j]['sll']=$array[$j-1]['sll'];
		$array2[$j]['sul']=$array[$j-1]['sul'];
				
		}//IF DAy is not 1st
		
$fll=$array2[$j]['fll'];
$ful=$array2[$j]['ful'];
$sll=$array2[$j]['sll'];
$sul=$array2[$j]['sul'];


$query="INSERT INTO tbl_main (`samuha`,`day`,`fll`,`ful`,`sll`,`sul`) VALUES('$samuha','$day','$fll','$ful','$sll','$sul')";
	
	if(!mysql_query($query)){ //Error Encountered 
		echo "Error encountered while inserting data for ".$samuha." Group ".$day." Day !!!<br>";		
		echo "Error :: ".mysql_error()."<br><br><hr>";
	}else{ // Insert successful
		echo "Data for ".$samuha." Group ".$day." Day Inserted !!!<br><br><hr>";		
	}
	
	}//DOLLAR J
	

	for($j=1;$j<=7;$j++){ //RECREATE THE ARRAY FOR THE NEXT DAY
	
			$array[$j]['fll']=$array2[$j]['fll'];
			$array[$j]['ful']=$array2[$j]['ful'];
			$array[$j]['sll']=$array2[$j]['sll'];
			$array[$j]['sul']=$array2[$j]['sul'];

	}


	
	
}//Dollar I


?>