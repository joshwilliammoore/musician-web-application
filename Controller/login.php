<?php
require_once"../Model/Users.php";
require_once"../Model/dataAccess.php";
require_once '../View/login.php';

if(!isset($_SESSION)) {session_start();}

$error = false;

if(isset($_SESSION["userId"]))
{
        header("Location: ../View/index.php");
        exit();
}
else if(isset($_REQUEST["login"]))
{
    $username = htmlspecialchars($_REQUEST['username']);
    $password = htmlspecialchars($_REQUEST['password']);
    $found = getUsernameAndPassword($username,$password);
    $user = userLogin($username);
    if($found != false)
    {
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = $found->user_id;
        $_SESSION['userUsername'] = $user[0]->username;
        $_SESSION['userEmail'] = $user[0]->email_address;
        $_SESSION['userName'] = $user[0]->name;
        $_SESSION['userPassword'] = $user[0]->password;
        $_SESSION['profilePic'] = $user[0]->Profile_Picture;
        
        
        header("Location: ../View/index.php");
        exit();
        
    }
    else
    {
        $error = true;
        header("Location: ../View/login.php");
        exit();
    }
}
/*else
{
    header("Location: ../View/login.php");
    exit();
}*/

require_once '../View/login.php';
