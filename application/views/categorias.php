<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""> 

        <title>Mis Pois</title>
        <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

        
	</head>	

	<body id="page-top">

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
                <img class="img-centic" src="<?php echo base_url();?>/estilos/img/centic.jpg" alt="" id ="centic">
                
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo base_url();?>mapa#pois-usuario">Mis Puntos de Interés</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo base_url();?>mapa#categorias">Categor&iacute;as</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo base_url();?>mapa#estadisticas">Estad&iacute;sticas</a>
                        <li id="menu-usuario">
                            <a href="#" ><?=$this->session->userdata['nombre'];?></a>
                        </li>
                        <li >
                            <a href="<?php echo base_url();?>/mapa/closeSession" >Salir</a>
                        </li>
                    </ul>                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

		<section id="list-categ">
            <h1>CATEGOR&Iacute;AS</h1>
            <article id="link-categ">
                    <img src="<?php echo base_url();?>/estilos/img/tag2.png" alt="Crear nueva categoría">
                    <a href="<?php echo base_url();?>/categorias/categorias_controller/newCategory" class="btn btn-success btn-lg">Crear Nueva Categor&iacute;a</a>                 
            </article>
            <?php 
                    if($categorias){ ?> 
                        <article class="categ-sublist"> 
                                    <article id="lc1">                             
                                            <ul>
                                            <?php foreach ($categorias->result() as $categoria): ?>
                                                 <li>
                                                    <a href="<?php echo base_url();?>/categorias/categorias_controller/getCategory/<?=$categoria->id_cat?>">
                                                        <img class="categ-img" src="<?php echo base_url();?>/estilos/img/profile.png">
                                                        <p class="categ-text"><?= $categoria->nombre_cat;?></p>                                
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>  
                                            </ul>
                                    </article>              
                        </article>
            <?php }else echo "No existen datos";?>
		</section>
        <footer>
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