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
function createRows(){
	for(var i=1;i<=rowNum;i++){
		tmp+="<tr height='60' ><td width='50' align='center'>"+i+"</td><td width='300' align='center'><textarea rows='1' cols='40' class='createCardTA' id='word"+i+"'></textarea></td>"
		+"<td width='500' align='center'><textarea rows='1' cols='70' class='createCardTA' id='translation"+i+"'></textarea></td></tr>";
		tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+i+"'>&nbsp;</div></td>"
		+"<td width='500' align='center'><div id='translationMsg"+i+"'>&nbsp;</div></td></tr>";
	}
	document.getElementById("cardTable").innerHTML+=tmp;
}
function addEntry(){
	rowNum+=1;
	document.getElementById("cardTable").innerHTML+="<tr height='60' ><td width='50' align='center'>"+rowNum+"</td><td width='300' align='center'><textarea rows='1' cols='40' class='createCardTA' id='word"+rowNum+"'></textarea></td>"
		+"<td width='500' align='center'><textarea rows='1' cols='70' class='createCardTA' id='translation"+rowNum+"'></textarea></td>"+"</tr>"
		+"<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+rowNum+"'>&nbsp;</div></td>"
		+"<td width='500' align='center'><div id='translationMsg"+rowNum+"'>&nbsp;</div></td></tr>";

}
//Field checking on submit