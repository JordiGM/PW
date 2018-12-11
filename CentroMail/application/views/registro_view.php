<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro de usuario</title>
    </head>
    <body>
        <h1>Registrar usuario</h1>
        <?= form_open(base_url() . 'index.php/Usuario/verifyRegister', array('name' => 'form_reg')); ?>
        <?= form_label('Nombre', 'Nombre'); ?>
        <?= form_input('Nombre', @set_value('Nombre')) ?><br/><br/>

        <?= form_label('Correo', 'Correo'); ?>
        <?= form_input('Correo', @set_value('Correo')) ?><br/><br/>
        
        <?= form_label('Usuario', 'Usuario');?>
        <?= form_input('Usuario', @set_value('Usuario')) ?><br/><br/>

        <?= form_label('Año de nacimiento', 'Año de nacimiento'); ?>
        <?= form_input('Annio', @set_value('annio')); ?><br/><br/>

        <?= form_label('Contraseña', 'Contraseña'); ?>
        <?= form_password('Contrasennia'); ?><br/><br/>

        <?= form_label('Repetir contraseña', 'Repetir contraseña'); ?>
        <?= form_password('Contrasennia2'); ?><br/><br/>

        <?= form_submit('submit_reg', 'Registrar'); ?>

        <a href="<?= base_url() . 'index.php/Usuario/' ?>" title="Iniciar sesión">
            Iniciar Sesión</a>

        <?= form_close(); ?>
        <!--Prueba-->
        <hr/>

        <?= validation_errors(); ?>
    </body>
</html>

