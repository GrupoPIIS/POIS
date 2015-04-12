<html>
<head>
	<title>Nuevo Usuario</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/usuarios/usuarios_controller/getNewUser")?>
	<?php
		$rol 		= array('name' => 'rol');
		$nombre		= array('name' => 'nombre');
		$empresa	= array('name' => 'empresa');
		$direccion	= array('name' => 'direccion');
		$tel 		= array('name' => 'tel');
		$cif 		= array('name' => 'cif');
		$mail 		= array('name' => 'mail');
		$password	= array('name' => 'password');
	?>
	
	<label>Rol: </label>
	<select name='rol' id='rol'>
        <option value=1> Usuario </option>
        <option value=2> Cliente VIP </option>
	</select><br>

	<label>Nombre: <?= form_input($nombre) ?></label><br>
	<label>Empresa: <?= form_input($empresa) ?></label><br>
	<label>Dirección: <?= form_input($direccion) ?></label><br>
	<label>Teléfono: <?= form_input($tel) ?></label><br>
	<label>CIF: <?= form_input($cif) ?></label><br>
	<label>Correo: <?= form_input($mail) ?></label><br>
	<label>Contraseña: <?= form_input($password) ?></label><br>

	<?= form_submit('','Añadir usuario') ?>

	<?= form_close()?>
</body>
</html>