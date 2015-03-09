<?php 

//ADDRESS Analysis//////////////////////////////////////////////////////////////////////////////

function address_analysis($query_address,$district,$place1,$place2,$place3){
	
	$query_address=strtolower($query_address);	
	$query_address_array=explode(" ",$query_address);
	$pty_address_array=array($district,$place1,$place2,$place3);	
	$lowest_leven=9999;
	$score=0;
	for($i=0;$i<sizeof($query_address_array);$i++){
		for($j=0;$j<4;$j++){
				if(strtolower($pty_address_array[$j])=='none'){
//					break;
				}
				
				$leven=levenshtein($query_address_array[$i],$pty_address_array[$j]);
								
				if( $leven<=3 && $leven<$lowest_leven ){
					$score=(10*($j+1))-$leven;
					$lowest_leven=$leven;				
				}
		}	
	}
return $score;
}


//ADDRESS Analysis//////////////////////////////////////////////////////////////////////////////


//Info Analysis/////////////////////////////////////////////////////////////////////////////////
function info_analysis($query_info,$pty_info){

$pty_info=strtolower($pty_info);
$query_info=strtolower($query_info);

if(substr_count($pty_info," ")!=0) {
	$query_info_array=explode(" ",strtolower($query_info));
	
}else{
	$query_info_array=array($pty_info);
}



$score=0;


for($i=0;$i< sizeof($query_info_array) ;$i++){
	
	$occurences=substr_count($pty_info,$query_info_array[$i]);

	if($occurences!=0){	
	$score=$score+((strlen($query_info_array[$i])*$occurences));
	}
}
return $score;	
}
//Info Analysis//////////////////////////////////////////////////////////////////////////////////
?>