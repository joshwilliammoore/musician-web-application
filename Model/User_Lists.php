<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Lists
 *
 * @author joshw
 */
class User_Lists {
    
    private $User_List_ID;
    private $User_ID;
    private $List_ID;
    private $Recipient_ID;
    
    function __get($list) {
        return $this->$list;
    }

    function __set($list, $value) {
        $this->$list = $value;
    }
}
