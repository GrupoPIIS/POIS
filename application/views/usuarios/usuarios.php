<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content=""> 

        <title>Usuarios</title>
        <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
        <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/estilos/js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/estilos/js/jquery.combinedScroll.js" type="text/javascript"></script>
        <script type="text/javascript">
           
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

	<body class="index" id="page-top">

        <nav class="page-navigation">
            <a href="#" onclick="javascript:location.href='<?php echo base_url();?>'"><img src="<?php echo base_url();?>estilos/img/centic.jpg"></a>

                <ul class="menu">
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>'">PUNTOS DE INTER&Eacute;S</a></li>
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>#categorias'">CATEGOR&Iacute;AS</a></li>
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>#estadisticas'">ESTAD&Iacute;STICAS</a></li>
                    <li><a href="#" ><?=$this->session->userdata['nombre'];?></a></li>
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>login_controller/closeSession'">SALIR</a></li>                    
                </ul>           
        </nav>

		<section id="list-users">  

          
            <h1>USUARIOS</h1>

            <article id="link-users">
                    <img src="<?php echo base_url();?>estilos/img/user2.png" alt="Crear nuevo usuario">
                    <a href="<?php echo base_url();?>usuarios/usuarios_controller/newUser" class="btn btn-success btn-lg">Crear Nuevo Usuario</a>
            </article>
            <article id="lu1">                
                    <ul>
                        
                    <?php foreach ($usuarios->result() as $user): ?>
                        <li class="poi-enlace">
                            <a href="<?php echo base_url();?>usuarios/usuarios_controller/getUsuario/<?=$user->id_usuario?>" >
                                <p class="poi-text"><?=$user->nombre?></p>
                            </a>
                            <a href="<?php echo base_url();?>usuarios/usuarios_controller/updateUser/<?=$user->id_usuario?>" class="poi-boton">
                                    <img src="<?php echo base_url();?>estilos/img/edit.png" alt="Editar">                    
                            </a>
                            <a href="<?php echo base_url();?>usuarios/usuarios_controller/deleteUser/<?=$user->id_usuario?>" class="poi-boton">
                                <img src="<?php echo base_url();?>estilos/img/trash.png" alt="Eliminar">
                            </a>                            
                        </li>
                    <?php endforeach ?>
                                           
                    </ul>             
            </article>            
            	
		</section>
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