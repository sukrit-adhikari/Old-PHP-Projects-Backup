<?php
include 'Mobile_Detect.php';
$detect = new Mobile_Detect;

if ($detect->isMobile()) {
    header("Location: ls2m/");
}else{
	header("Location: index2.php");
}
?>