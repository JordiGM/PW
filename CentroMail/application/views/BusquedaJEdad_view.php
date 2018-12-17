<!DOCTYPE html>
<html>
<head>
	<title>Buscador por edad</title>
</head>
<body>

 <?= form_open(base_url().'index.php/Buscador/BusquedaJPorEdad',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_label('Edad','Edad',array('class'=>'label')); ?>
 <?= form_input('edad','','class="input"') ?> <br />
 
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>

</body>
</html>