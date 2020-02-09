<!doctype html>
<?php include_once '../css/stylesheets.php';
         require_once '../Model/dataAccess.php';
         require_once '../Controller/signup.php';
        
?>
<html lang="en">
    
  <head>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php include_once '../css/stylesheets.php'; ?>
    <title></title>
    
    </head>
    
      <?php include_once 'navbar.php'; ?>
    
  <body>
      <?php
        if(isset($message)){
            echo '<label>'.$message.'</label>';
        }
    ?>
      <br><br>
  <div class="container">
  <div class="row">
    <div class="col">
      <h4>Login</h4>
    </div>
    <div class="col">
      
    </div>
    <div class="col">
      
    </div>
    <div class="col">
      
    </div>
  </div>
      <br><br>
  <div class="row">
    <div class="col-md-3">
      
    </div>
      
    <div class="col-md-6">
        <div class="login-box">
            <form method="post">
            <div class="row mini-box login">Email Address</div>
            <div class="row mini-box login"><input type="text" id="login-details" name="email" value="Email"></div>
            <div class="row mini-box login">Username</div>
            <div class="row mini-box login"><input type="text" id="login-details" name="username" value="Username"></div>
            <div class="row mini-box login">Name</div>
            <div class="row mini-box login"><input type="text" id="login-details" name="name" value="Name"></div>
            <div class="row mini-box login">Password</div>
            <div class="row mini-box login"><input type="text" id="login-details" name="password" value="Password"></div>
            <button class="login" id="bbutton" type="submit" name="signup" value="SIGN UP">SIGN UP</button>
            </form>

        </div>
</div>

    <div class="col-md-3 account-button">
    </div>
  </div>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>
</html>


