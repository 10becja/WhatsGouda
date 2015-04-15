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
            echo "<p>Sorry, your account could not be found. Please <a href=\"login.php\">click here to try again</a>.</p>";
        }
    }
    else
    {
?>
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">Member Login:</h1>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-6"> 
            <div class="well"> 
              <p>Thanks for visiting! Please either login below, or <a href="signup.php">click here to register</a>.</p>
              <form class="form-horizontal" method="post" action="login.php" name="loginform" id="loginform">
                <fieldset>
                  <!-- USERNAME -->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" name="username" id="username" placeholder="Username" />
                    </div>
                  </div>
                  <!-- PASSWORD -->
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" class="form-control" name="password" id="password" />
                    </div>
                  </div>
                  <!-- BUTTON -->
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <input type="submit" class="btn btn-primary" name="login" id="login" value="Login" />
                    </div>
                  </div>
                </fieldset>
              </form>
            </div> 
          </div>
        </div>
         
<?php
    }
?>
    </div>
  </body>
</html>