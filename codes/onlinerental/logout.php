<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['user_id']);

setcookie("login_cookie", $row['code'],time()-(86400*30));						

session_destroy();

header("Location: index.php");
exit();
?>