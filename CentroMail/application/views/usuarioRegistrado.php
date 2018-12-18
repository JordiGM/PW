<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>CSS/estilosCSS.css">
    <meta charset="utf-8">
    <title>CentroMail</title>
</head>
    <body>
        <div align="center" id="container">
            <div id="body">
                <ul>
                    <li><a href="<?=base_url().'index.php/Welcome/'?>" title="Inicio">Inicio</a></li>
                    <li><a href="<?=base_url().'index.php/Buscador/'?>">Buscar</a></li>
                    <li style="float:right"><a href="<?=base_url().'index.php/Usuario/mostrarDatos/'?>">Mostrar</a></li>
                    <li style="float:right"><a href="<?=base_url().'index.php/Usuario/logout/'?>">Logout</a></li>
                </ul>

                <p>Bienvenido a la web de CentroMail.<br><br>
                    En ella encontrará valoraciones de videojuegos y comentarios de los usuarios
                </p>
                <center>
                    <h2>VIDEOJUEGOS MÁS VALORADOS SEGÚN NUESTROS USUARIOS</h2>
                </center>
                <!--//Aqui iria una vista a videojuegos cuya valoración va de mayor a menor-->
            </div>	
        </div>
    </body>
</html>

