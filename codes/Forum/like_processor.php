<?php
session_start();
include 'function_store.php';
if(isset($_SESSION['loggedin']))  //User Can like only when logged in
{
$liker=$_SESSION['loggedin'];
connect2mysql('connect');

if(isset($_GET['setlike2question'])) //Likes for Question
{
	$questionid=$_GET['questionid'];
	$idofquestion=$questionid;
		if(likedornot($questionid,NULL,'question')=='notliked')
		{
		mysql_query("UPDATE tbl_qs SET likes = likes + 1 WHERE id = '$idofquestion'");
		echo mysql_error();
		mysql_query("INSERT INTO `tbl_likes` (`liker`,`questionorreplyid`,`questionorreply`)
		VALUES ('$liker','$idofquestion','question')");
		echo mysql_error();
		}
	header("Location: reply2question.php?questionid=$idofquestion"); exit();
}


if(isset($_GET['setunlike2question'])) // Unlike for Question
{
	$questionid=$_GET['questionid'];
	$idofquestion=$questionid;
		if(likedornot($questionid,NULL,'question')=='liked')
		{
		mysql_query("UPDATE tbl_qs SET likes = likes - 1 WHERE id = '$idofquestion'");
		mysql_query("DELETE FROM tbl_likes WHERE `questionorreplyid`='$idofquestion' AND `questionorreply`='question'") ;
		echo mysql_error();
		$location=$_GET['location'];
		}
	header("Location: $location?questionid=$idofquestion"); exit();
}




if(isset($_GET['replyid']) && $_GET['setlike2reply']=='yes')  //Likes for REPLY
{
	$questionid=$_GET['questionid'];
	$replyid=$_GET['replyid'];
		if(likedornot($questionid,$replyid,'reply')=='notliked')
		{
		mysql_query("UPDATE tbl_replies SET reply_likes = reply_likes + 1 WHERE id = '$replyid'");
		echo mysql_error();
		mysql_query("INSERT INTO `tbl_likes` (`liker`,`questionorreplyid`,`questionorreply`)
		VALUES ('$liker','$replyid','reply')");
		echo mysql_error();
		mysql_close();
		}
	header("Location: reply2question.php?questionid=$questionid"); exit();
}		//if of like of reply


if(isset($_GET['setunlike2reply']) ) // Unlike for Reply
{
	$idofquestion=$_GET['questionid'];
	$questionid=$idofquestion;
	$idofreply=$_GET['replyid'];
	$replyid=$idofreply;
		if(likedornot($questionid,$replyid,'reply')=='liked')
		{
		mysql_query("UPDATE tbl_replies SET reply_likes = reply_likes - 1 WHERE `id` = '$idofreply'");
		echo mysql_error();
		mysql_query("DELETE FROM tbl_likes WHERE `questionorreplyid`='$idofreply' AND `questionorreply`='reply'") ;
		echo mysql_error();
		}
	header("Location: reply2question.php?questionid=$idofquestion"); exit();
}
echo "Sorry some problem occured...!!! Go back and try again...!!!" ;
}//if of logged in or not
else
{
echo "First <a href=index.php>Login</a>" ;
}
?>