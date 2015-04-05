<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
		if((!$this->session->userdata['habilitado']) || ($this->session->userdata['rol'] != 0))
	   		die('Página con acceso restringido. <a href="./login">Click aquí para hacer login</a>');
	}

	//Lista todos los usuarios
	function index(){
		$data['usuarios'] = $this->usuarios_model->getUsers();
		$this->load->view('usuarios/usuarios', $data);
	}

	//Lista un usuario en concreto. Se pasa el id por parametro.
	function getUsuario(){
		$data['id'] = $this->uri->segment(4);
		if(!$data['id']){
			$data['usuarios'] = $this->usuarios_model->getUsers();
		}else{
			$data['usuarios'] = $this->usuarios_model->getUser($data['id']);
		}
		$this->load->view('usuarios/usuarios', $data);
	}
	
	//Lleva a la vista con el formulario para rellenar los datos de un nuevo usuario.
	function newUser(){
		$this->load->view('usuarios/form_new');
	}

	//Almacena los datos del formulario (newUser()) en un array para pasarselos al modelo y añadirlo a la BD.
	function getNewUser(){
		$data = array(
				'rol' 		=> $this->input->post('rol'),
				'nombre' 	=> $this->input->post('nombre'),
				'empresa' 	=> $this->input->post('empresa'),
				'direccion' => $this->input->post('direccion'),
				'tel' 		=> $this->input->post('tel'),
				'cif' 		=> $this->input->post('cif'),
				'mail' 		=> $this->input->post('mail'),
				'password' 	=> $this->input->post('password')
			);
		$this->usuarios_model->newUser($data);
		$this->index();
	}

	//Lleva  a la vista con el formulario para modificar los datos.
	function updateUser(){
		$data['id'] = $this->uri->segment(4);
		if($data['id']){
			$data['usuario'] = $this->usuarios_model->getUser($data['id']);
		}
		$this->load->view('usuarios/form_update', $data);
	}

	//Modifica los datos de un usuario cuyo id se pasa por parametro.
	function getUpdateUser(){
		$data = array(
				'rol' 		=> $this->input->post('rol'),
				'nombre' 	=> $this->input->post('nombre'),
				'empresa' 	=> $this->input->post('empresa'),
				'direccion' => $this->input->post('direccion'),
				'tel' 		=> $this->input->post('tel'),
				'cif' 		=> $this->input->post('cif'),
				'mail' 		=> $this->input->post('mail'),
				'password' 	=> $this->input->post('password')
			);
		$this->usuarios_model->updateUser($this->uri->segment(4), $data);
		$this->index();
	}

	//Elimina el usuario con el id pasado por parametro.
	function deleteUser(){
		$id = $this->uri->segment(4);
		if($id){
			$this->usuarios_model->deleteUser($id);
		}
		$this->index();
	}
}
?>