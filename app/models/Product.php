<?php
require_once '../config/database.php';

class Product {

    private $db;

    public function __construct($db) {
        if (!$db instanceof PDO) {
            throw new Exception("Une instance PDO est requise");
        }
        $this->db = $db;
    }

    public static function getAllProducts() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

 
    public function searchProducts($query) {
        $sql = "SELECT * FROM products WHERE name LIKE :query OR description LIKE :query";
        $stmt = $this->db->prepare($sql); 
        $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR); 
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    
}
?>
