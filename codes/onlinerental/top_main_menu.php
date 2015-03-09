<?php
@session_start();
?>
<div class="main_menu_tab">
	
            <ul>
				<li class="main_navigation" class="current"><a href="index.php">HOME</a> </li>
				
                
                 <?php
                if(isset($_SESSION['username'])){
       
				echo "<li class=\"main_navigation\"><a href=\"profile.php\">PROFILE</a></li>";
                
				}
				
				?>
                
                
                <?php
                if(isset($_SESSION['username'])){
				echo "<li class=\"main_navigation\"><a href=\"message.php\">MESSAGE</a></li>";
				}
				?>

                
				<li class="main_navigation"><a href="index.html">ON SELL</a> </li>
				<li class="main_navigation"><a href="index.html">ON RENT</a> </li>
				
                <?php
                if(!isset($_SESSION['username'])){
				echo "<li class=\"main_navigation\"><a href=\"signup.php\">SIGN UP</a></li>";
				}
				
				?>

                <?php
                if(isset($_SESSION['username'])){
				echo "<li class=\"main_navigation\"><a href=\"upload.php\">UPLOAD</a></li>";
				}
				
				?>

		        <?php
                if(isset($_SESSION['username'])){
				echo "<li class=\"main_navigation\"><a href=\"logout.php\">LOG OUT</a></li>";
				}
				
				?>
                
                <?php
                if(!isset($_SESSION['username'])){
				echo "<li class=\"main_navigation\"><a href=\"index.php\">LOG IN</a></li>";
				}
				
				?>







                
			</ul>		
  </div>
      <!--main_menu_tab-->