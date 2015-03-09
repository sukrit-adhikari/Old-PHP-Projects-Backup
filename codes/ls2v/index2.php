<?php
include 'redirect_now.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 

<meta name="description" content="Real time Load Shedding schedule routine of Nepal Kathmandu. Load Shedding Group wise schedule.">

<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!-- End of CSS Linking -->


<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> 
<title>Load Shedding Info</title> 


</head> 
<body> 

<div class="whole_wrapper">

<a href="index.php?redirect=no"> 
<img src="header.jpg" alt="mobile site for loadshedding schedule"> 
</a> 

<div class="main_container" > 
 



<h4>Mobile Site for Info about Current Load Shedding</h4>


 
<?php
include 'now_form.php';
?>


<h4>Get an Image Routine for your Samuha / Group.</h4>

<?php
include 'getimage_form.php';
?>

<?php
include 'info.php';
?>
 

 
 
 
 
 
 </div>


</body> 
</html> 