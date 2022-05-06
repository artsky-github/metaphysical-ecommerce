<?php 
namespace App\Core;
class QueryBuilder{

    protected $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


   
    public function getPopularAndRecommended(){
        $sql_reco = "SELECT * FROM Products ORDER BY RAND() LIMIT 5";
        $reco_query = $this->pdo->prepare($sql_reco);
        $reco_query->execute();
        $sql_pop = "SELECT * FROM Products ORDER BY RAND() LIMIT 5";
        $pop_query = $this->pdo->prepare($sql_pop);
        $pop_query->execute();
        $data = [
            "popular" => $pop_query->fetchAll(),
            "recommended" => $reco_query->fetchAll()
        ];
        return $data;
    }
    public function getByCategory($category){
        $sql = "SELECT * FROM Products WHERE category = :category";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(":category",$category);
        $query->execute();
        return $query->fetchAll();
    }
    public function getByName($name){
        $sql = "SELECT * FROM Products WHERE name LIKE :name";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":name","%".$name."%");
        $query->execute();
        return $query->fetchAll();
    }
    public function getAll(){
        $sql = "SELECT * FROM Products";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    public function getByCategoryAndName($name,$category=null){
        $sql = "SELECT * FROM Products WHERE name LIKE :name and category = :category";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":name","%" .$name ."%");
        $query->bindValue(":category",$category);
        $query->execute();
        return $query->fetchAll();
    }

    public function validateRegister($data){
        $username = $data["username"];
        $email = $data["email"];
        $sql = "SELECT * FROM Persons WHERE username = :username OR email = :email";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":username",$username);
        $query->bindValue(":email",$email);
        $query->execute();
        $results = $query->fetchAll();
        if(count($results) > 0){
            return false;
        }else{
            return true;
        }
    }
    public function validateLogin($data){
        $username = $data["username"];
        $password = $data["password"];
        $sql = "SELECT * FROM Persons WHERE username = :username";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":username",$username);
        $query->execute();
        
        $user_exists = $query->fetch(\PDO::FETCH_ASSOC);
        if($user_exists == true){
            if(password_verify($password,$user_exists["password"])){
                return $user_exists;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
    public function getOrders($id){
        $sql = "SELECT * from Orders where person_id = :person_id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":person_id",$id);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addOrder($current_user_id,$data){
        $order = [
            "person_id" => $current_user_id,
            "total_price" => $data["total-price"],
            "ordered_at" => date("Y-m-d H:i:s")
        ];
        $order = $this->insert('Orders',$order);

        // var_dump($data);
        // die();
        
        foreach($data['products'] as $product){
            $ordered_products = [
                "order_id" => $order["id"],
                "product_id" => $product["id"],
                "quantity" => $product["quantity"]
            ];
            $this->pdo->beginTransaction();
            $this->insertMany("Ordered_Products",$ordered_products);
            $this->pdo->commit();
        }
        
    }
    public function insert($table,$parameters){
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)"
            ,$table
            ,implode(',',array_keys($parameters))
            ,implode(', ',array_map(function($col){return ":${col}";},array_keys($parameters)))
        );
        $retrieve = sprintf("SELECT * from {$table} WHERE id = LAST_INSERT_ID()");
        try{
            $query = $this->pdo->prepare($sql);
            $retrieveQuery = $this->pdo->prepare($retrieve);
            $query->execute($parameters);
            $retrieveQuery->execute();
            $obj = $retrieveQuery->fetch(\PDO::FETCH_ASSOC);        
            return $obj;
        }
        catch (\PDOException $e){
            return -1;
        }
    }
    public function insertMany($table,$parameters){
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)"
            ,$table
            ,implode(',',array_keys($parameters))
            ,implode(', ',array_map(function($col){return ":${col}";},array_keys($parameters)))
        );
        try{
            $query = $this->pdo->prepare($sql);
            $query->execute($parameters);
            return;
        }
        catch(\PDOException $e){
            var_dump($e);
        }

    }
    
    public function addUser($data){
        return $this->insert("Persons",$data);
    }

}