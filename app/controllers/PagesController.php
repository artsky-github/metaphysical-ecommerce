<?php


namespace App\Controllers;
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
            $products = App::get("database")->getByCategoryAndName($name);
        }else{
            $products = App::get("database")->getAll($name);
        }
        return view('products',compact('products'));
    }

}
