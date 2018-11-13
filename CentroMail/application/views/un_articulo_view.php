<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$titulo;?></title>
    </head>
    <body>
        <a href="<?=base_url().'index.php/articulos/'?>" title="Ver todos los 
           articulos">Ver todos los articulos</a>
        <p>Este es el artículo.</p>
        
        <h1><?=$titulo_articulo;?></h1>
        <h3><?=$descripcion;?></h3>
        <p><?=$cuerpo;?></p>
        
    </body>
</html>

