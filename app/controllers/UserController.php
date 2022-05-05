<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class UserController{


    public function store(){
        $status = App::get("database")->validateRegister($_POST);
        if($status == true){
            $data = $_POST;
            $data["type"] = 0;
            $data["password"] = password_hash($data["password"],PASSWORD_BCRYPT);
            $user = App::get("database")->addUser($data);
            Session::addUser('user',$user);
            redirect("home");
        }else{
            return view('404');
        }
    }
}