<?php

require_once '../Model/Users.php';
require_once '../Model/dataAccess.php';
require_once '../View/sidebar.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['userId'])) {
    $list = getMaybeList($_SESSION['userId']);
        
        /*if(isset($_REQUEST['maybe'])){
            $list = getMaybeList($_SESSION['userId']);
        }
        
        if (isset($_REQUEST['accepted'])) {
            $list = getAcceptedList($_SESSION['userId']);
        }*/
}