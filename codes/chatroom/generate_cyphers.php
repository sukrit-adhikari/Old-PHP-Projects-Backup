<?php

if($_SESSION['login']=="yes"){

$y= date("Y");
$m= date("m");
$d= date("d");
$h= date("H");
$i= date("i");
$s= date("s");

$code= ($y*($s+1)) * ($m*($i+1)) * ($d*($h+1)) * rand(3,97);

setcookie("davinci",$code,time()+(3600*24*2),"/");

$_SESSION['davinci']=$code;
}

?>