//initialization
function initialize(){
	editSta=0;
}

//Preloading images	
function preloadImages(){
	fileNames = [
			"../images/deleteSign.png"
	];
	for (i=0;i<fileNames.length;i++) { var p=new Image(); p.src=fileNames[i];}
}
//webpage display logic
function editSet(){
	if(editSta==1){//edit mode
	 document.getElementById("editBtn").style.background='#FF0000';
	 var tmp= document.getElementsByClassName("deleteSign");
	 for(i=0;i<tmp.length;i++){
		tmp[i].innerHTML="<a href='#'><img src='../images/deleteSign.png'  width='10' height='10' id = \'deleteImg"+i+"\'"+" onclick='deleteDialog();' /></a>";
	 }
	 //change title and description field to edit mode
	 document.getElementById("titleDiv").innerHTML="Title: <textarea id='title' class='editSetTA' rows='1' cols='100'></textarea>";
	 document.getElementById("descriptionDiv").innerHTML="Description: <textarea id='description' class='editSetTA' rows='3' cols='100'></textarea>";
	 document.getElementById("langWordCell").innerHTML= "<select id='langWord'><option value='Lunarian'>Lunarian</option><option value='Martian'>Martian</option><option value='Plutonian'>Plutonian</option><option value='Uranian'>Uranian</option><option value='Neptunian'>Neptunian</option><option value='Vegeterian'>Vegeterian</option></select>";
	 document.getElementById("langTranslationCell").innerHTML= "<select id='langTranslation'><option value='Lunarian'>Lunarian</option><option value='Martian'>Martian</option><option value='Plutonian'>Plutonian</option><option value='Uranian'>Uranian</option><option value='Neptunian'>Neptunian</option><option value='Vegeterian'>Vegeterian</option></select>";
	}else{
	var tmp= document.getElementsByClassName("deleteSign");
	 for(i=0;i<tmp.length;i++){
		tmp[i].innerHTML="&nbsp;";
	 }
	 document.getElementById("editBtn").style.background='#FFFFFF';
	
	 document.getElementById("titleDiv").innerHTML="title";
	 document.getElementById("descriptionDiv").innerHTML="description";
	 document.getElementById("langWordCell").innerHTML="<font size='2'>Word language:</font><font size='2'>getWordLanguage</font>";
	 document.getElementById("langTranslationCell").innerHTML="<font size='2'>Translation language:</font><font size='2'>getTranslationLanguage</font>";	
	 }
}
function deleteDialog(){
	if (confirm("You are about to delete one entry.") == true) {
		deleteEntry();
	} 
}
function deleteEntry(){

}