<?php

namespace App\Helpers;


class Session {
    public static function add($key,$value){
        $_SESSION[$key] = $value;
    }
    public static function addUser($key,$user){
        session_start();
        $_SESSION[$key] = $user;
    }
    public static function get($key){
        return $_SESSION[$key];
    }
    public static function remove(){
        session_start();
        session_destroy();
    }
    public static function flash($name,$message){
        setcookie($name,$message,time()+5,'/');
    }
}