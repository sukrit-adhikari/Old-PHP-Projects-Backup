/////////////////////////////////////////////////////////////////////////////////////////////////////////
//MAIN AJAX request Handler
//HERE url should provide ajax/ajax_master.php?sots=yes&pots=yes&show=yes&stts=yes&ptts=yes&message=hello

function a_m(url)
{

if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
	
  xmlhttpa_m=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
						  										xmlhttpa_m=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttpa_m.onreadystatechange=function()

{
	

  if (xmlhttpa_m.readyState==4 && xmlhttpa_m.status==200)
    {
   		 	
			response=xmlhttpa_m.responseText;    	
			//alert(response);			
			    	
 			if(userstatus=="online"){
 			sots_a_m(); 
			}
			
			if(userstatus=="online"){
 				pots_a_m(response);
			}

			if(userstatus=="online" && buddy_status=="online"){
 				//stts_a_m(response);
 			}

 			if(buddy_status=="online"){
 				ptts_a_m(response);  				
			}
			
			show_a_m(response);

    }

}

//ajax/ajax_master.php?sots=yes&pots=yes&show=yes&stts=yes&ptts=yes

xmlhttpa_m.open("GET",url,true);
xmlhttpa_m.send();

}

//END OF MAIN AJAX request Handler
/////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION SHOW
function show_a_m(response){
	
				show_c_count++;

    			//alert(xmlhttpshow.responseText);

	if(response.indexOf('#*ECDS*#') == -1){//Arrival of New Message
	   	 
	   	 //alert("GOTTT");
			
			
			show_success_c_count++; //SUCCESSful Retrieval of Message/CHAT

			
			var splitmessages= response.split("&^#!@#()@#$");    	
			var messages=splitmessages[1];			
						
			document.getElementById("typing").innerHTML="";

   	 	t = document.getElementById("chatable");

    		t.innerHTML = t.innerHTML + "<tr style=\"color:#FFFBD0;\" "+ "><td>" + messages + "</td></tr>";

			document.getElementById("chatdiv").scrollTop=999999;

 	  		document.chatplaceform.chatplace.scrollIntoView(true);

    	}
    	else{//No NEW chat Message
    	}
	}
//END FUNCTION SHOW
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION SOTS
function sots_a_m(){
	
	sots_c_count++;

}



// END FUNCTION SOTS
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION POTS
function pots_a_m(response){			
			pots_c_count++;
			
			    	
			var splitusernames= response.split("%^#$[]");    	
			var usernames=splitusernames[1];    	
    	
    	
			//alert(response);				
			
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
//END FUNCTION POTS
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION STTS
function stts_a_m(){

//	stts_c_count++;

}


//END FUNCTION STTS
/////////////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////////////
//FUNCTION PTTS
function ptts_a_m(response){

		ptts_c_count++;

			//alert(responses);				
			if(response.indexOf('#%#^%$^nottyping#%#^%$^')==-1 && response.indexOf('#%#^%$^typing#%#^%$^')==-1){
					document.getElementById("typing").innerHTML="";
			}
			else if(response.indexOf('#%#^%$^nottyping#%#^%$^')==-1){
					document.getElementById("typing").innerHTML="<font color=WHITE> and typing...</font>";
					//document.chatplaceform.chatplace.scrollIntoView(true);
			}
			else{
				document.getElementById("typing").innerHTML="";				
			}
}

//END FUNCTION PTTS
/////////////////////////////////////////////////////////////////////////////////////////////////////////

