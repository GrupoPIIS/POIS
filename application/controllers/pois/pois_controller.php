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
		//$id_usuario = $this->session->userdata('id_usuario');
		//$data['pois'] = $this->pois_model->getPoiUser($id_usuario);
		$data['pois'] = $this->pois_model->getPoiUser(0);
		$this->load->view('mis-pois', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de un nuevo poi.
	function newPoi(){
		if($this->session->userdata('rol') == 0)
			$this->load->view('pois/form_new_admin');
		else
			$this->load->view('pois/form_new');
	}

	//Almacena los datos del formulario (newPoi()) en un array para pasarselos al modelo y añadirlo a la BD.
	function getNewPoi(){
		$data = array(
				'lng' 		=> $this->input->post('lng'),
				'lat' 		=> $this->input->post('lat'),
				'nombre_poi'=> $this->input->post('nombre_poi'),
				'txt_rep'	=> $this->input->post('txt_rep'),
				'direccion'	=> $this->input->post('direccion'),
				'id_usuario'=> $this->input->post('id_usuario'),

				//'id_categoria'=> $this->input->post('id_categoria')
			);
		$this->pois_model->newPoi($data);
		$this->index();
	}

	//Lleva a la vista con el formulario para modificar los datos.
	function updatePoi(){
		$data['id'] = $this->uri->segment(4);
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
		$data = array(
				'lng' 		=> $this->input->post('lng'),
				'lat' 		=> $this->input->post('lat'),
				'nombre_poi'=> $this->input->post('nombre_poi'),
				'txt_rep'	=> $this->input->post('txt_rep'),
				'direccion'	=> $this->input->post('direccion'),
				'id_usuario'=> $this->input->post('id_usuario'),

				//'id_categoria'=> $this->input->post('id_categoria')
			);
		$this->pois_model->updatePoi($this->uri->segment(4), $data);
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
}
?>