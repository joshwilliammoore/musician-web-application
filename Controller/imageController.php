<?php

require_once '../View/image.php';
require_once '../Model/dataAccess.php';
require_once '../Model/Posts.php';
require_once '../Model/Users.php';
require_once '../Model/Comments.php';

if (isset($_REQUEST['post_id'])) {
    $postId = new Posts();
    $postId->Post_ID = $_REQUEST['post_id'];
    $results = getUserPost($postId);
    $com = new Comments();
    $com->Post_ID = $_REQUEST['post_id'];
    $comments = getComments($com);
}

if (isset($_REQUEST['send_comment'])){
    $message = htmlspecialchars($_REQUEST['comment']);
    $senderId = $_SESSION['userId'];
    $postID = new Posts();
    $postID->Post_ID = $_REQUEST['pId'];
    $date = date("Y-m-d");
    $comm = new Comments();
    $comm->Comment = $message;
    $comm->Date = $date;
    $comm->User_ID = $senderId;
    $comm->Post_ID = $_REQUEST['pId'];;
    saveComment($comm);
    $results = getUserPost($postID);
    $comments = getComments($comm);
    header("Location: ../View/image.php?post_id=$postID->Post_ID");
    exit();
}
