<?php
require_once '../app/models/Product.php';

class ProductController {

    private $product;

    public function __construct($product) {
        $this->product = $product;
    }
    public function showHome() {
        $products = Product::getAllProducts();
        require_once '../app/views/home.php';
    }

    public function showProducts() {
        $products = Product::getAllProducts();
        require_once '../app/views/products.php';
    }

    public function addToCart($productId, $quantity) {
        Cart::addToCart($productId, $quantity );
        header("Location: index.php?action=cart");
    }

    public function search() {        
        if (isset($_GET['query'])) {
            $query = trim($_GET['query']);      
            $products = $this->product->searchProducts($query);
            require '../app/views/products.php';
        } else {
            require '../app/views/home.php';
        }
    }
}
?>
