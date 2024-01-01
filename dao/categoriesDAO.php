<?php
require_once 'database\connexion.php';
require_once 'products.php';
require 'categories.php';
class CategoriesDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
    }

    
    public function add_Category($name, $description, $image) {
        $add_Category = "INSERT INTO category (name, description, image) VALUES (:name, :description, :image)";
        $stmt = $this->pdo->prepare($add_Category);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        
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