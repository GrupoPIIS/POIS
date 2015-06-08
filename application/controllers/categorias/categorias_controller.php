<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('categorias_model');
		
	}

	//Lista todas las categorias, excepto la default.
	function index(){
		!isset($this->session->userdata['habilitado'])?   
	   		redirect('login_controller', 'refresh') : '';
		$data['categorias'] = $this->categorias_model->getCategories();
		$this->load->view('categorias', $data);
	}

	public function search($buscar){		
    	
    		if($buscar = $this->input->get('term')){
	            $this->db->select('id_cat, nombre_cat as value');
	            $this->db->like('nombre_cat', $buscar); 
	            $query=$this->db->get('categorias');
	            if($query->num_rows() > 0){
	                foreach ($query->result_array() as $row){
	                    $result[]= $row;
	                }
	            }
	            echo json_encode($result);
        	}  	
    }

	//Lista una categoria en concreto. Se pasa el id por parametro.
	function getCategory(){
		$data['id'] = $this->uri->segment(4);
		if(!$data['id']){
			$data['categorias'] = $this->categorias_model->getCategories();
		}else{
			$data['categorias'] = $this->categorias_model->getCategory($data['id']);
		}
		$this->load->view('categorias/categorias', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de una nueva categoria.
	function newCategory(){
		$this->load->view('categorias/form_new');
	}

	//Almacena los datos del formulario (newCategory()) en un array para pasarselos al modelo y añadirlo a la BD.
	function getNewCategory(){
		/*$data = array('nombre' => $this->input->post('nombre'));
		$this->categorias_model->newCategory($data);
		$this->index();*/
		$file_info = $this->_create_image();
        $subir = $this->categorias_model->newCategory($this->input->post('nombre'),$file_info['file_name']);
        $this->index();
	}

	//Lleva a la vista con el formulario para modificar los datos. Mientras no sea id 0 que es la default.
	function updateCategory(){
		if($this->session->userdata['rol'] != 0)
	   		redirect('categorias/categorias_controller/getCategory/'.$this->uri->segment(4), 'refresh');

		$data['id'] = $this->uri->segment(4);
		if($data['id']){
			$data['categoria'] = $this->categorias_model->getCategory($data['id']);
		}
		if($data['categoria'] != null)
			$this->load->view('categorias/form_update', $data);
		else
			$this->load->view('categorias/form_new', $data);
	}

	//Modifica los datos de una categoria cuyo id se pasa por parametro. Mientras no sea id 0 que es la default.
	function getUpdateCategory(){
		if($this->session->userdata['rol'] != 0)
	   		redirect('login_controller', 'refresh');

		/*$data = array('nombre_cat' => $this->input->post('nombre'));
		$this->categorias_model->updateCategory($this->uri->segment(4), $data);
		$this->index();*/

		$file_info = $this->_create_image();
        $subir = $this->categorias_model->updateCategory($this->uri->segment(4),$this->input->post('nombre'),$file_info['file_name']);
        $this->index();
	}

	//Elimina la categoria con el id pasado por parametro. Mientras no sea id 0 que es la default.
	function deleteCategory(){
	   	
		$id = $this->uri->segment(4);
		if($id){
			$this->categorias_model->deleteCategory($id);
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