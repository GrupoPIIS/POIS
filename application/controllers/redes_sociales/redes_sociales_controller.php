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
        $file_info = $this->_create_image();
        $subir = $this->redes_sociales_model->newSocial($this->input->post('nombre_red'),$file_info['file_name']);
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

		$file_info = $this->_create_image();
        $subir = $this->redes_sociales_model->updateSocial($this->uri->segment(4),$this->input->post('nombre_red'),$file_info['file_name']);
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
        $config['width'] = 50;
        $config['height'] = 50;
        $this->load->library('image_lib', $config); 
        $this->image_lib->resize();
    }
}
?>