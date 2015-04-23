<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>What's Gouda?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="./css/bootswatch.min.css">
    <link rel="stylesheet" href="./css/selectize.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
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
<?php
              if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
              {
?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User quick links<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="./addRecipe.php">Create A New Recipe</a></li>
                      <li><a href="./addIngredient.php">Add Ingredients to Basket</a></li>
                      <li class="divider"></li>
                      <li><a href="./controlPanel.php">Your Profile</a></li>
                    </ul>
                  </li>
<?php
              }
?>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
              {
                  echo "<li><a href='./controlPanel.php'>Hi " . $_SESSION['username'] . "!</a></li>";
                  echo '<li><a href="./logout.php">Logout</a></li>';  
              }
              else
              {
                  echo '<li><a href="./login.php">Login</a></li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/bootswatch.js"></script>
    <script type="text/javascript">
      /* <![CDATA[ */
      (function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&a.indexOf("/cdn-cgi/l/email-protection") > -1  && (a.length > 28)){s='';j=27+ 1 + a.indexOf("/cdn-cgi/l/email-protection");if (a.length > j) {r=parseInt(a.substr(j,2),16);for(j+=2;a.length>j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);}t.innerHTML=s.replace(/</g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
      /* ]]> */
    </script>

    <div class="container">
    </br>
