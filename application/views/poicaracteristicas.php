<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Características del punto de interés</title>

   <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
     <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/estilos/css/estilo1.css">
    <link href="<?php echo base_url();?>/estilos/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/estilos/css/freelancer.css" rel="stylesheet">
        <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>/estilos/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" >
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script> 
    <script type="text/javascript">
        $(document).ready(function(){
            $('#back').click(function(){
                parent.history.back();
                return false;
            });
        });
    </script>	

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
            <img class="img-centic" src="<?php echo base_url();?>estilos/img/centic.jpg" alt="">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a id="back" href="">Volver</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    
   
             
    <header>
        
        
        <div class="container">
            <div class="row" id="containermargen">
                <div class="col-lg-12">
                   <div class="col-lg-12 text-center">
                       
                       <h3><?=$pois->result()[0]->nombre_poi?></h3>
                       <hr class="star-light">
                       <br>

<!-- Carousel

================================================== -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">

<!-- Indicators -->

<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<?PHP for($i=1; $i<count($multimedia)+1; $i++){ ?>
    <li data-target="#myCarousel" data-slide-to="<?= $i ?>"></li>
 <?php } ?>

</ol>

<div class="carousel-inner" role="listbox">

<div class="item active">

<?PHP if($multimedia){ ?>

    <img src="<?php echo base_url();?>/uploads/<?=$multimedia->result()[0]->ruta_recurso?>" alt="First slide" style="width: 50%; margin-top: -10%;">
    </div>

        <?PHP for($i = 1; $i < count($multimedia)+1; $i++){ ?>

            <div class="item">

            <img src="<?php echo base_url();?>/uploads/<?= $multimedia->result()[$i]->ruta_recurso?>" alt="Second slide" style="width: 50%; margin-top: -10%;">

            </div>
        <?php }
    } ?>



<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">

<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

<span class="sr-only">Previous</span>

</a>

<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">

<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

<span class="sr-only">Next</span>

</a>

</div><!-- /.carousel -->



                    </div>
                </div>
            </div>
        </div>

    

     
    </header>

    <!-- Portfolio Grid Section -->
    <section  class="poi-info">
      
                <div class="col-lg-12 text-center">
                    <h2>Características</h2>
                    <hr class="star-primary">
                </div>
                    
                    <article class="img-poi">
                    <img src="<?php echo base_url();?>estilos/img/mapsindividual.jpg">
                    </article>
                    
                        <article class="text-poi">
                        
                         <article class="campo-poi">
                            <h4>NOMBRE:</h4>
                            <p><?=$pois->result()[0]->nombre_poi?></p>
                         </article>
                        
                         <article class="campo-poi">
                            <h4>TEXTO REPRESENTATIVO:</h4>
                            <p><?=$pois->result()[0]->txt_rep?></p>
                         </article>
                        
                         <article class="campo-poi">
                             <h4>DIRECCIÓN:</h4>
                            <p><?=$pois->result()[0]->direccion?></p>
                         </article>
            
                         <article class="campo-poi">
                            <h4>FECHA DE ALTA:</h4>
                             <p><?=$pois->result()[0]->creado?></p>
                         </article>            
            
    
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
