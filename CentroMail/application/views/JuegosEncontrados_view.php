<!DOCTYPE html>
<html>
<head>
	<title> Juegos encontrados </title>
</head>
<body>
    <h1><?php echo "Juegos encontrados ordenador por valoracion" ?></h1>
    <br>
	<?php var_dump($_GET);?>
    <?php foreach ($_GET as $fila):?>
	

    <?php echo "$fila->nombre"?> <br>
    <?php print '<a href="CAMBIAR"><img src= "$fila->imagen"></a>' ?> <br>
    
    <?php endforeach; ?>
  
</body>
</html>
