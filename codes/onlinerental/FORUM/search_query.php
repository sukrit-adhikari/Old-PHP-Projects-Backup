<?php
session_start();
include 'function_store.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Results</title>
</head>
<body alink="#8C8C8C" vlink="#8C8C8C" link="#8C8C8C">
<?php
include 'div_container_notfns.php'; // Notifications number display...
?>
<div class="main_wrapper" style="padding:5px;">
<?php
display_heading_banner_or_text();

if(isset($_SESSION['loggedin'])){
	displaywelcomeandlogout();
}
else{
	display_login_msg_and_form();
}

include 'top_menu.php';
echo "<br/>";
echo "<table width=\"100%\">";
echo "<tr>";
echo "<td>";
include 'search_form_in_search_page.php';
echo "</tr>";
echo "</td>";
echo "</table>";
					
					/*
						REDUNDANT CODE My BAD...HEHEHE
						$category=$_GET['category_search'];
						$topic=$_GET['topic'];
						$chronological=$_GET['chronological'];
						$location="search_query.php?category_search=$category&topic=$topic&chronological=$chronological&fullsearchpage=yes";
						$fullsearchpage=$_GET['fullsearchpage'];
					*/
					
					
include 'search_multi_function.php';
?>
</div>
</body>
</html>