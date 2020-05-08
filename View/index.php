<!DOCTYPE html>
<?php
require_once '../Controller/indexController.php';
require_once '../Model/Users.php';
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

    <?php include_once 'navbar.php';
    include_once 'sidebar.php'; ?>

    <div id="main">
        <div class="right">
            <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; </span>
        </div>
        <body>


            <div class="container">
                <div class="col-md-10 images">
                <div class="row">
                    <div class="col">
                        <h1>Index</h1>
                    </div>
                </div>

             
            <br><br>

                <div class="row">
                    <div class="col">
                        <h2>Session Musicians</h2>
                    </div>
                </div>
                <div id="gridview">
<?php foreach ($sm as $details): ?>

                        <div class="account">
                            <img src="data:image/png;base64,<?= base64_encode($details->Profile_Picture) ?>" alt="profile-pic" id="pp" onerror="this.src='../images/profile-pic.png';"/>
                            <h8><?= $details->Name ?></h8>
                            <p><?= $details->Username ?></p>
                            <form method="post" action="../View/profile.php">
                                <a href="../View/profile.php?profile_id=<?= $details->User_ID ?>"><input class="buttons" id="abutton" type="button" name="view" value="View"></a>
                            </form>

                        </div>

<?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Artists</h2>
                    </div>
                </div>
                <div id="gridview">
<?php foreach ($a as $details): ?>

                        <div class="account">
                            <img src="data:image/png;base64,<?= base64_encode($details->Profile_Picture) ?>" alt="profile-pic" id="pp" onerror="this.src='../images/profile-pic.png';"/>
                            <h8><?= $details->Name ?></h8>
                            <p><?= $details->Username ?></p>
                            <form method="post" action="../View/profile.php">
                                <a href="../View/profile.php?profile_id=<?= $details->User_ID ?>"><input class="buttons" id="abutton" type="button" name="view" value="View"></a>
                            </form>

                        </div>

<?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Studios</h2>
                    </div>
                </div>
                <div id="gridview">
<?php foreach ($rs as $details): ?>

                        <div class="account">
                            <img src="data:image/png;base64,<?= base64_encode($details->Profile_Picture) ?>" alt="profile-pic" id="pp" onerror="this.src='../images/profile-pic.png';"/>
                            <h8><?= $details->Name ?></h8>
                            <p><?= $details->Username ?></p>
                            <form method="post" action="../View/profile.php">
                                <a href="../View/profile.php?profile_id=<?= $details->User_ID ?>"><input class="buttons" id="abutton" type="button" name="view" value="View"></a>
                            </form>

                        </div>

<?php endforeach ?>
                </div>
                <div class="row">
                    <div class="col">
                        <h2>Venues</h2>
                    </div>
                </div>
                <div id="gridview">
<?php foreach ($v as $details): ?>

                        <div class="account">
                            <img src="data:image/png;base64,<?= base64_encode($details->Profile_Picture) ?>" alt="profile-pic" id="pp" onerror="this.src='../images/profile-pic.png';"/>
                            <h8><?= $details->Name ?></h8>
                            <p><?= $details->Username ?></p>
                            <form method="post" action="../View/profile.php">
                                <a href="../View/profile.php?profile_id=<?= $details->User_ID ?>"><input class="buttons" id="abutton" type="button" name="view" value="View"></a>
                            </form>

                        </div>

<?php endforeach ?>
                </div>

                </div>
            </div> 
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        </body>
    </div>
</html>

