/*/////////////////////////////////////////////////////////////////////////////
////////////////////////////IMPORTANT//////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////


POTS() sets buddy_status ONLINE status and calls PTTS() under the condition:
1:) User Should Be Online 
2:) Buddy Should be online

NI POTS() changes GLOBAL VARIABLE pots_ti to 60000 after a Buddy is DETECTED ONLINE
NI POTS() changes GLOBAL VARIABLE pots_ti to 10000 after a Buddy is DETECTED OFFLINE





///////////////////////////////////////////////////////////////////////////////
/////////////////////END***IMPORTANT***END/////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////*/






//////////////////////////////////////////////////////////////////////////////
// GLOBAL VARIABLES DECLARATION

var userstatus="online";

var show_ti=3337;

var sots_ti=17437;

var pots_ti=18101;

var stts_ti=5000;

var ptts_ti=10000;

var buddy_status="offline";


var sots_c_count=0;
var pots_c_count=0;
var stts_c_count=0;
var ptts_c_count=0;
var show_c_count=0;
var send_c_count=0;
var show_success_c_count=0;

// END OF GLOBAL VD 

//////////////////////////////////////////////////////////////////////////////
//Deliver Message on ENTER by calling send(message)

function testenter(event_passed){
	    if (event_passed.keyCode == 13 ) {
			
			document.getElementById("sending").innerHTML="Sending";
			
			//document.chatplaceform.chatplace.value="";
			
			document.getElementById("chatplace").blur();			
		
			send(username,document.getElementById("chatplace").value);
			
				
    	}
}


//////////////////////////////////////////////////////////////////////////////
// FUNCTION THAT LOOPS SHOW
window.setInterval(function(){

show();

}, show_ti);

//////////////////////////////////////////////////////////////////////////////
// FUNCTION THAT loops  SOTS
window.setInterval(function(){

if(userstatus=="online"){
sots();
}

}, sots_ti);

//////////////////////////////////////////////////////////////////////////////
// FUNCTION THAT loops  POTS 

window.setInterval(function(){

if(userstatus=="online"){
pots();
}
else{
//document.getElementById("friend_offline").innerHTML="";
//document.getElementById("me_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;You are now Offline but your are still able to send and receive Offline messages ...</font>";
}

}, pots_ti);

//////////////////////////////////////////////////////////////////////////////
//// FUNCTION THAT Manipulates Appear off/online Button and stops POTS by making status="off/online" 
function keeponoff(getstatus){

	if(getstatus=="Appear Offline"){
		userstatus="offline";
		document.getElementById("loggedinas").style.color="WHITE";
		document.getElementById("onoffbutton").value="Appear Online";
		document.getElementById("friend_offline").innerHTML="";
		document.getElementById("asterik").innerHTML="*";
		document.getElementById("me_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;*You are now Offline but your are still able to send and receive Offline messages ...</font>";

	}
	else{
		userstatus="online";
		document.getElementById("loggedinas").style.color="#D6BF86";
		document.getElementById("asterik").innerHTML="";
		document.getElementById("onoffbutton").value="Appear Offline";
		document.getElementById("friend_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;You are now Online ...</font>";
		document.getElementById("me_offline").innerHTML="";

	}
focus_chatplace();
}

//////////////////////////////////////////////////////////////////////////////
// FUNCTION THAT CLEARS <TABLE id="chatable">'s innerHTML

function clearchat(){

	document.getElementById("chatable").innerHTML="";
	focus_chatplace();		
		
}

//////////////////////////////////////////////////////////////////////////////
// FUNCTION THAT SHOWS ALL CHAT HISTORY

function ShowHistory(){
	
	window.location="index.php?display=refresh";
		
}	
	
//////////////////////////////////////////////////////////////////////////////
 // Function that plays Chat SOUND 
 function playSound() {
  document.getElementById("dummymp3").innerHTML=
    "<embed src='"+'r.wav'+"' hidden=true autostart=true loop=false>";
}
 
//////////////////////////////////////////////////////////////////////////////
// Function that sends TTS if char.length>5

window.setInterval(function(){

	var chat_typed = document.getElementById("chatplace").value;

		if(chat_typed.length>=5 && buddy_status=="online" && userstatus=="online" ){
		
			stts();	
		
		}

}, stts_ti);

//////////////////////////////////////////////////////////////////////////////
// WHAT to do on Body Load of chat Room

function whattodoonload(){

	focus_chatplace();
	document.getElementById("chatdiv").scrollTop=999999;
	document.getElementById("friend_offline").innerHTML="<font color=WHITE>&nbsp;&nbsp;&nbsp;. . . . . . . . .</font>";
	stats4nerds("onload");
}

//////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////
// Display Trouble Shoot form in the index.php page

function troubleshoot(){

if(document.getElementById('troubleshoot').style.display!="block"){	
//DISPLAY ko value BLOCK chaina bhane display = BLOACK garne ani scroll garne
	document.getElementById('troubleshoot').style.display='block';
	document.troubleshootform.username.focus();	
	//window.location=window.location + "#troubleshootform";	
	//document.getElementById('troubleshoot').scrollTop=999999;

}	
else{

		document.getElementById('troubleshoot').style.display='none';
		document.chatplaceform.chatplace.focus();	
}
}

//////////////////////////////////////////////////////////////////////////////
// Refresh chat screen ie display latest FEW CHATS 
function refreshchatscreen(){

	window.location="index.php?display=latestfew";

}

//////////////////////////////////////////////////////////////////////////////
// FUNCTION TO LOOP ptts()
window.setInterval(function(){

	if(userstatus=="online" && buddy_status=="online"){					
		
		ptts();				
	
	}

}, ptts_ti);
	

//////////////////////////////////////////////////////////////////////////////
//TOGGLE CHAT SPEED

function togglespeed(changeto){
	
	if(changeto=="Fast"){	
		show_ti=1500;
	}
	else if(changeto=="Normal"){
		show_ti=3337;
	}
	else if(changeto=="Slow"){
		show_ti=5000;
	}
	else{
		show_ti=3337;
	}
focus_chatplace();
}

//////////////////////////////////////////////////////////////////////////////
//STATS FOR NERDS
function stats4nerds(onload){
var s4nd=document.getElementById("stats4nerds").style.display;

if(s4nd=="none" && onload!="onload" ){
	document.getElementById("stats4nerds").style.display="block";
}
else{
	document.getElementById("stats4nerds").style.display="none";
}	
	window.setInterval(function(){
	
		document.getElementById("show").innerHTML=show_success_c_count+"/"+show_c_count;
		document.getElementById("show_ti").innerHTML=show_ti;		
		document.getElementById("send").innerHTML=send_c_count;
		document.getElementById("sots").innerHTML=sots_c_count;
		document.getElementById("pots").innerHTML=pots_c_count;
		document.getElementById("stts").innerHTML=stts_c_count;
		document.getElementById("ptts").innerHTML=ptts_c_count;
	
	}, 500);

focus_chatplace();

}

///////////////////////////////////////
//DISPLAY ALERT BOX about What do these mean?
function showmeaning(){
	var meaning1="SHOW-Retrieval of new messages/Total no of request for new messages.\n\nSHOW INTERVAL-Time interval between request for new messages.\n\nSEND-No of messages sent.\n\nSOTS-Notify server that you are online.\n\nPOTS-Find whether your buddies are online.\n\nSTTS-Send server info that you are typing.\n\nPTTS-Find whether your buddies are typing.\n";
	var meaning2="\nTI-Time Interval in ms\n\nSOTS_TI-"+sots_ti+"\nPOTS_TI-"+pots_ti+"\nSTTS_TI-"+stts_ti+"\nPTTS_TI-"+ptts_ti;
	var meaning=meaning1+meaning2;
	
	alert(meaning);
	focus_chatplace();
}

//////////////////////////////////////////////////////////////////////////////
//FOCUS ON CHAT PLACE
function focus_chatplace(){

	document.chatplaceform.chatplace.focus();		
}

//////////////////////////////////////////////////////////////////////////////
//


//////////////////////////////////////////////////////////////////////////////