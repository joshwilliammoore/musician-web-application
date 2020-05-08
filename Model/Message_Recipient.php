<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message_Recipient
 *
 * @author joshw
 */
class Message_Recipient {
    private $Recipient_ID;
    private $Message_ID;
    private $Reciever_ID;

    function __get($messages) {
        return $this->$messages;
    }

    function __set($messages, $value) {
        $this->$messages = $value;
    }
}
