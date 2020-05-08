<!doctype html>
<?php
require_once '../Controller/editDetails.php';
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
        <?php foreach ($results as $all): ?>
            <div class="container">
                <div class="col-md-10">
                <div class="row">
                    <div class="col">
                        <h1>Edit</h1>
                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                </div>
                <br><br>
                <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3 image-cropper">
                        <a><img src="data:image/png;base64,<?= base64_encode($all->Profile_Picture) ?>" alt="profile-pic" id="profile-pic" onerror="this.src='../images/profile-pic.png';"/></a>
                        <input type="file" name="image" id="profile-img" accept="image/gif, image/jpeg, image/png">
                    </div>

                    <div class="col-md-6">
                        <div class="row mini-box">
                        </div>
                        <div class="row mini-box">
                            <div class="col mini-box">
                                <label for="type">Choose a Account Type:</label>

                                <select id="type" value="<?= $all->Type ?>" name="type">
                                  <option value="Session">Session Musician</option>
                                  <option value="Artist">Artist</option>
                                  <option value="Studio">Studio</option>
                                  <option value="Venues">Venue</option>
                                </select>
                            </div>
                            <div class="col mini-box">
                                Instrument/Business:
                                <input type="text" value="<?= $all->Occupation ?>" name="occupation"/>
                            </div>
                        </div>

                        <div class="row mini-box">
                            Biography:
                            <textarea class="bio" rows='3' name="bio"><?= $all->Biography ?></textarea>
                        </div>

                    </div>
                    <div class="col-md-1">
                        
                    </div>

                </div>
                <br>
                <div class="row">

                    <div class="col mini-box">
                        Name:
                        <input type="text" value="<?= $all->Name ?>" name="name"/>
                    </div>
                    <div class="col mini-box">
                        Password:
                        <input type="text" placeholder="Enter Password" name="password"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col mini-box">
                        Username:
                        <input type="text" value="<?= $all->Username ?>" name="username"/>
                    </div>
                    <div class="col mini-box">
                        Change Password:
                        <input type="text" placeholder="Change Password" name="newPass"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col mini-box">
                        Email:
                        <input type="text" value="<?= $all->Email_Address ?>" name="email"/>
                    </div>
                    <div class="col mini-box">
                        Re-Enter Password:
                        <input type="text" placeholder="Re-Enter New Password" name="newPassAgain"/>
                    </div>
                </div>
                
                
                <div class="col-md-2 account-button">
                    <div class="row">
                        <button class="buttons" id="abutton" type="submit" name="save" value="Save Changes">Save Changes</button>
                    </div>
                </div>
                </form>
            <?php endforeach ?>

            <br>
            <br>
            <br>
            <div id="gridview">
                <?php foreach ($userPosts as $pics): ?>
                <form method="post">
                    <div class="image">
                        <img src="data:image/png;base64,<?= base64_encode($pics->Picture) ?>" />
                        <input type="hidden" name="postId" value="<?= $pics->Post_ID ?>" />
                        <input type="submit" class="buttons" id="abutton" type="submit" name="delete" value="Delete" />
                    </div>
                </form>
                <?php endforeach ?>
            </div>
                </div>
        </div>


    </body>
</html>
