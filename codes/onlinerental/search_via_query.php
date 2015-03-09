<?php 
include 'mysql_config.php';
include 'string.php';

//////////Global Variables for this page//////////////////////////////////////////////////////
if(isset($_GET['query'])){
	$query=$_GET['query'];
	if(strlen($query)<4){
		header("Location: error.php");
		exit();	
	}
}else {
		header("Location: error.php");
		exit();
	}

$type=$_GET['type'];
if($type==""){
	$type="%";
}

$jsonoff=$_GET['jsonoff'];


//$real_query=$_GET['real_query'];
//////////////////////////////////////////////////////////////////////////////////////////////
	

/////////////////////////////////Search into Address and Info //////////////////////////////////	
////////////////////////////////////////////////////////////////////////////////////////////////
$query_array=explode(" ",$query);
$query_array_size=sizeof($query_array);

$query_address="";
$query_info="";

$array_type=array("house","home","houses","homes","apartment","apartments");


for($i=0;$i<$query_array_size;$i++){
	
	$word=$query_array[$i];
	$query_dict="SELECT `word` FROM `tbl_dict` WHERE `word`='$word'";
	$result_dict=mysql_query($query_dict);
	if(mysql_num_rows($result_dict)==0){
		$query_address=$query_address." ".$word;
		$query_address=trim($query_address);
	}else{
		$query_info=$query_info." ".$word;
		$query_info=trim($query_info);	
	}
	
}
///////////////////////////End Of Search into Address and Info /////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////
$query_pty="SELECT * FROM `tbl_pty` WHERE `type` LIKE '$type'";

$result_pty=mysql_query($query_pty);

$no_of_pty=mysql_num_rows($result_pty);

$id_score_array = array();

for($i=0;$i<$no_of_pty;$i++) {
		$row=mysql_fetch_array($result_pty);

		$district=$row['district'];
		$place1=$row['place1'];
		$place2=$row['place2'];
		$place3=$row['place3'];
							
		$pty_id=$row['id'];	
		$pty_info="";		

		for($j=1;$j<=10;$j++){
			if($row['info'.$j]!='none'){			
				$pty_info=$pty_info." ".$row['info'.$j];
			}else {
				break;			
			}		
		}
		
		$pty_info=trim($pty_info);		
		
		if(strlen($query_address)<=3){
			$score=info_analysis($query_info,$pty_info);
		}else if(strlen($query_info)<=3 ){
			$score=address_analysis($query_address,$district,$place1,$place2,$place3);
		}else{
			$score=address_analysis($query_address,$district,$place1,$place2,$place3)+info_analysis($query_info,$pty_info);		
		}
		
		$id_score_array[$pty_id]=$score;
}

arsort($id_score_array);

$pty_list="";

foreach($id_score_array as $key => $value){

if($value>4){ // Score minimun value=4
	$pty_list=$pty_list." ".$key;
}

}

$pty_list=trim($pty_list);



$query_insert_pty_list="INSERT INTO `tbl_search_query_pty` (`query`,`pty_list`) VALUES('$query','$pty_list')";
if(mysql_query($query_insert_pty_list)){
	//header("Location: display_search_result.php?query=".$query);
}



////////////////////////////////////////////////////////////////////////////////////////////////
?>
