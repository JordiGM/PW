<!DOCTYPE html>
<html>
<head>
	<title> Juegos encontrados </title>
</head>
<body>
    <h1><?php echo "Juegos encontrados ordenador por valoracion" ?></h1>
    <br>
	<?php var_dump($data)?>
	
    <?php foreach ($data as $fila):?>
	
	<?php echo $fila['Titulo']?><br>	
	
	
	<a href="<?=base_url() . 'index.php/InformacionJuego/mostrarJuego/3'?>"</a><img src= <?php echo $fila['Imagen']?> ><br>


   
    <?php endforeach; ?>
  
</body>
</html>
