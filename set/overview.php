<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Language Flashcards</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Flashcards custom css -->
    <link href="../css/flashcards.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="initialize(); preloadImages();">
  
	<script type="text/javascript" src="overview.js">
		
	</script>
    <?php require '../navigation.inc.php'; ?>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <form>
            <div class="form-group">
              <label for="filter-title">Filter Cards</label>
              <input id="filter-title" name="title" type="text" class="form-control" placeholder="Words">
            </div>
          </form>
        </div>


        <div class="col-md-9">
			<div  class="right_inline"> 
			<button class="btn btn-default" id="editBtn" type="button" style="background-color:#FFFFFF" onclick="editSta=1-editSta;editSet();">Edit</button>
		   </div>
			<div id="titleDiv">title</div><br />
			<div id="descriptionDiv">Description</div> <br />

          <table border="0">
		      <tr>
				<td align="center"  width="300" id='langWordCell'>
              <font size='2'>Word language:</font>
              <font size='2'>getWordLanguage</font>			  
				</td>
				<td align="center"  width="600" id='langTranslationCell'>
              <font size='2'>Translation language:</font>
              <font size='2'>getTranslationLanguage</font>		
				</td>
				<td align="center" width="30">&nbsp;</td>
            </tr>
            <tr>
				<td align="center">
              <p>word</p>
				</td>
				<td align="center"  width="600">
              <p>Translation</p>
				</td>
				<td class="deleteSign" align="center">&nbsp;</td>
            </tr>
            <tr>
				<td align="center">
              <p>word</p>
				</td>
				<td align="center"  width="600">
              <p>Translation</p>
				</td>
				<td class="deleteSign" align="center">&nbsp;</td>
            </tr>
            <tr>
				<td align="center">
              <p>word</p>
				</td>
				<td align="center"  width="600">
              <p>Translation</p>
				</td>
				<td class="deleteSign" align="center">&nbsp;</td>
            </tr>
          </table>

          <nav>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li>
                <a href="#" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>

        </div>
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
