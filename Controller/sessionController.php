<?php

require_once '../Model/Users.php';
require_once '../View/session.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_REQUEST['type'])){
    $type = new Users();
    $type->Type = $_REQUEST['type'];
    $results = getAllType($type);
}
