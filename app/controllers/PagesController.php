<?php


namespace App\Controllers;
use App\Helpers\{Session};

use App\Core\App;

class PagesController{


    public function login(){
        return view('index');        
    }
    public function register(){
        return view('register');
    }
    public function home(){
        $products = App::get("database")->getPopularAndRecommended(); 
        return view('home',compact('products'));    
    }
    public function orders(){
        session_start();
        $id = Session::get('user')['id'];
        $all_orders = App::get("database")->getOrders($id);
        return view('orders',compact('all_orders'));
    }
    public function cart(){
        return view('cart');
    }
    public function products(){
        $name = $_GET['name'];
        $category = $_GET['category'];
        if($name == "" && $category != "all"){
            $products = App::get("database")->getByCategory($category);
        }
        else if($name != "" && $category == "all"){
            $products = App::get("database")->getByName($name);
        }
        else if($name != "" && $category != "all"){
            $products = App::get("database")->getByCategoryAndName($name,$category);
        }else{
            $products = App::get("database")->getAll($name);
        }
        if(count($products) == 0){
            Session::flash("Error","No products found.");
            redirect('/home');
        }
        return view('products',compact('products'));
    }


    public function employee(){
        $products = App::get("database")->getAll();
        return view("employee",compact('products'));
    }
    public function admin(){
        $orders = App::get("database")->getAllOrders();
        $customers = App::get("database")->getAllCustomers();
        return view("admin",compact('orders','customers'));

    }
    public function owner(){
        $employees = array_map(function($employee) { 
        
            return array_filter($employee,function($val,$key){
                if($key == "person_id" || $key == "fname" || $key == "lname" || $key == "email"){
                    return array($key=>$val);
                }
            },ARRAY_FILTER_USE_BOTH);
        },App::get("database")->getAllEmployees());

        $products_sold = array_map(function($product) {
            return array_filter($product,function($val,$key){
                if($key == "sku" || $key == "name" || $key == "category" || $key == "sold_count"){
                    return array($key=>$val);
                }
            },ARRAY_FILTER_USE_BOTH);
        },App::get("database")->getProductsSold());
        


        return view("owner",compact('employees','products_sold'));
    }


}
