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
        <?= form_open(base_url() . "index.php/Admin/verifyRegisterProductora/".$productora[0]['id'], array('name' => 'form_reg')); ?>
        <?= form_label('Nombre', 'Nombre'); ?>
        <?= form_input('Nombre', @set_value('Nombre')) ?><br/><br/>
        <?= form_submit('submit_reg', 'Registrar'); ?>

        <a href="<?= base_url() . 'index.php/Admin/' ?>" title="PanelAdmin">Panel de Administración</a>

        <?= form_close(); ?>
        <hr/>
        <?= validation_errors(); ?>
    </body>
</html>