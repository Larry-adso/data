<?php
session_start();

class CartController {
    public function addToCart($productId) {
        // Inicializa el carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Añadir producto al carrito
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]++;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }
    }

    public function getCart() {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return [];
    }
}
?>
