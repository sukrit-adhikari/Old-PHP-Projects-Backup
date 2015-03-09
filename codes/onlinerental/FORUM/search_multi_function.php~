<?php

	//IMPORTANT COMMENT

$category=$_GET['category_search'];
$topic=$_GET['topic'];
$chronological=$_GET['chronological'];
$location="search_query.php?category_search=$category&topic=$topic&chronological=$chronological&fullsearchpage=yes";
$fullsearchpage=$_GET['fullsearchpage'];

	//END OF IMPORTANT COMMENT

//Small Adjustment as From search Forms "Choose your topic" value comes but here we use Unspecified
	if($topic=='Choose your topic'){
	$topic="Unspecified";
	}
// END of Small Adjustment



//Query SELECTION START
if($topic=="Unspecified" && $category!="Unspecified"){
	$query="SELECT * FROM tbl_qs WHERE category='$category' AND publish='yes' ORDER BY dateandtime $chronological";
}
else if($category=="Unspecified" && $topic=="Unspecified"){
	$query="SELECT * FROM tbl_qs WHERE `category`!='discussion' AND publish='yes' ORDER BY dateandtime $chronological LIMIT 0,20";
}
else if($category=="Unspecified" && $topic!="Unspecified"){
	$query="SELECT * FROM tbl_qs WHERE topic='$topic' AND publish='yes' ORDER BY dateandtime $chronological LIMIT 0,20";
}
else{
	$query="SELECT * FROM tbl_qs WHERE category='$category' AND topic='$topic' AND publish='yes' ORDER BY dateandtime $chronological LIMIT 0,20";
}
//QUERY SELECTION END


connect2mysql('connect');
$result=mysql_query($query);
echo mysql_error();

$numofrows=mysql_num_rows($result);

if($numofrows>0)
{
echo "<table width=100% cellpadding=5px cellspacing=5px border=0px>";

		if($fullsearchpage=="yes"){
			echo "<tr>";
			echo "<td>";
			echo "Your search results:<br/>";
			echo "Query >>> ";
			echo "<a href=\"$location\">Category:$category Topic:$topic Order By:$chronological</a>";
			echo "</td>";
			echo "</tr>";
		}

		
		if($fullsearchpage=="no" && $numofrows>5){ // Index.php ma Category wise Display ko LIMIT 5 SET GAREKO
			$numofrows=5;
		}

for($i=1;$i<=$numofrows;$i++)
{
	echo "<tr>";
	echo "<td>";

	$row = mysql_fetch_array($result);
	$questionid=$row["id"];
	$ques=$row["question"];
	$dandt=$row["dateandtime"];
	$asker=$row["asker"];

			if($fullsearchpage=="yes"){ // Full Page Search ko lai dedicated bhaye matrai date and time display garne
			echo "$dandt<br/>";
			}

	echo "<a href=\"viewprofile.php?username=$asker\">".ucfirst($asker)."</a><br/>";
			
			if($row["category"]=="discussion"){
				echo "Discussion: <br><a href=\"reply2question.php?questionid=$questionid\"><strong>".truncate($ques,50)."</strong></a><br>";
				echo $row["likes"]." Likes";
				echo " ".$row["replies"]."<a href=\"reply2question.php?questionid=$questionid&location=index.php\"> Replies</a><br/>";
			}
			else {
				echo "Question: <br><a href=\"reply2question.php?questionid=$questionid\"><strong>".truncate($ques,50)."</strong></a><br>";
				echo "Academic Level: ".ucfirst($row["category"])."<br>";
				echo "Topic: ".ucfirst($row["topic"])."<br>";
				echo $row["likes"]." Likes";
				echo " ".$row["replies"]."<a href=\"reply2question.php?questionid=$questionid&location=index.php\"> Replies</a><br/>";
			}

	echo "<hr width=\"50px\" align=\"left\">";
						

	echo "</td>";
	echo "</tr>";
}

//Last ma Yo display Garne
	echo "<tr>";
	echo "<td>";
			if($fullsearchpage=="no"){
				echo "<a href=\"index.php\">Back to Categories</a><br/><br/>";
				echo "<a href=\"$location\">"."Show all ".ucfirst($category)." Level Questions</a>";
					}
echo "</td>";
echo "</tr>";
//Last ma display garne ko END

echo "</table>";

}//if result found

else{ //No Result to Display
echo "<table width=100% cellpadding=5px cellspacing=5px border=0px>";
echo "<tr>";
echo "<td>";
echo "OOps.No Results Found.";
echo "<hr width=\"50px\" align=\"left\">";
	
		if($fullsearchpage=="no"){
			echo "<a href=\"index.php\">Back to Categories</a>";
		}

echo "</td>";
echo "</tr>";
echo "</table>";

}

?>