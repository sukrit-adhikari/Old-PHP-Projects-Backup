<?php

include 'mysql_config.php';
$prev_limits=10000;

if( isset($_GET['display']) ) {
	
	$display=$_GET['display'];
	
}
else {

	$display="latestfew";

}


//display==refresh
//display==clear BUT now redundant from javascript
//display LATESTfew




$result=mysql_query("SELECT `id` FROM `chats`");

$limits=mysql_num_rows($result);

if($limits<=5){
	
	$a=0;
	$b=10000;	
	
}
else {

	$a=$limits-5;
	$b=$limits;

}



if($display=="refresh"){
	
	$result=mysql_query("SELECT * FROM `chats` ORDER BY `dat` LIMIT $prev_limits");
	
}

else if($display=="latestfew") {
	 
	$result=mysql_query("SELECT * FROM `chats` ORDER BY `dat` LIMIT $a,$b");

}

else {
	$result=mysql_query("SELECT * FROM `chats` ORDER BY `dat` DESC LIMIT 1");
}


$result_rows=mysql_num_rows($result);

?>

<?php

for($i=1;$i<=$result_rows;$i++){

$row=mysql_fetch_array($result);	
	
	if($row['sender'] == $_SESSION['username']){
		$bgtrcolor="#D6BF86";
	}
	else {
		$bgtrcolor="#FFFBD0";
	}

?>

<tr style="color:<?php echo $bgtrcolor; ?>" >
<td>
<?php
	
	echo ucfirst($row['sender'])."<br>";
	echo $row['message']."<br>";
	//echo $row['id'];

?>

</td>
</tr>





<?php

}

//SESSION has already started in INDEX.php
if($result_rows!=0){
	$_SESSION['lastid']=$row['id'];
	//setcookie("lastid",$row['id'],time()+(3600*24*3),"/");
}
else {
	$_SESSION['lastid']=-1;
	//setcookie("lastid",-1,time()+ (3600*24*3),"/");
}

?>