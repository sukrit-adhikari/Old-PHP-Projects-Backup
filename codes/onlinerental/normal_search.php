<div class="search">
<form action="search_via_query.php" method="get" onsubmit="return search_via_query()">
<input type="hidden" name="type" id="search_type" value="[NULL]">
<input type="hidden" name="jsonoff" id="jsonoff" value="off">	
<!--<div class="search_item"></div>-->
<div  class="search_item"><input type="text" name="query" id="search_query" value="" size="60px" class="style_text" /></div>
<div class="search_botton"><input type="image" size="80px" src="images/search2.gif" />
 </div>

</form>
</div>

<script type="text/javascript" src="js/string.js" >
</script>

<script type="text/javascript" src="js/leven.js" >
</script>

<script type="text/javascript" >
document.getElementById('jsonoff').value="on";
</script>


<script type="text/javascript" >

function search_via_query(){
elem=document.getElementById('search_query');	
	if(elem.value.length<4){
		alert("Search query must be at least 4 characters long...");
		return false;	
	}
	cleanup_search();
}

function cleanup_search(){

		elem=document.getElementById('search_query');
		string=elem.value;
		
		string=remove_special_ch(string);
		string=remove_extra_spaces(string);

		elem.value=string;




if(elem.value==""){
	return false;
}else{
	find_type();	
}
}



function find_type(){
best_fit="";
best_fit_cost=9999;


array_type=new Array("house","home","apartment","flat");
array_type_size=array_type.length;

elem=document.getElementById('search_query');
query=elem.value;
query_array=query.split(" ");
query_size=query_array.length;
	
	for(i=0;i<query_size;i++){
		for(j=0;j<array_type_size;j++){
			leven_cost=levenshteinenator(array_type[j],query_array[i]);
			if(leven_cost<best_fit_cost && leven_cost<3){
					best_fit=array_type[j];
					best_fit_cost=leven_cost;
			}
		}
	}
document.getElementById('search_type').value=best_fit;
return true;
}


</script>