<?php

require_once '../View/signup.php';
require_once '../Model/dataAccess.php';
require_once '../Model/Users.php';

if (isset($_REQUEST['signup'])):
    $email = htmlspecialchars($_REQUEST['email']);
    $name = htmlspecialchars($_REQUEST['name']);
    $username = htmlspecialchars($_REQUEST['username']);
    $password = htmlspecialchars($_REQUEST['password']);

    if (empty($_REQUEST["email"]) || empty($_REQUEST["username"]) || 
            empty($_REQUEST["name"]) || empty($_REQUEST["password"])) {
        $message = 'All fields are required!';
    } else {
        $user = userLogin($username);
        if (sizeof($user) > 0) {
            header('Location: signup.php?username_taken');
            $message = 'Username has already been taken.';
            exit();
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $newUser = new Users();
            $newUser->email_address = $email;
            $newUser->name = $name;
            $newUser->username = $username;
            $newUser->password = $password;

            userSignup($newUser);

            header('Location: ../View/login.php');
            exit();
        }
    }
endif;

require_once '../View/signup.php';
