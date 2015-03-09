<?php
function createthumbnail($filename) {  

	require 'thumbnail_config.php';  
	
//	$filename_dot=explode(".",$filename);
//	$filename=$filename_dot[0]."_thumb.".end($filename_dot);

     
    if(preg_match('/[.](jpg)$/', $filename) || preg_match('/[.](jpeg)$/', $filename)) {  
        $im = imagecreatefromjpeg($path_to_image_directory . $filename);  
    } else if (preg_match('/[.](png)$/', $filename)) {  
        $im = imagecreatefrompng($path_to_image_directory . $filename);  
    }  
      
    $ox = imagesx($im);  
    $oy = imagesy($im);  
      
    $nx = $final_width_of_image;  
    $ny=80;
//	$ny = floor($oy * ($final_width_of_image / $ox));  
      
    $nm = imagecreatetruecolor($nx, $ny);  
      
    imagecopyresized($nm, $im, 0,0,0,0,$nx,$ny,$ox,$oy);  
      
    if(!file_exists($path_to_thumbs_directory)) {  
      if(!mkdir($path_to_thumbs_directory)) {  
           die("There was a problem. Please try again!");  
      }   
       }  
  
    imagejpeg($nm, $path_to_thumbs_directory . $filename);  
    
	
}
?>