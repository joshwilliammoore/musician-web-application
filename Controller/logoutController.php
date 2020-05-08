<?php

require_once '../View/navbar.php';

session_start();
$_SESSION = array();
session_destroy();

header("Location: ../View/index.php");
exit();

