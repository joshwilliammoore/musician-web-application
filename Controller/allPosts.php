<?php

require_once '../Model/Posts.php';
require_once '../View/explore.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

$results = getAllPosts();

