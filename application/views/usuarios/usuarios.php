<!doctype html> 
<html>
<head>
	<title>Listar usuarios</title>
	<meta charset='utf-8'>
</head>
<body>
	<?PHP 
	if($usuarios){
		foreach ($usuarios->result() as $usuario){ ?>
		<ul>
			<li><?= $usuario->rol; ?> <?= $usuario->nombre; ?></li>
		</ul>
	<?PHP }
	}else echo "No existen datos"?>
		
</body>
</html>