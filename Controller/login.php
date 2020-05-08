<?php

require_once"../Model/Users.php";
require_once"../Model/dataAccess.php";
//require_once '../View/login.php';
//if(!isset($_SESSION)) {session_start();}

$error = false;

if (isset($_SESSION["userId"])) {
    header("Location: ../View/index.php");
    exit();
} else if (isset($_REQUEST["login"])) {
    $username = htmlspecialchars($_REQUEST['username']);
    $password = htmlspecialchars($_REQUEST['password']);

    $user = userLogin($username);
    if (sizeof($user) < 1) {
        header("Location: ../View/login.php?incorrect_username");
        exit();
    } else {
        $hashedPass = $user[0]->Password;
        if (!password_verify($password, $hashedPass)) {
            header("Location: ../View/login.php?incorrect_password");
            exit();
        } else {
            $_SESSION['userId'] = $user[0]->User_ID;
            $_SESSION['userUsername'] = $user[0]->Username;
            $_SESSION['userEmail'] = $user[0]->Email_Address;
            $_SESSION['userName'] = $user[0]->Name;
            $_SESSION['profilePic'] = $user[0]->Profile_Picture;

            header("Location: ../View/index.php");
            exit();
        }
    }
    /* else
      {
      $error = true;
      header("Location: ../View/login.php");
      exit();
      } */
}
/* else
  {
  header("Location: ../View/login.php");
  exit();
  } */

require_once '../View/login.php';
