<?php


function time_diff($time1,$time2){

// $time ma CURRENT Time aucha jaile NI...

$time1 =  number_format($time1, $decimals = 2);
	
	$hr_1=intval($time1);

 	$min_1= ( $time1-floor($time1) ) *100;

	$hr_2=intval($time2);
	
	$min_2=( $time2-floor($time2) ) *100;




if($min_2>=$min_1){

/*
echo $time1;
echo "<br>";
echo $time2;
echo "<br>";
*/

	$time_diff=$time2-$time1;

	$t_d_decimal= ($time_diff-floor($time_diff))* 100;

	$t_d_decimal=  number_format($t_d_decimal, $decimals = 0);

	
	if(intval($t_d_decimal) == 0){
		$t_d_decimal = 59;
		$time_diff = intval($time_diff)-1;
	}else{
		$t_d_decimal--;
	}
	
return  intval($time_diff)." Hrs : ".$t_d_decimal." Mins	";
	
}

	
else if($min_2<$min_1){
	
	if($min_2==0){
	
	$subtrahand=60;
	
	} else{
		
	$subtrahand=120;

	
	}



	$time_diff =  ( ( ($hr_2-$hr_1) -1) + ( (60+$min_2-$min_1) )/100 );	
	
	$t_d_decimal= ($time_diff-floor($time_diff))* 100;

	$t_d_decimal=  number_format($t_d_decimal, $decimals = 0);

	if(intval($t_d_decimal) == 0){
		$t_d_decimal = 59;
		$time_diff = intval($time_diff)-1;
	}else{
		$t_d_decimal--;
	}
	

	return  intval($time_diff)." Hrs : ".$t_d_decimal." Mins";

}	
	
}

?>