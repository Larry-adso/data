<?php
require_once 'config/db.php';

class Purchase {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Crear una orden de compra
    public function createOrder($userId, $total, $paymentMethod) {
        $stmt = $this->pdo->prepare("INSERT INTO Compras (id_usuario, total_compra, método_pago) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $total, $paymentMethod]);

        return $this->pdo->lastInsertId();
    }

    // Guardar el detalle de la compra
    public function saveOrderDetails($orderId, $cartItems) {
        $stmt = $this->pdo->prepare("INSERT INTO Detalle_Compra (id_compra, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
        
        foreach ($cartItems as $productId => $quantity) {
            $productModel = new Product();
            $product = $productModel->getProductById($productId);
            $stmt->execute([$orderId, $productId, $quantity, $product['precio_base']]);
        }
    }
}
?>
