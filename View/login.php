<!doctype html>
<?php
require_once '../Model/dataAccess.php';
require_once '../Controller/login.php';
?>
<html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <?php include_once '../css/stylesheets.php'; ?>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <title></title>

    </head>

    <?php include_once 'navbar.php'; ?>

    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Login</h1>
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
                            <div class="row mini-box login">Username</div>
                            <div class="row mini-box login"><input type="text" id="login-details" name="username" placeholder="Username"></div>
                            <div class="row mini-box login">Password</div>
                            <div class="row mini-box login"><input type="password" id="login-details" name="password" placeholder="Password"></div>
                            <button class="buttons" id="bbutton" type="submit" name="login" value="LOGIN">LOGIN</button>
                            <a href="../View/signup.php">No account? Sign up</a>
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


