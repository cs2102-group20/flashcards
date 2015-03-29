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

function search_sets($mysqli, $title, $description, $creator, $languages) {
  // guaranteed to be a subset of integers, should be safe to interpolate into the query
  $language_ids = implode(',', array_map(function ($language) { return ($language['selected']) ? $language['id'] : 'null'; }, $languages));
  $query = 'SELECT s.id, s.title, s.description, l1.name, l2.name, u.username FROM card_sets s, languages l1, languages l2, users u '
    . 'WHERE s.user_id = u.id AND s.language1_id = l1.id AND s.language2_id = l2.id '
    . 'AND s.title LIKE CONCAT("%",?,"%") AND s.description LIKE CONCAT("%",?,"%") '
    . 'AND (COALESCE(?, "") = "" OR u.username = ?) AND l1.name IN (' . $language_ids . ') AND l2.name in (' . $language_ids . ');';

  if ($stmt = $mysqli->prepare($query)) {
    $stmt->bind_param("ssss", $title, $description, $creator, $creator);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  } else {
    echo 'Unable to fetch search results.';
  }

}

$search_results = search_sets($mysqli, $_GET['title'], $_GET['description'], $_GET['creator'], $languages);
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
          <h2>Results (<?php echo count($search_results); ?>)</h2>

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
