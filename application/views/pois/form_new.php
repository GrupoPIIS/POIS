<html>
<head>
	<title>Login</title>
	<meta charset='utf-8'>

		<link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" >

        <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
        <script type="text/javascript">
            var centreGot = false;
            var activeMap=false;          
        </script>
        <?=$map['js']?>        


</head>
<body id="page-top" class="index">

	 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
           <!--     <a class="navbar-brand" href="#page-top">Start Bootstrap</a> -->
            <img class="img-centic" src="<?php echo base_url();?>/estilos/img/centic.jpg" alt="">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                 
                 <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#">Nuevo punto de interés</a>
                    </li>
                  
                </ul>

				<ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                      <a> >  </a>
                    </li>
                  
                </ul>

                 <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="<?php echo base_url();?>pois/pois_controller">Mis puntos de interés</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
        
      


	<?= form_open("/pois/pois_controller/getNewPoi")?>
	<?php
		$lng 		= array( 
                            'name' => 'lng',
							'class' => 'form-control',
							'placeholder' => 'Longitud',
							'id' => 'longitud',
							'required data-validation-required-message' => 'Por favor, introduzca la longitud del punto.');
		$lat		= array( 
                            'name' => 'lat',
							'class' => 'form-control',
							'placeholder' => 'Latitud',
							'id' => 'latitud',
							'required data-validation-required-message' => 'Por favor, introduzca la latitud del punto.');
		$nombre_poi	= array('name' => 'nombre_poi',
							'class' => 'form-control',
							'placeholder' => 'Nombre del punto',
							'id' => 'nombre_poi',
							'required data-validation-required-message' => 'Por favor, introduzca el nombre del punto.');
		$txt_rep	= array('name' => 'txt_rep',
							'class' => 'form-control',
							'placeholder' => 'Texto representativo',
							'id' => 'txt_rep',
							'required data-validation-required-message' => 'Por favor, introduzca un texto representativo.');
		$direccion	= array('name' => 'direccion',
							'class' => 'form-control',
							'placeholder' => 'Dirección',
							'id' => 'direccion',
							'required data-validation-required-message' => 'Por favor, introduzca la dirección del punto.');
		$id_usuario	= array('name' => 'id_usuario',
							'class' => 'form-control',
							'placeholder' => 'Nombre de usuario',
							'id' => 'nombre_usuario',
							'required data-validation-required-message' => 'Por favor, seleccione su nombre de usuario.',
							'readonly' => 'true');

		$id_categoria= array('name' => 'id_categoria',
                            'class' => 'form-control',
                            'placeholder' => 'Nombre de la Categoría',
                            'id' => 'nombre_categoria',
                            'required data-validation-required-message' => 'Por favor, seleccione la categoría que desee.',
                            'readonly' => 'true');

        
	?>


 <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <br> <h3>Nuevo punto de interés</h3>
                    <hr class="star-primary">
                </div>
            </div>

                <article id="pu1">
                            <article id="mapa" style="width:95%; height:500px">
                                <?=$map['html']?>
                            </article>                
                </article>
          
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        
                    	<?PHP if($this->session->userdata('rol') == 0){?>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
						
							<label id="usuario_nombre">Usuario: </label>
								<?= form_input($id_usuario) ?>

								<select name='id_usuario' id='id_usuario'>
								<option>--- Escoge un Usuario ---</option>
								<?PHP if($usuarios){
								foreach ($usuarios->result() as $usuario){ ?>
								<option value=<?= $usuario->id_usuario; ?>> <?= $usuario->nombre; ?> </option>
								<?PHP }
								}else echo 'No hay datos.';?>
								</select><br>
						
						 <p class="help-block text-danger"></p>

                         <a href="<?php echo base_url();?>/usuarios/usuarios_controller/newUser" <button type="button" class="btn btn-success btn-lg" name="btnRedes" id="btnRedes" style="float:right">Añadir usuario</button></a>
  
						  </div>
                        </div>
                        <?PHP } ?>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Coordenada longitud</label>
                               	<?= form_input($lng) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Coordenada latitud</label>
                               	<?= form_input($lat) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre del punto de interés</label>
                                <?= form_input($nombre_poi) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Texto representativo</label>
                                <?= form_input($txt_rep) ?>
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
                        
                            <label id="categorias">Categoría</label>
                                <?= form_input($id_categoria) ?>

                                <?PHP if($categorias){
                                 foreach ($categorias->result() as $categoria){ ?>
                                <input type="checkbox" name='id_categoria[]' id='id_categoria[]' value=<?= $categoria->id_cat; ?> /> <?= $categoria->nombre_cat; ?>
                                <?PHP }
                                }else echo 'No hay datos.';?>
                                </select><br>
                        
                         <p class="help-block text-danger"></p>
                          </div>
                        </div>

                        
                       
                        <br>

                        <p1 style=color:red;><?php if(isset($error)) echo $error; ?></p1>

                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                            	<!--<?= form_submit('','Añadir POI') ?> -->
                                <button type="submit" class="btn btn-success btn-lg" name="btnCrear" id="btnCrear">Crear punto de interés</button>
                                <button type="submit" class="btn btn-success btn-lg" name="btnExtras" id="btnExtras" style="float:right">Crear y continuar configurándolo</button>
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

