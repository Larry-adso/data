<?php
/*
require_once '../../controllers/productController.php';
$productController = new ProductController();
$products = $productController->getProducts();
*/
?>

<section class="section">
    <div class="container">
        <h1 class="title">Productos Disponibles</h1>
        <div class="columns is-multiline">
            <?php foreach ($products as $product): ?>
                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-content">
                            <p class="title"><?= $product['nombre_producto']; ?></p>
                            <p><?= $product['descripción']; ?></p>
                            <p><strong>Precio: </strong>$<?= $product['precio_base']; ?></p>
                            <a href="carrito.php?add=<?= $product['id_producto']; ?>" class="button is-primary">Agregar al carrito</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
