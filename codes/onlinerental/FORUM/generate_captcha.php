<?php 
session_start();
header('Content-type: image/jpeg');
$text_location='captcha_6621034_'.$_SESSION['latest_captcha_display'];

$text=$_SESSION[$text_location];
$font_size=15;
$img_width=65;
$img_height=25;
$img=imagecreate($img_width,$img_height); //Image Creation
imagecolorallocate($img,255,255,255); //bgcolor
$text_color = imagecolorallocate($img,0,0,0); //text color
imagettftext($img,$font_size,0,5,20,$text_color,'aerial.ttf',$text);
for($i_captcha=1;$i_captcha<=50;$i_captcha++)
{
$x1=rand(0,65);$y1=rand(0,100);$x2=rand(0,65);$y2=rand(0,100);
imageline ($img,$x1,$y1,$x2,$y2,$i_captcha);
}
imagejpeg($img);
imagedestroy($img);
?>
