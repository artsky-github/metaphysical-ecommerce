<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class OrderController{


    public function store(){
        session_start();
        $current_user = Session::get('user')['id'];
        if(!isset($_POST["products"])){
            Session::flash("Error","Invalid order.");
            redirect('cart');
        }else{
            App::get("database")->addOrder($current_user,$_POST);
            Session::flash("Success","Order has been recieved.");
            redirect('/home');
        }
    
    }
    
 
}