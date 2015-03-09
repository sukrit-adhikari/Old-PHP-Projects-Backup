<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="Real time Load Shedding schedule routine of Nepal Kathmandu. Load Shedding Group wise schedule.">


<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!-- End of CSS Linking -->

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title id="title">

<?php echo "Samuha ".$_GET['samuha']; ?> Now</title>

</head>
<body>
<div class="whole_wrapper">

<a href="index.php?redirect=no">
<img src="header.jpg" alt="mobile site for loadshedding schedule">
</a>


<div class="main_container" > 



<?php

$samuha=$_GET['samuha'];

if(!isset($_GET['samuha'])){
echo "Invalid URL...!!!";
		exit();
	}


if($samuha<0 || $samuha>7){
echo "Invalid URL...!!!";
exit();	
	}
else {

include 'time_diff.php';	
	
	}



echo "<h2>Samuha / Group ".$samuha."</h2>";

?>


<?php
include 'set_default_samuha_cookie.php';
?>


<h5>
<table class="groups">
<tr>
<td>
<ul style= "list-style-image: url(images/bullet1.jpg);">

<font size="4">

<?php

date_default_timezone_set("Asia/Katmandu");
	
include 'mysql_config.php';

	

$chr = date("H");
$cday = date("w")+1;
$currmin=date("i");
$currsec=date("s");
$currtime=date("H:i");
 
 
 
$query="SELECT * FROM tbl_main WHERE `day`='$cday' AND `samuha`='$samuha' LIMIT 1";

$row=mysql_fetch_array(mysql_query($query));

$fll=$row['fll'];
$ful=$row['ful'];
$sll=$row['sll'];
$sul=$row['sul'];

if($sll==99 && $sul==99 ){
	$nolsl="yes";
	}
else {
	$nolsl="no";
	}


$fll=  number_format($fll, $decimals = 2);
$ful=  number_format($ful, $decimals = 2);
$sll=  number_format($sll, $decimals = 2);
$sul=  number_format($sul, $decimals = 2);


$ls="";



	$chr = $chr + ($currmin/100) + ($currsec/10000);

//$chr=  number_format($chr, $decimals = 2);






if($chr<$fll){
	
	echo "<li>Now >>> No Load Shedding</li>";

	echo "<li>It's ".$currtime." o'Clock now.</li>";

	echo "<li>Light Goes at: ".$fll." and comes at ".$ful." .</li>";
	
	echo "<li id='timeleft'>".time_diff($chr,$fll)." Left!</li>";


if($nolsl=="no"){
echo "<li>Later today Light goes at ".$sll." and comes at ".$sul." .</li>";
}
else{
	echo "<li>Single Loadshedding Today...!!!</li>";	
	
	}

$ls="no";

}

if($chr>$fll && $chr<$ful){

	echo "<li>Now >>> Load Shedding</li>";	


	echo "<li>It's ".$currtime." o'Clock now.</li>";


	echo "<li>Light Comes at: ".$ful."!</li>";	


	echo "<li id='timeleft'>".time_diff($chr,$ful)." Left!</li>";

if($nolsl=="no"){

	echo "<li>Later today Light goes at ".$sll." and comes at ".$sul." .</li>";
}


$ls="yes";	

	}

if($sll!=99 && $sul!=99){

	if($chr>$ful && $chr<$sll){
	

	echo "<li>Now >>> No Load Shedding</li>";
	
	echo "<li>It's ".$currtime." o'Clock now.</li>";

	echo "<li>Light Goes at: ".$sll." and comes at ".$sul."</li>";	

	echo "<li id='timeleft'>".time_diff($chr,$sll)." Left to Load Shedding!</li>";
	
	$ls="no";	

	}



	if($chr>$sll && $chr<$sul){


	echo "<li>Now >>> Load Shedding</li>";	

	echo "<li>It's ".$currtime." o'Clock now.</li>";

	echo "<li>Light Comes at: ".$sul.".</li>";	

	echo "<li id='timeleft'>".time_diff($chr,$sul)." Left!</li>";

	$ls="yes";	
	}



	if($sul>$sll){ //Arko Din ma Pugcha if sul is less than sll  
		if($chr>$sul){
		
			echo "<li>Now >>> No Load Shedding</li>";	
			
		
			echo "<li>It's ".$currtime." o'Clock now.</li>";
			
		
			echo "<li>Light Goes NEXT DAY! Good Night.</li><span id='timeleft'></span>";	
			
			$ls="no";
		}
	}

	if($sul<$sll){  
		
		if($chr>$sll){
		
			
			echo "<li>Now >>> Load Shedding</li>";	
		
				
			echo "<li>It's ".$currtime." o'Clock now.</li>";
		
			
			echo "<li>Light Comes NEXT DAY at ".$sul.". Good Night...!!!</li><span id='timeleft'></span>";	

			$ls="yes";		
		}
	}


}

else {
	if($chr>$ful){
		
	
		echo "<li>Now >>> No Load Shedding</li>";	
	
	
		echo "<li>It's ".$currtime." o'Clock now.</li>";
		

		
		echo "<li>Light Goes NEXT DAY! Good Night.</li><span id='timeleft'></span>";	
		$ls="no";
		}	
	
	
	}




?>
</font>
</td>


<?php
/*
<td>

<?php

if($ls=="yes"){

echo "<img src=images/candle.jpg height=50 width=25> ";
}

if($ls=="no"){
echo "<img src=images/bulb.jpg height=50 width=40> ";
}




?>
</ul>

</td>

*/
?>

</tr>






</table>
</h5>





<?php
//echo $_COOKIE["default_samuha"];
if(isset($_COOKIE["default_samuha"]) && $_COOKIE["default_samuha"]==$samuha)
{


?>
<a href="index.php?remove_default_samuha=yes">Group <?php echo $samuha ?> is not my default Samuha / Group.</a>
<br><br>
<?php
}
?>




<a href="imageroutine.php?samuha=<?php echo $samuha  ?>">Get Image Routine for Group <?php echo $samuha ?></a>

<br><br>




<?php
include 'now_form.php';
?>



<?php 

if($ls==""){
	echo "<br />No info found...Please Refresh the Page...!!!<br />";
} 

?>
<!--
<div class="fb-like" data-href="http://ls.sukrit.com.np" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false" data-colorscheme="dark"></div>
-->






<?php include 'info.php';?>

</div>
</div>

<div style="display:none">
<span id="hrs">0</span> :
<span id="mins">0</span>
<span id="secs">60</span>
</div>

<script type="text/javascript">
var secs = 60;

function updatesecs(){

if(secs>0){
	updateLeftTime("partial");
	secs--;
}else{
	updateLeftTime("");
	secs=59;
}

}

if(document.getElementById('timeleft').innerHTML!=""){



var timeleft = document.getElementById('timeleft').innerHTML;
hrs_init = timeleft.substring(0,timeleft.indexOf(" "));

var timeleft_mins = timeleft.substring(timeleft.indexOf(':')+2);
mins_init = timeleft_mins.substring(0,timeleft_mins.indexOf(" "));

document.getElementById('hrs').innerHTML=hrs_init;
document.getElementById('mins').innerHTML=mins_init;


mins = document.getElementById('mins').innerHTML;
hrs = document.getElementById('hrs').innerHTML;

document.getElementById("title").innerHTML = hrs + " : " + mins + " : "+secs+ " Left...";
document.getElementById("timeleft").innerHTML = hrs + " : " + mins + " : "+secs+ " Left...";


setInterval("updatesecs()", 1000);

}else{ // NextDay

}

</script>

<script type="text/javascript">


function updateLeftTime(partialorfull){

	mins = document.getElementById('mins').innerHTML;
	hrs = document.getElementById('hrs').innerHTML;

document.getElementById("title").innerHTML = hrs + " : " + mins + " : "+secs+ " Left...";
document.getElementById("timeleft").innerHTML = hrs + " : " + mins + " : "+secs+ " Left...";

if(partialorfull!="partial"){	
	if(mins>0 && hrs>0 ){
	document.getElementById('mins').innerHTML=document.getElementById('mins').innerHTML - 1;
	}
	
	else if(mins ==0 && hrs >0 ){
	document.getElementById('hrs').innerHTML=document.getElementById('hrs').innerHTML - 1;
	document.getElementById('mins').innerHTML="59";
	}
	
	else if(hrs==0 && mins>0){
	document.getElementById('mins').innerHTML=document.getElementById('mins').innerHTML - 1;
	}
	else if(hrs==0  && mins==0){
	location.reload();
	}

}
}
</script>


</body>
</html>