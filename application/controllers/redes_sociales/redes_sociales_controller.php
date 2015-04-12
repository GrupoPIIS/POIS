<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Redes_sociales_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('redes_sociales_model');
		!isset($this->session->userdata['habilitado'])?   
	   		redirect('login_controller', 'refresh') : '';
	}

	//Lista todas las redes, excepto la default.
	function index(){
		$data['redes'] = $this->redes_sociales_model->getSocials();
		$this->load->view('redes_sociales/redes_sociales', $data);
	}

	//Lista una categoria en concreto. Se pasa el id por parametro.
	function getSocial(){
		$data['id'] = $this->uri->segment(4);
		if(!$data['id']){
			$data['redes'] = $this->redes_sociales_model->getSocials();
		}else{
			$data['redes'] = $this->redes_sociales_model->getSocial($data['id']);
		}
		$this->load->view('redes_sociales/redes_sociales', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de una nueva categoria.
	function newSocial(){
		$this->load->view('redes_sociales/form_new');
	}

	//Almacena los datos del formulario (newSocial()) en un array para pasarselos al modelo y añadirlo a la BD.
	function getNewSocial(){
		$data = array('nombre_red' => $this->input->post('nombre_red')/*,
						'icono_red' => $this->input->post('icono_red')*/
					);
		$this->redes_sociales_model->newSocial($data);
		$this->index();
	}

	//Lleva a la vista con el formulario para modificar los datos. Mientras no sea id 0 que es la default.
	function updateSocial(){
		if($this->session->userdata['rol'] != 0)
	   		redirect('login_controller', 'refresh');

		$data['id'] = $this->uri->segment(4);
		if($data['id']){
			$data['redes'] = $this->redes_sociales_model->getSocial($data['id']);
		}
		if($data['redes'] != null)
			$this->load->view('redes_sociales/form_update', $data);
		else
			$this->load->view('redes_sociales/form_new', $data);
	}

	//Modifica los datos de una categoria cuyo id se pasa por parametro. Mientras no sea id 0 que es la default.
	function getUpdateSocial(){
		if($this->session->userdata['rol'] != 0)
	   		redirect('login_controller', 'refresh');

		$data = array('nombre_red' => $this->input->post('nombre_red'),
						'icono_red' => $this->input->post('icono_red')
					);
		$this->redes_sociales_model->updateSocial($this->uri->segment(4), $data);
		$this->index();
	}

	//Elimina la categoria con el id pasado por parametro. Mientras no sea id 0 que es la default.
	function deleteSocial(){
		if($this->session->userdata['rol'] != 0)
	   		redirect('login_controller', 'refresh');
	   	
		$id = $this->uri->segment(4);
		if($id){
			$this->redes_sociales_model->deleteSocial($id);
		}
		$this->index();
	}
}
?>