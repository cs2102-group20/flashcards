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
	var tmp="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><font size='3'>Word</font></td><td width='500' align='center'><font size='3'>Translation</font></td></tr>";
	tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><font size='1'>The word should comprise 1-30 characters.</font></td><td width='500' align='center'><font size='1'>The translation should comprise 1-60 characters.</font></td></tr>";
	tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><font size='2'>Word Language</font></td><td width='500' align='center'><font size='2'>Translation Language</font></td></tr>";
	tmp+="<tr height='40' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'>"+
		"<select id='langWord'><?php foreach ($languages as $language) { ?><option value=\"<?php echo $language['id']; ?>\" <?php if ($language['selected']) echo 'selected'; ?>><?php echo htmlspecialchars($language['name']); ?></option><?php } ?></select>"
		+"</td><td width='500' align='center'>"+
		"<select id='langTranslation'><?php foreach ($languages as $language) { ?><option value=\"<?php echo $language['id']; ?>\" <?php if ($language['selected']) echo 'selected'; ?>><?php echo htmlspecialchars($language['name']); ?></option><?php } ?></select>"
		+"</td></tr>";
	for(var i=1;i<=rowNum;i++){
		tmp+="<tr height='60' ><td width='50' align='center'>"+i+"</td><td width='300' align='center'><textarea rows='1' cols='40' class='createCardTA' id='word"+i+"'></textarea></td>"
		+"<td width='500' align='center'><textarea rows='1' cols='70' class='createCardTA' id='translation"+i+"'></textarea></td></tr>";
		tmp+="<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+i+"'>&nbsp;</div></td>"
		+"<td width='500' align='center'><div id='translationMsg"+i+"'>&nbsp;</div></td></tr>";
	}
	document.getElementById("cardTable").innerHTML=tmp;
}
function addEntry(){
	rowNum+=1;
	document.getElementById("cardTable").innerHTML+="<tr height='60' ><td width='50' align='center'>"+rowNum+"</td><td width='300' align='center'><textarea rows='1' cols='40' class='createCardTA' id='word"+rowNum+"'></textarea></td>"
		+"<td width='500' align='center'><textarea rows='1' cols='70' class='createCardTA' id='translation"+rowNum+"'></textarea></td>"+"</tr>"
		+"<tr height='25' ><td width='50' align='center'>&nbsp;</td><td width='300' align='center'><div id='wordMsg"+rowNum+"'>&nbsp;</div></td>"
		+"<td width='500' align='center'><div id='translationMsg"+rowNum+"'>&nbsp;</div></td></tr>";

}
//Field checking on submit