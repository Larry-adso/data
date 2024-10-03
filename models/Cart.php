<?php
require_once 'models/Product.php';

class Cart {
    private $items = [];

    // Agregar un producto al carrito
    public function addToCart($productId, $quantity = 1) {
        if (isset($this->items[$productId])) {
            $this->items[$productId] += $quantity;
        } else {
            $this->items[$productId] = $quantity;
        }
    }

    // Eliminar un producto del carrito
    public function removeFromCart($productId) {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    // Obtener los productos en el carrito
    public function getCartItems() {
        return $this->items;
    }

    // Calcular el total del carrito
    public function getTotal() {
        $total = 0;
        $productModel = new Product();

        foreach ($this->items as $productId => $quantity) {
            $product = $productModel->getProductById($productId);
            $total += $product['precio_base'] * $quantity;
        }

        return $total;
    }

    // Vaciar el carrito
    public function clearCart() {
        $this->items = [];
    }
}
?>
