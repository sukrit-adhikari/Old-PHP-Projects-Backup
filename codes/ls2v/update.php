<form>
<?php

for($i=1;$i<=7;$i++){
echo "Day ".$i."<br>";
echo "FLL :: "."<input type=text name='fll".$i."'>"."<br><br>";
echo "FUL :: "."<input type=text name='ful".$i."'>"."<br><br>";
echo "SLL :: "."<input type=text name='sll".$i."'>"."<br><br>";
echo "SUL :: "."<input type=text name='ful".$i."'>"."<br><br>";
echo "<hr>";
}
 
?>

Password :: <input type="password" name="updatepassword"><br>
<input type="submit" value="Update">
</form>