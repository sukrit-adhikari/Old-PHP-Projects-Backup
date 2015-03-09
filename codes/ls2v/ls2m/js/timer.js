//Timer
var secs = 60;
var server_hrs = document.getElementById('currtime').innerHTML.substring(5,7);
var server_mins = document.getElementById('currtime').innerHTML.substring(8,10);
var timerIntervalId;
var dayOfWeek = document.getElementById('dayOfWeek').innerHTML;
var samuha=document.getElementById('samuhainfo').innerHTML.substring(15,16);

function timerReload(){
	//secs = 60;
	
	// Server Hour Once Loaded Need Not be changed //
	//server_hrs = document.getElementById('currtime').innerHTML.substring(5,7);
	//server_mins = document.getElementById('currtime').innerHTML.substring(8,10);
	// Server Hour Once Loaded Need Not be changed //
	
	document.getElementById('hrs').innerHTML=0;
	document.getElementById('mins').innerHTML=0;
	document.getElementById('secs').innerHTML=60;
	
	//document.getElementById('server_hrs').innerHTML=0;
	//document.getElementById('server_mins').innerHTML=0;
}



function ddf(digit){
digit_here=digit;


	if(digit_here<10){
	digit_here = "0"+digit_here;
	return digit_here.slice(-2);
	}else{
	return digit_here;
	}
}

function updatesecs(){

//alert(server_hrs+" "+server_mins);

if(secs>0){
	updateLeftTime("partial");
	secs--;
}else{
	updateLeftTime("");
	secs=59;
}

}

function initTimer(){



if(document.getElementById('timeleft').innerHTML!=""){



var timeleft = document.getElementById('timeleft').innerHTML;

hrs_init = timeleft.substring(0,timeleft.indexOf(" "));

var timeleft_mins = timeleft.substring(timeleft.indexOf(':')+2);
mins_init = timeleft_mins.substring(0,timeleft_mins.indexOf(" "));

//alert(hrs_init+"  " +mins_init+" initTimer");

document.getElementById('hrs').innerHTML=ddf(hrs_init);
document.getElementById('mins').innerHTML=ddf(mins_init);

mins = document.getElementById('mins').innerHTML;
hrs = document.getElementById('hrs').innerHTML;


if(document.getElementById('timeleftspan').style.display=='block'){
document.getElementById("title").innerHTML = "Gr. "+samuha + " || " + ddf(hrs) + " : " + ddf(mins) + " : "+ ddf(secs) + " || "+ document.getElementById('nowli').innerHTML;
}else{
document.getElementById("title").innerHTML = "Gr. "+samuha + " || " + document.getElementById('nowli').innerHTML;
}


document.getElementById("timeleft").innerHTML = ddf(hrs) + " : " + ddf(mins) + " : "+ ddf(secs) + " Left...";


timerIntervalId = setInterval("updatesecs()", 1000);

}else{ // NextDay

}

}

function updateLeftTime(partialorfull){

	mins = document.getElementById('mins').innerHTML;
	hrs = document.getElementById('hrs').innerHTML;

if(document.getElementById('timeleftspan').style.display=='block'){
document.getElementById("title").innerHTML ="Gr. "+samuha +  " || " +  ddf(hrs) + " : " + ddf(mins) + " : "+ ddf(secs)+ " || "+ document.getElementById('nowli').innerHTML;
}else{
document.getElementById("title").innerHTML = "Gr. "+samuha + " || " + document.getElementById('nowli').innerHTML;
}

document.getElementById("timeleft").innerHTML = ddf(hrs) + " : " + ddf(mins) + " : "+ ddf(secs) + " Left...";
document.getElementById("currtime").innerHTML = "It's " + ddf(server_hrs) + " : " + ddf(server_mins) + " : " + ddf((60-secs)) + " o'Clock now.";

if(partialorfull!="partial"){	
	
	//currentBlockLocator();
	
	if(mins>0 && hrs>0 ){
	document.getElementById('mins').innerHTML=document.getElementById('mins').innerHTML - 1;
	}
	
	else if(mins ==0 && hrs >0 ){
	document.getElementById('hrs').innerHTML=document.getElementById('hrs').innerHTML - 1;
	document.getElementById('mins').innerHTML="59";
	}
	
	else if(hrs==0 && mins>0){
	document.getElementById('mins').innerHTML=document.getElementById('mins').innerHTML - 1;
	}
	else if(hrs==0  && mins==0){
	location.reload();
	}

	
	if(server_hrs<=23 && server_mins!=59){
		server_mins++;
	}else if(server_hrs<23 && server_mins==59){
		server_hrs++;
		server_mins=0;
	}else if(server_hrs==23 && server_mins==59){
		server_hrs=0;
		server_mins=0;
	}
	//alert(server_hrs + ddf(server_hrs));
	document.getElementById("currtime").innerHTML = "It's " + ddf(server_hrs) + " : " + ddf(server_mins) + " o'Clock now.";
	document.getElementById("currtime").innerHTML = "It's " + ddf(server_hrs) + " : " + ddf(server_mins) + " : " + ddf((60-secs)) + " o'Clock now.";
	
}
}
