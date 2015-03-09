<?php

/*
if($_GET['error']=="invalidcaptcha")
{
$error_invalidcaptcha='Please type the Code carefully.';
}
*/



?>




<form action="upload_process.php" method="post" enctype="multipart/form-data">
<fieldset class="field_set_bg">
<legend class="signup_title">Upload</legend>
  
  <div class="empty_fields">
  <?php
  if(isset($_GET['emptyfield'])){
  	echo "Please fill all the fields.";
  }
  ?>
  </div>
  
  <table class="signup_table" width="auto" height="auto" border="0" cellpadding="3" cellspacing="0">
    <tr>
      <td>Type</td>
      <td><select name="type">
	  
	  <option>Flats</option>
       <option>House</option>
        <option>Rooms</option>
	  
	  </select></td>
	  <td>
	  <span class="error_message"></span>
	  </td>
    </tr>
	
	<tr>
		<td>Location</td>
		<td><select name="type" name="district">
	  
	  <option>Kathmandu</option>
       <option>Bhaktapur</option>
        <option>Lalitpur</option>
	  
	  </select></td>
		<td><span class="error_message"></span></td>
	</tr>
	
	<tr>
	<td>
	</td>
	<td>
	<input type="text" name="place1"/> e.g Satdobato
	</td>
	</td>
	</tr>
	
	<tr>
	<td>
	</td>
	<td>
	<input type="text" name="place2"/>e.g Talchikhel
	</td>
	</td>
	</tr>
	
	<tr>
	<td>
	</td>
	<td>
	<input type="text" name="place3"/>e.g Nakhipot
	</td>
	</td>
	</tr>
	
	
	<tr>
	<td>
	On
	</td>
	<td>
	<input type="radio" name="onsaleorrent" value="sale" checked="checked"/>Sale <input type="radio" name="onsaleorrent" value="rent" class="make_dim"/>Rent
	</td>
	</td>
	</tr>
	
	
	<tr>
	<td>
	Images
	</td>
	
	<td>
	
	<span style="display:inline;" id="image1">
		<input type="file" name="image1" id="file_image1" style="display:block;"/>
	
	</span>
	<span style="display:none;" id="image2">		<input type="file" name="image2" id="file_image2"/>			</span>
	<span style="display:none;" id="image3">		<input type="file" name="image3" id="file_image3"/>			</span>
	<span style="display:none;" id="image4">		<input type="file" name="image4" id="file_image4"/>			</span>
	<span style="display:none;" id="image5">		<input type="file" name="image5" id="file_image5"/>			</span>
	
	</td>
	
	<td valign="bottom">
	<input type="button" value="+" onclick="plusimage()"><input type="button" value="-" onclick="minusimage()">
	</td>
	
	</tr>
	
	
	
	
	<tr>
	<td>
	Information
	</td>
	<td>
<span style="display:block;" id="info1"><textarea id="txt_info1" name="info1">Type information 1 here...</textarea></span>

<!-- onfocus="clearinputarea(this.id)" onblur="fillinputarea(this.id)" --><!--Used in Abobe-->

<span style="display:none;" id="info2"><textarea class="upload_info" id="txt_info2" name="info2"></textarea></span>
<span style="display:none;" id="info3"><textarea class="upload_info" id="txt_info3" name="info3"></textarea></span>
<span style="display:none;" id="info4"><textarea class="upload_info" id="txt_info4" name="info4"></textarea></span>
<span style="display:none;" id="info5"><textarea class="upload_info" id="txt_info5" name="info5"></textarea></span>
<span style="display:none;" id="info6"><textarea class="upload_info" id="txt_info6" name="info6"></textarea></span>
<span style="display:none;" id="info7"><textarea class="upload_info" id="txt_info7" name="info7"></textarea></span>
<span style="display:none;" id="info8"><textarea class="upload_info" id="txt_info8" name="info8"></textarea></span>
<span style="display:none;" id="info9"><textarea class="upload_info" id="txt_info9" name="info9"></textarea></span>
<span style="display:none;" id="info10"><textarea class="upload_info" id="txt_info10" name="info10"></textarea></span>
	
	</td>
<td valign="bottom">

<input type="button" value="+" onclick="plusinfo()"><input type="button" value="-" onclick="minusinfo()">
</td>
	</tr>
	

<tr>
<td>
Area:
</td>
<td>
<input type="text" name="area" class="make_dim">
</td>
</tr>


	
<tr>
<td>
Expected Price:
</td>
<td>
<input type="text" name="expected_price">e.g Rs. 10,0000
</td>
</tr>
	

<tr>
<td>
Contact:
</td>
<td>
<input type="text" name="contact1">e.g 9841949244
<br>
<input type="text" name="contact2">e.g 9803767519
</td>
</tr>
	

	
<tr>
<td>
</td>
<td>

<input type="submit" value="Upload"  class="bottons" />

</td>
</tr>

</table>
</form>
</fieldset>



<script src="js/plusminus.js">
</script>
<script src="js/inputarea.js">
</script>


