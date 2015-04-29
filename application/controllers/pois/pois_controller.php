<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Pois_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('pois_model');
		!isset($this->session->userdata['habilitado'])?   
	   		redirect('login_controller', 'refresh') : '';
	}

	//Lista todos los pois
	function index(){
		//$data['pois'] = $this->pois_model->getPois();
		$this->getPoiUser();
		//$this->load->view('pois/pois', $data);
	}

	//Lista un poi en concreto. Se pasa el id por parametro.
	function getPoi(){
		$data['id'] = $this->uri->segment(4);
		if(!$data['id']){
			$data['pois'] = $this->pois_model->getPois();
		}else{
			$data['pois'] = $this->pois_model->getPoi($data['id']);
		}
		$this->load->view('pois/pois', $data);
	}

	//Lista los pois del usuario con la sesion abierta
	function getPoiUser(){
		$id_usuario = $this->session->userdata('id_usuario');
		$data['pois'] = $this->pois_model->getPoiUser($id_usuario);
		//$data['pois'] = $this->pois_model->getPoiUser(0);
		$this->load->view('mis-pois', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de un nuevo poi.
	function newPoi(){
		$this->load->model('categorias_model');
        $data['categorias'] = $this->categorias_model->getCategories();

		$this->load->model('usuarios_model');
   	 	$data['usuarios'] = $this->usuarios_model->getUsers();

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
		$this->pois_model->newPoi($data);
		$this->index();
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

        $data['social'] = $this->pois_model->getSocialPoi($data['id']);

		if($data['id']){
			$data['poi'] = $this->pois_model->getPoi($data['id']);
		}

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

		$multimedia = array(
				'tipo_recurso' 		=> $this->input->post('tipo_recurso'),
				'nombre_recurso'	=> $this->input->post('nombre_recurso'),
				'ruta_recurso'		=> $this->input->post('ruta_recurso'),

				'nombre_original'		=> $this->input->post('nombre_original')
			);

		$social = array(
				'id_rrss' 	=> $this->input->post('id_rrss'),
				'enlace'	=> $this->input->post('enlace')
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
		$this->index();
	}

	function multimediaPoi(){
		$data['id'] = $this->uri->segment(4);

		if($data['id'] != null)
			$this->load->view('pois/poi_multimedia', $data);
		else
			$this->load->view('pois/form_new', $data);
	}

	function getMultimediaPoi(){
		$data = array(
				'tipo_recurso' 		=> $this->input->post('tipo_recurso'),
				'nombre_recurso'	=> $this->input->post('nombre_recurso'),
				'ruta_recurso'		=> $this->input->post('ruta_recurso')
			);

		$this->pois_model->multimediaPoi($this->uri->segment(4), $data);
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
		$this->index();
	}
}
?>