<?php
require_once '../../controllers/cartController.php';
$cartController = new CartController();
$cart = $cartController->getCart();
?>

<section class="section">
    <div class="container">
        <h1 class="title">Carrito de Compras</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $productId => $quantity): ?>
                    <!-- Aquí obtendrás los datos del producto con $productId -->
                    <tr>
                        <td>Producto #<?= $productId; ?></td>
                        <td><?= $quantity; ?></td>
                        <td>$Precio</td>
                        <td>$Total</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="compra.php" class="button is-primary">Proceder a la compra</a>
    </div>
</section>
