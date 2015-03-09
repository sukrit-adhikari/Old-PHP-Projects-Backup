<?php
@session_start();

if(!isset($_SESSION['login']) ){
	exit();
}


include '../mysql_config.php';

$loggedin = $_SESSION["username"];

$lastid = $_SESSION['lastid'];



if($result=mysql_query("SELECT * FROM `chats` WHERE  `sender`<>'$loggedin' AND `id`>'$lastid' ORDER BY `dat` ")){

	$result_rows=mysql_num_rows($result);	
		
	if($result_rows>=1){	
		$prev_sender=NULL;
		$message="&^#!@#()@#$";
		for($i=1;$i<=$result_rows;$i++){
		
			$row=mysql_fetch_array($result);
			
			$sender=ucfirst($row["sender"]);		
			//$message.=$sender;
			
				if($i==1){ $message.=$sender."<br>"; } 
				
				if($i>1 && $sender!=$prev_sender ){ $message.="<br>".$sender."<br>"; }
				
			$prev_sender=$sender;		
			
			$message = $message . $row['message']."<br>";
			
		}
	$message.="&^#!@#()@#$";	
	echo $message;	
	$_SESSION['lastid']=$row['id'];
	//setcookie("lastid",$row['id'], time()+(3600*24),"/" );
	
	}

	else{
		$_SESSION['lastid']=$lastid;
		echo "#*ECDS*#";	
		//setcookie("lastid",$lastid, time()+ (3600*24),"/");
	}
}

?>