function animateSamuhaInfo(nextSamuha){
document.getElementById('samuhainfo').innerHTML="Samuha / Group "+nextSamuha;
}


function changeSamuhaWhole(plusorminus){

//alert(server_hrs+" "+server_mins+" changeGroup");

varInit();

// Redundant as Server time once loaded Does not change // 
//document.getElementById('localTimeWarning').style.display="block";
// Redundant as Server time once loaded Does not change //


	if(document.getElementById('laterToday')){
		document.getElementById('laterToday').style.display="none";
	}

	nextSamuha = cyclicMath(plusorminus,samuha);
	samuha = nextSamuha;
	document.getElementById('grChangeBtnV').innerHTML=samuha;


var day =	dayOfWeek;

transDay=transformDay(day);

var currTime= parseInt(ddf(server_hrs),10) + (  ddf(server_mins)/100 )  ;

var currTimeP = ddf(server_hrs)+":"+ddf(server_mins);

var lsState = stateOfLS( currTime,day ) ;



//alert("Transformed Day "+transDay+"\n"+"lsState "+lsState+"\n"+lsState);


/// Timer Timer Clear/Reset ///
clearInterval(timerIntervalId);
/// END of Timer Clear/Reset ///



/// Redefine Samuha //
			animateSamuhaInfo(nextSamuha);
			document.getElementById('title').innerHTML="Samuha "+nextSamuha;
			document.getElementById('getimgroutinelink').href="imageroutine.php?samuha="+nextSamuha;
			document.getElementById('getimgroutinelink').innerHTML="Get Image Routine for Group "+nextSamuha;
			
			if(document.getElementById('removedefaultsamuhaspan')){
			document.getElementById('removedefaultsamuhaspan').style.display="none";
			}
/// END of Redifine Samuha //


/// Change Block View ///
if(blockShown =='y'){
blockShown ='n';
blockFilled ='n';
clearTable();
document.getElementById('grChangeBtnV').value=samuha;
blockViewInit();
}
/// End of change Block View ///





///First OutPut ///
/* FIRST LOGIC
if( currTimeLS( currTime, day )  ){
document.getElementById('nowli').innerHTML="Now >>> Load Shedding";
}else{
document.getElementById('nowli').innerHTML="Now >>> No Load Shedding";
}
*/

var currentTD = "d"+parseInt(day,10)+"."+parseInt(server_hrs,10);
var lsFromColor;

if(document.getElementById(currentTD).bgColor=="#000000"){
	lsFromColor='y';
	document.getElementById('nowli').innerHTML="Now >>> Load Shedding";
}else{
	lsFromColor='n';
	document.getElementById('nowli').innerHTML="Now >>> No Load Shedding";
}



///First OutPut END///

///Second OutPut No need to change once Loaded Server Time///
// document.getElementById('currtime').innerHTML="It's "+hrs+":"+ddf(mins)+" o'Clock now.";
///Second OutPut END///


/// Third OutPut ///
if(lsFromColor=='y' && currTime<ls[transDay][0]){
	document.getElementById('futInfo').innerHTML="Light comes at "+negStateLightComeTime() +" !";

	document.getElementById('timeleftspan').style.display='block';
	document.getElementById('timeleft').innerHTML=timeDifference(currTimeP,negStateLightComeTime() );

}
else if(lsState==1){
document.getElementById('futInfo').innerHTML="Light goes at "+makeTimeParsable(ls[transDay][0])+" !";

document.getElementById('timeleftspan').style.display='block';
document.getElementById('timeleft').innerHTML=timeDifference(currTimeP,makeTimeParsable(ls[transDay][0]) );
}else if(lsState==2){
document.getElementById('futInfo').innerHTML="Light comes at "+makeTimeParsable(ls[transDay][1])+" !";

document.getElementById('timeleftspan').style.display='block';
document.getElementById('timeleft').innerHTML=timeDifference(currTimeP,makeTimeParsable(ls[transDay][1]) );
}else if(lsState==3){
document.getElementById('futInfo').innerHTML="Light goes at "+makeTimeParsable(ls[transDay][2])+" !";

document.getElementById('timeleftspan').style.display='block';
document.getElementById('timeleft').innerHTML=timeDifference(currTimeP,makeTimeParsable(ls[transDay][2]) );
}else if(lsState==4){
document.getElementById('futInfo').innerHTML="Light comes at "+makeTimeParsable(ls[transDay][3])+" !";

document.getElementById('timeleftspan').style.display='block';
document.getElementById('timeleft').innerHTML=timeDifference(currTimeP, makeTimeParsable(ls[transDay][3]) );
}else if(lsState==5){
document.getElementById('timeleftspan').style.display='none';
document.getElementById('futInfo').innerHTML="Light comes Next Day...!!!";
}else if(lsState==6){
document.getElementById('timeleftspan').style.display='none';
document.getElementById('futInfo').innerHTML="Light goes Next Day...!!!";
}
/// Third OutPut END///






/// This Segment Always at the ENd of This Function ///
/// Timer Set/Start ///
					timerReload();
					initTimer();
/// END of Timer Set/Start ///
/// This Segment Always at the ENd of This Function ///



}

function cyclicMath(plusorminus,x){



if(plusorminus=="plus"){
	if(x==7){
		return 1;
	}else{
		x++;
		return x;
	}
	
}else{
	if(x==1){
		return 7;
	}else{
		x--;
		return x;
	}
}

}

function timeDifference(time1,time2){
var totalDiff =
    new Date( '01/01/2009 ' + time1 ) -
    new Date( '01/01/2009 ' + time2 );

var totalDiff = Math.abs(totalDiff);	
	
	
var totalHrs = totalDiff / 1000 / 60 / 60 ;

var td_hrs = Math.floor(totalHrs);

var td_mins =  ( totalDiff - (td_hrs*1000*60*60) ) / 1000 / 60

//alert(time1+" "+time2+"\n"+ td_hrs+" Hrs : "+td_mins+" Mins Left!");

return ddf(td_hrs)+" Hrs : "+ddf(td_mins)+" Mins Left!";

}

function makeTimeParsable(a){


 
 var a_str=a.toString(); 
 
if(a_str.indexOf('.')==-1){
	

	
	if(a_str=="24"){
		a_str="23";
		return a_str+":"+"59";
	}else{
		return a_str+":"+"00";
	}

}else
	if(		a_str.substring(0,a_str.indexOf('.')-1) =="24"		){
			return "23" + ":" + a_str.substring(a_str.indexOf('.')+1)
	}
	
	
	
	return a_str.substring(0,a_str.indexOf('.')) + ":" + a_str.substring(a_str.indexOf('.')+1);

}


function negStateLightComeTime(){
var loop=(parseInt(server_hrs,10)+1);
do{

if(document.getElementById("d"+parseInt(dayOfWeek,10)+"."+loop).bgColor!="#000000"){
return ddf(loop)+":"+"00";
}

}while(loop<=23);

}



