<table cellpadding="5px" cellspacing="5px" border="0px" width="100%">
<tr>
<td>
<form name="reply" action="reply2question_process.php" method="post">
<input type="hidden" name="questionid" value="<?php echo $questionid;?>" class="reply"/>
<textarea name="reply" cols="100" rows="5" class="reply" id="reply" class="reply">Reply Here...</textarea>
<input type="hidden" name="questionid" value="<?php echo $questionid?>" id="questionid" class="questionid" class="reply"/><br />
<input type="hidden" name="asker" value="<?php echo $asker?>" id="questionid" class="questionid" class="reply"/>
</td>
</tr>
<!--
<tr>
<td>
<?php
display_captcha('reply_form');
?>
</td>
</tr>
-->
<tr>
<td>
<!--<input type="text" size="7" maxlength="4" name="captcha_reply_form"/>-->
<input type="submit" value="Reply" />
</form>
</td>
</tr>

</table>
