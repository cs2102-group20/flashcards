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

  <body>
    <?php require 'navigation.inc.php'; ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to Language Flashcards!</h1>
        <p>Registered users have created many flashcard sets for practicing languages.</p>
        <p><a class="btn btn-primary btn-lg" href="browse" role="button">Browse flashcards &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <h2>Want to make your own?</h2>
          <?php if (USER_IS_LOGGED_IN) { ?>
            <p>This website wouldn't be possible without the efforts of our users, who also happen to be the developers. You too, can join them, for only a low fee of $599/month!</p>
            <p><a class="btn btn-default" href="register" role="button">Register &raquo;</a></p>
          <?php } else { ?>
            <p>This website wouldn't be possible without the efforts of our users, who also happen to be the developers. Please help by creating your own flashcard sets!</p>
            <p><a class="btn btn-default" href="create" role="button">Create &raquo;</a></p>
          <?php } ?>
        </div>
        <div class="col-md-6">
          <h2>Don't know what to practice?</h2>
          <p>Sometimes you just want to learn <em>something</em>, but you have no idea what. This button's for you.</p>
          <p><a class="btn btn-default" href="random" role="button">Random flashcards &raquo;</a></p>
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
