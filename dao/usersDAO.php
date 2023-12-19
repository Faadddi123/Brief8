<?php
require_once 'C:\xampp\htdocs\OOP_electro\database\connexion.php';
require_once 'C:\xampp\htdocs\OOP_electro\products.php';
class usersDAO{
    private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function add_User($username,$email,$phone,$adresse,$ville,$password,$type){
        $query = "INSERT INTO users (username,email,phone,adresse,ville,password,type) 
        VALUES ($username,$email,$phone,$adresse,$ville,$password,$type);";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    }
   
    public function get_Users(){
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $usersList = $stmt->fetchAll();
        $users = array();
        foreach ($usersList as $user) {
            $users[] = new users(0,$user["username"],$user["email"],$user["phone"],$user["adresse"],$user["ville"],$user["password"],$user["type"]);
        }
        return $users;
    }
    
    public function User_validation($id){
        $user = "UPDATE users SET type = 'user' where id = $id;";
        $stmt = $this->pdo->prepare($user);
        $stmt->execute();
        return $stmt;
    }
    
    public function User_to_admin($id){
        $admin = "UPDATE users SET type = 'admin' where id = $id;";
        $stmt = $this->pdo->prepare($admin);
        $stmt->execute();
        return $stmt;
    }
    
    public function Delete_user($id){
        $delete = "DELETE FROM users where id = $id;";
        $stmt = $this->pdo->prepare($delete);
        $stmt->execute();
        return $stmt;
    }

}



?>