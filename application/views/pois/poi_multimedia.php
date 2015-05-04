<html>
<head>
	<title>Multimedia de POI</title>
	<meta charset='utf-8'>
</head>
<body>

	<?= form_open("/pois/pois_controller/getMultimediaPoi/".$id)?>
	<?php
		$tipo_recurso	= array('name' => 'tipo_recurso');
		$nombre_recurso	= array('name' => 'nombre_recurso');
		$ruta_recurso	= array('name' => 'ruta_recurso');
	?>

	<label>Tipo: </label>
	<select name='tipo_recurso' id='tipo_recurso'>
        <option value='Imagen'> Imagen </option>
        <option value='Video'> Vídeo </option>
	</select><br>

	<label>Nombre: <?= form_input($nombre_recurso) ?></label><br>
	<label>Ruta: <input type="file" name="ruta_recurso"> </label><br>

	<?= form_submit('','Añadir multimedia POI') ?>

	<?= form_close()?>
</body>
</html>