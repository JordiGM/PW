<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Bienvenido al panel de aministración</title>
    </head>
    <body>

        <div id="container">
            <h1>¡Bienvenido al panel de aministración!</h1>
            <p>
                 <a href="<?= base_url().'index.php/Admin/RegistroProductora'?>" title="RegistroProductora">Registro Productora</a>
                 <a href="<?= base_url().'index.php/Admin/ActualizacionProductora'?>" title="ActualizacionProductora">Actualizacion Productora</a>
            </p>
            <hr/>
            <?php if (isset($mensaje)): ?>
                <h2><?= $mensaje ?></h2>
            <?php endif; ?>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>

    </body>
</html>