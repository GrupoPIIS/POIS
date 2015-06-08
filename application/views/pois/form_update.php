<html>
<head>
	<title>Modificar punto de interés</title>
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
        <script src="<?php echo base_url();?>/estilos/js/jquery-1.11.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>/estilos/js/jquery.combinedScroll.js" type="text/javascript"></script>
        <script type="text/javascript">
            var centreGot = false;
            var activeMap=false;  
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
        <?=$map['js']?>        

</head>
<body id="page-top" class="index">

	<nav class="page-navigation">
            <a href="#" onclick="javascript:location.href='<?php echo base_url();?>'"><img src="<?php echo base_url();?>estilos/img/centic.jpg"></a>
                <ul class="menu">                    
                    <li><a href="#" onclick="javascript:location.href='<?php echo base_url();?>pois/pois_controller'">Mis puntos de inter&eacute;s</a></li>
                    <li>></li>
                    <li><a href="#" onclick="javascript:location.href='#'">Modificar punto de inter&eacute;s</a></li>                                                        
                </ul> 
     </nav> 
	 
    
        
	<?= form_open("/pois/pois_controller/getUpdatePoi/".$id)?>
	<?php
		$lng 		= array(
							'name' => 'lng', 'value' => $poi->result()[0]->lng,
							'class' => 'form-control',
							'placeholder' => 'Longitud',
							'id' => 'longitud',
							'required data-validation-required-message' => 'Por favor, introduzca la longitud del punto.');
		
		$lng_label = array(	
							'name' => 'lng_label',
							'class' => 'form-control',
							'placeholder' => 'Longitud',							
							'required data-validation-required-message' => 'Por favor, introduzca la longitud del punto.',
							'readonly' => 'true');

		$lat		= array('name' => 'lat', 'value'=> $poi->result()[0]->lat,
							'class' => 'form-control',
							'placeholder' => 'Latitud',
							'id' => 'latitud',
							'required data-validation-required-message' => 'Por favor, introduzca la latitud del punto.' 		);
		
		$lat_label		= array('name' => 'lat_label',
							'class' => 'form-control',
							'placeholder' => 'Latitud',
							'id' => 'longitud',
							'required data-validation-required-message' => 'Por favor, introduzca la latitud del punto.',
							'readonly' => 'true');

		$nombre_poi	= array('name' => 'nombre_poi', 'value'=> $poi->result()[0]->nombre_poi,
							'class' => 'form-control',
							'placeholder' => 'Nombre del punto',
							'id' => 'nombre_poi',
							'required data-validation-required-message' => 'Por favor, introduzca el nombre del punto.' );
		
		$nombre_poi_label	= array('name' => 'nombre_poi_label',
							'class' => 'form-control',
							'placeholder' => 'Nombre del punto',
							'id' => 'nombre_poi',
							'required data-validation-required-message' => 'Por favor, introduzca el nombre del punto.',
							'readonly' => 'true');

		$txt_rep	= array('name' => 'txt_rep', 'value'=> $poi->result()[0]->txt_rep,
							'class' => 'form-control',
							'placeholder' => 'Texto representativo',
							'id' => 'txt_rep',
							'required data-validation-required-message' => 'Por favor, introduzca un texto representativo.' 	);
		
		$txt_rep_label	= array('name' => 'txt_rep_label',
							'class' => 'form-control',
							'placeholder' => 'Texto representativo',
							'id' => 'txt_rep',
							'required data-validation-required-message' => 'Por favor, introduzca un texto representativo.',
							'readonly' => 'true');

		$direccion	= array('name' => 'direccion', 'value'=> $poi->result()[0]->direccion,
							'class' => 'form-control',
							'placeholder' => 'Dirección',
							'id' => 'direccion',
							'required data-validation-required-message' => 'Por favor, introduzca la dirección del punto.' 	);
		
		$direccion_label	= array('name' => 'direccion_label',
							'class' => 'form-control',
							'placeholder' => 'Dirección',
							'id' => 'direccion',
							'required data-validation-required-message' => 'Por favor, introduzca la dirección del punto.',
							'readonly' => 'true');

		$id_usuario	= array('name' => 'id_poi',
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

		if($extras){
			$slogan		= array('name' => 'slogan', 'value'=> $extras->result()[0]->slogan,
							'class' => 'form-control',
							'placeholder' => 'Eslogan',
							'id' => 'slogan');
			$telefono1	= array('name' => 'telefono1', 'value'	=> $extras->result()[0]->telefono1,
							'class' => 'form-control',
							'placeholder' => 'Teléfono',
							'id' => 'telefono1');
			$telefono2	= array('name' => 'telefono2', 'value'		=> $extras->result()[0]->telefono2,
							'class' => 'form-control',
							'placeholder' => 'Teléfono secundario',
							'id' => 'telefono2');
			$direccion_local= array('name' => 'direccion_local', 'value'=> $extras->result()[0]->direccion_local,
							'class' => 'form-control',
							'placeholder' => 'Dirección local',
							'id' => 'direccion_local');
			$horario	= array('name' => 'horario', 'value'		=> $extras->result()[0]->horario,
							'class' => 'form-control',
							'placeholder' => 'Horario',
							'id' => 'horario');
		}

		if($multimedia){
			$tipo_recurso	= array('name' => 'tipo_recurso');
			$nombre_recurso	= array('name' => 'nombre_recurso');
			$ruta_recurso	= array('name' => 'ruta_recurso');

			$nombre_original= array('name' => 'nombre_original');

		}

		if($social){
			$id_rrss= array('name' => 'id_rrss');
			$enlace	= array('name' => 'enlace');
		}
	?>



 <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                   <br> <h3>Modificar punto de interés</h3>
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
							<label id="usuario_nombre">Usuario </label>
							<?= form_input($id_usuario) ?>

							<select name='id_usuario' id='id_usuario'>
							<option>--- Escoge un Usuario ---</option>
							<?PHP if($usuarios){

								foreach ($usuarios->result() as $usuario){ ?>

									<option value=<?= $usuario->id_usuario; ?>
									<?PHP if($usuario->id_usuario == $poi->result()[0]->id_usuario){ ?>

									selected="selected"

									<?PHP } ?>
									> <?= $usuario->nombre; ?> </option>

								<?PHP }

							}else echo 'No hay datos.';?>
							</select><br>
							 <p class="help-block text-danger"></p>
						 	 </div>
                       		 </div>
							<?php }?>


                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                 <label>Coordenada longitud</label>
                                 <?= form_input($lng_label) ?>
                               	<?= form_input($lng) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Coordenada latitud</label>
                                <?= form_input($lat_label) ?>
                               	<?= form_input($lat) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nombre del punto</label>
                                <?= form_input($nombre_poi_label) ?>
                               	<?= form_input($nombre_poi) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>


                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Texto representativp</label>
                                <?= form_input($txt_rep_label) ?>
                               	<?= form_input($txt_rep) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>


                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Dirección</label>
                                <?= form_input($direccion_label) ?>
                               	<?= form_input($direccion) ?>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

	 					<div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                        
                            <label id="categorias">Categoría</label>
                                <?= form_input($id_categoria) ?>

							<?PHP if($categorias){
								foreach ($categorias->result() as $categoria){ 
								$bool = 0;
			 						foreach ($categorias_poi->result() as $is){ 
										if($categoria->id_cat == $is->id_cat){
											$bool = 1;
										}
									} ?>

									<input type="checkbox" name='id_categoria[]' id='id_categoria[]' value=<?= $categoria->id_cat; ?> 
									<?php if($bool){ ?>
										checked  
									<?php } ?>
								/> <?= $categoria->nombre_cat; ?>
								<?PHP }
							}else echo 'No hay datos.';?>
							</select><br>
							 <p class="help-block text-danger"></p>
                          </div>
                        </div>
<!-- EXTRAS ------------------------------------------------------------------ -->
	<br>
	<h3> CONTENIDO EXTRA </h3>
	<?PHP if($extras){ ?>

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
		
			<?PHP }else{?>
				<a href="<?php echo base_url();?>pois/pois_controller/extraPoi/<?= $id ?>">Añadir contenido extra</a>
				<?php } ?>
			<br>


	<!-- MULTIMEDIA ------------------------------------------------------------------ -->
	<br>
	<h3> CONTENIDO MULTIMEDIA </h3>
	<a href="<?php echo base_url();?>pois/pois_controller/multimediaPoi/<?= $id ?>">Añadir contenido multimedia</a>
	<?PHP if($multimedia){ ?>
		<?php foreach ($multimedia->result() as $multi){ ?>
			<li class="poi-enlace">
			<?php if($multi->tipo_recurso == "Imagen"){ ?>
				<img src="<?php echo base_url();?>/uploads/thumbs/<?= $multi->ruta_recurso?>">
			<?php } else{?>
				<video src="<?php echo base_url();?>/uploads/<?=$multi->ruta_recurso?>"></video> 
		<?PHP } ?>
			<a href="<?php echo base_url();?>pois/pois_controller/deleteMultimediaPoi/<?= $id ?>/<?=$multi->nombre_recurso?>" class="poi-boton">
	           <img src="<?php echo base_url();?>/estilos/img/trash.png" alt="Eliminar">
	        </a> 
			</li>
		<?php } ?>
		
	<?php } ?>

	<!-- SOCIAL ------------------------------------------------------------------ -->
	<br>
	<h3> REDES SOCIALES </h3>
	<a href="<?php echo base_url();?>pois/pois_controller/socialPoi/<?= $id ?>">Añadir una red social</a>
	<?PHP if($social){ ?>
		<?php foreach ($social->result() as $red){ ?>
			<li class="poi-enlace">
				 <img src="<?php echo base_url();?>uploads/thumbs/<?=$red->icono_red?>" >
				<a href="<?=$red->enlace?>"> <?=$red->nombre_red?> </a>
				<a href="<?php echo base_url();?>pois/pois_controller/deleteSocialPoi/<?= $id ?>/<?=$red->id_rrss?>" class="poi-boton">
	           	<img src="<?php echo base_url();?>estilos/img/trash.png" alt="Eliminar">
	        	</a> 
			</li>
		<?php } ?>
	<?php } ?>

 				<p1 style=color:red;><?php if(isset($error)) echo $error; ?></p1>

                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                            	<!--<?= form_submit('','Actualizar POI') ?> -->
                                <button type="submit" class="btn btn-success btn-lg">Actualizar punto de interés</button>
                                
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

