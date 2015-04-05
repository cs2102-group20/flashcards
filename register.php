<!DOCTYPE html>
<?php require_once 'common.inc.php'; ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Language Flashcards</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Flashcards custom css -->
    <link href="css/flashcards.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  
  <body onload="initialize(); preloadImages();">

  	<script type="text/javascript">
		//initialization
		function initialize(){
			var validUn=false;
			var validPw=false;
			var validConfirmPw=false;
		}
		//Preloading images	
		function preloadImages(){
			fileNames = [
			];
			for (i=0;i<fileNames.length;i++) { var p=new Image(); p.src=fileNames[i];}
		}
		//webpage display logic
		/*
		function validateEmail(){
			var tmp=document.getElementById("email").value;
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  //reference: http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
			if(re.test(tmp)){
				document.getElementById("emailMsg").innerHTML="&nbsp;";
				validEmail=true;
			}
			else {
				document.getElementById("emailMsg").innerHTML="<font size='2' color='red'>Invalid. Please try again</font>";
				validEmail=false;
			}
		}
		*/
		/*
		function validateUsername(){
			var tmp=document.getElementById("username").value;
			if(tmp.length<1 || tmp.length>20){
				document.getElementById("usernameMsg").innerHTML="<font size='2' color='red'>The username should comprise 1-20 characters. Please try again</font>";
			}
			else{
				var unOkay=true;
				for (var i=0;i<tmp.length && unOkay;i++){
					if( tmp.charCodeAt(i) < 48 || (tmp.charCodeAt(i) > 57 && tmp.charCodeAt(i) < 65) || (tmp.charCodeAt(i) >90 && tmp.charCodeAt(i) < 97) || tmp.charCodeAt(i) >122){
						document.getElementById("usernameMsg").innerHTML="<font size='2' color='red'>The username should not contain special characters or spaces. Please try again</font>";
						unOkay=false;
						validUn=false;
					}
				}
				if(unOkay){
					document.getElementById("usernameMsg").innerHTML="&nbsp;";
					validUn=true;
				}
			}
		
		}
		function validatePw(){
			var tmp=document.getElementById("pw").value;
			if(tmp.length<8 || tmp.length>20){
				document.getElementById("pwMsg").innerHTML="<font size='2' color='red'>The password should comprise 8-20 characters. Please try again</font>";
			}
			else{
				var pwOkay=true;
				for (var i=0;i<tmp.length && pwOkay;i++){
					if( tmp.charCodeAt(i) < 48 || (tmp.charCodeAt(i) > 57 && tmp.charCodeAt(i) < 65) || (tmp.charCodeAt(i) >90 && tmp.charCodeAt(i) < 97) || tmp.charCodeAt(i) >122){
						document.getElementById("pwMsg").innerHTML="<font size='2' color='red'>The password should not contain special characters or spaces. Please try again</font>";
						pwOkay=false;
						validPw=false;
					}
				}
				if(pwOkay){
					document.getElementById("pwMsg").innerHTML="&nbsp;";
					validPw=true;
				}
			}
		}
		function validateConfirmPw(){
			if((document.getElementById("pwConfirm").value)!=(document.getElementById("pw").value)) {
				document.getElementById("confirmPwMsg").innerHTML="<font size='2' color='red'>The passwords do not match. Please try again</font>";
				validConfirmPw=false;
			}else{
				document.getElementById("confirmPwMsg").innerHTML="&nbsp;";
				validConfirmPw=true;
			}
		}
	*/
	</script>
  
    <?php require 'navigation.inc.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
	  <div class="jumbotron" align="center" >
	  <form method="post" action="registerForm.php">
      <div class="smallContainer">
			<h2>Register</h2>
        
            <div  class="regForm">
<!--					Email: 
					<input type="text" placeholder="Email" class="form-control" id="email" onchange="validateEmail();"> -->
					Username:
					<input type="text" placeholder="Username" class="form-control" id="username" name="username" required pattern="\w+" />
            </div>
				<!-- <div id="usernameMsg">&nbsp;
				</div> -->
				<br />
            <div  class="regForm">
					Password: <br />
					<br />
              <input type="password" title="Password must contain 8-20 characters, including UPPER and lowercase letters and numbers" placeholder="Password" class="form-control" id="pw" name="pw" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');  if(this.checkValidity()) form.pwConfirm.pattern = this.value;" />
            </div>

			<!--	<div id="pwMsg">&nbsp;
				</div>-->
				<br>
            <div  class="regForm">
			Confirm password:
              <input type="password" title="Please enter the same Password as above" placeholder="Password" class="form-control" id="pwConfirm" name="pwConfirm" onchange="validateConfirmPw();" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" onchange=" this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" />
            </div>			

		<!--	<div id="confirmPwMsg">&nbsp;
			</div> -->
      </div>
	  <br />
     <button type="submit" class="btn btn-success" >Register!</button>
	  </form>
    </div>
		
      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
