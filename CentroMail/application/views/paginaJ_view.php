<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $titulo ?> </title>
</head>
<body>
    <h1><?php echo $titulo ?></h1>
    <br>
    <?php print "<img src= $imagen >" ?>
    <br>
    <?php foreach ($pegi as $fila):?>
    
    <?php print "<img src= $fila->pegi >" ?>
    
    <?php endforeach; ?>
    <br>
    
    <h2><?php echo "Descripcion: <tab>"?></h2>
    <p> <?php echo "$descripcion <br>" ?></p>
    <h2><?php echo "Valoracion: "?></h2>
    <p> <?php echo "$valoracion <br>" ?></p>
    
    <?php foreach ($comentario as $fila):?>
    
    <?php echo $fila->comentario ?>
    
    <?php endforeach; ?>
</body>
</html>
