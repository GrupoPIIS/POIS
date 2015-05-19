<html>
<head>
	<title>Multimedia de POI</title>
	<meta charset='utf-8'>
</head>
<body>

	<?= form_open_multipart("/pois/pois_controller/getMultimediaPoi/".$id)?>
	<?php
		$tipo_recurso	= array('name' => 'tipo_recurso');
		$nombre_recurso	= array('name' => 'nombre_recurso');
		$userfile		= array('name' => 'userfile');
	?>

	<label>Tipo: </label>
	<select name='tipo_recurso' id='tipo_recurso'>
        <option value='Imagen'> Imagen </option>
        <option value='Video'> Vídeo </option>
	</select><br>

	<label>Nombre: <?= form_input($nombre_recurso) ?></label><br>
	<label>Ruta: <input type="file" name="userfile" multiple> </label><br>

	<button type="submit" class="btn btn-success btn-lg" name="btnMultimedia" id="btnMultimedia">Añadir extras POI</button>
    <button type="submit" class="btn btn-success btn-lg" name="btnRedes" id="btnRedes" style="float:right">Añadir y continuar configurándolo</button>
  

	<?= form_close()?>
</body>
</html>