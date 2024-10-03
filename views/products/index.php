<?php
require_once '../../controllers/productController.php';
$productController = new ProductController();
$products = $productController->getProducts();

// Depuración: imprime el contenido de $products
var_dump($products); // Esto te ayudará a ver qué está pasando

?>

<section class="section">
    <div class="container">
        <h1 class="title">Productos Disponibles</h1>
        <div class="columns is-multiline">
            <?php if (empty($products)): ?>
                <p>No hay productos disponibles.</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div class="column is-one-quarter">
                        <div class="card">
                            <div class="card-content">
                                <p class="title"><?= htmlspecialchars($product['nombre_producto']); ?></p>
                                <p><?= htmlspecialchars($product['descripción']); ?></p>
                                <p><strong>Precio: </strong>$<?= htmlspecialchars($product['precio_base']); ?></p>
                                <a href="carrito.php?add=<?= htmlspecialchars($product['id_producto']); ?>" class="button is-primary">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>