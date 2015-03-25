<!DOCTYPE html>
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

  <body onload="preloadImages();">

  	<script type="text/javascript">
		//Preloading images	
		function preloadImages(){
			fileNames = [
			];
			for (i=0;i<fileNames.length;i++) { var p=new Image(); p.src=fileNames[i];}
		}
		//webpage display logic
		function validateEmail(){
			//RFC5322 standard
			var tmp=document.getElementById("email").value;
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;  //reference: http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
			if(re.test(tmp))document.getElementById("emailMsg").innerHTML="&nbsp;";
			else document.getElementById("emailMsg").innerHTML="<font size='2' color='red'>Invalid. Please try again</font>";
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
					}
				}
				if(pwOkay)document.getElementById("pwMsg").innerHTML="&nbsp;";
			}
		}
		function validateConfirmPw(){
			if((document.getElementById("pwConfirm").value)!=(document.getElementById("pw").value)) {
				document.getElementById("confirmPwMsg").innerHTML="<font size='2' color='red'>The passwords do not match. Please try again</font>";
			}else{
				document.getElementById("confirmPwMsg").innerHTML="&nbsp;";
			}
		}
	</script>
  
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Language Flashcards</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Example row of columns -->
	  <div class="jumbotron" align="center" >
	  <form>
      <div class="smallContainer">
			<h2>Register</h2>
        
            <div  class="regForm">
					Email: 
					<input type="text" placeholder="Email" class="form-control" id="email" onchange="validateEmail();">
            </div>
				<div id="emailMsg">&nbsp;
				</div>
				<br />
            <div  class="regForm">
					Password: <br />
					<font size='1'>The password should comprise 8-20 characters, including capital or lowercase letters and digits. Special characters or spaces are not accepted.</font><br />
              <input type="password" placeholder="Password" class="form-control" id="pw" onchange="validatePw();">
            </div>

				<div id="pwMsg">&nbsp;
				</div>
				<br>
            <div  class="regForm">
			Confirm password:
              <input type="password" placeholder="Password" class="form-control" id="pwConfirm" onchange="validateConfirmPw();">
            </div>			

			<div id="confirmPwMsg">&nbsp;
			</div>
      </div>
	  <br />
     <button type="submit" class="btn btn-success">Register!</button>
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