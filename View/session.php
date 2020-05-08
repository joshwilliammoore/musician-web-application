<!doctype html>
<?php
require_once '../Controller/sessionController.php';
require_once '../Model/dataAccess.php';
require_once '../Model/Posts.php';
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

    <?php include_once 'navbar.php'; ?>

    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><?php if($type->Type=='Session'): ?>Session Musicians 
                        <?php elseif ($type->Type=='Artist'): ?> Artists 
                        <?php elseif ($type->Type=='Studio'): ?> Studios 
                        <?php elseif ($type->Type=='Venues'): ?> Venues 
                        <?php endif; ?></h1>
                </div>
            </div>
        </div>
        <div class="col-md-8 images">
            <div id="gridview">
                <?php foreach ($results as $details): ?>

                    <div class="account">
                        <img src="data:image/png;base64,<?= base64_encode($details->Profile_Picture) ?>" alt="profile-pic" id="profile-pic" onerror="this.src='../images/profile-pic.png';"/>
                        <h8><?= $details->Name ?></h8>
                        <p><?= $details->Username ?></p>
                        <form method="post" action="../View/profile.php?profile_id=<?= $details->User_ID ?>">
                            <input type="hidden" name="profileId" value="<?= $details->User_ID ?>" />
                            <input class="buttons" id="abutton" type="submit" name="view" value="View">
                        </form>

                    </div>

                <?php endforeach ?>
            </div>
        </div>
    </body>
</html>

