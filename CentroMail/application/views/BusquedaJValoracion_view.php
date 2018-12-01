<!DOCTYPE html>
<html>
<head>
	<title>Buscador por valoracion</title>
</head>
<body>

 <?= form_open(base_url().'index.php/formulario/validar',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_label('Valoracion','Valoracion',array('class'=>'label')); ?>
 <?= form_input('valoracion','','class="input"') ?> <br />
 
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>

</body>
</html>