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

    
        function updateVisits(id) {
            var id = id;           
            $.post('http://localhost/pois/pois_controller/updateVisits',{id:id});
        }
    </script> 
   	
    

<body id="page-top" class="index">
    <nav class="page-navigation">
            <a href="#" onclick="javascript:location.href='<?php echo base_url();?>'"><img src="<?php echo base_url();?>estilos/img/centic.jpg"></a>

                <ul class="menu">
                    <li class="page-scroll">
                    <?php  
                        if(isset($this->session->userdata['habilitado'])){
                    ?>                    
                        <a href="<?php echo base_url();?>pois/pois_controller" onclick="updateVisits(<?=$pois->result()[0]->id_poi?>)">Volver</a>
                    <?php  
                        } else{ 
                    ?>
                        <a href="<?php echo base_url();?>" onclick="updateVisits(<?=$pois->result()[0]->id_poi?>)">Volver</a>
                    <?php  
                        }  
                    ?>
                    </li>                    
                </ul>           
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



<?PHP if($multimedia){ ?>
    <ol class="carousel-indicators">
    <?php if($multimedia->result()[0]->tipo_recurso == 'Imagen') ?>
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

    <?PHP 
    $ind = 1;
    foreach ($multimedia->result() as $multi) {
        if($multi->tipo_recurso == 'Imagen')
            $ind++;
    } 

    for($i = 1; $i < $ind-1; $i++){ 
        if($multimedia->result()[$i]->tipo_recurso == 'Imagen')?>
            <li data-target="#myCarousel" data-slide-to="<?= $ind ?>"></li>
    <?php } ?>

    </ol>

    <div class="carousel-inner" role="listbox">

    <div class="item active">
        <?php if($multimedia->result()[0]->tipo_recurso == 'Imagen'){ ?>
            <img src="<?php echo base_url();?>/uploads/thumbs/<?=$multimedia->result()[0]->ruta_recurso?>" alt="First slide">
        <?php }?>
        </div>
             <?php for($i = 1; $i < $ind-1; $i++){ 
                if($multimedia->result()[$i]->tipo_recurso == 'Imagen')?>

                    <div class="item">

                    <img src="<?php echo base_url();?>/uploads/thumbs/<?= $multimedia->result()[$i]->ruta_recurso?>" alt="Second slide" >

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
                
                             <!--<article class="campo-poi">
                                <h4>FECHA DE ALTA:</h4>
                                 <p><?=$pois->result()[0]->creado?></p>
                             </article> -->        
                            <?PHP if($extras){ ?>
                                 <article class="campo-poi">
                                    <h4>SLOGAN:</h4>
                                    <p><?=$extras->result()[0]->slogan?></p>
                                </article>

                                <article class="campo-poi">
                                    <h4>TELÉFONOS:</h4>
                                    <p><?=$extras->result()[0]->telefono1?></p> - 
                                    <p><?=$extras->result()[0]->telefono2?></p>
                                </article>

                                <article class="campo-poi">
                                    <h4>DIRECCIÓN:</h4>
                                    <p><?=$extras->result()[0]->direccion_local?></p>
                                </article>

                                <article class="campo-poi">
                                    <h4>HORARIO:</h4>
                                    <p><?=$extras->result()[0]->horario?></p>
                                </article>
                            <?PHP }?>

                            <?PHP if($social){ ?>
                                <article class="campo-poi">
                                    <h4>REDES SOCIALES:</h4>
                                    <?php foreach ($social->result() as $red){ ?>

                                        <img src="<?php echo base_url();?>/uploads/thumbs/<?=$red->icono_red?>" >
                                        <a href="<?=$red->enlace?>"> <p><?=$red->nombre_red?></p> </a>
                                    
                                    <?php } ?>
                                </article>
                            <?PHP } ?>

                            <?PHP if($multimedia){ ?>
                                <article class="campo-poi">
                                    
                                    <?php foreach ($multimedia->result() as $multi){ ?>
                                        <?php if($multi->tipo_recurso != 'Imagen'){ ?>

                                        <video controls src="<?php echo base_url();?>/uploads/<?=$multi->ruta_recurso?>"></video> 
                                    
                                    <?php }
                                    } ?>
                                </article>
                            <?PHP } ?>

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
