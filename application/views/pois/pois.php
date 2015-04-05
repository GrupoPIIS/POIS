<!doctype html> 
<html>
<head>
	<title>Listar POIS</title>
	<meta charset='utf-8'>
</head>
<body>
	<?PHP 
	if($pois){
		foreach ($pois->result() as $poi){ ?>
		<ul>
			<li><?= $poi->id_poi; ?> <?= $poi->nombre_poi; ?> (<?= $poi->lng; ?>, <?= $poi->lat; ?>)</li>
		</ul>
	<?PHP }
	}else echo "No existen datos"?>
		
</body>
</html>