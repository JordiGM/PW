<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualización de productora <?php echo $productora[0]['Nombre'] ?></title>
    </head>
    <body>
        <h1>Actualización de productora <?php echo $productora[0]['Nombre'] ?></h1>
        <?= form_open(base_url() . "index.php/Admin/verifyEliminarProductora/".$productora[0]['id'], array('name' => 'form_reg')); ?>
        <h3>¿Desea eliminar seguro <?php echo $productora[0]['Nombre']?>?</h3>
        <?= form_submit('submit_si', 'Si'); ?>
        <?= form_submit('submit_si', 'No'); ?>

        <a href="<?= base_url() . 'index.php/Admin/' ?>" title="PanelAdmin">Panel de Administración</a>

        <?= form_close(); ?>
        <hr/>
        <?= validation_errors(); ?>
    </body>
</html>