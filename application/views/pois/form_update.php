<html>
<head>
	<title>Modificar POI</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/pois/pois_controller/getUpdatePoi/".$id)?>
	<?php
		$lng 		= array('name' => 'lng', 'value' => $poi->result()[0]->lng);
		$lat		= array('name' => 'lat', 'value' => $poi->result()[0]->lat);
		$nombre_poi	= array('name' => 'nombre_poi', 'value' => $poi->result()[0]->nombre_poi);
		$txt_rep	= array('name' => 'txt_rep', 'value' => $poi->result()[0]->txt_rep);
		$direccion	= array('name' => 'direccion', 'value' => $poi->result()[0]->direccion);
		$id_usuario		= array('name' => 'id_poi', 'value' => $poi->result()[0]->id_usuario);

		$id_categoria= array('name' => 'id_categoria');
	?>
	<label>Coordenada longitud: <?= form_input($lng) ?></label>
	<label>Coordenada latitud: <?= form_input($lat) ?></label>
	<label>Nombre: <?= form_input($nombre_poi) ?></label>
	<label>Texto representativo: <?= form_input($txt_rep) ?></label>
	<label>Dirección: <?= form_input($direccion) ?></label>
	<label>Usuario: (en el futuro lo cogerá de la sesión, excepto si es admin)<?= form_input($id_usuario) ?></label>
	
	<label>Categoría: </label>
	<select name='id_categoria' id='id_categoria'>
		<option>--- Escoge una Categoría ---</option>
		<?PHP if($categorias){
			foreach ($categorias->result() as $categoria){ ?>
				<option value=<?= $categoria->id_cat; ?>> <?= $categoria->nombre_cat; ?> </option>
		<?PHP }
		}else echo 'No hay datos.';?>
	</select>

	<?= form_submit('','Actualizar poi') ?>

	<?= form_close()?>
</body>
</html>