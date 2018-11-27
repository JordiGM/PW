<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Inicio de sesión</title>
    </head>
    <body>
        <p>Estos son los usuarios publicados.</p>
        <?php foreach($usuarios as $fila): ?>
        <h2><?=$fila['Correo']; ?></h2></a>
        <br/>
        <?php endforeach; ?>
    </body>
</html>