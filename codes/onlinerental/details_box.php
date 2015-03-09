<?php
include 'mysql_config.php';
if(         isset($_GET['pty_id'])   ){
	$pty_id=$_GET['pty_id'];
}else{
	header("Location: error.php");
	exit();
}

$query_pty_extract="SELECT * FROM `tbl_pty` WHERE `id`='$pty_id' LIMIT 1";

$result_pty_result=mysql_query($query_pty_extract);



if(mysql_num_rows($result_pty_result)==0){
	header("Location: error.php");
	exit();
}

$row_details=mysql_fetch_array($result_pty_result);

?>

<div class="photo_view_large">


<?php
for($i=1;$i<=5;$i++){
	$image_index="image".$i;
		if($i==1){
			$display="block";
		}else{
			$display="none";
		}
	if($row_details[$image_index]!="none"){

		$image_url="user_uploaded_images/".$row_details[$image_index];
		
		echo "<img src=$image_url height=\"220\" width=\"400\" id=$image_index style=\"display:$display;\"/>";
	
	}

}

?>


<DIV style="padding-top:8px; text-align:center;">
    	<form>
		<input type="button" value="Back" name=""  class="bottons" onclick="image_born('back')"/>
        <input type="button" value="Next" name=""  class="bottons" onclick="image_born('next')"/>
        </form>

</DIV>

<input type="button" value="See Biddings" class="bidding_title" onclick="swap_display_cmt_bid()" id="button_cmt_bid" />




<div class="comment_box" id="comment_box">
<?php include 'display_comments.php'; ?>
<form action="comment_process.php" method="POST">
<input type="hidden" name="pty_id" value="<?php echo $pty_id ?>" />

<textarea cols="40" rows="6" name="comment">Comment here..</textarea> 

<input type="submit" value="comment" class="bottons"/>

</form>
</div>

<div class="bidding_box" id="bidding_box">

<?php include 'display_bids.php';?>

<form action="bid_process.php" method="POSt">
<input type="hidden" name="pty_id" value="<?php echo $pty_id ?>" />
	<table border="0" cellpadding="1" cellspacing="0">
		<tr><td>Name:</td><td><input type="text" name="name" /><td></tr>
		<tr><td>Contact Details:</td><td><input name="contact_details" /><td></tr>
		<tr><td>Bidding Amount:</td><td><input type="text" name="bid_amount" /><td></tr>
		<tr><td>&nbsp;</td><td><input type="submit" value="Bid" class="bottons"/><td></tr>
	</form>
	</table>
</div>

</div>

<div class="detail_features">	
	<dl class="detail_wrapper">
		<dt class="detail_description_title">Description</dt>
            
           
			<dd class="detail_description_info">Type: <?php echo $row_details['type']; ?></dd>
			<dd class="detail_description_info">Location: <?php echo $row_details['district'].",".$row_details['place1'].",".$row_details['place2'].",".$row_details['place3']; ?></dd>

			<dd class="detail_description_info">Price(Nrs): <?php echo $row_details['expected_price'] ?></dd>
            
	     <dt class="detail_description_title">features</dt>
         	<dd class="detail_description_info">
            
            3 storied,Compound,2 bathrooms,2 bedroom with attached bathroom,
            1 kitchen,well furnished interior
            
            </dd>
            
    	<dt class="detail_description_title">CONTACT</dt> 
           

    		<dd class="detail_description_info">
            <a href=profile.php?username=<?php echo $row_details['username'] ?> >Contact Owner</a>
			<br>
            Contact Numbers:
            <?php echo $row_details['contact1'] ?>
            <br />
            <?php echo $row_details['contact2'] ?>
            
            </dd>
    		
  
</dl>


</div>

<script type="text/javascript">

function swap_display_cmt_bid(){

if(document.getElementById('button_cmt_bid').value=="See Biddings"){
	document.getElementById('comment_box').style.display="none";
	document.getElementById('bidding_box').style.display="block";
	document.getElementById('button_cmt_bid').value="See Comments"
}else{
	document.getElementById('comment_box').style.display="block";
	document.getElementById('bidding_box').style.display="none";
	document.getElementById('button_cmt_bid').value="See Biddings"

}
}


function image_born(born){
	
	for(i=1;i<=5;i++){
		imageid="image"+i;	
		if(document.getElementById(imageid)==null){
			upto=i-1;
			break;
		}
	}
	
	for(i=1;i<=5;i++){
		imageid="image"+i;
		if(born=="back" && document.getElementById(imageid).style.display=="block"){
			document.getElementById(imageid).style.display="none";
			imageid="image"+get_bn_i(born,i,upto);
			document.getElementById(imageid).style.display="block";
			break;
		}
		if(born=="next" && document.getElementById(imageid).style.display=="block"){
			document.getElementById(imageid).style.display="none";
			imageid="image"+get_bn_i(born,i,upto);
			document.getElementById(imageid).style.display="block";
			break;
		}
	}
}


function get_bn_i(born,i,upto){//GET BACK NEXT INDEX
	if(born=="back" && i==1){
		return upto;
	}else if(born=="next" && i==upto){
		return 1;
	}else if(born=="back"){
		return i-1;
	}else if(born=="next"){
		return i+1;
	}
}
</script>