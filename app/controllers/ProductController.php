<?php


namespace App\Controllers;
use App\Core\App;
use App\Helpers\{Session};

class ProductController{


    public function store(){
        $data = $_POST;
        $data["sku"] = generateSKU();
        if(count($data) < 6){
            Session::flash("Error","Invalid entry");
            redirect('employee');
        }else{
            App::get("database")->addProduct($data);
            Session::flash("Success","Product succesfully added.");

            redirect('/employee');

        }


    }
    public function delete(){
        $sku = $_POST["sku"];
        if(!isset($sku)){
            Session::flash("Error","Invalid entry");
            redirect('employee');
        }else{

            App::get("database")->removeProduct($sku);
            Session::flash("Success","Product succesfully removed.");
            redirect('/employee');

        }


    }
    public function update(){
        $quantity = $_POST["total_quantity"];
        $sku = $_POST["sku"];
        if(!isset($sku) || $quantity < 0){
            Session::flash("Error","Invalid entry");
            redirect('employee');

        }else{

            App::get("database")->updateProduct($quantity,$sku);
            Session::flash("Success","Product succesfully updated.");

            redirect('/employee');
        }

    }
    
 
}