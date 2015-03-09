function showspeed(speed){
	document.getElementById("result").innerHTMl = "<br>"+speed+" KBps";
}


function showprocessing(eid,dispvalue){
	document.getElementById(eid).style.display = dispvalue;
}


function rename(eid,to){
	document.getElementById(eid).value = to;
}


function before(){
	//SHOW Processing GIF	//Rename "Test My Speed" to "Retry" 	//CALL speed test	

	showprocessing("processing","block");	
	document.getElementById("result").innerHTML = "";
	document.getElementById("speedtestbutton").disabled = true;
	document.getElementById("ip_addr").style.display = "none";
	//rename("speedtestbutton","Retry");
	speedtest();
}

function after(speed){
	//HIDE Processing GIF	//Rename "Retry" to "Test My Speed"	//Show Speed

	showprocessing("processing","none");
	//rename("speedtestbutton","Test My Speed");
	document.getElementById("result").innerHTML= "<br><br>Final Result: "+Math.ceil(speed)+".00 KBps";
	document.getElementById("speedtestbutton").disabled = false;
	document.getElementById("ip_addr").style.display = "block";
}



function speedtest()
{

var	ts1 = new Date().getTime();


	if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  		xmlhttpst=new XMLHttpRequest();
	}
	else{// code for IE6, IE5
		xmlhttpst=new ActiveXObject("Microsoft.XMLHTTP");
	}
  						
	xmlhttpst.onreadystatechange=function(){

		if (xmlhttpst.readyState==3 && xmlhttpst.status==200){
    	}

		if (xmlhttpst.readyState==4 && xmlhttpst.status==200){
		
    		var ts2 = new Date().getTime();
    	
    		var speed = 200 / ( (ts2-ts1) /1000 );
		
			after(speed);
		}
	}

xmlhttpst.open("GET","speedtest_download.php?randomize="+Math.random(),true);
xmlhttpst.send();

}