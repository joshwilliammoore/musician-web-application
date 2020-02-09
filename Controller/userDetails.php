<?php

require_once '../Model/Users.php';
require_once '../Model/Posts.php';
require_once '../View/account.php';
require_once '../Model/dataAccess.php';

if(!isset($_SESSION)){ session_start();}

$results = getUserAccountDetails($_SESSION['username']);
$userPosts = getUserPictures($_SESSION['username']);


    