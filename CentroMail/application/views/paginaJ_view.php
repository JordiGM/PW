<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $data['Titulo'] ?> </title>
</head>
<body>

<?php var_dump ($data);?>

    <h1><?php echo $data['Titulo'] ?></h1>
    <br>
 <img src= <?php echo $data['Imagen']?> >
    <br>
    <?php foreach ($pegi as $fila):?>
    
<img src= <?php echo $fila['Pegi']?> >
    
    <?php endforeach; ?>
    <br>
    
    <h2><?php echo "Descripcion: <tab>"?></h2>
    <p> <?php echo $data['Descripcion'] ?></p><br>
    <h2><?php echo "Valoracion: "?></h2>
    <p> <?php echo $data['Valoracion'] ?></p><br>
    <?php foreach ($comentario as $fila):?>
    
    <?php echo $fila['Comentario'] ?>
    
    <?php endforeach; ?>
</body>
</html>
