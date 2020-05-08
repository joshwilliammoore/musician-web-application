<!doctype html>
<?php
require_once '../Controller/profileDetails.php';
require_once '../Model/dataAccess.php';
require_once '../Model/Posts.php';
require_once '../Model/Users.php';
require_once '../Model/User_Followers.php';
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
                <div class="col-md-10 images">
                    <div class="row">
                        <div class="col">
                            <h1><?php if(isset($_SESSION['userId'])): if ($_SESSION['userId'] == $profileId->User_ID): ?>
                                    Account
                                <?php else: if($all->Type=='Session'): ?>Session Musicians 
                                <?php elseif ($all->Type=='Artist'): ?> Artists 
                                <?php elseif ($all->Type=='Studio'): ?> Studios 
                                <?php elseif ($all->Type=='Venues'): ?> Venues 
                                <?php endif; endif; else: ?>
                                <?php if($all->Type=='Session'): ?>Session Musicians 
                                <?php elseif ($all->Type=='Artist'): ?> Artists 
                                <?php elseif ($all->Type=='Studio'): ?> Studios 
                                <?php elseif ($all->Type=='Venues'): ?> Venues</h1> <?php endif; endif; ?>
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
                        <div class="col-md-3 image-cropper">
                            <a><img src="data:image/png;base64,<?= base64_encode($all->Profile_Picture) ?>" alt="profile-pic" id="profile-pic" onerror="this.src='../images/profile-pic.png';"/></a>
                        </div>

                        <div class="col-md-6">
                            <div class="row mini-box"><h2><?= $all->Name ?></h2>
                                <div class="col mini-box">
                                    <div class="row">
                                        <div class="col mini-box"></div>
                                        <div class="col mini-box"><b class="top-prof">Posts</b></div>
                                        <div class="col mini-box"><b class="top-prof">Followers</b></div>
                                        <div class="col mini-box"><b class="top-prof">Following</b></div>
                                    </div>
                                    <div class="row">
                                        <div class="col mini-box"></div>
                                        <div class="col mini-box"><?= $postsCount ?></div>
                                        <div class="col mini-box"><?= $follwersCount ?></div>
                                        <div class="col mini-box"><?= $followingCount ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mini-box">@<?= $all->Username ?></div>
                            <br>
                            <div class="row mini-box"><b><?= $all->Occupation ?></b></div>
                            <div class="row mini-box"><?= $all->Biography ?></div>


                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-2 account-button">
                            <?php if (isset($_SESSION['userId'])): if($_SESSION['userId'] == $profileId->User_ID): ?>
                                <div class="row">
                                    <button  onclick="location.href = '../View/edit-account.php'" class="buttons" id="abutton" type="submit" value="Edit Profile">Edit Profile</button>
                                </div>
                                <div class="row">
                                    <button  onclick="location.href = '../View/post-upload.php'" class="buttons" id="abutton" type="submit" value="Add Photo">Add Photo</button>
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <form method="post">

                                        <?php if ($fol == 'No'): ?>
                                            <input type="hidden" name="profileId" value="<?= $profileId->User_ID ?>" />
                                            <button class="buttons" id="abutton" type="submit" name="follow" value="Follow">Follow</button>
                                        <?php else: ?>
                                            <input type="hidden" name="profileId" value="<?= $profileId->User_ID ?>" />
                                            <button class="buttons" id="abutton" type="submit" name="unfollow" value="Follow">Unfollow</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                                <div class="row">
                                    <form method="post" action="../View/messaging.php">

                                        <a href="../View/messaging.php?recipient_id=<?= $all->User_ID ?>"><input class="buttons" id="abutton" type="button" name="message" value="Send Enquiry"/></a>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php else: ?>
                                <div class="row">
                                    <form method="post">

                                        <?php if ($fol == 'No'): ?>
                                            <input type="hidden" name="profileId" value="<?= $profileId->User_ID ?>" />
                                            <button class="buttons" id="abutton" type="submit" name="follow" value="Follow">Follow</button>
                                        <?php else: ?>
                                            <input type="hidden" name="profileId" value="<?= $profileId->User_ID ?>" />
                                            <button class="buttons" id="abutton" type="submit" name="unfollow" value="Follow">Unfollow</button>
                                        <?php endif; ?>
                                    </form>
                                </div>
                                <div class="row">
                                    <form method="post" action="../View/messaging.php">

                                        <a href="../View/messaging.php?recipient_id=<?= $all->User_ID ?>"><input class="buttons" id="abutton" type="button" name="message" value="Send Enquiry"/></a>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endforeach ?>
                <br>
                <br>
                <br>

                <div id="gridview">
                    <?php foreach ($userPosts as $pics): ?>
                        <div class="image">
                            <a href="../View/image.php?post_id=<?= $pics->Post_ID ?>"><img src="data:image/png;base64,<?= base64_encode($pics->Picture) ?>" /></a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>

        </div>




    </body>
</html>