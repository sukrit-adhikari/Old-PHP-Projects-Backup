<?php
if(isset($_SESSION['loggedin']))
{
$href_myact="my_activities.php";
}
else
{
$href_myact="#";
}
?>
<div class="main_wrapper_like" >
<strong> <!-- Home My profile, etc lai bold pareko -->
<table width="100%" border="0px" class="make_it_like_bg">
<tr>
<td align="center">
<a href="index.php">Home</a>
</td>
<td align="center">
<a href="myprofile.php">My Profile</a>
</td>
<td align="center">
<a href="messages.php">Messages</a>
</td>
<td align="center">
<a href="#">My Activities</a>
</td>
</tr>
</table>
</div>