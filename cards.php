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

<?php
$languages = get_languages($mysqli);
$cards = get_cards($mysqli, $_GET['set']);
?>

  <body>
    <?php require 'navigation.inc.php'; ?>
    <div class="container">
      <a class="btn btn-default" href="set?id=<?php echo urlencode($_GET['set']); ?>">Return to Set Overview</a>
      <div class="jumbotron text-center">
        <h1 id="card-word"></h1>
        <button class="btn btn-primary" id="card-flip" type="button">Flip</button>
      </div>

      <nav>
        <ul class="pager">
          <li class="previous" id="card-prev"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
          <li class="next" id="card-next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
        </ul>
      </nav>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>var cards = <?php echo json_encode($cards); ?>;</script>
    <script src="cards.js" defer></script>
  </body>
</html>
