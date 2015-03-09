<?php
include 'checklogin.php';
//include 'generate_cyphers.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Chat Room Beta</title>

<!--
<script type="text/javascript" src="ajax/sots.js" >
</script>

<script type="text/javascript" src="ajax/pots.js" >
</script>


<script type="application/javascript" src="ajax/show.js" >
</script>

<script type="application/javascript" src="ajax/stts.js" >
</script>


<script type="application/javascript" src="ajax/ptts.js" >
</script>

<script type="application/javascript" src="main.js" >
</script>

-->


<script type="text/javascript" src="ajax/send.js" >
</script>

<script type="application/javascript" src="ajax/ajax_master.js" >
</script>


<script type="application/javascript" src="main_v2.js" >
</script>


</head>




<?php

echo "
<script type=\"text/javascript\"  >
var username=\"".$_SESSION['username']."\";
</script>
";

?>






<body text="#D6BF86" bgcolor="#9C2A00" link="#D6BF86" alink="#D6BF86" vlink="#D6BF86" onload="whattodoonload();">

<div style="margin:5px;">
<?php
echo "<h2 id=\"loggedinas\" align=Left style=\"color:#D6BF86;\">&nbsp;&nbsp;&nbsp;<span id=\"asterik\"></span>Logged In as ".ucfirst($_SESSION['username'])."</h2>";
?>
	
</div>

<div style="height:300px;overflow:auto;margin:5px;border-style:outset;border-width:2px;" id="chatdiv">





<table width="100%" id="chatable" cellpadding="5px" cellspacing="5px">
<?php
if(isset($_GET['showprevchats'])){
	include 'show_prev_chats.php';
	}
else {
	include 'show_prev_chats.php';
}
?>

</table>
</div>
<div style="margin:5px;">
<span id="sending"></span>
<!--<img src="images/kb.png" width="50px" height="10px">-->


<span id="friend_offline"></span>
<span id="typing"></span>
<span id="me_offline"></span>

</div>

<div style="margin:3px;">

	<form name="chatplaceform">
	<textarea style="font-size:25px;" id="chatplace" name="chatplace" rows="3" cols="60" onkeypress="testenter(event)"></textarea>

<br>


<div style="margin-top:2px;">
		<input type="button" value="Send" onclick="send(username,document.chatplaceform.chatplace.value )">
		<input type="button" value="BuZzZz" disabled="disabled">
		<input type="button" value="Refresh" onclick="Javascript: refreshchatscreen()">
		<input type="button" value="Clear Screen" onclick="Javascript: clearchat()">
		<input type="button" onclick="ShowHistory()" value="History">
		<input type="button" id="onoffbutton" onclick="keeponoff(this.value)" value="Appear Offline">
		<input type="button" value="Stats4Nerds"  onclick="stats4nerds()">
<!--
		<select  onchange="togglespeed(this.value);">
		<option>
		Chat Speed
		</option>
		<option>
		Fast
		</option>
		<option>
		Normal
		</option>
		<option>
		Slow
		</option>
		</select>
-->
		<input type="button" value="TroubleShoot" onclick="troubleshoot()">
		<input type="button" value="Log Out" onclick="Javascript: window.location='troubleshoot.php?logout=true'">
</div>

</form>

</div>






<div style="margin:5px;display:none;" id="stats4nerds"> 
SHOW:
<span id="show" ></span>
SHOW INTERVAL:
<span id="show_ti"></span>

SEND:
<span id="send"></span>

SOTS:
<span id="sots"></span>
POTS:
<span id="pots"></span>
STTS:
<span id="stts"></span>
PTTS:
<span id="ptts"></span>
<br>
<input type="button" value="What do these mean?" onclick="showmeaning()">
</div>







<!--<a name="#troubleshootform"></a>-->
<div id="troubleshoot" style="margin:5px;display:none;">
<h2>
Trouble Shoot Form
</h2>
<form action="troubleshoot.php" method="POST" name="troubleshootform" >
<table>
<tr>
<td>
Username: 
</td>
<td>
<input type="text" name="username" >
</td>
</tr>
<tr>
<td>
Password:  
</td>
<td>
<input type="password" name="password" >
</td>
</tr>
<tr>
<td>
Stay Logged In:

</td>
<td>
 <input type="checkbox" value="yes" name="stayloggedin">
</td>
</tr>
<tr>
<td>

</td>
<td>
<input type="submit" value="Shoot the Bloody Trouble">
</td>
</tr>


</table>

</form>
</div>



<span id="dummymp3"></span>

</body>

</html>

