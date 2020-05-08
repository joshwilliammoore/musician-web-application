<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author joshw
 */
class Comments {
    private $Comment_ID;
    private $Comment;
    private $Date;
    private $User_ID;
    private $Post_ID;

    function __get($com) {
        return $this->$com;
    }

    function __set($com, $value) {
        $this->$com = $value;
    }
}
