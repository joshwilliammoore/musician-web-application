<!doctype html>
<?php
require_once '../Controller/postUploadController.php';
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
                    <h4>Make a Post</h4>
                </div>
                
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data">
                    
                        <div class="row mini-box"><textarea name="caption" class="caption" rows='3' placeholder="Caption..."></textarea></div>
                    <div class="row mini-box post">
                        <div class="image-upload post-box">
                            <img src="" id="profile-img-tag" width="500px" />
                        </div>
                    </div>
                    </div>
                <div class="col-md-2">
                    <?php
                        if (isset($message)) {
                            echo '<label>' . $message . '</label>';
                        }
                        ?>
                    <div class="buttons">
                        <input type="file" name="photo" id="profile-img" 
                               accept="image/gif, image/jpeg, image/png">
                    </div>
                    <button class="buttons" id="abutton" name="upload">Post</button>
                    
                    </form>
                </div>

            </div>
    </body>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>
</html>


