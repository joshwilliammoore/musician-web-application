<!doctype html>
<?php
require_once '../Controller/allPosts.php';
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
            <div class="col-md-10 images">
            <div class="row">
                <div class="col">
                    <h1>Explore</h1>
                </div>
            </div>

        <br>
        <br>
            
                <div id="gridview">
                    <?php foreach ($results as $post): ?>
                        <div class="image">
                            <form method="post" action="../View/image.php">

                                <a href="../View/image.php?post_id=<?= $post->Post_ID ?>"><img src="data:image/png;base64,<?= base64_encode($post->Picture) ?>" name="image" /></a>
                            </form>
                        </div>
                    <?php endforeach ?>

                </div>

            </div>

        </div>
    </body>
</html>

