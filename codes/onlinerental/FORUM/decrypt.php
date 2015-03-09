<?php

function decrypt($password,$dateandtime,$code) {
// Above $password is encrypted password
		
		$code_1=substr($code,0,3);		

		$code_2=substr($code,3,3);		
		
		
		$dateandtime_for_decrypt=$code_1.$dateandtime.$code_2;
	

//code_1 and code_2 and dateandtime variables already retrieved and above this LINE

//$result_onetoone is also retrieved BUT in array form after explode(" ",$password)


		$password_real='';		
		
		$result_onetoone=explode(" ",$password);// Encrypted Password-> $result_onetoone

		for($i=0;$i<=count($result_onetoone)-1;$i++){	
			
			$result_onetoone_divide = $result_onetoone[$i]/ord($dateandtime_for_decrypt["$i"]); //ASCII OF PASSWORD

			$password_real.=chr($result_onetoone_divide);//Unrotate_real_password
		}
 $password_after_decrypt=$password_real;
return $password_after_decrypt;
}
?>