<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo artículo</title>
    </head>
    <body>
        <a href="<?= base_url() . 'index.php/articulos' ?>"
           title ="Articulos">Articulos</a>
        <h1>Insertar articulo</h1>

        <?= form_open(base_url() . 'index.php/formulario/validar', array('name' => 'mi_form', 'id' => 'form'));
        ?>
        <?= form_label('Titulo', 'Titulo', array('class' => 'label')); ?>
        <?= form_input('titulo', '', 'class="input"') ?><br />

        <br />

        <?= form_label('Descripción', 'Descripción', array('class' => 'label')); ?><br />
        <?= form_textarea('descripcion', '', 'class="textarea" row="25px"'); ?> <br/>

        <br/>
        <?= form_label('Cuerpo', 'Cuerpo', array('class' => 'label')); ?> <br />
        <?= form_textarea('cuerpo', '', 'class="textarea" row="50px"'); ?> <br/>

        <?= form_submit('submit', 'Enviar datos', 'class="submit"'); ?>
        <?= form_close(); ?>

        <hr/>
        <h3>Posibles errores</h3>
        <?= validation_errors(); ?>

    </body>
</html>

