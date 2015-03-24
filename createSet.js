		//Preloading images	
		function preloadImages(){
			fileNames = [
			];
			for (i=0;i<fileNames.length;i++) { var p=new Image(); p.src=fileNames[i];}
		}
		//webpage display logic
		function createRows(rowNum){
			var tmp="";
			tmp+=""
			for(var i=1;i<=rowNum;i++){
				tmp+="<tr height='60' ><td width='50' align='center'>"+i+"</td><td width='300' align='center'><textarea rows='1' cols='40' class='createCardTA' id='word"+i+"'></textarea></td>"
				+"<td width='500' align='center'><textarea rows='1' cols='70' class='createCardTA' id='translation"+i+"'></textarea></td>"+"</tr>";
			}
			document.getElementById("cardTable").innerHTML=tmp;
		}