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
    public function addProduct($data){
        $this->insert("Products",$data);
    }
    public function removeProduct($sku){
        $sql = "DELETE FROM Products WHERE sku = :sku";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":sku",$sku);
        $query->execute();
    }
    public function updateProduct($quantity,$sku){
        $sql = "UPDATE Products SET total_quantity = :total_quantity  WHERE sku = :sku";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":sku",$sku);
        $query->bindValue(":total_quantity",$quantity);
        $query->execute();
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
    public function getAllOrders(){
        $sql = "SELECT * from Orders";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getOrders($id){
        $sql = "SELECT * from Orders where person_id = :person_id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":person_id",$id);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function addOrder($current_user_id,$data){
        
        $state = $data["state"];
        $city = $data["city"];
        $street_name = $data["street_name"];
        $house_number = $data["house_number"];
        $zip_code = $data["zip_code"];

        $sql = "INSERT INTO Customers (person_id, state, city, street_name, house_number, zip_code) 
                        VALUES($current_user_id,'$state', '$city', '$street_name', $house_number, '$zip_code') 
                        ON DUPLICATE KEY UPDATE state='$state', city='$city', street_name='$street_name', 
                        house_number=$house_number, zip_code='$zip_code'";

        $query = $this->pdo->prepare($sql);
        $query->execute();     
        $order = [
            "person_id" => $current_user_id,
            "total_price" => $data["total-price"],
        ];
        
        $order = $this->insert('Orders',$order);
        foreach($data['products'] as $product){
            $ordered_products = [
                "order_id" => $order["id"],
                "product_id" => $product["id"],
                "quantity" => $product["quantity"]
            ];
            $this->pdo->beginTransaction();
            $this->insertMany("Ordered_Products",$ordered_products);
            $this->addMetaProduct($product["id"],$product["quantity"]);
            $this->updateProductById($product["id"],$product["quantity"]);
            $this->pdo->commit();
        }
        
    }
    public function addMetaProduct($product_id,$quantity){
        $sql = "INSERT INTO Meta_Products (product_id,sold_count) 
                VALUES($product_id,$quantity) 
                ON DUPLICATE KEY UPDATE sold_count=sold_count+$quantity";
        $query = $this->pdo->prepare($sql);
        $query->execute();

    }   

    public function updateProductById($id,$quantity){
    
        $sql = "UPDATE Products SET total_quantity = total_quantity - :total_quantity  WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->bindValue(":total_quantity",$quantity);
        $query->execute();
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
            var_dump($e->getMessage());
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

    public function addEmployee($user_data,$employee_data){
        $obj = $this->insert("Persons",$user_data);
        $employee_data["person_id"] = $obj["id"];
        $this->insert("Employees",$employee_data);
    }

  

    public function getAllCustomers(){
        $sql = "SELECT * FROM Persons WHERE type = 0";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function removeCustomer($id){
        $sql = "DELETE FROM Persons WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();

        $sql = "DELETE FROM Customers WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();

    }   
    public function removeEmployee($id){
        $sql = "DELETE FROM Persons WHERE id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();

        $sql = "DELETE FROM Employees WHERE person_id = :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
    }

    public function getAllEmployees(){
        $sql = "SELECT * FROM Employees LEFT JOIN Persons on Employees.person_id = Persons.id";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getProductsSold(){
        // $sql = "SELECT * FROM Ordered_Products
		//         LEFT JOIN Products on Ordered_Products.product_id = Products.id 
		//         LEFT JOIN Meta_Products on Meta_Products.product_id = Ordered_Products.product_id";
        
        $sql = "SELECT * FROM Meta_Products
        LEFT JOIN Ordered_Products on Ordered_Products.product_id = Meta_Products.product_id
        LEFT JOIN Products on Meta_Products.product_id = Products.id";
        
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addUser($data){
        return $this->insert("Persons",$data);
    }

}