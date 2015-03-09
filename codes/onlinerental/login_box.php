<div class="login_box">
            
             <div class="login_title"><ul><li class="nav_title">User's login</li></ul></div>
             <div class="login_content">
             <form action="login_process.php" method="post">
            	<div class="username">Username:<div class="username_text"> <input type="text" name="username" value="" /></div> </div> 
                
           		<div class="password"> Password: <div class="password_text"><input type="password" name="password" value="" /></div> </div>
                
               			 <div class="login_error_msg">
						 <?php
						 if(isset($_GET['loginerror'])){
							if($_GET['loginerror']=="nousername"){
								echo "Username you entered does not exist!";
							}elseif($_GET['loginerror']=="notactive"){
								echo "Account is not active. Please check your email.";
							}
							elseif($_GET['loginerror']=="wrongpassword"){
								echo "Incorrect Password/Username combination.";
							}
						 }
						 
						 ?>
						 </div>
                
                   	 <div class="keep_me_logged_in"><input type="checkbox" name="set_login_cookie" value="" />Keep me logged in.</div>
                    
       					<div class="login_botton"><input type="image" name="image" value="" src="images/login.gif" alt="submit"  /> </div> 
       
                   	 <div class="create_new_account"> Don't you have an account?  <a href="signup.php" class="create_now_link">Create Now! </a></div></form>
                    
                     </div><!-- end of login_content -->  
           	 </div><!-- end of login_box -->