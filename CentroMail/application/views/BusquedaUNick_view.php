<!DOCTYPE html>
<html>
<head>
	<title>Buscador por nick</title>
</head>
<body>

 <?= form_open(base_url().'index.php/Buscador/BusquedaUNick',
 array('name'=>'mi_form','id'=>'form'));?>
 <?= form_label('Nick','Nick',array('class'=>'label')); ?>
 <?= form_input('nick','','class="input"') ?> <br />
 
 <?= form_submit('submit', 'Enviar datos','class="submit"');?>
 <?= form_close(); ?>

</body>
</html>