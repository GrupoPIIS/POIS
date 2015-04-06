<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">	

    	<title>Home</title>
    	<link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/freelancer.css">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script type="text/javascript">
            var centreGot = false;
        </script>
        <?=$map['js']?>        
	</head>	

	<body class="index" id="page-top">

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
            <img class="img-centic" src="<?php echo base_url();?>/estilos/img/centic.jpg" alt="">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#page-top">Mis Puntos de Interés</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#categorias">Categor&iacute;as</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#estadisticas">Estad&iacute;sticas</a>
                    </li>
                    <li class="page-scroll" id="menu-usuario">
                        <a href="#">usuario</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

		<section id="pois-usuario">
            <h1>MIS PUNTOS DE INTER&Eacute;S</h1>
          
            <article id="link-pois">
                <a href="mis-pois.html" class="btn btn-success btn-lg">Administrar POIS</a>
            </article>
            <article id="pu1">

                <article id="mapa" style="width:95%; height:500px">
                    <?=$map['html']?>
                </article>
                <!--<aside id="mapa-lista">
                    <ul>
                        <li><a href="#pois-usuario">poi 1</a>
                        <li><a href="#pois-usuario">poi 2</a>
                        <li><a href="#pois-usuario">poi 3</a>        
                    </ul> 
                           
                </aside>
                 -->
            </article>
            
            
		</section>

		<section id="categorias">
             <h1>CATEGOR&Iacute;AS</h1>
             <hr class="star-primary">
             <article id="cat1">
                 <p>Visualiza el listado de categor&iacute;as de los Puntos de Interés o crea nuevas categorías si lo prefies</p>
                 <img src="<?php echo base_url();?>/estilos/img/tag.png" id="img-estadisticas">
             </article>
             <article id="link-categorias">
                <a href="categorias.html" class="btn btn-success btn-lg">Administrar Categor&iacute;as</a>
            </article>			
		</section>

		<section id="estadisticas">
            <h1>ESTAD&Iacute;STICAS</h1>
            <hr class="star-secundary">
			<article id="estad1">
                 <p>Observa diferentes estadísticas sobre tus Puntos de Interés y sobre aquellos generados por otros usuarios</p>
                 <img src="<?php echo base_url();?>/estilos/img/estadisticas.png" id="img-estadisticas">
            </article>
            <article id="link-categorias">
                <a href="#estadisticas" class="btn btn-lg btn-outline">Administrar Estad&iacute;sticas</a>
            </article>
		</section>            
		<footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3>Location</h3>
                            <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3>Around the Web</h3>
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
                            <h3>About Freelancer</h3>
                            <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            Copyright &copy; Your Website 2014
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
    
        <script src="<?php echo base_url();?>/estilos/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url();?>/estilos/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="<?php echo base_url();?>/estilos/js/classie.js"></script>
        <script src="<?php echo base_url();?>/estilos/js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="<?php echo base_url();?>/estilos/js/jqBootstrapValidation.js"></script>
        <script src="<?php echo base_url();?>/estilos/js/contact_me.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url();?>/estilos/js/freelancer.js"></script>

	
	</body>
</html>