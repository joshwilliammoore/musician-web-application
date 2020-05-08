<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages
 *
 * @author joshw
 */
class Messages {
    private $Message_ID;
    private $Message;
    private $Enquiry;
    private $Parent_Message_ID;
    private $Creator_ID;

    function __get($messages) {
        return $this->$messages;
    }

    function __set($messages, $value) {
        $this->$messages = $value;
    }
}
