function remove_special_ch(string){

slen=string.length;
new_string="";
	for(i=0;i<slen;i++){
		ch=string[i];

		if( (ch.charCodeAt(0)<65 ||  ( ch.charCodeAt(0)>90 && ch.charCodeAt(0)<97   )  || ch.charCodeAt(0)>122 ) ){

			if(ch.charCodeAt(0)>=48 && ch.charCodeAt(0)<=57 ){
			new_string+=ch;
			}else{
			new_string+=" ";
			}

		}else{
			new_string+=ch;
		}
	}	
return new_string;
}

function remove_extra_spaces(string){

slen=string.length;
new_string="";
prev_space=true;
	
	for(i=0;i<slen;i++){
		ch=string[i];

		if(ch.charCodeAt(0)==32 && prev_space==true ){
			new_string+="";
		}else if(ch.charCodeAt(0)==32 && prev_space==false ){
			new_string+=ch;
			prev_space=true;
		}else if(ch.charCodeAt(0)==32 && i==(slen-1)){
			//Do Nothing	
		}
		else{
			new_string+=ch;
			prev_space=false;
		}
	}	
return new_string;


	
}