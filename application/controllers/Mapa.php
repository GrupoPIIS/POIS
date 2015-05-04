<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mapa extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		//	$this->load->model('mapa_model');
		$this->load->model('pois_model');
		$this->load->helper('url');	
	}


	
	public function index()
	{	

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

			$config['onboundschanged'] = 'if (!centreGot) {
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

			$circle = array();
			$circle['center'] = '37.985148,-1.126341';
			$circle['radius'] = '100000';
			$this->googlemaps->add_circle($circle);

			$marker = array();
			$marker ['icon'] = base_url().'/estilos/img/marker.png';
			$marker ['infowindow_content'] = 'Usted está aquí';
			$this->googlemaps->add_marker($marker);
			
			//hacemos la consulta al modelo para pedirle 
			//la posición de los markers y el nombre_poi
			
			if(isset($this->session->userdata['habilitado'])){
				$markers = $this->pois_model->getPoiUser($id);
			}else{
				$markers = $this->pois_model->getPois();
			}

			$data['datos'] = $markers;

			if($markers){
				foreach($markers->result() as $info_marker)
				{
					$marker = array();
		            //podemos elegir DROP o BOUNCE
					$marker ['animation'] = 'DROP';
		            //posición de los markers
					$marker ['position'] = $info_marker->lat.','.$info_marker->lng;
		            //nombre_poi de los markers(ventana de información)	
					$marker ['infowindow_content'] = $info_marker->nombre_poi;
		            //la id_poi del marker
					$marker['id'] = $info_marker->id_poi; 
					$this->googlemaps->add_marker($marker);
		 
		            //podemos colocar iconos personalizados así de fácil
					//$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
		 
					//si queremos que se pueda arrastrar el marker
					//$marker['draggable'] = TRUE;
					//si queremos darle una id_poi, muy útil
				}
			}	
			//en $data['datos']tenemos la información de cada marker para
	        //poder utilizarlo en el sid_poiebar en nuestra vista mapa_view
			//$data['datos'] = $this->mapa_model->get_markers();
	        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
			$data['map'] = $this->googlemaps->create_map();


			if(isset($this->session->userdata['habilitado'])){
				$rol= $this->session->userdata['rol'];

				if($rol=='0'){
					$this->load->view('home-admin',$data);
				}else{
					$this->load->view('home',$data);
				}		

			}else{
				$this->load->view('index',$data);
			}
			
			
		}
	
}