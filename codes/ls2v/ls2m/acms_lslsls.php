<?php
include 'mysql_config.php';


	$query="SELECT * FROM `tbl_main` WHERE `samuha`='1' ORDER BY day";
	$result=mysql_query($query);



for($i=1;$i<=7;$i++){
	$row=mysql_fetch_array($result);	
//$i is 'day' HERE
	$array[$i]['fll']=$row['fll'];
	$array[$i]['ful']=$row['ful'];
	$array[$i]['sll']=$row['sll'];
	$array[$i]['sul']=$row['sul'];
	
	}
	

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
	
	if(!mysql_query($query)){
		echo "QUERY ERROR";		
		echo mysql_error();
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