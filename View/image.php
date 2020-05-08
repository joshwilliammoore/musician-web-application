<!doctype html>
<?php
require_once '../Controller/imageController.php';
require_once '../Model/dataAccess.php';
require_once '../Model/Posts.php';
require_once '../Model/Users.php';
?>
<html lang="en">
    <head>
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
            <div class="col-md-10">
                <div class="row">
                    <div>
                        <h1>Post</h1>
                    </div>  
                </div>
            </div>
                <br><br>
                <div class="content">
                    <div class="col-container post-image">
                        <?php foreach ($results as $pics): ?>
                            <div class="photo column">
                                <img src="data:image/png;base64,<?= base64_encode($pics->Picture) ?>" />
                            </div>
                        
                            <div class="comments table column">
                                <?= $pics->Caption ?>
                                <form method="post" action="../View/image.php">
                                    <div>
                                    <?php foreach ($comments as $comment): ?>
                                        <table>
                                            <tr>
                                                <td><a href="../View/profile.php?profile_id=<?= $comment->User_ID ?>">
                                                        <img src="data:image/png;base64,<?= base64_encode($comment->Profile_Picture) ?>" 
                                                             id="pic-side" onerror="this.src='../images/profile-pic.png';" /></a></td>
                                                <td><div><p class="comment"><?= $comment->Comment ?></p></td>
                                            </tr>
                                        </table>
                                    <?php endforeach; ?>
                                    </div>
                                    <div>
                                    <?php if (isset($_SESSION['userId'])): ?>
                                        <textarea name="comment" placeholder="Write comment..."></textarea>
                                        <input type="hidden" name="pId" value="<?= $postId->Post_ID ?>" />
                                        <button type="submit" name="send_comment">Send</button>
                                    <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            
        </div>
    </body>
</html>


