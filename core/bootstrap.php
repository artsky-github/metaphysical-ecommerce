<?php

use \App\Core\{App,QueryBuilder,Connection};

App::bind("config",require 'config.php');

App::bind("database",new QueryBuilder(Connection::make(App::get("config")["database"])));



function view($view,$data=[]){
    extract($data);
    return require "app/views/${view}.view.php";
}

function redirect($path){
    header("Location: ${path}");
}

function generateSKU($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}