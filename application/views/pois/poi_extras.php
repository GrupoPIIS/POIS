<html>
<head>
	<title>Añadir extras</title>
	<meta charset='utf-8'>

		<link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" >


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
                        <a href="#">Añadir extras</a>
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
                        <a href="<?php echo base_url();?>/pois/pois_controller/newPoi">Volver sin guardar</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

        
     <?= form_open("/pois/pois_controller/getExtraPoi/".$id)?>
	<?php
		$slogan		= array('name' => 'slogan',
							'class' => 'form-control',
							'placeholder' => 'Eslogan',
							'id' => 'slogan',
							'required data-validation-required-message' => 'Por favor, introduzca el eslogan.');
		$telefono1	= array('name' => 'telefono1',
							'class' => 'form-control',
							'placeholder' => 'Teléfono',
							'id' => 'telefono1',
							'required data-validation-required-message' => 'Por favor, introduzca un teléfono.');
		$telefono2	= array('name' => 'telefono2',
							'class' => 'form-control',
							'placeholder' => 'Teléfono secundario',
							'id' => 'telefono2',
							'required data-validation-required-message' => 'Por favor, introduzca un teléfono secundario.');
		$direccion_local	= array('name' => 'direccion_local',
							'class' => 'form-control',
							'placeholder' => 'Dirección local',
							'id' => 'direccion_local',
							'required data-validation-required-message' => 'Por favor, introduzca la dirección.');
		$horario	= array('name' => 'horario',
							'class' => 'form-control',
							'placeholder' => 'Horario',
							'id' => 'horario',
							'required data-validation-required-message' => 'Por favor, introduzca el horario.');
	?>



	
 <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <br> <h3>Añadir extras</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Eslogan</label>
                               	<?= form_input($slogan) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        
                        
                       <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <?= form_input($telefono1) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono secundario</label>
                                <?= form_input($telefono2) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

						<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección local</label>
                                <?= form_input($direccion_local) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Horario</label>
                                <?= form_input($horario) ?>
                               	<p class="help-block text-danger"></p>
                            </div>
                        </div>


                        <br>

                        <p1 style=color:red;><?php if(isset($error)) echo $error; ?></p1>

                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                            	<button type="submit" class="btn btn-success btn-lg" name="btnExtra" id="btnExtra">Añadir extras POI</button>
   								<button type="submit" class="btn btn-success btn-lg" name="btnMultimedias" id="btnMultimedias" style="float:right">Añadir y continuar configurándolo</button>
                                
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

