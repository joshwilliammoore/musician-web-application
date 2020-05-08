<?php

require_once '../Model/Users.php';
require_once '../Model/dataAccess.php';
require_once '../View/navbar.php';

session_start();
unset($_SESSION["userId"]);
unset($_SESSION["userUsername"]);
unset($_SESSION["userEmail"]);
unset($_SESSION["userName"]);
unset($_SESSION["profilePic"]);
header("Location: ../View/index.php");

require_once '../View/index.php';
