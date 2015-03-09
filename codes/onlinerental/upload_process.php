<?php
session_start();
include 'login_check.php';
include 'mysql_config.php';
require 'createthumbnail.php';
$username=$_SESSION['username'];



$type=$_POST['type'];

$district=$_POST['district'];
$place1=$_POST['place1'];
$place2=$_POST['place2'];
$place3=$_POST['place3'];

$onsaleorrent=$_POST['onsaleorrent'];

$info1=$_POST['info1'];
$info2=$_POST['info2'];
$info3=$_POST['info3'];
$info4=$_POST['info4'];
$info5=$_POST['info5'];
$info6=$_POST['info6'];
$info7=$_POST['info7'];
$info8=$_POST['info8'];
$info9=$_POST['info9'];
$info10=$_POST['info10'];


$area=$_POST['area'];
$expected_price=$_POST['expected_price'];
$contact1=$_POST['contact1'];
$contact2=$_POST['contact2'];
$onsaleorrent=$_POST['onsaleorrent'];

/*
echo $_FILES['image1']["name"]."<br>";
echo $_FILES["image2"]["name"]."<br>";
echo $_FILES["image3"]["name"]."<br>";
echo $_FILES["image4"]["name"]."<br>";
echo $_FILES["image5"]["name"]."<br>";
*/

/////////////////////IMAGE NAME AFTER UPLOAD INAU////////////////////////////


for($i=1;$i<=5;$i++){
$image_name="image".$i;
	if($_FILES[$image_name]["name"]!=""){//Empty File CHECK
			$_FILES[$image_name]["name"]=strtolower($_FILES[$image_name]['name']);//Change File name to lower case
			$filename_explode=explode(".",$_FILES[$image_name]["name"]);
			$end_ext=end($filename_explode);
			$eel=strtolower($end_ext); // END Extension to lower EEL
		///////////////////////////////////jpeg Check BELOW//////////////////////////////////////////////////////////	
			if( $eel=="jpeg" || $eel=="jpg" || $eel=="png" ){
				//echo $i;
				$temp_explode=explode(".", $_FILES[$image_name]["name"]);

				$auin[$i]=date("YmdHis").rand(0,10000).".". end($temp_explode);
				$uploadfile = "user_uploaded_images/".$auin[$i];
				move_uploaded_file($_FILES[$image_name]["tmp_name"],$uploadfile);	
				
				$image_name_after_upload=$auin[$i];
				createthumbnail($image_name_after_upload); //Directory Defined in thumbnail_onfig.php
			}
			else{
			echo "Not an Image File";
			}
	}else{
		$auin[$i]="none";
	}

}
$dat=date("Y-m-d H:i:s");

$query="INSERT INTO `onlinerental`.`tbl_pty` 

(`type`, `username`, `district`, `place1`, `place2`, `place3`, `onsaleorrent`, `area`, `expected_price`, `image1`, `image2`, `image3`, `image4`, `image5`, `info1`, `info2`, `info3`, `info4`, `info5`, `info6`, `info7`, `info8`, `info9`, `info10`, `contact1`, `contact2`,`dateandtime`) 

VALUES 
('$type', '$username', '$district', '$place1', '$place2', '$place3', '$onsaleorrent', '$area', '$expected_price', '$auin[1]', '$auin[2]', '$auin[3]', '$auin[4]', '$auin[5]', '$info1', '$info2', '$info3', '$info4', '$info5', '$info6','$info7','$info8', '$info9', '$info10', '$contact1', '$contact2','$dat')";

mysql_query($query);

$query_redirect_details="SELECT `id` FROM `tbl_pty` WHERE `username`='$username' ORDER BY `id` ASC LIMIT 1";
$result_redirect_details=mysql_query($query_redirect_details);
$row=mysql_fetch_array($result_redirect_details);
$id=$row['id'];

header("Location: details.php?pty_id=".$id."&fresh_upload=yes");

?>