<?php

if($_COOKIE['chatloginusername']!="sukrit"){

header("location: troubleshoot.php?logout=true");
exit();

}


include 'mysql_config.php';

if(mysql_query("DELETE FROM `chats` ")){
echo "History DESTROYED...!!!";
}

else {
echo mysql_error();
echo "OoOOppss An error Occured while destroying history...!!!";
}


?>