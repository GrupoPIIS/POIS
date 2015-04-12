<html>
<head>
	<title>Modificar Usuario</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/usuarios/usuarios_controller/getUpdateUser/".$id)?>
	<?php

		$rol 		= array('name' => 'rol', 'value' => $usuario->result()[0]->rol);
		$nombre		= array('name' => 'nombre', 'value' => $usuario->result()[0]->nombre);
		$empresa	= array('name' => 'empresa', 'value' => $usuario->result()[0]->empresa);
		$direccion	= array('name' => 'direccion', 'value' => $usuario->result()[0]->direccion);
		$tel 		= array('name' => 'tel', 'value' => $usuario->result()[0]->tel);
		$cif 		= array('name' => 'cif', 'value' => $usuario->result()[0]->cif);
		$mail 		= array('name' => 'mail', 'value' => $usuario->result()[0]->mail);
		$password	= array('name' => 'password', 'value' => $usuario->result()[0]->password);
	?>

	<label>Rol: </label>
	<select name='rol' id='rol'>
        <option value=1> Usuario </option>
        <option value=2> Cliente VIP </option>
	</select><br/>
	
	<label>Nombre: <?= form_input($nombre) ?></label><br>
	<label>Empresa: <?= form_input($empresa) ?></label><br>
	<label>Dirección: <?= form_input($direccion) ?></label><br>
	<label>Teléfono: <?= form_input($tel) ?></label><br>
	<label>CIF: <?= form_input($cif) ?></label><br>
	<label>Correo: <?= form_input($mail) ?></label><br>
	<label>Contraseña: <?= form_input($password) ?></label><br>

	<?= form_submit('','Actualizar usuario') ?>

	<?= form_close()?>
</body>
</html>