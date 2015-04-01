<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>What's Gouda?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="./css/bootswatch.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]--> 
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav-bar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">What's Gouda?</a>
        </div>

        <div class="collapse navbar-collapse" id="top-nav-bar">
          <ul class="nav navbar-nav">
            <li><a href="./searchRecipe.php">Search Recipes</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">

    <?php
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
    {
         ?>
        <li><a href="./logout.php">Logout</a></li>   
        <?php
    }
    else
    {
        ?>
         <li><a href="./login.php">Login</a></li> 
       <?php
    }
    ?>

          </ul>

          <form class="navbar-form navbar-right" role="search" action="searchResult.php" method="POST">
            <div class="form-group">
              <input type="text" name="searchterm" class="form-control" placeholder="Search Recipes">
            </div>
          </form>
        </div>
      </div>
    </nav>
