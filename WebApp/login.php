<?php include "./backEnd/base.php"; ?>
  <?php include "navbar.php"; ?>

    <?php
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username']))
    {
         ?>
     
         <h1>Member Area</h1>
         <pThanks for logging in! You are <code><?=$_SESSION['username']?></code> and your email address is <code><?=$_SESSION['email']?></code>.</p>
         <a href="logout.php">Logout</a>
          
         <?php
    }
    elseif(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
         
        $checklogin = mysql_query("SELECT * FROM User WHERE username = '".$username."' AND password = '".$password."'");
         
        if(mysql_num_rows($checklogin) == 1)
        {
            $row = mysql_fetch_array($checklogin);
            $email = $row['email'];
             
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['LoggedIn'] = 1;
             
            echo "<h1>Success</h1>";
            echo "<p>We are now redirecting you to the member area.</p>";
            echo '<meta http-equiv="refresh" content="2;/">';
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
        }
    }
    else
    {
        ?>
         
       <h1>Member Login</h1>
         
       <p>Thanks for visiting! Please either login below, or <a href="signup.php">click here to register</a>.</p>
         
        <form method="post" action="login.php" name="loginform" id="loginform">
        <fieldset>
            <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
            <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
            <input type="submit" name="login" id="login" value="Login" />
        </fieldset>
        </form>
         
       <?php
    }
    ?>
     
    </div>
  </body>
</html>