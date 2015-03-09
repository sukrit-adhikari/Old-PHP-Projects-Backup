function send(username,message)
{

	if (message=="") 	{
 	
 		document.chatplaceform.chatplace.value="";
	   document.chatplaceform.chatplace.focus();
   	document.chatplaceform.chatplace.scrollIntoView(true);
	   document.getElementById("sending").innerHTML="";
	   alert("Try not to send NULL Messages...");
		return;
}



if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari


  xmlhttpsend=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
  										xmlhttpsend=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttpsend.onreadystatechange=function(){
	
  if (xmlhttpsend.readyState==4 && xmlhttpsend.status==200){
  	
	send_c_count++;

	username = username.charAt(0).toUpperCase() + username.slice(1);

	t = document.getElementById("chatable");
		    
	t.innerHTML = t.innerHTML + "<tr style=\"color:#D6BF86;\" "+ "><td>" +username+"<br>"+ message + xmlhttpsend.responseText +"</td></tr>";
    
    
    
    document.chatplaceform.chatplace.value="";
    document.chatplaceform.chatplace.focus();
    document.chatplaceform.chatplace.scrollIntoView(true);
    document.getElementById("sending").innerHTML="";
    document.getElementById("chatdiv").scrollTop=999999;
    }
   //&& xmlhttp.status==200

   //else if(xmlhttp.readyState==1 || xmlhttp.readyState==2 || xmlhttp.readyState==3 || xmlhttp.readyState==0 ){

   //document.getElementById("sending").innerHTML="Sending...";	

   //}
}

xmlhttpsend.open("GET","ajax/send.php?message="+message,true);
xmlhttpsend.send();

}
