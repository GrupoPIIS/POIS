<html>
<head>
	<title>Login</title>
	<meta charset='utf-8'>
</head>
<body>
	<?= form_open("/login_controller/getPassword")?>
	<?php
		$mail 		= array('name' => 'mail');
	?>
	<label>Correo: <?= form_input($mail) ?></label>

	<?= form_submit('','Enviar') ?>

	<?= form_close()?>
</body>
</html>