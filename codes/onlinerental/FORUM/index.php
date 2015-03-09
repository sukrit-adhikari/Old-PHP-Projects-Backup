<?php
session_start();
include 'function_store.php';
site_hits();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>






<!--CSS Linking-->
<link rel="stylesheet" type="text/css" href="css/forum.css" media="screen" />
<!-- End of CSS Linking -->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nepali Physics Forum</title>




<body alink="#8C8C8C" vlink="#8C8C8C" link="#8C8C8C"  onload="question_table();">



<?php
include 'div_container_notfns.php'; // Notifications number display...
?>


<div class="main_wrapper">
<?php include 'top_part.php';?>
<br />











<table width="100%" border="0px" cellpadding="5px" cellspacing="5px" class="four_part_table">
<a name="question_table_start" id="question_table_start"></a>
<tr>
<td valign="top" width="25%">
<strong>Latest:</strong><br />
<hr width="50px" align="left"/>

<table cellpadding="5px" cellspacing="5px">
<tr>
<td>
<?php
include 'display_latest_questions.php';

?>
</td>
</tr>
</table>
</td>

<td valign="top" width="25%">
<strong><div class="four_tb_hl">Categorywise Questions:</div></strong><hr width="50px" align="left"/>

<?php 
if(isset($_GET['fullsearchpage']))
{
include 'search_multi_function.php';
}
else
{
include 'category_qs.php';
}

?>
</td>
<td valign="top" width="25%">
<strong>Happenings:</strong><br />
<hr width="50px" align="left"/>
<?php
include 'happenings_category.php';
?>
</td>
<td valign="top">
<strong>Search Questions</strong>
<hr width="50px" align="left"/>
<?php include 'search_form_in_index.php';?>
</td>
</table>
<center>
<?php
include 'facebook_like.php';
?>
</center>
</div>












<?php
//ERROR JAVASCRIPT MEND LATER

					if(isset($_GET['fullsearchpage'])){
?>
		
									<script type="text/javascript" >
										
										function question_table(){
													
											question_table_start.scrollIntoView();
										}										
			 						</script>

							

<?php
					}//END OF PHP If
?>











</body>


</html>