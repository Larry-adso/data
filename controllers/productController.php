<?php
// Asegúrate de que la ruta sea correcta
if (!file_exists(__DIR__ . '/../config/db.php')) {
    die('El archivo db.php no se encuentra en la ruta esperada.');
}

require_once __DIR__ . '/../config/db.php';

class ProductController {
    public function getProducts() {
        global $pdo;
        try {
            $stmt = $pdo->query("SELECT * FROM Productos");
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($products)) {
                echo "No se encontraron productos.";
            }
            return $products;
        } catch (PDOException $e) {
            echo 'Error en la consulta: ' . $e->getMessage();
            return [];
        }
    }
}
?>