<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');	
class Mapa extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pois_model');
		$this->load->helper('url');	
	}

	
	public function index(){	

			if(isset($this->session->userdata['habilitado'])){
				$rol= $this->session->userdata['rol'];

				if($rol=='0'){
					$this->load->view('home-admin');
				}else{					
					$data=$this->homeMap();
					$this->load->view('home',$data);
				}		

			}else{
				$data=$this->indexMap();
				$this->load->view('index',$data);
			}
			
	}


		public function setUserMarker(){
			$marker = array();			
			$marker ['icon'] = base_url().'/estilos/img/marker.png';
			$marker ['infowindow_content'] = 'SU POSICION';
			$marker['animation'] ='BOUNCE';
			$marker['draggable'] = true;
			$marker['ondragend'] = '
				document.getElementById("dragged").value = "dragged";
				document.getElementById("latitud").value = event.latLng.lat();
                document.getElementById("longitud").value = event.latLng.lng();
			';
			
			$this->googlemaps->add_marker($marker);
		}

		public function getMarkers($lat, $lng, $radius){

			if(isset($this->session->userdata['habilitado'])){
				
				$markers = $this->pois_model->getPoiUser($this->session->userdata['id_usuario']);

			} else {

				if($this->input->post('distancia')){						
					
					if($this->input->post('categoria')){

						$categoria = $this->input->post('categ');
						$circle = array();
						$circle['center'] = $lat.','.$lng;
						$circle['radius'] = $radius*1000;
						$this->googlemaps->add_circle($circle);
						$markers = $this->pois_model->getPoisDistTag($categoria, $lat, $lng, $radius);

					}else{

						$circle = array();
						$circle['center'] = $lat.','.$lng;
						$circle['radius'] = $radius*1000;
						$this->googlemaps->add_circle($circle);

						$markers = $this->pois_model->getPoisCloseTo($lat, $lng, $radius);
					}

				}else if($this->input->post('categoria')){

					$categoria = $this->input->post('categ');
					$markers = $this->pois_model->getPoisByTag($categoria);

				} else $markers=null;
			}

			return $markers;
		}


		public function fillMarkers($markers){

			if($markers){
				foreach($markers->result() as $info_marker)
				{
					$marker = array();
		            //podemos elegir DROP o BOUNCE
					$marker ['animation'] = 'DROP';
		            //posición de los markers
					$marker ['position'] = $info_marker->lat.','.$info_marker->lng;
		            //nombre_poi de los markers(ventana de información)	
					$marker ['infowindow_content'] = '<a href="pois/pois_controller/getPoi/'.$info_marker->id_poi.'" >'.$info_marker->nombre_poi.'</a>';
		            //la id_poi del marker
					$marker['id'] = $info_marker->id_poi; 					

					$this->googlemaps->add_marker($marker);	           
		 
					//si queremos que se pueda arrastrar el marker
					//$marker['draggable'] = TRUE;
					//si queremos darle una id_poi, muy útil
				}
			}	
		}

		public function indexMap(){
			//recuperamos datos del formulario
			$dragged="";
			$lat="";
			$lng="";
			$radius="";
			if($this->input->post()){
				$dragged = $this->input->post('dragged');
				$lat = $this->input->post('lat');
				$lng = $this->input->post('lng');
				if($this->input->post('sitio')){
						$radius = $this->input->post('sitio');
					}else {
						$radius=0;
				}	
			}

			
			//creamos la configuración del mapa con un array
			$config = array();
	        //la zona del mapa que queremos mostrar al cargar el mapa
	        //como vemos le podemos pasar la ciudad y el país
	        //en lugar de la latitud y la lngitud

	        if($lat!="" & $lng!=""){
				$config['center'] = $lat.','.$lng;
			}else{
				$config['center'] = 'auto';
			}

			$config['scrollwheel'] = false;
			
			$config['onboundschanged'] = '
			if (!centreGot) {
				var dragged = "'.$dragged.'";
				var lat="'.$lat.'";
				var lng="'.$lng.'";
				var radius=	"'.$radius.'";				
					
				var mapCentre = map.getCenter();

				if(dragged=="dragged" || (lat!="" && lat!=mapCentre.lat()) || (lng!="" && lng!=mapCentre.lng())){
					marker_0.setOptions({					
						position: new google.maps.LatLng("'.$lat.'", 
										"'.$lng.'")
					});	
				}else{
					marker_0.setOptions({					
						position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
					});	
				}
							
		
				usermarker=marker_0;

				var userlat = usermarker.position.lat();
                var userlng = usermarker.position.lng();
              
				document.getElementById("latitud").value = userlat;
                document.getElementById("longitud").value = userlng;		
				document.getElementById("buscar").value = radius;
			}
			
			centreGot = true;';

			$config['onclick'] = '
					
					if (!activeMap) {
						activeMap = true;
						
					}else{
						activeMap = false;
					}
					this.setOptions({scrollwheel:activeMap});
				';
			
	        // el zoom, que lo podemos poner en auto y de esa forma
	        //siempre mostrará todos los markers ajustando el zoom	
			$config['zoom'] = '9';	
	        //el tipo de mapa, en el pdf podéis ver más opciones
			$config['map_type'] = 'ROADMAP';
	        //el ancho del mapa		
			$config['map_wid_poith'] = '100%';	
	        //el alto del mapa	
			$config['map_height'] = '100%';	
	        //inicializamos la configuración del mapa	
			$this->googlemaps->initialize($config);
			
			$this->setUserMarker();

			
			//hacemos la consulta al modelo para pedirle 
			//la posición de los markers y el nombre_poi
			
			$markers=$this->getMarkers($lat, $lng, $radius);
			
			$data['datos'] = $markers;
				
			$this->fillMarkers($markers);			
			
	        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
			$data['map'] = $this->googlemaps->create_map();

			return $data;

		}

		public function homeMap(){

			if(isset($this->session->userdata['habilitado'])){		

				$id=$this->session->userdata['id_usuario'];
			}
			//creamos la configuración del mapa con un array
			$config = array();
	        //la zona del mapa que queremos mostrar al cargar el mapa
	        //como vemos le podemos pasar la ciudad y el país
	        //en lugar de la latitud y la lngitud
			$config['center'] = 'auto';

			$config['scrollwheel'] = false;

			$config['onboundschanged'] = 
				'if (!centreGot) {
					var mapCentre = map.getCenter();
					marker_0.setOptions({
						position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
					});
				}
				centreGot = true;';
							

			$config['onclick'] = '
					
					if (!activeMap) {
						activeMap = true;
						
					}else{
						activeMap = false;
					}
					this.setOptions({scrollwheel:activeMap});
				';
			
	        // el zoom, que lo podemos poner en auto y de esa forma
	        //siempre mostrará todos los markers ajustando el zoom	
			$config['zoom'] = '6';	
	        //el tipo de mapa, en el pdf podéis ver más opciones
			$config['map_type'] = 'ROADMAP';
	        //el ancho del mapa		
			$config['map_wid_poith'] = '100%';	
	        //el alto del mapa	
			$config['map_height'] = '100%';	
	        //inicializamos la configuración del mapa	
			$this->googlemaps->initialize($config);
			
			$this->setUserMarker();

			
			//hacemos la consulta al modelo para pedirle 
			//la posición de los markers y el nombre_poi
			
			$markers=$this->getMarkers(null, null, null);
			
			$data['datos'] = $markers;
				
			$this->fillMarkers($markers);			
			
	        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
			$data['map'] = $this->googlemaps->create_map();
			return $data;


		}

		


	
}