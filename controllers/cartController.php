<?php
session_start();
require_once 'models/Cart.php';
require_once 'models/Product.php';

class CartController {
    private $cart;

    public function __construct() {
        // Si no hay carrito en la sesión, se crea uno nuevo
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new Cart();
        }

        $this->cart = $_SESSION['cart'];
    }

    // Agregar un producto al carrito
    public function addProductToCart($productId, $quantity = 1) {
        $this->cart->addToCart($productId, $quantity);
        $_SESSION['cart'] = $this->cart;  // Actualizar la sesión
    }

    // Mostrar los productos del carrito
    public function showCart() {
        return $this->cart->getCartItems();
    }

    // Eliminar un producto del carrito
    public function removeProductFromCart($productId) {
        $this->cart->removeFromCart($productId);
        $_SESSION['cart'] = $this->cart;  // Actualizar la sesión
    }

    // Obtener el total del carrito
    public function getCartTotal() {
        return $this->cart->getTotal();
    }

    // Vaciar el carrito
    public function clearCart() {
        $this->cart->clearCart();
        $_SESSION['cart'] = $this->cart;  // Actualizar la sesión
    }
}
?>
