<!doctype html> 
<html>
<head>
	<title>Listar Redes Sociales</title>
	<meta charset='utf-8'>
</head>
<body>
	<?PHP 
	if($redes){
		foreach ($redes->result() as $red){ ?>
		<ul>
			<li><?= $red->nombre_red; ?> 
			<img src="<?=$red->icono_red?>" /></li>
		</ul>
	<?PHP }
	}else echo "No existen datos";?>
		
</body>
</html>