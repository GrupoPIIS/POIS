<html>
<head>
	<title>Modificar Red Social</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open_multipart("/redes_sociales/redes_sociales_controller/getUpdateSocial/".$id)?>
	<?php
		$nombre_red	= array('name' => 'nombre_red', 'value' => $redes->result()[0]->nombre_red);
		$userfile	= array('name' => 'userfile', 'value' => "./uploads/".$redes->result()[0]->icono_red);
	?>

	<label>Nombre: <?= form_input($nombre_red) ?></label><br>
	<label>Icono: <input type="file" name="userfile"></label><br>

	<?= form_submit('','Actualizar red social') ?>

	<?= form_close()?>
</body>
</html>