function plusimage(){

	
	for(i=2;i<=5;i++){
		id="image"+i;
		
		if( document.getElementById(id).style.display=="none" ){
			
			document.getElementById(id).style.display="block";
			
			id="file_image"+i;
			document.getElementById(id).value="";
			break;
		
		}
	}
}

function minusimage(){

	for(i=5;i>=2;i--){
		id="image"+i;
		
		if( document.getElementById(id).style.display=="block" ){
			document.getElementById(id).style.display="none";
			id="file_image"+i;
			document.getElementById(id).value="";
			break;
		}
	}
}



function plusinfo(){

	
	for(i=2;i<=10;i++){
		id="info"+i;
		
		if( document.getElementById(id).style.display=="none" ){
			document.getElementById(id).style.display="block";
			id="txt_info"+i;
			document.getElementById(id).innerHTML="Type information "+	i+" here...";
			break;
		}
	}
}

function minusinfo(){
//alert("ayo");
	
	for(i=10;i>=2;i--){
		id="info"+i;
		
		if( document.getElementById(id).style.display=="block" ){
			document.getElementById(id).style.display="none";
			
			id="txt_info"+i;
			document.getElementById(id).innerHTML="none";
			break;
		}
	}
}