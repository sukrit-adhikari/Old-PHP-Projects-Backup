function pots()
{

if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttppots=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
						  										xmlhttppots=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttppots.onreadystatechange=function()

{


  if (xmlhttppots.readyState==4 && xmlhttppots.status==200)
    {
    	pots_c_count++;
			response=xmlhttppots.responseText;
			    	
			var splitusernames= response.split("%^#$[]");    	
			var usernames=splitusernames[1];    	
    	
    	
			//alert(xmlhttppots.responseText);				
			
				if(response.indexOf('!%$)()^&online!%$)()^&')==-1){
					
					
					document.getElementById("friend_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;your buddies are offline</font>";
					
					
					//document.chatplaceform.chatplace.scrollIntoView(true);
				}
				
				else{
					
					
					document.getElementById("friend_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;online buddies- "+usernames+"</font>";
					
					//document.chatplaceform.chatplace.scrollIntoView(true);
					
					buddy_status="online";
									
				}			
    }


}

xmlhttppots.open("GET","ajax/pots.php",true);
xmlhttppots.send();

}
