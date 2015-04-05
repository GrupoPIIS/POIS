<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller{

	//Constructor de la clase. Carga el modelo correspondiente.
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->session->sess_destroy();
		$this->load->view('form_login');
	}

	function login(){
		$formulario = array(
						'mail' 		=> $this->input->post('mail'),
						'password' 	=> $this->input->post('password')
					);
		$data['usuarios'] = $this->login_model->login($formulario);
		$usuario = array(
						'id_usuario'=> $data['usuarios']->result()[0]->id_usuario,
						'rol'		=> $data['usuarios']->result()[0]->rol,
						'empresa'	=> $data['usuarios']->result()[0]->empresa,
						'direccion'	=> $data['usuarios']->result()[0]->direccion,
						'tel'		=> $data['usuarios']->result()[0]->tel,
						'cif'		=> $data['usuarios']->result()[0]->cif,	
						'mail'		=> $data['usuarios']->result()[0]->mail
					);
		$this->session->set_userdata($usuario);

		$info_usuario=array('habilitado' =>TRUE);
		$this->session->set_userdata($info_usuario); // configuramos la variable de sessión 'habilitado'

		if($this->session->userdata('rol') == 0)
 			redirect('usuarios/usuarios_controller', 'refresh');

 		redirect('pois/pois_controller', 'refresh');
	}

	//Envia un correo electronico.
	function sendEmail(){
		$this->load->library('Email');
		$configuraciones['smpt'] = 'gmail';
		$this->email->initialize($configuraciones);
		$this->email->from('dadcuentadeprueba@gmail.com', 'Alicia');
		$this->email->to('dadcuentadeprueba@gmail.com');
		$this->email->subject('prueba correo');
		$this->email->message('ejemplo de prueba de correo con CodeIgniter :D');
		$this->email->send();
		$this->email->print_debugger();
	}
}
?>