<?php
if(isset($_GET['loginerror']))
{
echo "<font color=\"#FF5B7C\"><br><strong>Invalid Username/Password Combination.<a href=\"forgot_password.php\">Forgot Password?</a></strong></br></font>";
}
?>
<form name="login" action="login_process.php" method="post">
<table width="200" border="0px" >
  <tr>
    <td>Username</td>
    <td><input type="text" name="username" id="username" class="login" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" id="password" class="login" /><input type="hidden" name="location" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" value="Log In" /></td>
    </tr>
</table>
</form>
