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


<script type="text/javascript" src="js/main.js"></script>
<!-- <script type="text/javascript" src="js/variables.js"></script> -->
<script type="text/javascript" src="js/BlockView.js"></script>
<script type="text/javascript" src="js/timer.js"></script>
<script type="text/javascript" src="js/changeGroup.js"></script>


<script type="text/javascript">
<?php
include 'fill_js_group_1_data.php';
?>
</script>

</head>



<body onload="mainStart();">

<div class="whole_wrapper">

<a href="index2.php?redirect=no">
<img src="header.jpg" alt="Load Shedding Schedule">
</a>


<div class="main_container" > 




<?php
include 'now_display_details.php';
?>


<?php
include 'set_default_samuha_cookie.php';
?>






<div id="visualization" style="display:none;">
<br>
<table id="blockView" border=0 width="50%" cellpadding=0 cellspacing=1>
<tr>
<td><input type="button" id="grChangeBtnV" value=<?php echo $samuha; ?> onclick="changeSamuhaWhole('plus')" > </td>



</tr>
<tr><td id="sunv" class="dayv">Sun</td></tr><tr><td id="monv" class="dayv">Mon</td></tr><tr><td id="tuev" class="dayv">Tue</td></tr><tr><td id="wedv" class="dayv">Wed</td></tr><tr><td id="thuv" class="dayv">Thu</td></tr><tr><td id="friv" class="dayv">Fri</td></tr><tr><td id="satv" class="dayv">Sat</td>
</tr>
</table>
<br>
</div>



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





</body>
</html>


