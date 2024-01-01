<?php
require 'database/connexion.php';
require 'products.php';

class productsDAO{
    private $pdo;
    
    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection(); 
        
    }
    
    public function add_Product($name, $old_price, $new_price, $image, $stock, $country, $city, $nbachat, $category)
    {
        $add_Product = "INSERT INTO product (name, old_price, new_price, image, stock, country, city, nbachat, category)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->pdo->prepare($add_Product);
        $stmt->execute([$name, $old_price, $new_price, $image, $stock, $country, $city, $nbachat, $category]);
    }
    


    // public function get_products(){
    //     $database = new Database('localhost','root','123','ELECTROTHMAN');
    //     $query = "SELECT * FROM product";
    //     $stmt = $database->executeQuery($query);
       
    //     $stmt->execute();
    //     $productsDATA = $stmt->fetchALL();
    //     $products = array();
    //     foreach($productsDATA as $product){
    //         $products[] = new Products(0,$product['name'],$product['old_price'],$product['new_price'],$product['image'],$product['stock'],$product['country'],$product['city'],$product['nbachat'],$product['category']);
    //     }

    //     return $products;
    // }

            public function get_products()
        {

            $query = "SELECT * FROM product";
            $stmt = $this->pdo->query($query);
            $stmt->execute();
            $productsDATA = $stmt->fetchAll();

            $products = array();
            foreach ($productsDATA as $product) {
                $products[] = new Products($product['id'], $product['name'], $product['old_price'], $product['new_price'], $product['image'], $product['stock'], $product['country'], $product['city'], $product['nbachat'], $product['category']);
            }

            return $products;
        }
        public function get_products_based_category($category)
        {
            if($category == 0){
                $products = $this->get_products();
            }else if($category != 0){
                $query = "SELECT * FROM product WHERE category = '$category'";
                $stmt = $this->pdo->query($query);
                $stmt->execute();
                $productsDATA = $stmt->fetchAll();
                $products = array();
                foreach ($productsDATA as $product) {
                    $products[] = new Products($product['id'], $product['name'], $product['old_price'], $product['new_price'], $product['image'], $product['stock'], $product['country'], $product['city'], $product['nbachat'], $product['category']);
                }
            }


            

            return $products;
        }
        


    public function update_Product($id,$name,$old_price,$new_price,$image,$stock,$country,$city,$nbachat,$category){
        $update_Product = "UPDATE product SET name = '$name',
                                    old_price = '$old_price',
                                    new_price = '$new_price',
                                    image = '$image',
                                    stock = '$stock',
                                    country = '$country',
                                    city ='$city',
                                    nbachat = '$nbachat',
                                    category = '$category',
                                    
                                    WHERE id = '$id'";   
        $stmt = $this->pdo->query($update_Product);
        $stmt->execute();
    }

    public function Delete_product($id){
        $delete = "DELETE FROM product WHERE id = :id";
        $stmt = $this->pdo->prepare($delete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function get_popular_products (){
        $sql2="SELECT * FROM product ORDER BY nbachat DESC LIMIT 3 ";
        $result2 = $this->pdo->query($sql2);     
        $result2->execute();
        $POPproducts = array();
        foreach($result2 as $product){
            $POPproducts[] = new Products($product['id'],$product['name'],$product['old_price'],$product['new_price'],$product['image'],$product['stock'],$product['country'],$product['city'],$product['nbachat'],$product['category']);
        }

        return $POPproducts;

    }
    
}
?>