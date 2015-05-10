<!doctype html> 
<html>
<head>
	<title>Listar Categorías</title>
	<meta charset='utf-8'>
</head>
<body>
	<?PHP 
	if($categorias){
		foreach ($categorias->result() as $categoria){ ?>
		<ul>
			<li><?= $categoria->nombre_cat; ?>
				<img src="<?= base_url('uploads/thumbs/'.$categorias->imagen); ?>" ></li>
		</ul>
	<?PHP }
	}else echo "No existen datos";?>
		
</body>
</html>