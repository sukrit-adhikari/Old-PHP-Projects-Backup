
<table border="0px" class="groupBtns" cellpadding="5px" cellspacing="5px">
<tr>
<td>
<a href="imageroutine.php?samuha=1" id="groupImgBtn">Group 1</a> 
</td>
<td>
<a href="imageroutine.php?samuha=2" id="groupImgBtn">Group 2</a> 
</td>
<td>
<a href="imageroutine.php?samuha=3" id="groupImgBtn">Group 3</a> 
</td>
<td>
<a href="imageroutine.php?samuha=4" id="groupImgBtn">Group 4</a> 
</td>
<td>
<a href="imageroutine.php?samuha=5" id="groupImgBtn">Group 5</a> 
</td>
<td>
<a href="imageroutine.php?samuha=6" id="groupImgBtn">Group 6</a> 
</td>
<td>
<a href="imageroutine.php?samuha=7" id="groupImgBtn">Group 7</a> 
</td>
</table>

<form action="imageroutine.php" method="get">
<table class="groups">
<tr>
<td>
Samuha / Group:
</td>
<td>
	<select name="samuha">

	<?php
	for($i=1;$i<=7;$i++){
	?>
	
	<option>
	<?php echo $i; ?>
	</option>
	<?php
	}//END OF FOR LOOP
	?>
	
	</select>

</td>

</tr>

<tr>
<td>
</td>
<td>
<input type="submit" value="Get Image" > 

</td>
</tr>
</table>
</form>
