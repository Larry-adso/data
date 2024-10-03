<?php
require_once 'config/db.php';

class ProductController {
    public function getProducts() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM Productos");
        return $stmt->fetchAll();
    }
}
?>
