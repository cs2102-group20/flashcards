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
			att=document.createAttribute("required");
			document.getElementById("translation" + i).setAttributeNode(att);
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
			att=document.createAttribute("required");
			document.getElementById("word" + i).setAttributeNode(att);
		}
	}
}
function createRows(){
	var tmp="";
	for(var i=1;i<=rowNum;i++){
		tmp+="<tr height='60' ><td width='50' align='center'>"+i+"</td><td width='300' align='center'><input type='text' class='createCardTA' name='word[]' id='word"+i+"' maxlength='50' onchange='removeExtraWhitespace(this);changeTransAtt(this, this.id.substr(4));'></td>"
		+"<td width='500' align='center'><input type='text' class='createCardTA' name='translation[]' id='translation"+i+"'  maxlength='50' onchange='removeExtraWhitespace(this);changeWordAtt(this, this.id.substr(11));'></td></tr>";
		//tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+i+"'>&nbsp;</div></td>"
		//+"<td width='500' align='center'><div id='translationMsg"+i+"'>&nbsp;</div></td></tr>";
	}
	document.getElementById("cardTable").innerHTML+=tmp;
}
function addEntry(){
	rowNum+=1;
	//document.getElementById("cardTable").innerHTML+="<tr height='60' ><td width='50' align='center'>"+rowNum+"</td><td width='300' align='center'><input type='text' class='createCardTA' name='word[]' id='word"+rowNum+"'  maxlength='50' onchange='removeExtraWhitespace(this);changeTransAtt(this, this.id.substr(4));'></td>"
		//+"<td width='500' align='center'><input type='text' class='createCardTA' name='translation[]' id='translation"+rowNum+"'  maxlength='50' onchange='removeExtraWhitespace(this);changeWordAtt(this, this.id.substr(11));'></td>"+"</tr>";
		//+"<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+rowNum+"'>&nbsp;</div></td>"
		//+"<td width='500' align='center'><div id='translationMsg"+rowNum+"'>&nbsp;</div></td></tr>";
	var tmp=document.getElementById("cardTable");
	var row=tmp.insertRow(rowNum+2);
	row.setAttribute('height', '60');
	var numCell=row.insertCell(0);
	numCell.setAttribute('width','50');
	numCell.setAttribute('align','center');
	numCell.innerHTML=rowNum;
	var cell1=row.insertCell(1);
	cell1.setAttribute('width','300');
	cell1.setAttribute('align','center');
	var cell2=row.insertCell(2);
	cell2.setAttribute('width','500');
	cell2.setAttribute('align','center');
	new_input=document.createElement("input");
	new_input.setAttribute('type','text');
	new_input.setAttribute('class','createCardTA');
	new_input.setAttribute('name','word[]');
	new_input.setAttribute('id','word'+rowNum);
	new_input.setAttribute('maxlength','50');
	new_input.setAttribute('onchange','removeExtraWhitespace(this);changeTransAtt(this, this.id.substr(4));');
	cell1.appendChild(new_input);
	new_input2=document.createElement("input");
	new_input2.setAttribute('type','text');
	new_input2.setAttribute('class','createCardTA');
	new_input2.setAttribute('name','translation[]');
	new_input2.setAttribute('id','translation'+rowNum);
	new_input2.setAttribute('maxlength','50');
	new_input2.setAttribute('onchange','removeExtraWhitespace(this);changeWordAtt(this, this.id.substr(4));');
	cell2.appendChild(new_input2);
}
//Field checking on submit