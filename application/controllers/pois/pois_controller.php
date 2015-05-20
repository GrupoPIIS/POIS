<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Pois_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('pois_model');
	}

	//Lista todos los pois
	function index(){
		//$data['pois'] = $this->pois_model->getPois();
		$this->getPoiUser();
		//$this->load->view('pois/pois', $data);
	}

	function updateVisits(){
		$id = $this->input->post('id');
		$this->pois_model->updateVisits($id);
	}

	//Lista un poi en concreto. Se pasa el id por parametro.
	function getPoi(){
		$data['id'] = $this->uri->segment(4);
		if(!$data['id']){
			$data['pois'] = $this->pois_model->getPois();
		}else{
			$data['pois'] = $this->pois_model->getPoi($data['id']);
		}

		$data['extras'] = $this->pois_model->getExtraPoi($data['id']);

        $data['multimedia'] = $this->pois_model->getMultimediaPoi($data['id']);

        $data['social'] = $this->pois_model->getSocialAllPoi($data['id']);

		$this->load->view('poicaracteristicas', $data);
	}

	//Lista los pois del usuario con la sesion abierta
	function getPoiUser(){
		$rol=$this->session->userdata('rol');
		$id_usuario = $this->session->userdata('id_usuario');
		if($rol==0){
			$data['pois'] = $this->pois_model->getPois();
		}else{
			$data['pois'] = $this->pois_model->getPoiUser($id_usuario);
		}
		
		$this->load->view('mis-pois', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de un nuevo poi.
	function newPoi(){
		$this->load->model('categorias_model');
        $data['categorias'] = $this->categorias_model->getCategories();

		$this->load->model('usuarios_model');
   	 	$data['usuarios'] = $this->usuarios_model->getUsers();
   	 	$data['map']=$this->selectMap();
		$this->load->view('pois/form_new', $data);
	}

	//Almacena los datos del formulario (newPoi()) en un array para pasarselos al modelo y añadirlo a la BD.
	function getNewPoi(){
		if($this->session->userdata('rol') == 0)
			$id_usu = $this->input->post('id_usuario');
		else
			$id_usu = $this->session->userdata('id_usuario');

		$data = array(
				'lng' 		=> $this->input->post('lng'),
				'lat' 		=> $this->input->post('lat'),
				'nombre_poi'=> $this->input->post('nombre_poi'),
				'txt_rep'	=> $this->input->post('txt_rep'),
				'direccion'	=> $this->input->post('direccion'),
				'id_usuario'=> $id_usu,

				'id_categoria'=> $this->input->post('id_categoria')
			);

		$id['id'] = $this->pois_model->newPoi($data);

		if(isset($_POST["btnExtras"]))
          	$this->load->view('pois/poi_extras', $id);
        else{
        	$datos['pois'] = $this->pois_model->getPoi($id['id']);

			$datos['extras'] = $this->pois_model->getExtraPoi($id['id']);

	        $datos['multimedia'] = $this->pois_model->getMultimediaPoi($id['id']);

	        $datos['social'] = $this->pois_model->getSocialAllPoi($id['id']);

			$this->load->view('poicaracteristicas', $datos);
        }
		//$this->index();
	}

	//Lleva a la vista con el formulario para modificar los datos.
	function updatePoi(){
		$data['id'] = $this->uri->segment(4);

		$this->load->model('usuarios_model');
   	 	$data['usuarios'] = $this->usuarios_model->getUsers();

		$this->load->model('categorias_model');
        $data['categorias'] = $this->categorias_model->getCategories();
        
        $this->load->model('redes_sociales_model');
        $data['redes_sociales'] = $this->redes_sociales_model->getSocials();

        $this->load->model('categorias_model');
        $data['categorias_poi'] = $this->pois_model->getCategoriesFromPoi($data['id']);

        $data['extras'] = $this->pois_model->getExtraPoi($data['id']);

        $data['multimedia'] = $this->pois_model->getMultimediaPoi($data['id']);

        $data['social'] = $this->pois_model->getSocialAllPoi($data['id']);

		if($data['id']){
			$data['poi'] = $this->pois_model->getPoi($data['id']);
		}

		$data['map']=$this->selectMap();

		if($data['poi'] != null)
			$this->load->view('pois/form_update', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	//Modifica los datos de un poi cuyo id se pasa por parametro.
	function getUpdatePoi(){
		if($this->session->userdata('rol') == 0)
			$id_usu = $this->input->post('id_usuario');
		else
			$id_usu = $this->session->userdata('id_usuario');

		$data = array(
				'lng' 		=> $this->input->post('lng'),
				'lat' 		=> $this->input->post('lat'),
				'nombre_poi'=> $this->input->post('nombre_poi'),
				'txt_rep'	=> $this->input->post('txt_rep'),
				'direccion'	=> $this->input->post('direccion'),
				'id_usuario'=> $id_usu
			);

		$categorias['id_categoria'] = $this->input->post('id_categoria');

		$extras = array(
				'slogan' 			=> $this->input->post('slogan'),
				'telefono1'			=> $this->input->post('telefono1'),
				'telefono2'			=> $this->input->post('telefono2'),
				'direccion_local'	=> $this->input->post('direccion_local'),
				'horario'			=> $this->input->post('horario')
			);

		$this->pois_model->updatePoi($this->uri->segment(4), $data, $categorias, $extras, $multimedia, $social);
		$this->index();
	}

	//Elimina el poi con el id pasado por parametro.
	function deletePoi(){
		$id = $this->uri->segment(4);
		if($id){
			$this->pois_model->deletePoi($id);
		}
		$this->index();
	}

	function extraPoi(){
		$data['id'] = $this->uri->segment(4);

		if($data['id'] != null)
			$this->load->view('pois/poi_extras', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	function getExtraPoi(){
		$data = array(
				'slogan' 			=> $this->input->post('slogan'),
				'telefono1'			=> $this->input->post('telefono1'),
				'telefono2'			=> $this->input->post('telefono2'),
				'direccion_local'	=> $this->input->post('direccion_local'),
				'horario'			=> $this->input->post('horario')
			);

		$this->pois_model->extraPoi($this->uri->segment(4), $data);

		$id['id'] = $this->uri->segment(4);

		if(isset($_POST["btnMultimedias"]))
          	$this->load->view('pois/poi_multimedia', $id);
        else{
        	$data['pois'] = $this->pois_model->getPoi($this->uri->segment(4));

			$data['extras'] = $this->pois_model->getExtraPoi($this->uri->segment(4));

	        $data['multimedia'] = $this->pois_model->getMultimediaPoi($this->uri->segment(4));

	        $data['social'] = $this->pois_model->getSocialAllPoi($this->uri->segment(4));

			$this->load->view('poicaracteristicas', $data);
        }

		//$this->index();
	}

	function multimediaPoi(){
		$data['id'] = $this->uri->segment(4);

		if($data['id'] != null)
			$this->load->view('pois/poi_multimedia', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	function getMultimediaPoi(){

		if($this->input->post('tipo_recurso') == 'Imagen')
			$file_info = $this->_create_image();
		else
			$file_info = $this->_create_video();
		
        $subir = $this->pois_model->multimediaPoi($this->uri->segment(4), $this->input->post('tipo_recurso'),
        	$this->input->post('nombre_recurso'), $file_info['file_name']);

        if(isset($_POST["btnRedes"])){

        	$data['id'] = $this->uri->segment(4);

			$this->load->model('redes_sociales_model');
	        $data['redes'] = $this->redes_sociales_model->getSocials();

			if($data['id'] != null)
				$this->load->view('pois/poi_social', $data);
        }else{
        	$data['pois'] = $this->pois_model->getPoi($this->uri->segment(4));

			$data['extras'] = $this->pois_model->getExtraPoi($this->uri->segment(4));

	        $data['multimedia'] = $this->pois_model->getMultimediaPoi($this->uri->segment(4));

	        $data['social'] = $this->pois_model->getSocialAllPoi($this->uri->segment(4));

			$this->load->view('poicaracteristicas', $data);
        }

        //$this->index();
	}

	function updateMultimediaPoi(){
		$data['id'] = $this->uri->segment(4);

		if($data['id'] != null)
			$this->load->view('pois/poi_multimedia', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	function getUpdateMultimediaPoi(){

		if($this->input->post('tipo_recurso') == 'Imagen')
			$file_info = $this->_create_image();
		else
			$file_info = $this->_create_video();
		
        $subir = $this->pois_model->updateMultimediaPoi($this->uri->segment(4), $this->uri->segment(5), $this->input->post('tipo_recurso'),
        	$this->input->post('nombre_recurso'), $file_info['file_name']);
        $this->index();
	}

	function deleteMultimediaPoi(){
		
        $subir = $this->pois_model->deleteMultimediaPoi($this->uri->segment(4), $this->uri->segment(5));
        $this->index();
	}

	function socialPoi(){
		$data['id'] = $this->uri->segment(4);

		$this->load->model('redes_sociales_model');
        $data['redes'] = $this->redes_sociales_model->getSocials();

		if($data['id'] != null)
			$this->load->view('pois/poi_social', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	function getSocialPoi(){
		$data = array(
				'id_rrss' 	=> $this->input->post('id_rrss'),
				'enlace'	=> $this->input->post('enlace')
			);

		$this->pois_model->socialPoi($this->uri->segment(4), $data);
		
		$data['pois'] = $this->pois_model->getPoi($this->uri->segment(4));

		$data['extras'] = $this->pois_model->getExtraPoi($this->uri->segment(4));

        $data['multimedia'] = $this->pois_model->getMultimediaPoi($this->uri->segment(4));

        $data['social'] = $this->pois_model->getSocialAllPoi($this->uri->segment(4));

		$this->load->view('poicaracteristicas', $data);
	}

	function deleteSocialPoi(){
		
        $subir = $this->pois_model->deleteSocialPoi($this->uri->segment(4), $this->uri->segment(5));
        $this->index();
	}

	function _create_video(){
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'mp3|mp4';

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $file_info = $this->upload->data();
        return $file_info;
	}

	function _create_image(){
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2000';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';

        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $file_info = $this->upload->data();
        $this->_create_thumbnail($file_info['file_name']);
        return $file_info;
	}
	//Crea una miniatura de la imagen
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 700;
        $config['height'] = 500;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }


	public function selectMap(){
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

			$marker = array();			
			$marker ['icon'] = base_url().'/estilos/img/marker.png';
			$marker ['infowindow_content'] = 'MUEVA ESTE MARCADOR';
			$marker['animation'] ='BOUNCE';
			$marker['draggable'] = true;
			$marker['ondragend'] = '
				
				document.getElementById("latitud").value = event.latLng.lat();
                document.getElementById("longitud").value = event.latLng.lng();

			';
			
			$this->googlemaps->add_marker($marker);

			return $this->googlemaps->create_map();
			
		}

}
?>