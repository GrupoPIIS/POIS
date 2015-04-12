<html>
<head>
	<title>Modificar POI</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/pois/pois_controller/getUpdatePoi/".$id)?>
	<?php
		$lng 		= array('name' => 'lng', 'value' 		=> $poi->result()[0]->lng);
		$lat		= array('name' => 'lat', 'value' 		=> $poi->result()[0]->lat);
		$nombre_poi	= array('name' => 'nombre_poi', 'value' => $poi->result()[0]->nombre_poi);
		$txt_rep	= array('name' => 'txt_rep', 'value' 	=> $poi->result()[0]->txt_rep);
		$direccion	= array('name' => 'direccion', 'value' 	=> $poi->result()[0]->direccion);
		$id_usuario	= array('name' => 'id_poi');

		$id_categoria= array('name' => 'id_categoria');

		if($extras){
			$slogan		= array('name' => 'slogan', 'value' 		=> $extras->result()[0]->slogan);
			$telefono1	= array('name' => 'telefono1', 'value' 		=> $extras->result()[0]->telefono1);
			$telefono2	= array('name' => 'telefono2', 'value' 		=> $extras->result()[0]->telefono2);
			$direccion_local= array('name' => 'direccion_local', 'value'=> $extras->result()[0]->direccion_local);
			$horario	= array('name' => 'horario', 'value' 		=> $extras->result()[0]->horario);
		}

		if($multimedia){
			$tipo_recurso	= array('name' => 'tipo_recurso', 'value' 		=> $multimedia->result()[0]->tipo_recurso);
			$nombre_recurso	= array('name' => 'nombre_recurso', 'value' 	=> $multimedia->result()[0]->nombre_recurso);
			//$ruta_recurso	= array('name' => 'ruta_recurso', 'value' 		=> $multimedia->result()[0]->ruta_recurso);
		}

		if($social){
			$id_rrss= array('name' => 'id_rrss');
			$enlace	= array('name' => 'enlace');
		}
	?>

	<?PHP if($this->session->userdata('rol') == 0){?>
		<label>Usuario: </label>
		<select name='id_usuario' id='id_usuario'>
			<option>--- Escoge un Usuario ---</option>
			<?PHP if($usuarios){

				foreach ($usuarios->result() as $usuario){ ?>

					<option value=<?= $usuario->id_usuario; ?>
					<?PHP if($usuario->id_usuario == $poi->result()[0]->id_usuario){ ?>

						selected="selected"

					<?PHP } ?>
					> <?= $usuario->nombre; ?> </option>

				<?PHP }

			}else echo 'No hay datos.';?>
		</select><br>
	<?php }?>

	<label>Coordenada longitud: <?= form_input($lng) ?></label><br>
	<label>Coordenada latitud: <?= form_input($lat) ?></label><br>
	<label>Nombre: <?= form_input($nombre_poi) ?></label><br>
	<label>Texto representativo: <?= form_input($txt_rep) ?></label><br>
	<label>Dirección: <?= form_input($direccion) ?></label><br>
	
	<label>Categoría: </label>
		<?PHP if($categorias){
			foreach ($categorias->result() as $categoria){ 
				$bool = 0;
			 	foreach ($categorias_poi->result() as $is){ 
					if($categoria->id_cat == $is->id_cat){
						$bool = 1;
					}
				} ?>
				<input type="checkbox" name='id_categoria[]' id='id_categoria[]' value=<?= $categoria->id_cat; ?> 
				<?php if($bool){ ?>
					checked  
				<?php } ?>
				/> <?= $categoria->nombre_cat; ?>
		<?PHP }
		}else echo 'No hay datos.';?>
	</select><br>

	<?PHP if($extras){ ?>
		<br>
		-----------------------------------------------------------------------------------
		<br><br>
		<label>Slogan: <?= form_input($slogan) ?></label><br>
		<label>Teléfono: <?= form_input($telefono1) ?></label><br>
		<label>Teléfono secundario: <?= form_input($telefono2) ?></label><br>
		<label>Dirección Local: <?= form_input($direccion_local) ?></label><br>
		<label>Horario: <?= form_input($horario) ?></label><br>
	<?PHP } ?><br>

	<!--<?PHP if($multimedia){ ?>
		<br>
		-----------------------------------------------------------------------------------
		<br><br>
		<label>Tipo: </label>
		<select name='tipo_recurso' id='tipo_recurso'>
	        <option value='Imagen'> Imagen </option>
	        <option value='Video'> Vídeo VIP </option>
		</select><br>

		<label>Nombre: <?= form_input($nombre_recurso) ?></label><br>
		<label>Ruta: <input type="file" name="ruta_recurso"> </label><br>
	<?PHP } ?><br>

	<?PHP if($social){ ?>
		<br>
		-----------------------------------------------------------------------------------
		<br><br>
		<label>Redes Sociales: </label>
			<?PHP foreach ($redes_sociales->result() as $red){ 
				$bool = 0;
			 	foreach ($social->result() as $is){ 
					if($red->id_red == $is->id_rrss){
						$bool = 1;
					}
				} ?>
				<input type="checkbox" name='id_rrss[]' id='id_rrss[]' value=<?= $red->id_red; ?> 
				<?PHP if($bool){ ?>
					checked  
				<?PHP } ?>
				/> <?= $red->nombre_red; ?> 
				<input type="text" name='enlace_red[]' id='enlace_red[]' 
				<?PHP if($bool){ ?>
					value = <?= $social->enlace; ?>
					/> <?= $social->enlace; ?>
				<?PHP }else{ ?> 
							/> 
				?PHP } ?>
				
		<?PHP }
	 }}?><br>-->

	<?= form_submit('','Actualizar poi') ?>

	<?= form_close()?>
</body>
</html>