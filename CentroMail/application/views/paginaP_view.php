<!DOCTYPE html>
<html>
<head>
	<title> Pagina Principal </title>
</head>
<body>
    <h1><?php echo "Juegos ordenador por valoracion" ?></h1>
    <br>
    
    <?php foreach ($juego as $fila):?>
    
    <?php print '<a href="CAMBIAR"><img src="$fila->imagen"></a>' ?>
    
    <?php endforeach; ?>
  
</body>
</html>
