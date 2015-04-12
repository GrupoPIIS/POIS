<html>
<head>
	<title>Modificar Categoría</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/categorias/categorias_controller/getUpdateCategory/".$id)?>
	<?php
		$nombre	= array('name' => 'nombre', 'value' => $categoria->result()[0]->nombre_cat);
	?>

	<label>Nombre: <?= form_input($nombre) ?></label><br>

	<?= form_submit('','Actualizar categoría') ?>

	<?= form_close()?>
</body>
</html>