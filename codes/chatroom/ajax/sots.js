function sots()
{


if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttpsots=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
						  										xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttpsots.onreadystatechange=function(){

if(xmlhttpsots.readyState==4 && xmlhttpsots.status==200){
	//document.getElementById().innerHTML="<img src=\"images/online.jpg\">";
sots_c_count++;
}

}

xmlhttpsots.open("GET","ajax/sots.php",true);
xmlhttpsots.send();

}
