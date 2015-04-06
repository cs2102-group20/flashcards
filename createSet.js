//initialize variable
function initialize(){
	rowNum=2;
}		
//Preloading images	
function preloadImages(){
	fileNames = [
	];
	for (i=0;i<fileNames.length;i++) { var p=new Image(); p.src=fileNames[i];}
}
//webpage display logic
function removeExtraWhitespace(field){
	field.value=field.value.replace(/(\r\n|\n|\r)/gm,' ').replace(/ +(?= )/g,'').replace(/^\s+|\s+$/g,'');
}
function changeTransAtt(field, i){
	if(field.value==""){
		if(document.getElementById("translation" + i).hasAttribute("required")){
			document.getElementById("translation" + i).removeAttribute("required");
		}
	}else{
			if(!document.getElementById("translation" + i).hasAttribute("required")){
			document.getElementById("translation" + i).createAttribute("required");
		}
	}
}
function changeWordAtt(field, i){
	if(field.value==""){
		if(document.getElementById("word" + i).hasAttribute("required")){
			document.getElementById("word" + i).removeAttribute("required");
		}
	}else{
			if(!document.getElementById("word" + i).hasAttribute("required")){
			document.getElementById("word" + i).createAttribute("required");
		}
	}
}
function createRows(){
	var tmp="";
	for(var i=1;i<=rowNum;i++){
		tmp+="<tr height='60' ><td width='50' align='center'>"+i+"</td><td width='300' align='center'><input type='text' class='createCardTA' name='word[]' id='word"+i+"' maxlength='50' onchange='removeExtraWhitespace(this);changeTransAtt(this," + i ");'></td>"
		+"<td width='500' align='center'><input type='text' class='createCardTA' name='translation[]' id='translation"+i+"'  maxlength='50' onchange='removeExtraWhitespace(this);changeWordAtt(this," + i ");'></td></tr>";
		//tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+i+"'>&nbsp;</div></td>"
		//+"<td width='500' align='center'><div id='translationMsg"+i+"'>&nbsp;</div></td></tr>";
	}
	document.getElementById("cardTable").innerHTML+=tmp;
}
function addEntry(){
	rowNum+=1;
	document.getElementById("cardTable").innerHTML+="<tr height='60' ><td width='50' align='center'>"+rowNum+"</td><td width='300' align='center'><input type='text' class='createCardTA' name='word[]' id='word"+rowNum+"'  maxlength='50' onchange='removeExtraWhitespace(this);'></td>"
		+"<td width='500' align='center'><input type='text' class='createCardTA' name='translation[]' id='translation"+rowNum+"'  maxlength='50' onchange='removeExtraWhitespace(this);'></td>"+"</tr>"
		//+"<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+rowNum+"'>&nbsp;</div></td>"
		//+"<td width='500' align='center'><div id='translationMsg"+rowNum+"'>&nbsp;</div></td></tr>";

}
//Field checking on submit