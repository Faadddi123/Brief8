<?php
require_once 'database\connexion.php';
require_once 'users.php';
class usersDAO{
    private $pdo;
    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    public function add_User($username, $email, $phone, $password) {
        $query = "INSERT INTO users (username, email, phone, password) 
                  VALUES (:username, :email, :phone, :password)";
        
        $stmt = $this->pdo->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':password', $password);
        
        // Execute the statement
        $stmt->execute();
    }
    
   
    public function get_Users(){
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $usersList = $stmt->fetchAll();
        $users = array();
        foreach ($usersList as $user) {
            $users[] = new users($user["id"],$user["username"],$user["email"],$user["phone"],$user["adresse"],$user["ville"],$user["password"],$user["type"]);
        }
        return $users;
    }
    
    public function get_Users_number_by_user_email($user, $email) {
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
    
        return $number_of_users;
    }

    public function get_Users_number_by_pswd_email($password, $email) {
        $query = "SELECT * FROM users WHERE password = :password OR email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $number_of_users = count($result);
    
        return $number_of_users;
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