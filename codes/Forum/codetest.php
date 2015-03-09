<?php
$year=date("Y");
$month=date("m");
$day=date("d");
$hour=date("g");
$minute=date("i");
$seconds=date("s");
$dateandtime=$year."-".$month."-".$day." ".$hour.":".$minute.":".$seconds;
$code=rand(1000,9999);
echo $code.= ( ($year*37)*rand(5, 9) ) + ($month*442*rand(2, 9)) + ($day*$minute) + (($hour/$minute+$seconds)*rand(0.2, 0.9));

?>