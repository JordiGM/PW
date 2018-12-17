<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h1>Iniciar sesión</h1>
        <form name="FormUsuario" action="<?=base_url() . 'index.php/Usuario/verify_sesion' ?>" method="POST"> 
            <label for="Nombre">Usuario </label>
            <input type="text" name="Nombre"/><br/>
            
            <label for="Contrasennia">Contraseña</label>
            <input type="password" name="Contrasennia"/><br/>
            
            <input type="submit" value="Login" name="submit"/><br/>
            <a href="<?=base_url() . 'index.php/Usuario/register'?>"
               title="Deseo registrarme">
                Registrate
            </a>
        </form>
        
    </body>
</html>