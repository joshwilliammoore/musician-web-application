<?php

require_once '../Model/Users.php';
require_once '../Model/Posts.php';
//require_once '../View/account.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_REQUEST['save'])){
    $user = getUserAccountDetails($_SESSION['userId']);
    $change = new Users();
    $change->User_ID = $_SESSION['userId'];
    if(!empty($_REQUEST['password']&&!empty($_REQUEST['newPass']&&!empty($_REQUEST['newPassAgain'])))){
        $password = htmlspecialchars($_REQUEST['password']);
        $hashedPass = $user[0]->Password;
        if(!password_verify($password, $hashedPass)){
            header("Location: ../View/edit-account.php?incorrect_password");
            exit();
        }else{
            $newPass = htmlspecialchars($_REQUEST['newPass']);
            $newPassAgain = htmlspecialchars($_REQUEST['newPassAgain']);
            if($newPass!=$newPassAgain){
                header("Location: ../View/edit-account.php?new_password_not_same");
                exit();
            }else{
                $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
                $change->password = $newPassHash;
                changePassword($change);
                header("Location: ../View/edit-account.php?password_successfully_changed");
                exit();
            }
        }
    }
    
    $data = file_get_contents($_FILES['image']['tmp_name']);
    if(!empty($data)){
        changePP($data,$change);
        $userNewPP = getUserAccountDetails($change);
        $_SESSION['profilePic'] = $userNewPP->Profile_Picture;
    }
    
    $pageType = htmlspecialchars($_REQUEST['type']);
    $change->Type = $pageType;
    $databaseType = $user[0]->Type;
    if($pageType!=$databaseType){
        changeType($change);
    }
    $pageInstrument = htmlspecialchars($_REQUEST['occupation']);
    $change->Occupation = $pageInstrument;
    $databaseInstrument = $user[0]->Occupation;
    if($pageInstrument!=$databaseInstrument){
        if(empty($pageInstrument)){
            header("Location: ../View/edit-account.php?instrument_null");
            exit();
        }else{
            changeOccupation($change);
        }
    }
    $pageBio = htmlspecialchars($_REQUEST['bio']);
    $change->Biography = $pageBio;
    $databaseBio = $user[0]->Biography;
    if($pageBio!=$databaseBio){
        changeBio($change);
    }
    $pageName = htmlspecialchars($_REQUEST['name']);
    $change->Name = $pageName;
    $databaseName = $user[0]->Name;
    if($pageName!=$databaseName){
        if(empty($pageName)){
            header("Location: ../View/edit-account.php?name_null");
            exit();
        }else{
            changeName($change);
        }
    }
    $pageUsername = htmlspecialchars($_REQUEST['username']);
    $change->Username = $pageUsername;
    $databaseUsername = $user[0]->Username;
    if($pageUsername!=$databaseUsername){
        if(empty($pageUsername)){
            header("Location: ../View/edit-account.php?username_null");
            exit();
        }else{
            changeUsername($change);
        }
    }
    $pageEmail = htmlspecialchars($_REQUEST['email']);
    $change->Email_Address = $pageEmail;
    $databaseEmail = $user[0]->Email_Address;
    if($pageEmail!=$databaseEmail){
        if(empty($pageEmail)){
            header("Location: ../View/edit-account.php?email_null");
            exit();
        }else{
            changeEmail($change);
        }
    }
    header("Location: ../View/edit-account.php?details_successfully_changed");
    exit();
}

if(isset($_REQUEST['delete'])){
    $postId = $_REQUEST['postId'];
    deletePost($postId);
}

$userId = new Users();
$userId->User_ID = $_SESSION['userId'];
$results = getUserAccountDetails($userId);
$userPost = new Posts();
$userPost->User_ID = $_SESSION['userId'];
$userPosts = getUserPictures($userPost);
