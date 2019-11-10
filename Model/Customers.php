<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customers
 *
 * @author joshw
 */
class Customers {
    private $Customer_ID;
    private $First_Name;
    private $Surname;
    private $Contact_No;
    private $Email_Address;
    private $Location;
    
    function __get($cust){
        return $this->$cust;
    }
    
    function __set($cust, $value){
        $this->$cust = $value;
    }
}
