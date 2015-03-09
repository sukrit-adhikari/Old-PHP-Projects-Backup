<?php
include 'visit_tracker.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">





<head>
<meta name="description" content="Real time Load Shedding schedule routine of Nepal Kathmandu. Load Shedding Group wise schedule.">

<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!-- End of CSS Linking -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title id="title">
<?php echo "Samuha ".$_GET['samuha']; ?> Now
</title>
</head>

<body onload="initTimer()">




<div class="whole_wrapper">

<a href="index.php?redirect=no">
<img src="header.jpg" alt="Load Shedding Schedule">
</a>


<div class="main_container" > 




<?php
include 'now_display_details.php';
?>


<?php
include 'set_default_samuha_cookie.php';
?>



<?php //Now Form
include 'now_form.php';
?>



<?php // Include Info
include 'info.php';
?>

</div>

</div>


<!-- Timing Details for JAVASCRIPT -->
<div style="display:none">
<span id="hrs">0</span> :
<span id="mins">0</span>

<span id="secs">60</span>

<span id="server_hrs">0</span> :
<span id="server_mins">0</span>
<span id="dayOfWeek">
<?php 
$day = date('w');
$day++ ; 
echo $day;
?>
</span>
</div>
<!-- End of Timing Details for JAVASCRIPT -->

<script type="text/javascript" src="js/timer.js"></script>

</body>
</html>


