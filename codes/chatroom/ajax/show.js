function show()
{

if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari


  xmlhttpshow=new XMLHttpRequest();
  
     }
						else{// code for IE6, IE5
  										xmlhttpshow=new ActiveXObject("Microsoft.XMLHTTP");
  							}
  						
xmlhttpshow.onreadystatechange=function()

  {
  		if (xmlhttpshow.readyState==4 && xmlhttpshow.status==200)
    		{
				show_c_count++;
    			
    			//alert(xmlhttpshow.responseText);

	   if(xmlhttpshow.responseText.indexOf('#*ECDS*#') == -1){
	   	 
	   	 //alert("GOTTT");
			
			
			show_success_c_count++; //SUCCESSful Retrieval of Message/CHAT

			
			var response=xmlhttpshow.responseText;
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
  }


xmlhttpshow.open("GET","ajax/show.php",true);
xmlhttpshow.send();

}