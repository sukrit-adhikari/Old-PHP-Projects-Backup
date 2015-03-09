<?php


if(isset($_GET['setsamuha'])){

	if($_GET['setsamuha']=="yes"){
		setcookie("default_samuha",$samuha, time()+(3600*24*365));
	}
}


?>