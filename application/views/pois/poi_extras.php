<html>
<head>
	<title>Extras de POI</title>
	<meta charset='utf-8'>
</head>
<body>

	<?= form_open("/pois/pois_controller/getExtraPoi/".$id)?>
	<?php
		$slogan		= array('name' => 'slogan');
		$telefono1	= array('name' => 'telefono1');
		$telefono2	= array('name' => 'telefono2');
		$direccion_local	= array('name' => 'direccion_local');
		$horario	= array('name' => 'horario');
	?>

	<label>Slogan: <?= form_input($slogan) ?></label><br>
	<label>Teléfono: <?= form_input($telefono1) ?></label><br>
	<label>Teléfono secundario: <?= form_input($telefono2) ?></label><br>
	<label>Dirección Local: <?= form_input($direccion_local) ?></label><br>
	<label>Horario: <?= form_input($horario) ?></label><br>

	<?= form_submit('','Añadir extras POI') ?>

	<?= form_close()?>
</body>
</html>