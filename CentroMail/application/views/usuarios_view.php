<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h1>Iniciar sesión</h1>
        <?php if (isset($mensaje)): ?>
            <h2><?= $mensaje ?></h2>
        <?php endif; ?>
        <!--Formulario-->

        <form name="form_iniciar" 
              action="<?= base_url() . 'index.php/usuarios/verify_sesion' ?>" method="post">

            <label for="Usuario"> Usuario</label>
            <input type="text" name="user"/><br/>
            <br/>
            <label for="contraseña"> Contraseña</label>
            <input type="password" name="pass"/><br/>
            <br/>
            <input type="submit" value="Entrar" name="submit"/><br/>
            <br/>
            <a href="<?= base_url() . 'usuarios/registro' ?>" 
               title="Deseo registrarme">
                Registrarme
            </a>
        </form>
    </body>
</html>

