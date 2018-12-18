<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualización de productora</title>
    </head>
    <body>
        <h1>Actualiza productora</h1>
        <?php foreach ($productoras as $fila):?>
        <a href="<?= base_url()."index.php/Admin/formActualizacionProductora/".$fila['id'] ?>"><?php echo $fila['Nombre'] ?></a><br>
        <?php endforeach; ?>
        <hr/>
        <a href="<?= base_url() . 'index.php/Admin/' ?>" title="PanelAdmin">Panel de Administración</a>
    </body>
</html>