function stts()
{


if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttpstts=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
						  										xmlhttpstts=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttpstts.onreadystatechange=function(){

if(xmlhttpstts.readyState==4 && xmlhttpstts.status==200){
	stts_c_count++;
}

}

xmlhttpstts.open("GET","ajax/stts.php",true);
xmlhttpstts.send();

}
