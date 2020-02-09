<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Posts
 *
 * @author joshw
 */
class Posts {
    private $post_id;
    private $picture;
    private $caption;
    private $date;
    private $user_ID;
    
    function __get($post){
        return $this->$post;
    }
    
    function __set($post, $value){
        $this->$post = $value;
    }
}
