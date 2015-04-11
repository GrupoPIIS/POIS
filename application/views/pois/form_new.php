<html>
<head>
	<title>Nuevo POI Admin</title>
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

		$id_categoria= array('name' => 'id_categoria');
	?>
	<?php echo $this->session->userdata('rol');?>

	<?PHP if($this->session->userdata('rol') == 0){?>
		<label>Usuario: </label>
		<select name='id_usuario' id='id_usuario'>
			<option>--- Escoge un Usuario ---</option>
			<?PHP if($usuarios){
				foreach ($usuarios->result() as $usuario){ ?>
					<option value=<?= $usuario->id_usuario; ?>> <?= $usuario->nombre; ?> </option>
			<?PHP }
			}else echo 'No hay datos.';?>
		</select>
	<?PHP } ?>

	<label>Coordenada longitud: <?= form_input($lng) ?></label>
	<label>Coordenada latitud: <?= form_input($lat) ?></label>
	<label>Nombre: <?= form_input($nombre_poi) ?></label>
	<label>Texto representativo: <?= form_input($txt_rep) ?></label>
	<label>Dirección: <?= form_input($direccion) ?></label>
	
	<label>Categoría: </label>
		<?PHP if($categorias){
			foreach ($categorias->result() as $categoria){ ?>
				<input type="checkbox" name='id_categoria[]' id='id_categoria[]' value=<?= $categoria->id_cat; ?> /> <?= $categoria->nombre_cat; ?>
		<?PHP }
		}else echo 'No hay datos.';?>
	</select>

	<?= form_submit('','Añadir POI') ?>

	<?= form_close()?>
</body>
</html>