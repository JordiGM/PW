<!DOCTYPE html>
<html>
<head>
	<title> Usuarios encontrados </title>
</head>
<body>
    <h1><?php echo "Usuarios encontrados" ?></h1>
    <br>
    
    <?php foreach ($usuario as $fila):?>
    
    <?php echo "$fila->nombre"?> <br>
	
	<?php echo "$fila->nick"?> <br>
    
    <?php endforeach; ?>
  
</body>
</html>
