<?php

require_once '../Model/Users.php';
require_once '../Model/Messages.php';
require_once '../Model/Message_Recipient.php';
require_once '../Model/User_Lists.php';
require_once '../View/messaging.php';
require_once '../Model/dataAccess.php';

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_REQUEST['recipient_id'])) {
    if (!isset($_SESSION['userId'])) {
        header("Location: ../View/login.php");
        exit();
    } else {
        $recipientId = $_REQUEST['recipient_id'];
        $results = getMessages($_SESSION['userId'], $recipientId);
        $r = new Users();
        $r->User_ID = $recipientId;
        $recipient = getUserAccountDetails($r);
        
        /* header("Location: ../View/messaging.php");
          exit(); */
    }
}

    if (isset($_REQUEST['send_message'])) {

        $message = htmlspecialchars($_REQUEST['message']);
        $senderId = $_SESSION['userId'];
        $recipientId = $_REQUEST['recipientId'];
        $parent = findParentId($senderId, $recipientId);
        foreach ($parent as $ids):
            $parentId = $ids->Message_ID;
        endforeach;
        $messages = findMessageId();
        foreach ($messages as $id):
            $messageId = $id->Message_ID;
        endforeach;
        if (empty($parent)) {
            sendMessage($messageId+1,$message, 'Yes', $messageId+1, $senderId);
        } else {
            //$parentId = (int) $parent;
            sendMessage($messageId+1,$message, 'No', $parentId, $senderId);
        }
        saveMessage($messageId+1, $recipientId);
        $results = getMessages($_SESSION['userId'], $recipientId);
        $r = new Users();
        $r->User_ID = $recipientId;
        $recipient = getUserAccountDetails($r);
        
        /*if(sizeof($results)>1){
            $uList = new User_Lists();
            $uList->User_ID = $_SESSION['userId'];
            $uList->List_ID = 1;
            $uList->Recipient_ID = $recipientId;
            addUserLists($uList);
        }*/
        if(sizeof($results)>1){
        foreach ($results as $m):
        if($m->Creator_ID==$recipientId){
            $uList = new User_Lists();
            $uList->User_ID = $_SESSION['userId'];
            $uList->List_ID = 2;
            $uList->Recipient_ID = $recipientId;
            changeUserLists($uList);
        }
        endforeach;
        }
        header("Location: ../View/messaging.php?recipient_id=$recipientId");
        exit();
    }

