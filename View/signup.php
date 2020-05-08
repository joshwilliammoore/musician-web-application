<!doctype html>
<?php
require_once '../Controller/signup.php';
?>
<html lang="en">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><meta name='viewport' content='width=device-width, initial-scale=1'>
        <?php include_once '../css/stylesheets.php'; ?>
        <title>Sign-Up</title>
    </head>
    <?php include_once 'navbar.php'; ?>
    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Sign Up</h1>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="signup-box">
                        <?php
                        if (isset($message)) {
                            echo '<label>' . $message . '</label>';
                        }
                        ?>
                        <form method="post">
                            <div class="row mini-box login">Email Address</div>
                            <div class="row mini-box login">
                                <input type="text" id="login-details" name="email" placeholder="Email"></div>
                            <div class="row mini-box login">Username</div>
                            <div class="row mini-box login">
                                <input type="text" id="login-details" name="username" placeholder="Username"></div>
                            <div class="row mini-box login">Name</div>
                            <div class="row mini-box login">
                                <input type="text" id="login-details" name="name" placeholder="Name"></div>
                            <div class="row mini-box login">Password</div>
                            <div class="row mini-box login">
                                <input type="password" id="login-details" name="password" placeholder="Password"></div>
                            <button class="login" id="bbutton" type="submit" name="signup" value="SIGN UP">SIGN UP</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3 account-button">
                </div>
            </div>
        </div>
    </body>
</html>


