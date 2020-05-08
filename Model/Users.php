<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author joshw
 */
class Users {

    private $User_ID;
    private $Username;
    private $Email_Address;
    private $Name;
    private $Password;
    private $Profile_Picture;
    private $Contact_No;
    private $Type;
    private $Occupation;
    private $Biography;

    function __get($all) {
        return $this->$all;
    }

    function __set($all, $value) {
        $this->$all = $value;
    }

}
