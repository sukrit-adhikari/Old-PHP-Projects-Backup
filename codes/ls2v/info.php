<ul style=" font-size:13px; list-style:square; line-height:22px;"> 
 
 
 
<li> 
Load shedding schedule or routine of Nepal and Kathmandu valley.
</li> 
 
<li> 
 
Category / Samuha / Group wise information about load shedding in Nepal and Kathmandu.<br> 
 
</li> 
 
<li> 
Group wise Image of Load shedding Routine.
 
</li> 
<li> 
Real Time Load shedding Info of Kathmandu and Nepal.
</li> 
 
<li> 
Load shedding routine image generator.
</li> 
 
<li> 
Group / Samuha Now:
 
<a href="now.php?samuha=1">1</a> 
 
 
<a href="now.php?samuha=2">2</a> 
 
 
<a href="now.php?samuha=3">3</a> 
 
 
<a href="now.php?samuha=4">4</a> 
 
 
<a href="now.php?samuha=5">5</a> 
 
 
<a href="now.php?samuha=6">6</a> 
 
 
<a href="now.php?samuha=7">7</a> 
 
 
 
</li> 
<li> 
Group / Samuha Image:
 
<a href="imageroutine.php?samuha=1">1</a> 
 
 
<a href="imageroutine.php?samuha=2">2</a> 
 
 
<a href="imageroutine.php?samuha=3">3</a> 
 
 
<a href="imageroutine.php?samuha=4">4</a> 
 
 
<a href="imageroutine.php?samuha=5">5</a> 
 
 
<a href="imageroutine.php?samuha=6">6</a> 
 
 
<a href="imageroutine.php?samuha=7">7</a> 
</li> 

<!-- Option For Removing DEFAULT Samuha -->
<?php
if(isset($_GET["samuha"])){
$samuha=$_GET["samuha"];
if(isset($_COOKIE["default_samuha"]) && $_COOKIE["default_samuha"]==$samuha)
{
echo "<li>";

?>
<span id="removedefaultsamuhaspan">
<input type="button" value="Remove Default Group <?php echo $samuha;?>" onclick="window.location.assign('index2.php?remove_default_samuha=yes')">
</span>
<?php
echo "</li>";

}
}
?>
<!-- Option for removing Default Samuha -->

 
</ul> 