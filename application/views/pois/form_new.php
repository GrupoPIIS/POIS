<html>
<head>
	<title>Nuevo POI</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/pois/pois_controller/getNewPoi")?>
	<?php
		$lng 		= array('name' => 'lng');
		$lat		= array('name' => 'lat');
		$nombre_poi	= array('name' => 'nombre_poi');
		$txt_rep	= array('name' => 'txt_rep');
		$direccion	= array('name' => 'direccion');
		$id_usuario	= array('name' => 'id_usuario');

		//$id_categoria= array('name' => 'id_categoria');
	?>
	<label>Coordenada longitud: <?= form_input($lng) ?></label>
	<label>Coordenada latitud: <?= form_input($lat) ?></label>
	<label>Nombre: <?= form_input($nombre_poi) ?></label>
	<label>Texto representativo: <?= form_input($txt_rep) ?></label>
	<label>Dirección: <?= form_input($direccion) ?></label>
	<label>Usuario: (en el futuro lo cogerá de la sesión, excepto si es admin)<?= form_input($id_usuario) ?></label>
	<!--<label>Categoría: (checkbox)<?= form_input($id_categoria) ?></label>-->

	<?= form_submit('','Añadir POI') ?>

	<?= form_close()?>
</body>
</html>