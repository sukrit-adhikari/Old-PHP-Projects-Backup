<?php

function encrypt($password,$code_1,$code_2,$dateandtime){

//$password is received/present above this	
	
	$pass_length=strlen($password);

	$rotate_mag=3;

		$rotated_password=$password; //No Rotation



//	$rotated_password=substr($password,$rotate_mag).substr($password,0,$rotate_mag);

	

	//$code=$code_1.$code_2;

	$dateandtime_for_encrypt=$code_1.$dateandtime.$code_2;
		
	$password='';
		
		for($i=0;$i<=strlen($rotated_password)-1;$i++){	
			
			if(($i!=strlen($rotated_password)-1)){
				$password.=ord($rotated_password[$i])*ord($dateandtime_for_encrypt[$i])." ";
			}
			else {
				$password.=ord($rotated_password[$i])*ord($dateandtime_for_encrypt[$i]);//FOR THE LAST ONE			
			}	
		}
		
return $password;
}
?>