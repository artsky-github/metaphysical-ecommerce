<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class UserController{


    public function store(){
        $status = App::get("database")->validateRegister($_POST);
        if($status == true && !isset($_POST["employee"])){
            $data = $_POST;
            $data["type"] = 0;
            $data["password"] = password_hash($data["password"],PASSWORD_BCRYPT);
            var_dump($data);
            die();
            $user = App::get("database")->addUser($data);
            Session::addUser('user',$user);
            redirect("home");
        }
        else if($status == true && isset($_POST["employee"])){
            $data = $_POST;
            unset($data["employee"]);
            $data["email"] = $data["email"] . "@kkrystals.com"; 
            $data["type"] = 1;
            $data["password"] = password_hash($data["password"],PASSWORD_BCRYPT);
            
            $user_data = array_filter($data,function($value,$key) {
                if($key != "ssn" && $key != "salary"){
                    return array($key=>$value);
                }
            },ARRAY_FILTER_USE_BOTH);

            $employee_data = array_filter($data,function($value,$key) {
                if($key == "ssn" || $key == "salary"){
                    return array($key=>$value);
                }
            },ARRAY_FILTER_USE_BOTH);

        
            App::get("database")->addEmployee($user_data,$employee_data);
            Session::flash("Success","Employee added.");
            redirect("/owner");
        }
        else{
            return view('404');
        }
    }
    public function delete(){
        $id = $_POST["id"];
      
        if(isset($_POST["employee"])){
            App::get("database")->removeEmployee($id);
            Session::flash("Success","Employee has been removed.");
            redirect('/owner');
        }else{
            App::get("database")->removeCustomer($id);
            Session::flash("Success","Customer has been removed.");
            redirect('/admin');

        }
    }
}