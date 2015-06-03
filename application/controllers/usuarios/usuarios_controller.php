<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('usuarios_model');
		if((!isset($this->session->userdata['habilitado'])) || ($this->session->userdata['rol'] != 0)){
	   		redirect('login_controller', 'refresh');
	   	}
	}

	//Lista todos los usuarios
	function index(){
		$data['usuarios'] = $this->usuarios_model->getUsers();

		if($this->input->post('crearPoi')=='true'){
			redirect('pois/pois_controller/newPoi', 'refresh');
		}else{
			$this->load->view('usuarios/usuarios', $data);
		}
		
	}

	//Lista un usuario en concreto. Se pasa el id por parametro.
	function getUsuario(){
		$id = $this->uri->segment(4);		
		
		$data['usuario'] = $this->usuarios_model->getUser($id);
		
		$this->load->view('usuarios/usuario', $data);
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

		$this->load->model('login_model');
		$this->login_model->sendEmail(
										$this->session->userdata['mail'], 
										$this->session->userdata['nombre'],
										$data['mail'],
										'Nueva alta',
										'Nombre de usuario: '.$data['nombre'].', correo: '.$data['mail'].' contraseña: '.$data['password']
									);

		$this->index();
	}

	//Lleva  a la vista con el formulario para modificar los datos.
	function updateUser(){
		$data['id'] = $this->uri->segment(4);
		if($data['id']){
			$data['usuario'] = $this->usuarios_model->getUser($data['id']);
		}

		if($data['id'] != null)
			$this->load->view('usuarios/form_update', $data);
		else
			$this->load->view('usuarios/form_new', $data);
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