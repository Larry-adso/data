<?php
require_once 'controllers/cartController.php';
require_once 'models/Purchase.php';

$cartController = new CartController();
$cartItems = $cartController->showCart();
$total = $cartController->getCartTotal();
$purchaseModel = new Purchase();

// Aquí puedes simular un usuario logueado
$userId = 1; // ID de ejemplo, deberías usar el ID real del usuario autenticado
$paymentMethod = 'Tarjeta de crédito'; // Simular método de pago

// Si se confirma la compra
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $purchaseModel->createOrder($userId, $total, $paymentMethod);
    $purchaseModel->saveOrderDetails($orderId, $cartItems);
    $cartController->clearCart();  // Limpiar carrito después de la compra
    echo "Compra realizada exitosamente. ID de la orden: $orderId";
} else {
    require_once 'views/purchases/checkout.php';
}
?>
