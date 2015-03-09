<?php
function likedornot($questionid,$replyid,$questionorreply)
{
if(isset($_SESSION['loggedin']))
	{
	$liker=$_SESSION['loggedin'];
	connect2mysql('connect');

//=mysql_connect("localhost","root","admin");
//mysql_select_db('forum',$connect2mysql);

		if($questionorreply=="reply")
		{
		$query= "SELECT * FROM tbl_likes WHERE questionorreplyid='$replyid' AND `liker`='$liker'";
		}
		else if($questionorreply=="question")
		{
		$query= "SELECT * FROM tbl_likes WHERE questionorreplyid='$questionid' AND `liker`='$liker'";
		}

$result = mysql_query($query);
echo mysql_error();
$num_results = mysql_num_rows($result);

		if ($num_results==0)
		{
		return "notliked";
		}
		else
		{
		return "liked";
		}
}
return "notloggedin";
}

function connect2mysql($cord) //Connects to mysql database and also selects database
{

//$connect2mysql=mysql_connect("mysql4.000webhost.com","a4954385_3forum9","dostetdarum333");
//mysql_select_db('a4954385_3forum9',$connect2mysql);

if($cord=="connect")
{
	$connect2mysql= mysql_connect("localhost","root","");
	mysql_select_db('forum',$connect2mysql);
}
else if($cord=="disconnect")
{
	//mysql_close($connect2mysql);
}
}

function truncate($string_tr,$length_tr)
{

$reallength=strlen($string_tr);

$string_tr=substr($string_tr,0,$length_tr);

$aftercutlength=strlen($string_tr);

if($reallength>$aftercutlength)
{
	$string_tr=$string_tr."...";
}
									return $string_tr;
}

function delete_link_if_admin()
{

}

function notify_user($who,$category,$yesorno)
{
mysql_query("UPDATE tbl_notfns SET $category='$yesorno' WHERE `username` = '$who'");
echo mysql_error();

}

function display_captcha($which_form)
{
	//$captcha_session_categorywise='captcha_6621034_'.$where;
	//echo "sukrit";
	//captcha_categoy_set_return("set",$where);
	$_SESSION['latest_captcha_display']=$which_form;
	$_SESSION['captcha_6621034_'.$which_form]=rand(1000,9999);
	echo "<img src=\"generate_captcha.php\"/>";
}



function captcha_validation($captcha,$where)
{

if($captcha!=$_SESSION['captcha_6621034_'.$where])
{
	return TRUE;
	unset($_SESSION['captcha_6621034_'.$where]);
}
else
{
	return TRUE;
	unset($_SESSION['captcha_6621034_'.$where]);
}

}

function change_tbl_notfns($category,$loggedin)
{
$query="SELECT * FROM tbl_qs WHERE `notify_asker_replies`='yes' AND `asker`='$loggedin'";
	$results=mysql_query($query);
		echo mysql_error();
			if(mysql_num_rows($results)==0)
				{
					notify_user($loggedin,$category,'no');
				}
}

function displaywelcomeandlogout()
{
echo "<table width=\"100%\" border=\"0px\">";
echo  "<tr>";
echo   "<td align=\"left\"><strong>Welcome ".ucfirst($_SESSION['loggedin']).".</strong></td>";
//echo "<td align=\"left\">Nepali Physics Forum</td>";
echo    "<td align=\"right\"><strong><a href=\"logout.php\"> Log Out</a></strong><br></td>";
echo   "</tr>";
echo "</table>";
}

function display_login_msg_and_form()
{
	echo "<font color=\"#F4F4F4\"><strong>Login to post and reply to questions.</strong></font>";
	include 'login.php';
	echo "<br/>";
}

function display_heading_banner_or_text()
{
echo "<center><strong>Nepali Physics Forum</strong></center>";
}

function site_hits() 
{

connect2mysql('connect');

$currip=($_SERVER['REMOTE_ADDR']);

$result=mysql_query("SELECT* FROM `tbl_site_counter` WHERE `ip`='$currip'");
$dateandtime=date("Y-m-d H:i:s");
	if(mysql_num_rows($result)==0) 
	{

				mysql_query("INSERT INTO tbl_site_counter (`ip`,`dateandtime`) VALUES('$currip','$dateandtime')");

				//echo mysql_error()."INSERT";
	}
	else 
	{
	
				mysql_query("UPDATE tbl_site_counter SET `hits`=`hits`+1, `dateandtime`='$dateandtime' WHERE `ip`='$currip'");
	
				//echo mysql_error()."UPDATE";		
	}


echo "<!---->";
}//site_hits_Function End
?>