<html>
<head>
	<title>Nuevo usuario</title>
	<meta charset='utf-8'>

		<link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" >
        <script src="<?php echo base_url();?>/estilos/js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/estilos/js/jquery.combinedScroll.js" type="text/javascript"></script>
        <script type="text/javascript">
                   
            function changeValue(){
                
                document.getElementById('crearPoi').value='true';
            }
        
           
            jQuery(document).ready(function($){


            
                $('.page-navigation').onePageNav(); 


                $(function(){
                    $('.page-navigation').data('size','big');
                });

                $(window).scroll(function(){
                    var $nav = $('.page-navigation');
                    if ($('body').scrollTop() > 0) {
                        if ($nav.data('size') == 'big') {
                            $nav.data('size','small').stop().animate({
                                padding:'0 0.2%'
                            }, 600);
                        }
                    } else {
                        if ($nav.data('size') == 'small') {
                            $nav.data('size','big').stop().animate({
                                padding:'1%'
                            }, 600);
                        }  
                    }
                });            

            });
        </script>



</head>
<body id="page-top" class="index">
    <nav class="page-navigation">
            <a href="#" onclick="javascript:location.href='<?php echo base_url();?>'"><img src="<?php echo base_url();?>estilos/img/centic.jpg"></a>
                <ul class="menu">                    
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>usuarios/usuarios_controller'">Usuarios</a></li>
                    <li>></li>
                    <li><a href="">Nuevo Usuario</a></li>                                                        
                </ul> 
    </nav>



	<?= form_open("/usuarios/usuarios_controller/getNewUser")?>
	
	<?php
		$rol 		= array('name' => 'rol',
							'class' => 'form-control',
							'placeholder' => 'Rol',
							'id' => 'rol',
							'required data-validation-required-message' => 'Por favor, introduzca el rol del usuario.',
							'readonly' => 'true');
		$nombre		= array('name' => 'nombre',
							'class' => 'form-control',
							'placeholder' => 'Nombre',
							'id' => 'nombre',
							'required data-validation-required-message' => 'Por favor, introduzca el nombre del usuario.');
		$empresa	= array('name' => 'empresa',
							'class' => 'form-control',
							'placeholder' => 'Empresa',
							'id' => 'empresa',
							'required data-validation-required-message' => 'Por favor, introduzca el nombre de la empresa.');
		$direccion	= array('name' => 'direccion',
							'class' => 'form-control',
							'placeholder' => 'Dirección',
							'id' => 'direccion',
							'required data-validation-required-message' => 'Por favor, introduzca la dirección.');
		$tel 		= array('name' => 'tel',
							'class' => 'form-control',
							'placeholder' => 'Teléfono',
							'id' => 'tel',
							'required data-validation-required-message' => 'Por favor, introduzca el número de teléfono.');
		$cif 		= array('name' => 'cif',
							'class' => 'form-control',
							'placeholder' => 'CIF',
							'id' => 'cif',
							'required data-validation-required-message' => 'Por favor, introduzca el cif.');
		$mail 		= array('name' => 'mail',
							'class' => 'form-control',
							'placeholder' => 'Email',
							'id' => 'mail',
							'required data-validation-required-message' => 'Por favor, introduzca el email.');
		$password	= array('name' => 'password',
							'class' => 'form-control',
							'placeholder' => 'Contraseña',
							'id' => 'password',
							'required data-validation-required-message' => 'Por favor, introduzca la contraseña.',
							'type' => 'password');
	?>


 <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <br> <h3>Nuevo usuario</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        
                    	<?PHP if($this->session->userdata('rol') == 0){?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
						
							<label id="rol">Rol: </label>
								<?= form_input($rol) ?>

								<select name='rol' id='rol'>
       							 	<option value=1> Usuario </option>
        							<option value=2> Cliente VIP </option>
								</select><br>
						
						 <p class="help-block text-danger"></p>
						  </div>
                        </div>
                        <?PHP } ?>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre</label>
                               	<?= form_input($nombre) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Empresa</label>
                               	<?= form_input($empresa) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección</label>
                                <?= form_input($direccion) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <?= form_input($tel) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>CIF</label>
                                <?= form_input($cif) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <?= form_input($mail) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

                         <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Contraseña</label>
                                <?= form_input($password) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <input type="hidden" id="crearPoi" name="crearPoi" value="">
                       
                        <br>

                        <p1 style=color:red;><?php if(isset($error)) echo $error; ?></p1>

                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                            	<!--<?= form_submit('','Añadir usuario') ?> -->
                                <button type="submit" class="btn btn-success btn-lg" onclick="submitForm('')">Añadir usuario</button>
                                <button type="submit" class="btn btn-success btn-lg" name="btnRedes" id="btnRedes" style="float:right" onclick="changeValue();">Añadir usuario y crear nuevo POI</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


<?= form_close()?>


    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Localización</h3>
                        <p>Calle Condes de Barcelona, 5, 30007 Murcia
						<br>968 96 44 00</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes sociales</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Sobre nosotros</h3>
                        <p>Para más información <a href="http://www.google.com">Google</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Grupo 1 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

                  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>


</body>
</html>




