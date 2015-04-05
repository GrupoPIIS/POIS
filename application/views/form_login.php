<html>
<head>
	<title>Login</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/login_controller/login")?>
	<?php
		$mail 		= array('name' => 'mail');
		$password	= array('name' => 'password');
	?>
	<label>Correo: <?= form_input($mail) ?></label>
	<label>Contraseña: <?= form_password($password) ?></label>

	<?= form_submit('','Entrar') ?>

	<?= form_close()?>
</body>
</html>