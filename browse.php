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
          <form class="navbar-form navbar-right" method="post">
            <div class="form-group">
              <input name="user" type="text" placeholder="Username" class="form-control">
            </div>
            <div class="form-group">
              <input name="pass" type="password" placeholder="Password" class="form-control">
            </div>
            <button name="login" type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
          <h2>Filter</h2>
          <form>
            <div class="form-group">
              <label for="filter-title">Title</label>
              <input id="filter-title" name="title" type="text" class="form-control" placeholder="Keywords">
            </div>
            <div class="form-group">
              <label for="filter-description">Description</label>
              <input id="filter-description" name="description" type="text" class="form-control" placeholder="Keywords">
            </div>
            <div class="form-group">
              <label for="filter-creator">Creator</label>
              <input id="filter-creator" name="creator" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <label for="filter-languages">Languages</label>
              <select id="filter-languages" name="languages" multiple class="form-control">
                <option selected>Language A</option>
                <option selected>Language B</option>
                <option selected>Language C</option>
                <option selected>Language D</option>
                <option selected>Language E</option>
                <option selected>Language F</option>
                <option selected>Language G</option>
              </select>
            </div>
            <button class="btn btn-default" name="filter" type="submit">Apply</button>
          </form>
        </div>


        <div class="col-md-10">
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
