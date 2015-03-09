<?php

if(isset($_SESSION['loggedin']))
{
echo "<center><strong>Nepali Physics Forum</strong></center><br />";
displaywelcomeandlogout();
include 'top_menu.php';
if(isset($_GET['status']))
{
echo "<br/><b><center><font color=\"#F4F4F4\">Your question has been posted.</font></center></b>";
}
echo "<br/>";
include 'post_question.php';
}//If of logged in or not

else
{
display_heading_banner_or_text();
include 'top_menu.php';
echo "<br />";
echo "<font color=\"#F4F4F4\"><strong>You need to login to post questions.</strong></font><br/>";
echo "<a href=\"signup.php\">Sign Up</a>";
include 'login.php';
echo "<br/>";

}
?>
