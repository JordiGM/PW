<?php
/**
 * @author Pablo Piedad Garrido
 */
defined('BASEPATH') OR exit('No direct script access allowed');x
?><!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>CSS/estilosCSS.css">
	<meta charset="utf-8">
	<title>CentroMail</title>
</head>
<body>

<div align="center" id="container">
<h1>Pagina de inicio</h1>
	<div id="body">
            <ul>
                <li> <a href="<?=base_url().'index.php/Welcome/'?>" title="Inicio">Inicio</a></li>
                <li><a href="#Buscar">Buscar</a></li>
                <li style="float:right"><a href="#login">Login</a></li>
            </ul>

            <p>Bienvenido a la web de CentroMail.<br><br>En ella encontrará valoraciones de videojuegos y comentarios de los usuarios<p>
            <center>
                <h2>VIDEOJUEGOS MÁS VALORADOS SEGÚN NUESTROS USUARIOS</h2>
            </center>
            <!--//Aqui iria una vista a videojuegos cuya valoración va de mayor a menor-->
	</div>
	
</div>

</body>
</html>