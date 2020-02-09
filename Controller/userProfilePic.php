<?php

require_once '../Model/Users.php';
require_once '../Model/Posts.php';
require_once '../View/navbar.php';
require_once '../Model/dataAccess.php';


$pp = getPP($_SESSION['username']);

/*foreach ($pp as $profilePic):
    $_SESSION['profilePic'] = $profilePic->profile_picture;
endforeach;*/