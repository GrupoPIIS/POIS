<html>
<head>
	<title>Nueva Red Social</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open_multipart("/redes_sociales/redes_sociales_controller/getNewSocial")?>
	<?php
		$nombre_red	= array('name' => 'nombre_red');
		$icono_red	= array('name' => 'icono_red');
	?>
	
	<label>Nombre: <?= form_input($nombre_red) ?></label><br>
	<label>Icono: <input type="file" name="icono_red"></label><br>

	<?= form_submit('','Añadir red social') ?>

	<?= form_close()?>
</body>
</html>