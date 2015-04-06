<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=".">Language Flashcards</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="browse">Browse</a></li>
        <?php if (USER_IS_LOGGED_IN) { ?>
          <li><a href="createSet">Create</a></li>
          <li><a href="favorites">Favorites</a></li>
        <?php } else { ?>
          <li><a href="register">Register</a></li>
        <?php } ?>
      </ul>
      <?php if (USER_IS_LOGGED_IN) { ?>
        <form class="navbar-form navbar-right" method="post">
          <button name="logout" type="submit" class="btn btn-default">Sign out</button>
        </form>
        <p class="navbar-text navbar-right">Signed in as
          <a href="browse?creator=<?php echo urlencode(USER_NAME); ?>"><?php echo htmlspecialchars(USER_NAME); ?></a>
        </p>
      <?php } else { ?>
        <form class="navbar-form navbar-right" method="post">
          <div class="form-group">
            <input name="user" type="text" placeholder="Username" class="form-control">
          </div>
          <div class="form-group">
            <input name="pass" type="password" placeholder="Password" class="form-control">
          </div>
          <button name="login" type="submit" class="btn btn-success">Sign in</button>
        </form>
      <?php } ?>
    </div><!--/.navbar-collapse -->
  </div>
</nav>