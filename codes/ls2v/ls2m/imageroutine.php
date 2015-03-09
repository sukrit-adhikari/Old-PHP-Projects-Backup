<html>
<head>

<meta name="description" content="Real time Load Shedding schedule routine of Nepal Kathmandu. Load Shedding Group wise schedule.">

<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!-- End of CSS Linking -->


<title>
Group Wise Load Shedding Image Routine
</title>
</head>

<body>
<div class="whole_wrapper">

<a href="index.php?redirect=no"> 
<img src="header.jpg" alt="mobile site for loadshedding schedule"> 
</a> 

<div class="main_container" >

<h4>Mobile Site for Latest Load Shedding Schedule</h4>
<h5>Load shedding routine of Group <?php echo $_GET['samuha']; ?></h5>
<h5>Save the Image as "imgofroutine.PNG" Format...</h5>

<div class="imageroutine">
<img src="imgofroutine.php?samuha=<?php echo $_GET['samuha']; ?>" alt="<?php echo "Load Shedding Routine of Group ".$_GET['samuha']; ?>" width="200" height="150">
</div>

<?php
//include 'imgofroutine.php';
?>

<br />

<?php
include 'getimage_form.php';
include 'info.php';
?>
</div>
</div>
</body>
</html>