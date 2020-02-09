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
  <div class="row">
    <div class="col">
      <h1>Account</h1>
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
        <a><div class="change-pic">Change Picture<img src="data:image/png;base64,<?= base64_encode($all->Profile_Picture)?>" alt="profile-pic" id="profile-pic"/></div></a>
    </div>
    
    <div class="col-md-6">
        <div class="row mini-box"><h2><?=$all->Name?></h2>
        <div class="col mini-box">
        <div class="row">
        <div class="col mini-box"></div>
        <div class="col mini-box">Posts</div>
        <div class="col mini-box">Followers</div>
        <div class="col mini-box">Following</div>
      </div>
      <div class="row">
        <div class="col mini-box"></div>
        <div class="col mini-box">3</div>
        <div class="col mini-box">4</div>
        <div class="col mini-box">4</div>
      </div>
        </div>
            </div>
        <div class="row mini-box">@<?=$all->Username?></div>
        <br>
        <div class="row mini-box"><b>Harpist</b></div>
        <div class="row mini-box">Sample text, sample text, sample text. Something, then something else, then some more and finally something else.</div>
    <?php endforeach ?>
  
</div>
    <div class="col-md-1">
      
    </div>
    <div class="col-md-2 account-button">
        <div class="row">
            <button  onclick="location.href='../View/edit-account.php'" class="buttons" id="abutton" type="submit" value="Edit Profile">Edit Profile</button>
        </div>
        <div class="row">
            <button  onclick="location.href='../View/post-upload.php'" class="buttons" id="abutton" type="submit" value="Add Photo/Video">Add Photo/Video</button>
        </div>
    </div>
  </div>
  
      <br>
      <br>
      <br>
      <div id="gridview">
        <?php foreach ($userPosts as $pics): ?>
            <div class="image">
                <img src="data:image/png;base64,<?=base64_encode($pics->Picture)?>" />
            </div>
        <?php endforeach ?>
      </div>
      
</div>
      
     
    </body>
</html>
