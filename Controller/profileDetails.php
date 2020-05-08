<?php

require_once '../Model/Users.php';
require_once '../Model/Posts.php';
require_once '../Model/User_Followers.php';
require_once '../View/profile.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}


if (isset($_REQUEST['profile_id'])) {
    $profileId = new Users();
    $profileId->User_ID = $_REQUEST['profile_id'];
    $results = getUserAccountDetails($profileId);
    $profId = new Posts();
    $profId->User_ID = $profileId->User_ID;
    $userPosts = getUserPictures($profId);
    $numPosts = getPostsCount($profId);
    foreach ($numPosts as $count):
        $postsCount = implode($count);
    endforeach;
    $folId = new User_Followers();
    $folId->User_ID = $profileId->User_ID;
    $folId->Followers_ID = $profileId->User_ID;
    $numFollwers = getFollowersCount($folId);
    foreach ($numFollwers as $count):
        $follwersCount = implode($count);
    endforeach;
    $numFollowing = getFollowingCount($folId);
    foreach ($numFollowing as $count):
        $followingCount = implode($count);
    endforeach;
    if (!isset($_SESSION['userId'])) {
        $fol = 'No';
    } else {
        $userId = new Users();
        $userId->User_ID = $_SESSION['userId'];
        $isFollowing = findFollowing($userId, $profileId);
        $fol = 'No';
        foreach ($isFollowing as $f):
            $fol = $f;
        endforeach;
        if ($fol == 'Yes') {
            $fol = 'Yes';
        } else {
            $fol = 'No';
        }
    }
}

if (isset($_REQUEST['follow'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location: ../View/login.php");
        exit();
    } else {
        $profileId = new Users();
        $profileId->User_ID = $_REQUEST['profileId'];
        $userId = new Users();
        $userId->User_ID = $_SESSION['userId'];
        follow($userId, $profileId);
        $fol = 'Yes';
        $profId = new Posts();
        $profId->User_ID = $profileId->User_ID;
        $numPosts = getPostsCount($profId);
        foreach ($numPosts as $count):
            $postsCount = implode($count);
        endforeach;
        $folId = new User_Followers();
        $folId->User_ID = $profileId->User_ID;
        $folId->Followers_ID = $profileId->User_ID;
        $numFollwers = getFollowersCount($folId);
        foreach ($numFollwers as $count):
            $follwersCount = implode($count);
        endforeach;
        $numFollowing = getFollowingCount($folId);
        foreach ($numFollowing as $count):
            $followingCount = implode($count);
        endforeach;
    }
}

if (isset($_REQUEST['unfollow'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location: ../View/login.php");
        exit();
    } else {
        $profileId = new Users();
        $profileId->User_ID = $_REQUEST['profileId'];
        $userId = new Users();
        $userId->User_ID = $_SESSION['userId'];
        unFollow($userId, $profileId);
        $fol = 'No';
        $profId = new Posts();
        $profId->User_ID = $profileId->User_ID;
        $numPosts = getPostsCount($profId);
        foreach ($numPosts as $count):
            $postsCount = implode($count);
        endforeach;
        $folId = new User_Followers();
        $folId->User_ID = $profileId->User_ID;
        $folId->Followers_ID = $profileId->User_ID;
        $numFollwers = getFollowersCount($folId);
        foreach ($numFollwers as $count):
            $follwersCount = implode($count);
        endforeach;
        $numFollowing = getFollowingCount($folId);
        foreach ($numFollowing as $count):
            $followingCount = implode($count);
        endforeach;
    }
}