<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> <link rel="stylesheet" href="css/sheet.css" style="text/css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to online rental system</title>
</head>

<body>
	<div class="wrapper">
		<?php
			include'header.php';
		?>
		
		
		
		
		<?php
			include'top_main_menu.php';
		?>
     
		<?php
			include'normal_search.php';
		?>	 
  

	<div class="left_container">
		<?php
			include'left_first_navigation.php';
		?>

	
    <br>
	
    <?php
		include'left_second_navigation.php';
	?>
	
     <br>
	 
    <?php
		include'left_third_navigation.php';
	?>		
</div><!--end of left_container-->


<div class="right_container">
	<?php
	include 'signup_form.php';
	?>
</div>

	<div class="footer_container">
		<?php
			include'footer_content.php';
		?>
	</div><!--end of footer_container-->
</div><!--end of wrapper-->

</body>
</html>
