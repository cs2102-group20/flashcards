<!DOCTYPE html>
<?php require_once 'common.inc.php'; ?>

<?php session_start();$_SESSION['previous'] = basename($_SERVER['registerForm']); ?>
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
	</script>
  
    <?php require 'navigation.inc.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
	  <div class="jumbotron" align="center" >
      <div class="smallContainer">
			The username has existed already!
			<br /><br />
			<a href='register.php'>Please try registering again with another username.</a>
      </div>
	  <br />
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

