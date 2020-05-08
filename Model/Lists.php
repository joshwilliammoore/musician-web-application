<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lists
 *
 * @author joshw
 */
class Lists {
    
    private $List_ID;
    private $List;
    
    function __get($list) {
        return $this->$list;
    }

    function __set($list, $value) {
        $this->$list = $value;
    }
}
