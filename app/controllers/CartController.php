<?php
require_once '../app/models/Cart.php';

class CartController {
    public function showCart() {
        $cartItems = Cart::getCartItems();
        require_once '../app/views/cart.php';
    }

    // Vider le panier
    public function clearCart() {
        Cart::clearCart();
        header("Location: index.php?action=cart"); // Rediriger vers la page du panier
    }

     // Mettre à jour la quantité du produit dans le panier
     public function updateCart() {
        // Vérifier si les paramètres de l'ID du produit et de la quantité sont passés
        if (isset($_POST['cart_id']) && isset($_POST['quantity'])) {
            $cartId = $_POST['cart_id'];
            $quantity = $_POST['quantity'];

            // Mettre à jour la quantité dans la base de données
            Cart::updateQuantity($cartId, $quantity);

            // Rediriger vers la page du panier après la mise à jour
            header("Location: index.php?action=cart");
        }
    }
}
?>
