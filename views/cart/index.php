<?php
require_once '../../controllers/cartController.php';
$cartController = new CartController();
$cartItems = $cartController->showCart();
$total = $cartController->getCartTotal();
?>

<section class="section">
    <div class="container">
        <h1 class="title">Carrito de Compras</h1>
        <?php if (!empty($cartItems)): ?>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $productModel = new Product();
                    foreach ($cartItems as $productId => $quantity):
                        $product = $productModel->getProductById($productId);
                    ?>
                    <tr>
                        <td><?= $product['nombre_producto']; ?></td>
                        <td><?= $quantity; ?></td>
                        <td>$<?= $product['precio_base']; ?></td>
                        <td>$<?= $product['precio_base'] * $quantity; ?></td>
                        <td>
                            <a href="carrito.php?remove=<?= $productId; ?>" class="button is-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="title is-4">Total: $<?= $total; ?></p>
            <a href="compra.php" class="button is-primary">Proceder a la compra</a>
        <?php else: ?>
            <p class="subtitle">Tu carrito está vacío.</p>
        <?php endif; ?>
    </div>
</section>

