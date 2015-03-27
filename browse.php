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
foreach ($languages as $key => $value) {
  $languages[$key]['selected'] = !isset($_GET['languages']) || in_array($value['id'], $_GET['languages']);
}
?>

  <body>
    <?php require 'navigation.inc.php'; ?>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h2>Filter</h2>
          <form>
            <div class="form-group">
              <label for="filter-title">Title</label>
              <input id="filter-title" name="title" type="text" class="form-control" placeholder="Partial title" value="<?php echo $_GET['title']; ?>">
            </div>
            <div class="form-group">
              <label for="filter-description">Description</label>
              <input id="filter-description" name="description" type="text" class="form-control" placeholder="Partial description" value="<?php echo $_GET['description']; ?>">
            </div>
            <div class="form-group">
              <label for="filter-creator">Creator</label>
              <input id="filter-creator" name="creator" type="text" class="form-control" placeholder="Username" value="<?php echo $_GET['creator']; ?>">
            </div>
            <div class="form-group">
              <label for="filter-languages">Languages</label>
              <select id="filter-languages" name="languages[]" multiple class="form-control">
                <?php foreach ($languages as $language) { ?>
                  <option value="<?php echo $language['id']; ?>" <?php if ($language['selected']) echo 'selected'; ?>><?php echo $language['name']; ?></option>
                <?php } ?>
              </select>
            </div>
            <button class="btn btn-default" name="filter" type="submit">Apply</button>
          </form>
        </div>


        <div class="col-md-9">
          <h2>Results</h2>

          <ul class="list-group">
            <li class="list-group-item">
              <h4>Set Title</h4>
              <p>By username</p>
              <p>Set description</p>
            </li>
            <li class="list-group-item">
              <h4>Set Title</h4>
              <p>By username</p>
              <p>Set description</p>
            </li>
            <li class="list-group-item">
              <h4>Set Title</h4>
              <p>By username</p>
              <p>Set description</p>
            </li>
          </ul>

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
