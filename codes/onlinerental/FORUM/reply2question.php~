<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NPF Reply Page</title>
</head>
<body alink="#8C8C8C" vlink="#8C8C8C" link="#8C8C8C">
<?php
include 'div_container_notfns.php'; // Notifications number display...
?>
<div class="main_wrapper" style="padding:5px;">
<?php
include 'function_store.php';
display_heading_banner_or_text();
?>
<?php
$questionid=$_GET['questionid'];

// include 'top_part'; not DONE so below
if(isset($_SESSION['loggedin']))
{
	displaywelcomeandlogout();
}
else
{
	display_login_msg_and_form();
}
// END of include 'top_part'; not DONE so below

include 'top_menu.php';
echo "<br/>";

connect2mysql('connect');

$result=mysql_query("SELECT * FROM tbl_qs WHERE `id`='$questionid' AND publish='yes'");
echo mysql_error();
?>

<table width="100%" cellpadding="5px" cellspacing="5px">
<tr>
<td width="100%">
<?php
if(mysql_num_rows($result)==0)
{
echo "<strong>ERROR! Page Does not exist. Maybe the question you looked for has been deleted.</strong>";
exit();
}

if(mysql_num_rows($result)>0)
{
	$row = mysql_fetch_array($result);
	$notify_asker_replies=$row["notify_asker_replies"];
	$ques=$row["question"];
	$asker=$row["asker"];
	$quesid=$row["id"];
	$dandt=$row["dateandtime"];
		
	echo "<hr width=\"100%\" align=\"left\">";
	echo "$dandt<br/>";
	echo "<a href=\"viewprofile.php?username=$asker\">".ucfirst($asker)."</a><br/>";
	echo "<br>";	
	
		if($row["category"]=="discussion"){
				echo "Discussion: <strong>".$ques."</strong><br>";
		}
		else {
				echo "Question: <strong>".$ques."</strong><br>";
				echo "<br>";	
				echo "Academic Level: ".ucfirst($row["category"]);	echo " Topic: ".ucfirst($row["topic"])."<br>";
		}
	
	echo "<br>";	
	echo $row["likes"]." Likes";

		if(isset($_SESSION['loggedin']) && likedornot($questionid,NULL,'question')=='notliked'){
				echo "<a href=\"like_processor.php?setlike2question=yes&questionid=$questionid\"> Like</a><br>";
		}
		else if(isset($_SESSION['loggedin'])&& likedornot($questionid,NULL,'question')=='liked'){
				echo "<a href=\"like_processor.php?setunlike2question=yes&questionid=$questionid&location=reply2question.php\"> Unlike</a><br/>";
		}
		
		echo "<br>";


//FACBOOK SHARE BUTTON to share Discussions
echo "<a name=\"fb_share\">Share this question/discussion to your friends!</a> 
		<script src=\"http://static.ak.fbcdn.net/connect.php/js/FB.Share\" type=\"text/javascript\">
		</script>";
//END OF FACEBOOK SHARE BUTTON to share discussions


		if(isset($_SESSION['loggedin'])){ // Display Delete Link if logged in user is an admin
				$loggedin=$_SESSION['loggedin'];
				
				if($loggedin=="sukrit"){
					echo "<br/><a href=\"delete.php?questionid=$questionid&replyid=none&type=question\">DELETE POST</a>";
				}
		}



		echo "<hr width=\"100%\" align=\"left\">";
}
?>
</td>
</tr>
</table>
<?php

// Change Notifications for the person who asked QUESTION that his "QUESTION GOT REPLIED" Starting
	if(isset($_SESSION['loggedin']) && $asker==$_SESSION['loggedin'] && $notify_asker_replies=='yes') //$_SESSION['loggedin'] = REPLIER
	{//See the order of conditions in above if()   //SEE LINE if u dont know where $notify_reply_yes comes from //ComesfromDisplying Ques
		mysql_query("UPDATE tbl_qs SET notify_asker_replies='no', `net_replies_for_notify`=0 WHERE `id`='$quesid'"); 
		$loggedin=$_SESSION['loggedin'];
		change_tbl_notfns("question_got_replied",$loggedin);
	}
// Change Notifications Ending




// REPLIES DISPLAY SURU BHAYO


$result=mysql_query("SELECT * FROM tbl_replies WHERE `questionid`='$questionid' AND `publish`='yes' ORDER BY dateandtime");
echo mysql_error();

if($result)
{
$num=mysql_num_rows($result);
connect2mysql('disconnect');
$i=0;

	while ($i < $num) 
	{
	$replyid=mysql_result($result,$i,"id");
?>
	<table width="100%" cellpadding="5px" cellspacing="5px" border="0px">
	<tr>
	<td>
	<?php
	$replier=mysql_result($result,$i,"replier");
	echo "<a href=\"viewprofile.php?username=$replier\">".ucfirst(mysql_result($result,$i,"replier"))." </a>replied:<br/>";
	echo "<strong>".mysql_result($result,$i,"reply")."</strong><br>";
	echo mysql_result($result,$i,"reply_likes")." people liked this reply.";

		if(isset($_SESSION['loggedin']) && likedornot($questionid,$replyid,'reply')=='notliked')
		{
		echo "<a href=\"like_processor.php?setlike2reply=yes&questionid=$questionid&replyid=$replyid\"> Like</a><br>";
		}
		else if( isset($_SESSION['loggedin']) && likedornot($questionid,$replyid,'reply')=='liked')
		{
		echo "<a href=\"like_processor.php?setunlike2reply=yes&questionid=$questionid&replyid=$replyid\"> Unlike</a><br/>";
		}

		if(isset($_SESSION['loggedin']))
		{
			if($_SESSION['loggedin']=='sukrit')
			{
			echo "<a href=\"delete.php?replyid=$replyid&questionid=$questionid&type=reply\">DELETE POST</a>";
			}
		}
echo "<hr width=\"50px\" align=\"left\"/>";
$i++;
?>

</td>
</tr>
</table>
<?php
}//if $result ko end
}//While ko end

	if(isset($_SESSION['loggedin'])){
		include 'reply2question_form.php';
	}
	else{
	echo "<font color=\"#F4F4F4\"><strong>Login to reply to above question</strong><font><br><br>";
	}
?>



//FACEBOOK COMMENT BOX START

<div id="fb-root"></div>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=188792094534798";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<div class="fb-comments" data-href="http://www.sukrit.com.np/reply2question.php?questionid="<?php echo $questionid; ?> data-num-posts="10" data-width="470" data-colorscheme="dark">
</div>
//END OF FACEBOOK COMMENT BOX




</div>
</body>
</html>