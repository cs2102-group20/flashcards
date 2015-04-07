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
$set = get_set($mysqli, $_GET['set']);
$cards = get_cards($mysqli, $_GET['set']);

define('USER_MAY_EDIT', isset($set) && USER_IS_LOGGED_IN && (USER_ID == $set['u_id'] || USER_IS_ADMIN));

if (USER_MAY_EDIT) {
}
?>

  <body>
    <?php require 'navigation.inc.php'; ?>
    <div class="container">
      <form class="cardedit cardedit-disabled" method="post">
        <div class="row">
          <div class="col-xs-6 text-left">
            <a class="btn btn-default cardedit-hidden" href="set?id=<?php echo urlencode($_GET['set']); ?>">Return to Set Overview</a>
          </div>
          <div class="col-xs-6 text-right">
            <button class="btn btn-primary cardedit-hidden" id="card-edit" type="button">Edit</button>
            <button class="btn btn-danger cardedit-hidden" id="card-delete" name="delete" type="submit">Delete</button>
            <button class="btn btn-default cardedit-visible" id="card-cancel" type="button">Cancel</button>
            <button class="btn btn-primary cardedit-visible" name="save" type="submit">Save</button>
          </div>
        </div>
        <div class="jumbotron text-center">
          <h1 class="cardedit-hidden" id="card-word"></h1>
          <input type="hidden" name="card" id="cardedit-id">
          <div class="form-group cardedit-visible">
            <label for="cardedit-word1">Word in <?php echo htmlspecialchars($set['l1_name']); ?></label>
            <input class="form-control" name="word1" id="cardedit-word1" required>
          </div>
          <div class="form-group cardedit-visible">
            <label for="cardedit-word2">Word in <?php echo htmlspecialchars($set['l2_name']); ?></label>
            <input class="form-control" name="word2" id="cardedit-word2" required>
          </div>
          <button class="btn btn-primary cardedit-hidden" id="card-flip" type="button">Flip</button>
        </div>

        <nav>
          <ul class="pager cardedit-hidden">
            <li class="previous" id="card-prev"><a href="#"><span aria-hidden="true">&larr;</span> Previous</a></li>
            <li class="next" id="card-next"><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
          </ul>
        </nav>

        <footer>
          <p>&copy; Company 2014</p>
        </footer>
      </form>
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
