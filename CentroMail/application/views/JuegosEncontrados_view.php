<!DOCTYPE html>
<html>
<head>
	<title> Juegos encontrados </title>
</head>
<body>
    <h1><?php echo "Juegos encontrados ordenados por valoracion" ?></h1>
    <br>
	
	
        <?php foreach($juegoFound as $fila):?>
	<?='Titulo = ' . $fila['Titulo']?><br>
        <?='Fecha lanzamiento = ' . $fila['Annio']?><br>
        <?='Los usuarios le han dado una valoracion media de ' . $fila['ValoracionMedia'] . ' sobre 5'?><br>
        <?='Descripción del juego: ' . $fila['Descripcion']?><br>
        <?php endforeach; ?>
        <br>
        <a href="<?=base_url().'index.php/Buscador/'?>">Volver a buscar</a>
      
</body>
</html>
