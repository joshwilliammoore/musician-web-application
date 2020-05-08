<?php

require_once '../Model/Users.php';
require_once '../View/index.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

$ses = 'Session';
$art = 'Artist';
$reh = 'Studio';
$ven = 'Venues';
if (isset($_SESSION['userId'])) {
    $sm = get3OtherProfiles($ses, $_SESSION['userId']);
    $a = get3OtherProfiles($art, $_SESSION['userId']);
    $rs = get3OtherProfiles($reh, $_SESSION['userId']);
    $v = get3OtherProfiles($ven, $_SESSION['userId']);
}else{
    $sm = get3Profiles($ses);
    $a = get3Profiles($art);
    $rs = get3Profiles($reh);
    $v = get3Profiles($ven);
}