<script src="java/java.js" type="text/javascript"></script>
<table cellpadding="5px" cellspacing="5px" width="100%">
<tr>

<td align="left">
Categorywise Search:
</td>

<td align="left">
Google Search our site
</td>

</tr>

<tr>
<td align="left">
<form action="search_query.php" method="get">
  <select name="category_search" id="category_search" class="question" onchange="javascript: category_expand_search();">
  <option value="Unspecified">Acad. Level of Search</option>
  <option value="school">School</option>
  <option value="plus2">+2/I.Sc</option>
  <option value="bachelors">Bachelors (e.g B.Sc)</option>
  <option value="masters">Master's (e.g M.Sc)</option>
  <option value="engineering">Engineering</option>
  </select>
  
  	<select name="topic" id="topic_search" class="question">
  	<option value="Unspecified">Topics</option>
  	</select>
   
    <select name="chronological" id="chronological" class="question">
  	<option value="DESC">Newest First</option>
  	<option value="ASC">Oldest First</option>
  	</select>
		<input type="hidden" value="yes" name="fullsearchpage" />

    <input type="submit" value="Search" />
</form>
</td>
<td>
<form method="get" action="http://www.google.com/search"/>
<input type="text" name="q" class="question" id="googlesearchquery"/>
<input type="hidden"  name="sitesearch" value="http://www.sukrit.com.np"/>
<input type="submit" value="Search"/>
</form>
</td>
</tr>
</table> 
