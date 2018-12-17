<!DOCTYPE html>
<html>
<head>
	<title>Buscador por productora</title>
</head>
<body>

 <?= form_open(base_url().'index.php/Buscador/BusquedaJPorProductora',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_label('Productora','Productora',array('class'=>'label')); ?>
 <?= form_input('productora','','class="input"') ?> <br />
 
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>

</body>
</html>