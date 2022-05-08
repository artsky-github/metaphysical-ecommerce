<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class SessionController{


    public function store(){
        $user = App::get("database")->validateLogin($_POST);
        if($user != null){
            Session::addUser('user',$user);
            if($user["type"] == "1"){
                redirect("employee");
            }
            else if($user["type"] == "2"){
                redirect("admin");
            }
            else if($user["type"] == "3"){
                redirect("owner");
            }else{
                redirect('home');
            }
        }
        else{
            return view('404');
        }
    }
    public function delete(){
        Session::remove();
        redirect('login');
    }
}