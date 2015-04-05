<!DOCTYPE html>
<?php require_once '../common.inc.php'; ?>
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

<?php
$languages = get_languages($mysqli);
$set = get_set($mysqli, $_GET['id']);
$cards = get_cards($mysqli, $_GET['id']);
?>

  <body>
    <?php require '../navigation.inc.php'; ?>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h2>Filter Cards</h2>
          <div class="form-group">
            <label for="filter-title">Word</label>
            <input id="filter-title" name="title" type="text" class="form-control" placeholder="Word">
          </div>
        </div>


        <div class="col-md-9">
          <form class="setedit setedit-disabled" method="post">
            <div class="pull-right">
              <button class="btn btn-default setedit-hidden" id="setedit-edit" type="button">Edit</button>
              <button class="btn btn-danger setedit-hidden" name="delete" type="submit">Delete</button>
              <a class="btn btn-default setedit-visible" href="?id=<?php echo $_GET['id']; ?>">Cancel</a>
              <button class="btn btn-primary setedit-visible" name="save" type="submit">Save</button>
            </div>
            <input class="setedit-field h2" id="setedit-title" name="title" readonly placeholder="Title" value="<?php echo htmlspecialchars($set['s.title']); ?>" required>
            <textarea class="setedit-field lead" id="setedit-description" name="description" readonly rows="3"><?php echo htmlspecialchars($set['s.description']); ?></textarea>

            <table class="table" id="setedit-words">
              <tr>
                <th>
                  <span class="setedit-hidden">Word in <?php echo htmlspecialchars($set['l1.name']); ?></span>
                  <select name="language1" class="setedit-field setedit-visible">
                    <?php foreach ($languages as $language) { ?>
                      <option value="<?php echo $language['id']; ?>" <?php if ($language['id'] == $set['l1.id']) echo 'selected'; ?>><?php echo htmlspecialchars($language['name']); ?></option>
                    <?php } ?>
                  </select>
                </th>
                <th>
                  <span class="setedit-hidden">Word in <?php echo htmlspecialchars($set['l2.name']); ?></span>
                  <select name="language2" class="setedit-field setedit-visible">
                    <?php foreach ($languages as $language) { ?>
                      <option value="<?php echo $language['id']; ?>" <?php if ($language['id'] == $set['l2.id']) echo 'selected'; ?>><?php echo htmlspecialchars($language['name']); ?></option>
                    <?php } ?>
                  </select>
                </th>
                <th></th>
              </tr>
              <?php foreach ($cards as $card) { ?>
                <tr>
                  <td>
                    <input class="setedit-field" name="word1[]" readonly value="<?php echo htmlspecialchars($card['word1']); ?>" required>
                  </td>
                  <td>
                    <input class="setedit-field" name="word2[]" readonly value="<?php echo htmlspecialchars($card['word2']); ?>" required>
                  </td>
                  <td><button class="close setedit-visible setedit-delete" type="button" aria-label="Delete"><span aria-hidden="true">&times;</span></button></td>
                </tr>
              <?php } ?>
              <tr>
                <td>
                  <input class="setedit-field" name="word1[]" readonly value="">
                </td>
                <td>
                  <input class="setedit-field" name="word2[]" readonly value="">
                </td>
                <td><button class="close setedit-visible setedit-delete" type="button" aria-label="Delete"><span aria-hidden="true">&times;</span></button></td>
              </tr>
            </table>
          </form>
        </div>
      </div>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="overview.js" defer></script>
  </body>
</html>
