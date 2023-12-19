<?php
require_once 'C:\xampp\htdocs\OOP_electro\database\connexion.php';
require_once 'C:\xampp\htdocs\OOP_electro\products.php';
require 'C:/xampp/htdocs/OOP_electro/categories.php';
class CategoriesDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }
    
    public function add_Categpry($name, $description, $image){
        $add_Categpry = "INSERT INTO category (name,description,image)
        VALUES ($name, $description, $image);";
        $stmt = $this->pdo->prepare($add_Categpry);
        $stmt->execute();
    }


    public function get_categories(){
        $get = "SELECT * FROM category";
        $stmt = $this->pdo->query($get);
        $stmt->execute();
        $categoriesDATA = $stmt->fetchAll();
        $categories = array();
        foreach($categoriesDATA as $category){
            $categories[] = new Category($category['id'],$category['name'], $category['description'], $category['image']);
        }
        return $categories;
    }
    

    public function update_Category($id,$name, $description, $image){
        $update_Category = "UPDATE category SET name = '$name',
                                    description = '$description',
                                    image = '$image',
                                    WHERE reference = '$id'";   
        $stmt = $this->pdo->prepare($update_Category);
        $stmt->execute();
    }

    public function Delete_category($id){
        $delete = "DELETE FROM category WHERE id = :id";
        $stmt = $this->pdo->prepare($delete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
}
?>