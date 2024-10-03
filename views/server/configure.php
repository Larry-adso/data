<?php
require_once '../../controllers/serverConfigController.php';
$serverConfigController = new ServerConfigController();
$serverConfigurations = $serverConfigController->getServerConfigurations(1); // El ID del producto puede ser dinámico.
?>

<section class="section">
    <div class="container">
        <h1 class="title">Configura tu Servidor</h1>
        <form action="guardar_configuracion.php" method="POST">
            <?php foreach ($serverConfigurations as $config): ?>
                <div class="field">
                    <label class="label"><?= $config['tipo_caracteristica']; ?></label>
                    <div class="control">
                        <input type="text" name="config[<?= $config['id_caracteristica']; ?>]" class="input" value="<?= $config['valor']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="button is-primary">Guardar configuración</button>
        </form>
    </div>
</section>
