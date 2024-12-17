<?php
require_once '../app/controllers/ProductController.php';
require_once '../app/controllers/CartController.php';

$action = $_GET['action'] ?? 'home';

$product = new Product($pdo);
$cartController = new CartController();
$productController = new ProductController($product);

switch ($action) {
 
    case 'products':
        $productController->showProducts();
        break;
    case 'add_to_cart':
        $productController->addToCart($_GET['id'], $_GET['quantity'] );
        break;
    case 'cart':
        $cartController->showCart();
        break;
    case 'clear_cart':
        $cartController->clearCart();
        break;
        case 'update_cart':
            $cartController->updateCart();
        break;
        case 'search':
            $productController->search();
        break;
    default:
        $productController->showHome();
        break;
}
?>
