<html>
<head>
	<title>Redes Sociales de POI</title>
	<meta charset='utf-8'>
</head>
<body>

	<?= form_open("/pois/pois_controller/getSocialPoi/".$id)?>
	<?php
		$id_rrss= array('name' => 'id_rrss');
		$enlace	= array('name' => 'enlace');
	?>

	<label>Redes Sociales: </label>
		<select name='id_rrss' id='id_rrss'>
			<option>--- Escoge una Red Social ---</option>
			<?PHP if($redes){
				foreach ($redes->result() as $red){ ?>
					<option value=<?= $red->id_red; ?>> <?= $red->nombre_red; ?> </option>
			<?PHP }
			}else echo 'No hay datos.';?>
		</select><br>

	<label>Enlace: <?= form_input($enlace) ?></label><br>

	<?= form_submit('','Añadir redes sociales POI') ?>

	<?= form_close()?>
</body>
</html>