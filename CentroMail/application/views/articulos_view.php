<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Articulos</title>
    </head>
    <body>
        <h1>Bienvenido a la web sobre artículos</h1>
        <a href ="<?= base_url() . 'index.php/formulario/' ?>" 
           title="Añadir artículo">Añadir articulo
        </a>

        <p>Estos son los artículos publicados.</p>
        <?php foreach ($articulos as $fila): ?>

            <a href="<?=
            base_url() . 'index.php/un_articulo/arti/' . $fila->titulo
            . '/' . $fila->descripcion . '/' . $fila->cuerpo
            ?>" title="Ver articulo">
                <h2><?= $fila->titulo; ?></h2></a>
            <p><?= $fila->descripcion; ?></p>
            <br/>
        <?php endforeach; ?>
    </body>
</html>

