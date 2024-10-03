<?php
class PurchaseController {
    public function createOrder($userId, $cart) {
        global $pdo;

        // Crear la orden de compra
        $stmt = $pdo->prepare("INSERT INTO Compras (id_usuario, total_compra, método_pago) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $total, $paymentMethod]);

        $orderId = $pdo->lastInsertId();

        // Guardar los detalles de la compra
        foreach ($cart as $productId => $quantity) {
            $stmt = $pdo->prepare("INSERT INTO Detalle_Compra (id_compra, id_producto, cantidad, precio_unitario) VALUES (?, ?, ?, ?)");
            $stmt->execute([$orderId, $productId, $quantity, $price]);
        }
    }
}
?>
