<!doctype html>
<?php
require_once '../Controller/messagingController.php';
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title></title>

    </head>

    <?php include_once 'navbar.php'; ?>

    <body>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Messaging</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php foreach($recipient as $name): ?>
                    <h2><?= $name->Name ?></h2>
                    <h3><?= $name->Username ?></h3>
                    <?php endforeach; ?>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-2">


                </div>

                <div class="messages">
                    
                    <?php foreach ($results as $messages): ?>
                    <?php if($messages->Creator_ID==$_SESSION['userId'])    : ?>   
                    <table class="table table-hover">
                            <tr>
                                <td></td>
                                <td id="table-text"><?= $messages->Message ?><td>
                                <td id="table-caption-from"><a href="../View/profile.php?profile_id=<?= $messages->Creator_ID ?>">
                                                        <img src="data:image/png;base64,<?= base64_encode($messages->Profile_Picture) ?>" 
                                                             id="pic-side" onerror="this.src='../images/profile-pic.png';" /></a></td>
                            </tr>
                            </table>
                    <?php else: ?>
                            <table class="table table-hover">
                            <tr>
                                <td id="table-caption-to"><a href="../View/profile.php?profile_id=<?= $messages->Creator_ID ?>">
                                                        <img src="data:image/png;base64,<?= base64_encode($messages->Profile_Picture) ?>" 
                                                             id="pic-side" onerror="this.src='../images/profile-pic.png';" /></a></td>
                                <td id="table-text"><?= $messages->Message ?><td>
                                <td></td>
                            </tr>
                            </table>
                    <?php endif; ?>
                    <?php endforeach ?>
                    
                </div>

            </div>
            
            <form method="post" action="../View/messaging.php">
            <div class="row">
                <div id="message-box">
                    <textarea type="text" id="message-text-area" name="message" placeholder="Write message."></textarea>
                
                    <input type="hidden" name="recipientId" value="<?=$recipientId?>" />
                    <button type="submit" id="abutton" name="send_message">Send</button>
                </div>
            </div>
            </form>
            
    </body>
</html>


