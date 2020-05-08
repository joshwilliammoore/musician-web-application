<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_Followers
 *
 * @author joshw
 */
class User_Followers {
    private $User_Followers_ID;
    private $Following;
    private $User_ID;
    private $Followers_ID;

    function __get($fol) {
        return $this->$fol;
    }

    function __set($fol, $value) {
        $this->$fol = $value;
    }
}
