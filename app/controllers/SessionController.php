<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class SessionController{


    public function store(){
        $user = App::get("database")->validateLogin($_POST);
        if($user != null){
            Session::addUser('user',$user);
            redirect('home');
        }else{
            return view('404');
        }
    }
    public function delete(){
        Session::remove();
        redirect('login');
    }
}