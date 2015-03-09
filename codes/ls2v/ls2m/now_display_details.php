<?php
$samuha=$_GET['samuha'];
?>

<div itemscope itemtype="http://ls.sukrit.com.np/now.php?samuha=<?php echo $samuha; ?>">

<span  id="now_details">

<?php


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
echo "<h2 itemprop='name' id='samuhainfo'>Samuha / Group ".$samuha."</h2>";
?>

<?php
echo "<span style='display:none' id='whichgroup'>"."Gr. ".$samuha."</span>";

?>

<h5>
<table class="groups">
<tr>
<td>
<ul style= "list-style-image: url(images/bullet1.jpg);" id="main_now_info">
<span id="localTimeWarning" style="display:none;">
Timing details shown below relies on Local Machine Time.
</span>

<font size="4">
<?php

date_default_timezone_set("Asia/Katmandu");
	
	
include 'mysql_config.php';

	

$chr = date("H");
$cday = date("w")+1;
$currmin=date("i");
$currsec=date("s");
$currtime=date("H:i");
 
 
 if($cday>=$samuha){
 $ls_formula_load_day = ($cday-$samuha+1);
 }else{
 $ls_formula_load_day = 7 - ($samuha-$cday-1);
 }
 
 
$query="SELECT * FROM tbl_main WHERE `day`='$ls_formula_load_day' AND `samuha`='1' LIMIT 1";

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
	
	echo "<li id='nowli'>Now >>> No Load Shedding</li>";

	echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";

	echo "<li id='futInfo'>Light Goes at: ".$fll." and comes at ".$ful." .</li>";
	
	echo "<span id='timeleftspan' style='display:block;'><li id='timeleft'>".time_diff($chr,$fll)." Left!</li></span>";


if($nolsl=="no"){
echo "<li id='laterToday'>Later today Light goes at ".$sll." and comes at ".$sul." .</li>";
}
else{
	echo "<li>Single Loadshedding Today...!!!</li>";	
	
	}

$ls="no";

}

if($chr>$fll && $chr<$ful){
	echo "<li id='nowli'>Now >>> Load Shedding</li>";	
	echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";
	echo "<li id='futInfo'>Light Comes at: ".$ful."!</li>";	
	echo "<span id='timeleftspan' style='display:block;'><li id='timeleft'>".time_diff($chr,$ful)." Left!</li></span>";
		if($nolsl=="no"){
			echo "<li id='laterToday'>Later today Light goes at ".$sll." and comes at ".$sul." .</li>";
		}
	$ls="yes";	
}

if($sll!=99 && $sul!=99){
	if($chr>$ful && $chr<$sll){
	echo "<li id='nowli'>Now >>> No Load Shedding</li>";
	echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";
	echo "<li id='futInfo'>Light Goes at: ".$sll." and comes at ".$sul."</li>";	
	echo "<span id='timeleftspan' style='display:block;'><li id='timeleft'>".time_diff($chr,$sll)." Left to Load Shedding!</li></span>";
	$ls="no";	
}

if($chr>$sll && $chr<$sul){
	echo "<li id='nowli'>Now >>> Load Shedding</li>";	
	echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";
	echo "<li id='futInfo'>Light Comes at: ".$sul.".</li>";	
	echo "<span id='timeleftspan' style='display:block;'><li id='timeleft'>".time_diff($chr,$sul)." Left!</li></span>";
	$ls="yes";	
}

if($sul>$sll){ //Arko Din ma Pugcha if sul is less than sll  
	if($chr>$sul){
		echo "<li id='nowli'>Now >>> No Load Shedding</li>";	
		echo "<li  id='currtime'>It's ".$currtime." o'Clock now.</li>";
		echo "<li id='futInfo'>Light Goes NEXT DAY! Good Night.</li><span id='timeleftspan' style='display:none;'><li id='timeleft'></li></span>";	
		$ls="no";
	}
}

if($sul<$sll){  
	if($chr>$sll){
		echo "<li id='nowli'>Now >>> Load Shedding</li>";	
		echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";
		echo "<li id='futInfo'>Light Comes NEXT DAY at ".$sul.". Good Night...!!!</li><span id='timeleftspan' style='display:none;'><li id='timeleft'></li></span>";	
		$ls="yes";		
	}
}


}

else { // If Only Single Load Shedding //
	if($chr>$ful){
		echo "<li id='nowli'>Now >>> No Load Shedding</li>";	
		echo "<li id='currtime'>It's ".$currtime." o'Clock now.</li>";
		echo "<li id='futInfo'>Light Goes NEXT DAY! Good Night.</li><span id='timeleftspan' style='display:none;'><li id='timeleft'></li></span>";	
		$ls="no";
	}	
	}




?>
<li>
<a href="imageroutine.php?samuha=<?php echo $samuha  ?>" id="getimgroutinelink">Get Image Routine for Group <?php echo $samuha ?></a>
</li>

</font>
</td>
</tr>
</table>
</h5>

</span>

</div>