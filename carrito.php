<?php
require_once 'controllers/cartController.php';

$cartController = new CartController();

// Agregar producto al carrito
if (isset($_GET['add'])) {
    $productId = $_GET['add'];
    $cartController->addProductToCart($productId);
    header("Location: carrito.php");
    exit;
}

// Eliminar producto del carrito
if (isset($_GET['remove'])) {
    $productId = $_GET['remove'];
    $cartController->removeProductFromCart($productId);
    header("Location: carrito.php");
    exit;
}

// Mostrar el carrito
require_once 'views/cart/index.php';
?>
