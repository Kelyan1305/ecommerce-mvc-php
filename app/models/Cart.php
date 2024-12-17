<?php
require_once '../config/database.php';

class Cart {
    public static function addToCart($productId, $quantity) {
        global $pdo;
        // Vérifier si le produit est déjà dans le panier
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE product_id = ?");
        $stmt->execute([$productId]);        
        $productInCart = $stmt->fetch();

        if ($productInCart) {
            // Mettre à jour la quantité du produit
            $newQuantity = $productInCart['quantity'] + $quantity;
            $updateStmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE product_id = ?");
            $updateStmt->execute([$newQuantity, $productId]);
        } else {
            // Ajouter un nouveau produit dans le panier
            $stmt = $pdo->prepare("INSERT INTO cart (product_id, quantity) VALUES (?, ?)");
            $stmt->execute([$productId, $quantity]);
        }
    }

   /* public static function getCartItems() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM cart");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/

    // Récupérer les éléments du panier avec les informations des produits
    /*public static function getCartItems() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT cart.id, cart.quantity, products.name
            FROM cart
            JOIN products ON cart.product_id = products.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/

    public static function getCartItems() {
        global $pdo;
        $stmt = $pdo->query("
            SELECT cart.id, cart.quantity, products.name, products.price
            FROM cart
            JOIN products ON cart.product_id = products.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     // Vider le panier
     public static function clearCart() {
        global $pdo;
        $stmt = $pdo->query("DELETE FROM cart");
        return $stmt->rowCount(); // Retourne le nombre de lignes supprimées
    }

    // Mettre à jour la quantité d'un produit dans le panier
    public static function updateQuantity($cartId, $quantity) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $stmt->execute([$quantity, $cartId]);
    }
}
?>
