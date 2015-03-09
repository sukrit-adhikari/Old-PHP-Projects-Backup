//Global Variables

var blockFilled;
var blockShown;
var samuha;
var nextNightFillArray =  new Array();
var nextdayFillReferBack;



function changeGroup(){
	samuha=cyclicSum(samuha);
	blockFilled='n';
	clearTable();
	document.getElementById('grChangeBtnV').value=samuha;
	blockShown='n';
	blockViewInit();
}

function clearTable(){
	for(i=0;i<=7;i++){
		row = document.getElementById('blockView').rows[i];
		for(j=1;j<=24;j++){
		row.deleteCell(1);
		}
	}
}

function varInit(){
	for(i=0;i<=14;i++){
		nextNightFillArray[i]='';
	}


/*
ls[1][0]=3.0; ls[1][1]=9.0;  ls[1][2]=13.0;  	ls[1][3]=19.0;ls[2][0]=10.0; ls[2][1]=17.0; ls[2][2]=20.0; 	ls[2][3]=1.0;ls[3][0]=8.0; ls[3][1]=14.0; ls[3][2]=18.0; 	ls[3][3]=24.0;ls[4][0]=9.0; ls[4][1]=15.0; ls[4][2]=19.0;	ls[4][3]=1.0; ls[5][0]=6.0; ls[5][1]=13.0; ls[5][2]=17.0;  	ls[5][3]=22.0;ls[6][0]=4.0; ls[6][1]=11.0; ls[6][2]=15.0;  	ls[6][3]=20.0;ls[7][0]=4.0; ls[7][1]=10.0; ls[7][2]=14.0;  	ls[7][3]=20.0;
*/
}


function blockViewInit(){


//blockView
blockFilled ='n';
blockShown='n';
samuha=document.getElementById('samuhainfo').innerHTML.substring(15,16);
nextdayFillReferBack='';

if(blockShown=='n'){
	document.getElementById('visualization').style.display="block";	blockShown='y';
}else{
	document.getElementById('visualization').style.display="none";
	blockShown='n';
}

if(blockFilled=='y'){
	return;
}

varInit();
	

	var rowTime=document.getElementById("blockView").rows[0];
	for(i=0;i<=23;i++){
		newCellInserted=rowTime.insertCell(-1);
		newCellInserted.id="hrs"+i;
		newCellInserted.bgColor="#ee6d17";
				if(i<12){
					newCellInserted.innerHTML=doubleDigitFormat(i)+" am";
				}else{
					if(i!=12){
					realI=i-12;
					}else{
					realI=12;
					}
					newCellInserted.innerHTML=doubleDigitFormat(realI)+" pm";
				}
	}

	

	for(j=1;j<=7;j++){
		var row=document.getElementById("blockView").rows[j];
		for(i=0;i<=23;i++){
			newCellInserted=row.insertCell(-1);
			newCellInserted.id="d"+j+"."+i;

					if(currTimeLS(i,j)){
						newCellInserted.innerHTML="";
						
						if(i<6 || i>17){
						newCellInserted.bgColor="#000000";
						}else{
						newCellInserted.bgColor="#000000";
						//#3D3B3C;
						}
					
					}else{
						newCellInserted.innerHTML="";
						newCellInserted.bgColor="#40ED77";
					}
			
			
			
			
		}
	}
	blockFilled='y';
	nextNightFill();
	currentBlockLocator();

}

function currentBlockLocator(){
	
	//make All previous Blink NULL //
	if(document.getElementById('currentBlink')){	
		document.getElementById('currentBlink').innerHTML='';
	}
	// END of make All previous Blink NULL //
	
	
	
	
	
	var id = "d"+parseInt(dayOfWeek,10)+"."+parseInt(server_hrs,10);
	
	
	
	document.getElementById(id).style.color="#FF0066";

	document.getElementById(id).innerHTML="<center><b id='currentBlink'>&copy;</b></center>";
	document.getElementById(id).style.textDecoration = "blink";
}

function currTimeLS(i,j){//Hrs,Day
	var backUpJ=j;
	
	backUpJ= cyclicSum(backUpJ);
	
	j = transformDay(j,samuha);
	
	if(i<ls[j][0]){
		return false;
	}else if(i>=ls[j][0] && i<ls[j][1]){
		return true;
	}else if(i>=ls[j][1] && i<ls[j][2]){
		return false;
	}else if(i>=ls[j][2] && i<ls[j][3]){
		return true;
	}else if(i>=ls[j][2] && ls[j][3]<ls[j][2]){
		//alert( i + "  " + ls[j][2] + "  " + ls[j][3]    );
		nextNightFillArray.push(backUpJ+"#"+ls[j][3]);nextdayFillReferBack=backUpJ+"#"+ls[j][3];
		return true;
	}else if(i>=ls[j][3]){
		return false;
	}
}


function stateOfLS(i,j){//Hrs,Day
	j = transformDay(j,samuha);
	if(i < ls[j][0] ){
		return 1;
	}else if(i>=ls[j][0] && i<ls[j][1]){
		return 2;
	}else if(i>=ls[j][1] && i<ls[j][2]){
		return 3;
	}else if(i>=ls[j][2] && i<ls[j][3]){
		return 4;
	}else if(i>=ls[j][2] && ls[j][3]<ls[j][2]){
		return 5;
	}else if(i>=ls[j][3]){
		return 6;
	}
}










function transformDay(j){
	var day = j;
	
	if(day>=samuha){
		return (day-samuha+1);
	}else{
		return ( 7 - (samuha-day-1) );
	}
}


function nextNightFill(){

	for(j=0;j<=16;j++){
		nextNightFillData=nextNightFillArray.pop()
		
		
		if(nextNightFillData){
			//alert(nextNightFillData);
			if(nextNightFillData.length!=0){
				
				day = nextNightFillData.substring(0,1);
				hour = nextNightFillData.substring(2);
			
			
				for(i=0;i<hour;i++){
				document.getElementById("d"+day+"."+i).bgColor="#000000";
				}
		
			}
		}
	}

}

function fillColors(){
}
function cyclicSum(a){
	if(a==7){
		return 1;
	}else{
		a++;
		return a;
	}
}

function doubleDigitFormat(b){
	if(b>=0 && b<=9){
		return ("0"+b);
	}else{
		return (b);
	}
}



