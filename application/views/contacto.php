<html>
<head>
    <title>Contacta</title>
    <meta charset='utf-8'>
</head>
<body>
    <?= form_open("/login_controller/sendEmail")?>
    <?php
        $nombre = array('name' => 'nombre');
        $email   = array('name' => 'email');
        $mensaje   = array('name' => 'mensaje');
    ?>
    
    <label>Nombre: <?= form_input($nombre) ?></label><br>
    <label>Correro electrónico: <?= form_input($email) ?></label><br>
    <label>Mensaje: <?= form_input($mensaje) ?></label><br>
 
    <?= form_submit('','Enviar mensaje') ?>

    <?= form_close()?>
</body>
</html>