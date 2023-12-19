<?php
// require_once 'db_config.php';

// class Database {
//     private static $instance;
//     private $connection;

//     private function __construct() {
//         $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
//         $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     }

    // public static function getInstance() {
    //     if (!self::$instance) {
    //         self::$instance = new Database();
    //     }
    //     return self::$instance;
    // }

    // public function getConnection() {
    //     return $this->connection;
    // }
// }

class Database
{
    private $pdo;
    private static $instance;

    public function __construct($servername, $username, $password, $dbname)
    {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function executeQuery($sql)
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            die();
            return false;
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database('localhost','root','123','ELECTROTHMAN');
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }
}


// Usage example
$servername = 'localhost';
$username = 'root';
$password = '123';
$dbname = 'ELECTROTHMAN';

$database = new Database($servername, $username, $password, $dbname);

$sql = "SELECT * FROM product";
$result = $database->executeQuery($sql);

// Display or process the result as needed
if ($result !== false) {

}

// // Close the connection (optional, as PDO automatically closes when the script ends)
// $database->closeConnection();



?>