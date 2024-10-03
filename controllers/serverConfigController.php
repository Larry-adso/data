<?php
require_once 'config/db.php';

class ServerConfigController {
    public function getServerConfigurations($productId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM Características_Servidores WHERE id_producto = ?");
        $stmt->execute([$productId]);
        return $stmt->fetchAll();
    }
}
?>
