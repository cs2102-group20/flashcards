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
	<?php
	$languages = get_languages($mysqli);
	foreach ($languages as $key => $value) {
	  $languages[$key]['selected'] = !isset($_GET['languages']) || in_array($value['id'], $_GET['languages']);
	}
	?>
  </head>

  <body onload="initialize(); preloadImages(); createRows();">
   <?php require 'navigation.inc.php'; ?>

  	<script type="text/javascript" src="createSet.js">

	</script>
  
    <div class="container">

	  <div class="jumbotron_colored" align="center" >
		<noscript>
			<style type="text/css">
				.createSetForm {display:none;}
			</style>
			<div class="noscriptmsg">
			<font size="6">Oops...Seems you don't have JavaScript enabled. </font><br />
			<font size="4" >This page requires JavaScript. </font><br />
			<font size="4" >Please enable it before you proceed.</font><br />
			</div>
		</noscript>
		<form class="createSetForm">
		Title<br />
		<input type="text" id="title" title="Leading or trailing white spaces are trimmed. Extra whitespaces in the middle will be replaced by one space.The title should comprise 1-50 characters." class="createCardTA" maxlength="50" required onchange="this.value=this.value.replace(/(\r\n|\n|\r)/gm,' ').replace(/ +(?= )/g,'').replace(/^\s+|\s+$/g,'');" >
		<br /><br />
		Description <br />
		<textarea title="Optional. The description should comprise 1-200 characters."id="description" class="createCardTA" rows='3' cols='100' maxlength="200"></textarea>
		<br />		
		<br />
			<table id="cardTable">
				
			</table>
			<input type="image" src="images/addBtn.png" style="width: 30px; height: 30px" onclick="addEntry();return false;"/> 
			<br /><br />
			<button type="submit" class="btn btn-success" >Create</button>
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
