<?php
connect2mysql('connect');
$result=mysql_query("SELECT * FROM tbl_qs WHERE `publish`='yes' ORDER BY dateandtime DESC LIMIT 0,5");
echo mysql_error();
$num_rows=mysql_num_rows($result);


for($i_display_latest_question=1;$i_display_latest_question<=$num_rows;$i_display_latest_question++)
{
$row=mysql_fetch_array($result);
$asker=$row['asker'];
$ques=$row["question"];
$questionid=$row['id'];
$likes=$row['likes'];
$replies=$row['replies'];
$category=$row['category'];
$topic=$row['topic'];

//Display STARTS

//Asker Profilie View Link
echo "<a href=\"viewprofile.php?username=$asker\">".ucfirst($asker)."</a><br/>";

if($row['category']=="discussion"){//Discussion ko Lagi Display
	echo "Discussion: <br><a href=\"reply2question.php?questionid=$questionid\"><strong>".wordwrap(truncate($ques,50),45,"<br>")."</strong></a><br>";
	echo $likes." Likes";
	echo " ".$replies."<a href=\"reply2question.php?questionid=$questionid&location=index.php\"> Replies</a><br/>";
	}
else { // Question Bhaye matra Category Topic Chahincha Teselai Chutta Chuttai gareko
	echo "Question: <br><a href=\"reply2question.php?questionid=$questionid\"><strong>".wordwrap(truncate($ques,50),45,"<br>")."</strong></a><br>";
	echo "Academic Level: ".ucfirst($category)."<br>";
	echo "Topic: ".ucfirst($topic)."<br>";
	echo $likes." Likes";
	echo " ".$replies."<a href=\"reply2question.php?questionid=$questionid&location=index.php\"> Replies</a><br/>";
}

//Display ENDS

// Display Delete Link if logged in user is an admin
if(isset($_SESSION['loggedin'])) 
{

$loggedin=$_SESSION['loggedin'];

if($loggedin=="sukrit")
{
echo "<a href=\"delete.php?questionid=$questionid&replyid=none&type=question\">DELETE POST</a>";
}
}
//Delete Display ENDS

echo "<hr width=\"50px\" align=\"left\"/>";

}

//Display All latest Questions
echo "<a href=\"search_query.php?category_search=Unspecified&topic=Unspecified&fullsearchpage=yes&chronological=DESC\">Display All Latest Questions.</a>";

echo "<br><hr width=50 align=left>";
//Display All Latest Discussions
echo "<a href=\"search_query.php?category_search=discussion&topic=Unspecified&fullsearchpage=yes&chronological=DESC\">Display All Latest Discussions.</a>";

?>