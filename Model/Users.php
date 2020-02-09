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
    private $user_id;
    private $username;
    private $email_address;
    private $name;
    private $password;
    private $profile_picture;
    private $contact_no;
    private $type;
    
    function __get($all){
        return $this->$all;
    }

    function __set($all,$value){
	$this->$all = $value;
    }
}
