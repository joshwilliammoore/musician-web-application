<?php

require_once '../Model/Posts.php';
require_once '../Model/Users.php';
require_once '../View/post-upload.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['upload'])){
    
    if(!empty($_FILES['photo']['tmp_name'])){
        $data = file_get_contents($_FILES['photo']['tmp_name']);
        $caption = $_REQUEST['caption'];
        $date = date("Y-m-d");
        uploadPost($data,$caption,$date,$_SESSION['userId']);
        $sessionId = $_SESSION['userId'];
        header("Location: ../View/profile.php?profile_id=$sessionId");
        exit();
    }else{
        //header("Location: ../View/post-upload.php?add_photo");
        $message = 'Please add photo to make a post';
        //exit();
    }
}
