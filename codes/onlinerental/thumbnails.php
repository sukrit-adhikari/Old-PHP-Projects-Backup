<div class="thumbnails_container">
<p class="thumbnails_title">Recently Added</p>
<?php
function display_thumbnails(){

include 'mysql_config.php';
$thumbnails_query="SELECT * FROM `tbl_pty` ORDER BY `dateandtime` DESC LIMIT 12";
$thumbnails_result=mysql_query($thumbnails_query);
$no_of_thumbnails=mysql_num_rows($thumbnails_result);

for($i=0;$i<$no_of_thumbnails;$i++){
	$row=mysql_fetch_array($thumbnails_result);

echo "
	<dl class=thumbnails_items>
	
			<dt>
			
			<a href=details.php?pty_id=$row[id]>
			<img src=user_uploaded_images/thumbnails/$row[image1] class=thumbnails/>
			</a>
			
			</dt>
				
               
				<dd class=description_details>On: $row[onsaleorrent]</dd>
				<dd class=description_details>Location: $row[district].$row[place1]</dd>
				<dd class=description_details>Price:$row[expected_price]</dd>
		
			</dl>

";



}



}
?>
</div><!--end of thumbnails_container-->   




			
    	   

		


        
        

        