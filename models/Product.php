<?php
require_once 'config/db.php';

class Product {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obtener todos los productos
    public function getAllProducts() {
        $stmt = $this->pdo->query("SELECT * FROM Productos");
        return $stmt->fetchAll();
    }

    // Obtener un solo producto por su ID
    public function getProductById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Productos WHERE id_producto = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Obtener productos por tipo (servidor, cloud, dominio)
    public function getProductsByType($type) {
        $stmt = $this->pdo->prepare("SELECT * FROM Productos WHERE tipo_producto = ?");
        $stmt->execute([$type]);
        return $stmt->fetchAll();
    }
}
?>
