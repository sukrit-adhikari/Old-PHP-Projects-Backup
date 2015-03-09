<?php
$samuha=$_GET['samuha'];

header("Content-disposition: inline; filename=Samuha_".$samuha.".png");
header("Content-type: image/png");
include 'mysql_config.php';



//$samuha=$_GET['samuha'];

	if($samuha<1 || $samuha>7){
		exit();	
	}

$query="SELECT * FROM tbl_main WHERE `samuha`='$samuha' ORDER BY `day` LIMIT 7";


$result=mysql_query($query);


//$string = "Hehahahah";
$font  = 10;

//$width  = imagefontwidth($font) * strlen($string);

$width = 220;
//$height = imagefontheight($font);
$height=150;

$image = imagecreatetruecolor ($width,$height);
$white = imagecolorallocate ($image,255,255,255);
$black = imagecolorallocate ($image,0,0,0);

imagefill($image,0,0,$white);

for($i=0;$i<=6;$i++){
$row=mysql_fetch_array($result);
	
	
if(($i+1)==1){	$day="Sun";		}	if(($i+1)==2){	$day="Mon";		}if(($i+1)==3){	$day="Tue";		}if(($i+1)==4){	$day="Wed";		}if(($i+1)==5){	$day="Thu";		}if(($i+1)==6){	$day="Fri";	}if(($i+1)==7){	$day="Sat";	}	
		
	$string='';
	$string.=" ".$day." ";
	$string.=$row['fll']."-".$row['ful']." ";
	
	
	if($row['sll']!=99 || $row['sul']!=99 ){
		
	$row['sul']=  number_format($row['sul'], $decimals = 2);

	$string.=$row['sll']."-".$row['sul'];

	}
	
	imagestring ($image,$font,0,$i*imagefontheight($font),$string,$black);
	}
imagestring ($image,$font,2,($i+1)*imagefontheight($font),"Group $samuha",$black);

imagestring ($image,$font,2,($i+2)*imagefontheight($font),"LS.SUKRIT.com.np",$black);

imagepng ($image);
//imagedestroy($image);

?>